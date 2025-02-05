<x-guest-layout>
        <div class="relative bottom-0 py-12 px-4 min-h-[50dvh] rounded-2xl ring-1 ring-inset ring-black/5 bg-[linear-gradient(115deg,var(--tw-gradient-stops))] from-[#fff1be] from-[28%] via-[#ee87cb] via-[70%] to-[#b060ff] sm:bg-[linear-gradient(145deg,var(--tw-gradient-stops))]">
            <p>Homepage.</p>
        </div>
        <div class="grid grid-cols-1 mt-8 lg:grid-cols-4">
            <div>
                <x-filepond
                    label="Add a File"
                    maxSize="600KB"
                    name="photo"
                    processRoute="{{ route('file-pond-process') }}"
                    revertRoute="{{ route('file-pond-revert') }}"
                    ::value=""
                />
            </div>

        </div>
</x-guest-layout>
