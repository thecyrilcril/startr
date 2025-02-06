@props([
    'options' => [],
    'position' => 'auto',
    'label' => 'Label',
    'name',
    'x_model',
])
<div
    x-data="{
        options: @js($options),
        value: ``,
        name: `{{ $name }}`,
        async init() {
            await $nextTick();
{{--
            let choicesInstance = new Choices(this.$refs.choiceList, {
                position: '{{ $position }}',
                shouldSort: false,
                sorter: (a, b) => {
                  // Keep the top option fixed
                  if (a.value === 'top-option') return -1;
                  if (b.value === 'top-option') return 1;
                  return a.label.localeCompare(b.label);
                }
            });
            let choiceSelected = this.value;
            if (this.options === null) {
                throw new Error(`Null or empty array at name:{{ $name }}`)
            }
            choicesInstance.setChoices(this.options.map(({ value, label }) => ({
                value,
                label,
                selected: choiceSelected.includes(value),
            })))

            this.$refs.choiceList.addEventListener('change', () => {
                this.value = choicesInstance.getValue(true)
                $nextTick(() => this.form.validate(this.name))

            })
 --}}
                let choices = new Choices(this.$refs.select)

                let refreshChoices = () => {
                    let selection = this.multiple ? this.value : [this.value]

                    choices.clearStore()
                    choices.setChoices(this.options.map(({ value, label }) => ({
                        value,
                        label,
                        selected: selection.includes(value),
                    })))
                }

                refreshChoices()

                this.$refs.select.addEventListener('change', () => {
                    this.value = choices.getValue(true)
                })

                this.$watch('value', () => refreshChoices())
                this.$watch('options', () => refreshChoices())
        }
    }"
>
    <x-input-label for="{{ $name }}" value="{{ $label }}" class="mb-1" />
    <select
        x-ref="select"
        id="{{ $name }}"
        name="{{ $name }}"
        x-modelable="value" x-model="{{ $x_model }}"
        class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
    >
        <option value="top-option" selected>--- {{ $label }} ---</option>
    </select>
{{--     <template x-if="form.invalid(`${name}`)">
        <div x-text="form.errors[`${name}`]" class="text-sm text-rose-500"></div>
    </template> --}}
</div>
