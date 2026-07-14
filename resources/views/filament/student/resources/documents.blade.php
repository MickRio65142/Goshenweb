<x-filament-panels::page>
    @php
        $documents = \App\Models\StudentDocument::where('user_id', auth()->id())->latest()->get();
        $pendingCount = $documents->where('status', 'pending')->count();
        $approvedCount = $documents->where('status', 'approved')->count();
        $rejectedCount = $documents->where('status', 'rejected')->count();
        $fileIcons = [
            'pdf' => 'fa-file-pdf', 'png' => 'fa-file-image', 'jpg' => 'fa-file-image',
            'jpeg' => 'fa-file-image', 'gif' => 'fa-file-image',
            'xlsx' => 'fa-file-excel', 'xls' => 'fa-file-excel',
            'doc' => 'fa-file-word', 'docx' => 'fa-file-word',
            'csv' => 'fa-file-csv', 'txt' => 'fa-file-lines',
        ];
        $fileColors = [
            'pdf' => '#dc2626', 'png' => '#2563eb', 'jpg' => '#2563eb',
            'jpeg' => '#2563eb', 'gif' => '#2563eb',
            'xlsx' => '#16a34a', 'xls' => '#16a34a',
            'doc' => '#2563eb', 'docx' => '#2563eb',
            'csv' => '#16a34a', 'txt' => '#6b7280',
        ];
    @endphp
    <style>
        .doc-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 16px; display: flex; align-items: center; gap: 14px; transition: all .15s; }
        .doc-card:hover { border-color: var(--accent); box-shadow: var(--shadow-sm); }
        .doc-icon { width: 44px; height: 44px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
        .doc-info { flex: 1; min-width: 0; }
        .doc-name { font-size: 14px; font-weight: 600; color: var(--text); margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .doc-meta { font-size: 11px; color: var(--text-muted); margin: 2px 0 0; display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .doc-badge { display: inline-flex; font-size: 10px; font-weight: 600; padding: 2px 8px; border-radius: 999px; }
        .doc-actions { display: flex; gap: 6px; flex-shrink: 0; }
        .doc-btn { padding: 7px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; border: none; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; transition: all .15s; }
        .doc-btn-view { background: var(--accent); color: #fff; }
        .doc-btn-view:hover { opacity: .9; }
        .doc-btn-dl { background: var(--bg); color: var(--text); border: 1px solid var(--border); }
        .doc-btn-dl:hover { border-color: var(--accent); color: var(--accent); }
        .doc-feedback { font-size: 12px; color: var(--text-muted); background: var(--bg); border-radius: 6px; padding: 8px 12px; margin-top: 8px; border-left: 3px solid var(--text-light); }
        .preview-modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,.6); z-index: 100; backdrop-filter: blur(4px); display: flex; align-items: center; justify-content: center; padding: 24px; }
        .preview-modal { background: #fff; border-radius: var(--radius-lg); max-width: 900px; width: 100%; max-height: 90vh; overflow: hidden; display: flex; flex-direction: column; box-shadow: 0 24px 64px rgba(0,0,0,.3); }
        .preview-header { display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; border-bottom: 1px solid #e5e7eb; }
        .preview-title { font-size: 15px; font-weight: 600; color: #111827; }
        .preview-close { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; border: none; background: #f3f4f6; cursor: pointer; color: #6b7280; }
        .preview-close:hover { background: #e5e7eb; }
        .preview-body { flex: 1; overflow: auto; padding: 20px; min-height: 300px; display: flex; align-items: center; justify-content: center; background: #f9fafb; }
        .preview-body iframe { width: 100%; height: 500px; border: none; }
        .preview-body img { max-width: 100%; max-height: 500px; object-fit: contain; border-radius: 8px; }
        .preview-dl { display: flex; justify-content: flex-end; padding: 12px 20px; border-top: 1px solid #e5e7eb; gap: 8px; }
    </style>
    <div id="dash" x-data="{
        mobileSidebar: false,
        previewUrl: null,
        previewName: null,
        previewType: null,
        openPreview(url, name, type) { this.previewUrl = url; this.previewName = name; this.previewType = type; },
        closePreview() { this.previewUrl = null; this.previewName = null; this.previewType = null; },
        get isImage() { return this.previewType && ['png','jpg','jpeg','gif'].includes(this.previewType); },
        get isPdf() { return this.previewType === 'pdf'; }
    }">
        {{-- Preview Modal --}}
        <template x-if="previewUrl">
            <div class="preview-modal-overlay" @@click.self="closePreview">
                <div class="preview-modal">
                    <div class="preview-header">
                        <span class="preview-title" x-text="previewName"></span>
                        <button @@click="closePreview" class="preview-close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="preview-body">
                        <template x-if="isPdf">
                            <iframe :src="previewUrl"></iframe>
                        </template>
                        <template x-if="isImage">
                            <img :src="previewUrl" :alt="previewName">
                        </template>
                        <template x-if="!isPdf && !isImage">
                            <div style="text-align: center; padding: 40px; color: #6b7280;">
                                <i class="fas fa-file" style="font-size: 48px; margin-bottom: 16px; display: block;"></i>
                                <p style="font-size: 14px;">Preview not available for this file type.</p>
                                <a :href="previewUrl" download class="doc-btn doc-btn-dl" style="margin-top: 12px; display: inline-flex;">
                                    <i class="fas fa-download"></i> Download to View
                                </a>
                            </div>
                        </template>
                    </div>
                    <div class="preview-dl">
                        <a :href="previewUrl" download class="doc-btn doc-btn-dl"><i class="fas fa-download"></i> Download</a>
                        <a :href="previewUrl" target="_blank" class="doc-btn doc-btn-view"><i class="fas fa-external-link-alt"></i> Open in New Tab</a>
                    </div>
                </div>
            </div>
        </template>

        <x-student.dash-layout title="My Documents">
            <div class="dash-content">
                {{-- Stats Row --}}
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: #f5a52415; color: #f5a524;"><i class="fa-solid fa-file-upload"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $documents->count() }}</div>
                            <div class="stat-label">Total</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: #f5a52415; color: #f5a524;"><i class="fa-solid fa-clock"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $pendingCount }}</div>
                            <div class="stat-label">Pending</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: #16a34a15; color: #16a34a;"><i class="fa-solid fa-check-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $approvedCount }}</div>
                            <div class="stat-label">Approved</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background: #dc262615; color: #dc2626;"><i class="fa-solid fa-times-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $rejectedCount }}</div>
                            <div class="stat-label">Rejected</div>
                        </div>
                    </div>
                </div>

                {{-- Upload Button --}}
                <div style="margin-bottom: 20px;">
                    @if(method_exists($this, 'getHeaderActions'))
                        @foreach($this->getHeaderActions() as $action)
                            {{ $action }}
                        @endforeach
                    @endif
                </div>

                {{-- Document List --}}
                @if($documents->count())
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        @foreach($documents as $item)
                            @php
                                $ext = strtolower(pathinfo($item->file_path ?? '', PATHINFO_EXTENSION));
                                $icon = $fileIcons[$ext] ?? 'fa-file';
                                $iconColor = $fileColors[$ext] ?? '#6b7280';
                                $badgeColor = match($item->status) {
                                    'pending' => '#f5a524',
                                    'approved' => '#16a34a',
                                    'rejected' => '#dc2626',
                                    default => '#6b7280',
                                };
                                $fileUrl = $item->file_path ? asset('storage/' . $item->file_path) : null;
                            @endphp
                            <div class="doc-card">
                                <div class="doc-icon" style="background: {{ $iconColor }}15; color: {{ $iconColor }};">
                                    <i class="fas {{ $icon }}"></i>
                                </div>
                                <div class="doc-info">
                                    <p class="doc-name">{{ $item->document_name }}</p>
                                    <div class="doc-meta">
                                        <span>{{ $item->created_at->format('M d, Y') }}</span>
                                        <span>·</span>
                                        <span class="doc-badge" style="background: {{ $badgeColor }}; color: #fff;">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                        @if($ext)
                                            <span>·</span>
                                            <span style="text-transform: uppercase;">.{{ $ext }}</span>
                                        @endif
                                    </div>
                                    @if($item->admin_feedback)
                                        <div class="doc-feedback">
                                            <i class="fas fa-comment-dots" style="margin-right: 6px;"></i>
                                            {{ $item->admin_feedback }}
                                        </div>
                                    @endif
                                </div>
                                <div class="doc-actions">
                                    @if($fileUrl)
                                        <button @@click="openPreview('{{ $fileUrl }}', '{{ $item->document_name }}', '{{ $ext }}')" class="doc-btn doc-btn-view">
                                            <i class="fas fa-eye"></i> View
                                        </button>
                                        <a href="{{ $fileUrl }}" download class="doc-btn doc-btn-dl">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    @elseif($item->status === 'pending')
                                        <span class="doc-btn" style="background: transparent; color: var(--text-muted); cursor: default; border: 1px dashed var(--border);">Awaiting file</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fa-solid fa-file-upload" style="font-size: 3rem; color: var(--text-light); margin-bottom: 1rem;"></i>
                        <h3>No documents uploaded yet</h3>
                        <p>Click the "Create" button above to upload a document</p>
                    </div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
