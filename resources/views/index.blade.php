<x-guest-layout>
        <div class="relative bottom-0 py-12 px-4 min-h-[50dvh] rounded-2xl ring-1 ring-inset ring-black/5 bg-[linear-gradient(115deg,var(--tw-gradient-stops))] from-[#fff1be] from-[28%] via-[#ee87cb] via-[70%] to-[#b060ff] sm:bg-[linear-gradient(145deg,var(--tw-gradient-stops))]">
            <p>Homepage.</p>
        </div>
        <div
            x-data="{
                country: ``,
                toggle: ``,
                date: ``,

            }"

            class="grid grid-cols-1 mt-8 lg:grid-cols-4 gap-4">
            <div>
                <form
                    x-data="{
                        image: `{{ $photo_url }}`,
                        form: $form(`post`, `{{ route('upload-file') }}`, {
                            file: ``
                        }),
                        async submit() {
                            try {
                               const response = await this.form.submit();
                            } catch(error) {
                                console.log(error)
                           }
                        }
                    }"
                    x-on:set-file-value="form.file = $event.detail.value"
                    @submit.prevent="submit"
                >
                    <x-filepond
                        label="Add a File"
                        maxSize="600KB"
                        name="photo"
                        processRoute="{{ route('file-pond-process') }}"
                        revertRoute="{{ route('file-pond-revert') }}"
                        value="image"
                    />
                    <x-primary-button>
                        Upload
                    </x-primary-button>
                </form>
            </div>
            <div>
                @php
                $options = collect([
                    [ 'value' => 1, 'label' => 'Ghana' ],
                    ['value' => 2, 'label' => 'Kenya'],
                    ['value' => 3, 'label' => 'Nigeria'],
                ]);
                @endphp
                <x-choices
                    :options="$options"
                    name="country"
                    label="Select Country"
                    position="top"
                    x_model="country"
                />
            </div>
            <div>
                <x-toggle x_model="toggle" id="toggle-id" name="active" @toggle="console.log(event)" />
            </div>
            <div>
                <x-flatpickr name="date" x_model="date" label="Pick date" />
            </div>
            <div>
                    <x-primary-button type="button" @click="async () => await $store.confirmModal.show(`Are you sure you want to perform a deletion?`)">
                        Delete
                    </x-primary-button>
            </div>


        </div>
</x-guest-layout>
