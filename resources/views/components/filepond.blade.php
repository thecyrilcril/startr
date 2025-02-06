@props([
    'label',
    'value' => null,
    'maxSize' => '500KB',
    'processRoute' => '',
    'revertRoute' => '',
    'name' => '',
    'formContext' => false,
])
<div x-data="{
        name: `{{ $name }}`,
        pond: null,
        unload() {
            this.pond.removeFiles();
        },
        async init() {
            await $nextTick()
            const fileInput = $refs.file_input

            FilePond.registerPlugin(
              FilePondPluginImagePreview,
              FilePondPluginFileValidateType,
              FilePondPluginFileValidateSize
            );

            this.pond = FilePond.create(fileInput)

            this.pond.setOptions({
                acceptedFileTypes: ['image/*', 'application/pdf'],
                maxFileSize: `{{ $maxSize }}`,
                @if ($value)
                files: [{
                    source: `{{ $value }}`,
                    options: {
                        type: 'local',
                    }
                }],
                @endif
                server: {
                    process: `{{ $processRoute }}`,
                    revert: `{{ $revertRoute }}`,
                    @if ($value)
                    load: async (source, load) => {
                        const response = await fetch(source);
                        const blob = await response.blob();
                        load(blob);
                    },
                    @endif
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    }
                }
            })

            this.pond.on('processfile', (error, file) => {
                $dispatch('set-file-value', { value: file.serverId })
            });

            this.pond.on('processfilerevert', (error, file) => {
                $dispatch('set-file-value', { value: `` })
            });
        }
    }"
    x-on:filepond:remove-files.window="unload"
    x-id="['file-pond']"
>
    <x-input-label ::for="$id('file-pond')" value="{{ $label }}" />
    <x-text-input
        x-ref="file_input"
        ::id="$id('file-pond')"
        name="file"
        type="file"
        class="mt-1 block w-full" required autofocus autocomplete="off"
    />
    @if($formContext === true)
    <template x-if="form.invalid(`${name}`)">
        <div x-text="form.errors[`${name}`]" class="text-sm text-rose-500"></div>
    </template>
    @endif
</div>
