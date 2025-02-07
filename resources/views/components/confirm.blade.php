 <div x-data="$store.confirmModal" class="flex justify-center">
     <!-- Modal -->
     <template x-teleport="body">
         <div
             x-show="isVisible"
             style="display: none"
             x-on:keydown.escape.prevent.stop="cancel()"
             role="dialog"
             aria-modal="true"
             x-id="['modal-title']"
             :aria-labelledby="$id('modal-title')"
             class="fixed inset-0 z-10 overflow-y-auto"
         >
             <!-- Overlay -->
             <div x-show="isVisible" x-transition.opacity class="fixed inset-0 bg-black/50"></div>

             <!-- Panel -->
             <div
                 x-show="isVisible" x-transition
                 x-on:click="cancel()"
                 class="relative flex min-h-screen items-center justify-center p-4"
             >
                 <div
                     x-on:click.stop
                     x-trap.noscroll.inert="isVisible"
                     class="relative min-w-96 max-w-xl rounded-xl bg-white p-6 shadow-lg"
                 >
                     <!-- Title -->
                     <h2 class="font-medium text-gray-800 font-semibold text-lg" :id="$id('modal-title')">Confirm</h2>

                     <!-- Content -->
                     <p class="mt-2 text-gray-500 max-w-sm" x-text="message"></p>

                     <!-- Buttons -->
                     <div class="mt-6 flex justify-end space-x-2">
                         <button type="button" x-on:click="cancel()" class="relative flex items-center justify-center gap-2 whitespace-nowrap rounded-lg border border-transparent bg-transparent px-4 py-2 text-gray-800 hover:bg-gray-800/10">
                             Cancel
                         </button>

                         <button type="button" x-on:click="confirm()" class="relative flex items-center justify-center gap-2 whitespace-nowrap rounded-lg border border-transparent bg-rose-700 px-4 py-2 text-white font-medium hover:bg-rose-800">
                             Confirm
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </template>
 </div>
