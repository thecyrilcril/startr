@props([
    'position' => 'auto',
    'label' => 'Label',
    'name',
    'x_model',
    'formContext' => false,
])
<div
    x-data="{
        value: ``,
        name: `{{ $name }}`,
        formContext: `{{ $formContext }}`,
        async init() {
            await $nextTick();
            let picker = flatpickr(this.$refs.date_picker, {
                {{-- defaultDate: 'this.application_closed_at', --}}
                allowInput: true,
                dateFormat: 'd-m-Y',
                onChange: (date, dateString) => {
                    this.value = dateString
                }
            })

            const curYear = document.querySelector('.cur-year');
            const searchInput = document.querySelector('.flatpickr-monthDropdown-months');
            curYear.setAttribute('name', this.name);
            searchInput.setAttribute('name', this.name);

            this.$watch('value', () => picker.setDate(this.value));
        }
    }"
    x-modelable="value" x-model="{{ $x_model }}"
    x-id="['flat-pickr']"

>
    <x-input-label ::for="$id('flat-pickr')" value="{{ $label }}" />
    <x-text-input
        x-ref="date_picker"
        ::id="$id('flat-pickr')"
        name="{{ $name }}"
        type="date"
        x-model="value"
        {{-- @change="form.validate(`${name}`)" --}}
        class="mt-1 block w-full" autofocus autocomplete="date" />
    @if($formContext === true)
    <template x-if="form.invalid(`${name}`)">
        <div x-text="form.errors[`${name}`]" class="text-sm mt-1 text-rose-500"></div>
    </template>
    @endif
</div>
