@props([
    'options' => [],
    'position' => 'auto',
    'label' => 'Label',
    'name' => 'default',
    'x_model',
    'formContext' => false,
])
<div
    x-data="{
        multiple: false,
        options: @js($options),
        value: ``,
        name: `{{ $name }}`,
        formContext: `{{ $formContext }}`,
        init() {
            this.$nextTick(() => {
                let choicesInstance = new Choices(this.$refs.select, {
                    position: '{{ $position }}',
                    shouldSort: false,
                });

                const searchInput = document.querySelector('.choices__input--cloned');
                if (searchInput) {
                  searchInput.setAttribute('id', $el.id);
                  searchInput.setAttribute('name', this.name);
                }

                let refreshChoices = () => {
                    let selection = this.multiple ? this.value : [this.value];

                    choicesInstance.clearStore();

                    choicesInstance.setChoices([
                        { value: '', label: `--- {{ $label }} ---`, selected: this.multiple === false ? true : false }
                    ]);

                    choicesInstance.setChoices(this.options.map(({ value, label }) => ({
                        value,
                        label,
                        selected: selection.includes(value),
                    })));
                };

                refreshChoices();

                this.$refs.select.addEventListener('change', () => {
                    this.value = choicesInstance.getValue(true);
                    {{-- $nextTick(() => this.form.validate(this.name)); --}}
                });

                this.$watch('value', () => refreshChoices());
                this.$watch('options', () => refreshChoices());

            });

        }
    }"
    x-id="['choices-select']"
>
    <x-input-label ::for="$id('choices-select')" value="{{ $label }}" class="mb-1" />
    <select
        x-ref="select"
        :multiple="multiple"
        :id="$id('choices-select')"
        name="{{ $name }}"
        x-modelable="value" x-model="{{ $x_model }}"
        class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        autocomplete="off"
    >
    </select>
    @if($formContext === true)
    <template x-if="form.invalid(`${name}`)">
        <div x-text="form.errors[`${name}`]" class="text-sm text-rose-500"></div>
    </template>
    @endif
</div>
