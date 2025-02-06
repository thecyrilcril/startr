@props([
    'activeLabel' => 'active',
    'inactiveLabel' => '',
    'name' => '',
    'x_model',
    'formContext' => false,
])
<div x-data="{
        value: false,
        name: `{{ $name }}`,
        async init() {
            await $nextTick();
            $watch('value', value => $dispatch('toggle', {
                    id: $el.id,
                    name: `{{ $name }}`,
                    value: this.value
                })
            )
        }
    }"
    x-id="['toggle-switch']"
    x-modelable="value" x-model="{{ $x_model }}"
    {{ $attributes->twMerge(['class' => 'flex items-center justify-center space-x-2']) }}
>
    @if($inactiveLabel)
    <label
        @click="$refs.toggle.click(); $refs.toggle.focus()"
        :class="{ 'text-gray-400':  value }"
        :for="$id('toggle-switch')"
        class="text-sm select-none capitalize"
        x-cloak>
        {{ $inactiveLabel }}
    </label>
    @endif
    {{-- <input :id="$el.id" type="checkbox" name="switch" class="hidden" :checked="value"> --}}
    <input :id="$id('toggle-switch')" type="checkbox" name="switch" class="hidden" :checked="value">

    <button
        x-ref="toggle"
        type="button"
        role="switch"
        :aria-checked="value"
        :aria-labelledby="$id('toggle-switch')"
        @click="value = ! value"
        :class="value ? 'bg-sky-500' : 'bg-neutral-200'"
        class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10"
        x-cloak>
        <span :class="value ? 'translate-x-[18px]' : 'translate-x-0.5'" class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md" aria-hidden="true"></span>
    </button>

    <label @click="$refs.toggle.click(); $refs.toggle.focus()"
        :class="{ 'text-sky-500': value, 'text-gray-400': ! value }"
        :for="$id('toggle-switch')"
        class="text-sm select-none capitalize"
        x-cloak>
        {{ $activeLabel }}
    </label>
    @if($formContext === true)
    <template x-if="form.invalid(`${name}`)">
        <div x-text="form.errors[`${name}`]" class="mb-1 text-sm text-sky-500"></div>
    </template>
    @endif
</div>
