<div wire:ignore>
    <!-- PINNED VERTICAL CONTACT SIDEBAR (Responsive Sizes) -->
    <div class="fixed right-0 top-1/2 -translate-y-1/2 flex flex-col gap-1 z-50">
        
        <!-- 1. WhatsApp -->
        <a href="https://api.whatsapp.com/send?phone=237679202265&text=Hello" target="_blank" class="!bg-[#06d755] hover:!bg-emerald-600 !text-white !w-10 !h-10 md:!w-14 md:!h-14 !rounded-l-xl md:!rounded-l-2xl !shadow-xl !transition-all !duration-300 hover:!-translate-x-1 !flex !items-center !justify-center !border-none !outline-none">
            <i class="fa-brands fa-whatsapp !text-xl md:!text-3xl"></i>
        </a>
        
        <!-- 2. Call -->
        <a href="tel:+237679202265" class="!bg-[#091c3d] hover:!bg-[#c1121f] !text-white !w-10 !h-10 md:!w-14 md:!h-14 !rounded-l-xl md:!rounded-l-2xl !shadow-xl !transition-all !duration-300 hover:!-translate-x-1 !flex !items-center !justify-center !border-none !outline-none">
            <i class="fa-solid fa-phone !text-lg md:!text-2xl"></i>
        </a>
        
        <!-- 3. Email -->
        <a href="mailto:info@goshenworkskill.com" class="!bg-[#c1121f] hover:!bg-[#091c3d] !text-white !w-10 !h-10 md:!w-14 md:!h-14 !rounded-l-xl md:!rounded-l-2xl !shadow-xl !transition-all !duration-300 hover:!-translate-x-1 !flex !items-center !justify-center !border-none !outline-none">
            <i class="fa-solid fa-envelope !text-lg md:!text-2xl"></i>
        </a>
        
    </div>

    <!-- FLOATING CHAT WIDGET (Responsive Sizes) -->
    <div x-data="{ chatOpen: false, inputText: '', messages: [{ sender: 'system', text: 'Hello! Welcome to Goshen Work Skill Association admissions desk. How can we assist you today?' }], sendMessage() { if (this.inputText.trim() === '') return; this.messages.push({ sender: 'user', text: this.inputText }); this.inputText = ''; setTimeout(() => { this.messages.push({ sender: 'system', text: 'Thank you for your inquiry! Our coordinator will contact you shortly. For immediate assistance, feel free to WhatsApp us directly at +237 679 20 22 65.' }); }, 1200); } }" class="fixed bottom-4 md:bottom-6 right-4 md:right-6 z-50">
        
        <!-- Chat Button -->
        <button x-on:click="chatOpen = !chatOpen" class="!bg-[#06d755] hover:!bg-emerald-600 !text-white !w-12 !h-12 md:!w-16 md:!h-16 !rounded-full !shadow-2xl !flex !items-center !justify-center !transition-all !duration-300 hover:!scale-110 active:!scale-95 !border-none !outline-none">
            <i class="fa-solid fa-comment-dots !text-xl md:!text-2xl"></i>
        </button>

        <!-- Chat Box Window -->
        <div x-show="chatOpen" x-transition x-cloak class="absolute bottom-16 md:bottom-20 right-0 w-[85vw] sm:w-80 md:w-96 bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden flex flex-col h-[350px] md:h-[400px]">
            <div class="bg-[#091c3d] text-white p-4 flex items-center justify-between">
                <div class="flex items-center gap-2.5"><div class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse"></div><span class="font-bold text-sm">Admissions Desk</span></div>
                <button x-on:click="chatOpen = false" class="text-gray-300 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="flex-grow p-4 overflow-y-auto space-y-3 bg-gray-50 flex flex-col hide-scrollbar">
                <template x-for="msg in messages"><div :class="msg.sender === 'user' ? 'self-end bg-[#091c3d] text-white' : 'self-start bg-white text-gray-800'" class="p-3 rounded-2xl max-w-[80%] text-xs shadow-sm"><p x-text="msg.text"></p></div></template>
            </div>
            <div class="p-3 bg-white border-t border-gray-100 flex gap-2">
                <input x-model="inputText" x-on:keydown.enter="sendMessage()" type="text" placeholder="Type your message..." class="flex-grow bg-gray-50 border border-gray-200 rounded-xl px-4 py-2 text-xs focus:outline-none focus:border-blue-500">
                <button x-on:click="sendMessage()" class="!bg-[#c1121f] hover:!bg-[#091c3d] !text-white !p-2.5 !rounded-xl !transition-all !duration-300 !flex !items-center !justify-center !border-none !outline-none"><i class="fa-solid fa-paper-plane text-xs"></i></button>
            </div>
        </div>
    </div>
</div>