@php use Illuminate\Support\Js; @endphp
<x-filament-panels::page>
    <div x-data="certificateDesigner()" x-init="init(@js($config), @js($backgroundUrl))" class="space-y-4">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div class="flex items-center gap-2">
                <x-filament::button wire:click="addField" color="gray">
                    + Add Text Field
                </x-filament::button>
                <x-filament::button wire:click="save" color="primary" onclick="window.dispatchEvent(new CustomEvent('save-fields'))">
                    Save Design
                </x-filament::button>
            </div>
            <div class="text-sm text-gray-500">
                Drag fields to position them. Click a field to edit its properties.
            </div>
        </div>

        <div class="relative border rounded-lg overflow-auto bg-gray-100" style="max-height: 80vh;">
            <div class="relative" :style="`width: ${bgWidth}px; min-height: ${bgHeight}px;`">
                <template x-if="backgroundUrl">
                    <img :src="backgroundUrl" :style="`width: ${bgWidth}px; height: ${bgHeight}px;`" class="block pointer-events-none select-none" draggable="false">
                </template>

                <template x-for="(field, index) in fields" :key="field.id">
                    <div
                        :id="field.id"
                        class="absolute cursor-move border-2 border-dashed"
                        :class="{ 'ring-2 ring-blue-400 z-10': selectedField === index, 'border-blue-300 hover:border-blue-500': true }"
                        :style="`left: ${field.x}px; top: ${field.y}px; width: ${field.width}px; min-height: ${field.height}px; font-size: ${field.font_size}px; color: ${field.font_color}; font-weight: ${field.font_weight}; text-align: ${field.text_align};`"
                        @mousedown.prevent="startDrag($event, index)"
                        @click.stop="selectField(index)"
                    >
                        <div class="px-2 py-1 text-xs bg-white/90 border-b flex items-center justify-between gap-2" @click.stop>
                            <span class="font-medium truncate" x-text="field.label"></span>
                            <button @click.stop="removeField(field.id)" class="text-red-500 hover:text-red-700 text-lg leading-none">&times;</button>
                        </div>
                        <div class="px-2 py-4 flex items-center justify-center" x-text="field.placeholder || field.label"></div>
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-blue-500 cursor-se-resize" @mousedown.stop="startResize($event, index)"></div>
                    </div>
                </template>
            </div>
        </div>

        <template x-if="selectedField !== null && fields[selectedField]">
            <div class="bg-white border rounded-lg p-4 space-y-3">
                <h3 class="font-semibold text-sm">Field Settings</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Label</label>
                        <input type="text" x-model="fields[selectedField].label" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Placeholder</label>
                        <input type="text" x-model="fields[selectedField].placeholder" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Font Size</label>
                        <input type="number" x-model="fields[selectedField].font_size" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Font Color</label>
                        <input type="color" x-model="fields[selectedField].font_color" class="w-full h-8 border rounded">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Font Weight</label>
                        <select x-model="fields[selectedField].font_weight" class="w-full border rounded px-2 py-1 text-sm">
                            <option value="normal">Normal</option>
                            <option value="bold">Bold</option>
                            <option value="600">Semi Bold</option>
                            <option value="300">Light</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Text Align</label>
                        <select x-model="fields[selectedField].text_align" class="w-full border rounded px-2 py-1 text-sm">
                            <option value="left">Left</option>
                            <option value="center">Center</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">X Position</label>
                        <input type="number" x-model="fields[selectedField].x" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Y Position</label>
                        <input type="number" x-model="fields[selectedField].y" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Width</label>
                        <input type="number" x-model="fields[selectedField].width" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Height</label>
                        <input type="number" x-model="fields[selectedField].height" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                </div>
            </div>
        </template>
    </div>

    <script>
        function certificateDesigner() {
            return {
                fields: [],
                backgroundUrl: '',
                bgWidth: 1200,
                bgHeight: 800,
                selectedField: null,
                dragging: false,
                dragIndex: null,
                dragStartX: 0,
                dragStartY: 0,
                fieldStartX: 0,
                fieldStartY: 0,
                resizing: false,
                resizeIndex: null,
                resizeStartX: 0,
                resizeStartY: 0,
                fieldStartW: 0,
                fieldStartH: 0,

                init(config, url) {
                    this.fields = config?.fields || [];
                    this.bgWidth = config?.page_width || 1200;
                    this.bgHeight = config?.page_height || 800;
                    this.backgroundUrl = url;

                    window.addEventListener('save-fields', () => {
                        this.syncFields();
                    });
                },

                selectField(index) {
                    this.selectedField = this.selectedField === index ? null : index;
                },

                startDrag(event, index) {
                    this.dragging = true;
                    this.dragIndex = index;
                    this.dragStartX = event.clientX;
                    this.dragStartY = event.clientY;
                    this.fieldStartX = this.fields[index].x;
                    this.fieldStartY = this.fields[index].y;
                    this.selectedField = index;

                    const onMove = (e) => {
                        if (!this.dragging) return;
                        const dx = e.clientX - this.dragStartX;
                        const dy = e.clientY - this.dragStartY;
                        this.fields[this.dragIndex].x = Math.max(0, this.fieldStartX + dx);
                        this.fields[this.dragIndex].y = Math.max(0, this.fieldStartY + dy);
                    };

                    const onUp = () => {
                        this.dragging = false;
                        this.dragIndex = null;
                        document.removeEventListener('mousemove', onMove);
                        document.removeEventListener('mouseup', onUp);
                    };

                    document.addEventListener('mousemove', onMove);
                    document.addEventListener('mouseup', onUp);
                },

                startResize(event, index) {
                    this.resizing = true;
                    this.resizeIndex = index;
                    this.resizeStartX = event.clientX;
                    this.resizeStartY = event.clientY;
                    this.fieldStartW = this.fields[index].width;
                    this.fieldStartH = this.fields[index].height;
                    this.selectedField = index;

                    const onMove = (e) => {
                        if (!this.resizing) return;
                        const dx = e.clientX - this.resizeStartX;
                        const dy = e.clientY - this.resizeStartY;
                        this.fields[this.resizeIndex].width = Math.max(50, this.fieldStartW + dx);
                        this.fields[this.resizeIndex].height = Math.max(20, this.fieldStartH + dy);
                    };

                    const onUp = () => {
                        this.resizing = false;
                        this.resizeIndex = null;
                        document.removeEventListener('mousemove', onMove);
                        document.removeEventListener('mouseup', onUp);
                    };

                    document.addEventListener('mousemove', onMove);
                    document.addEventListener('mouseup', onUp);
                },

                removeField(id) {
                    this.fields = this.fields.filter(f => f.id !== id);
                    this.selectedField = null;
                    @this.removeField(id);
                },

                syncFields() {
                    @this.set('config.fields', JSON.parse(JSON.stringify(this.fields)));
                }
            }
        }
    </script>
</x-filament-panels::page>
