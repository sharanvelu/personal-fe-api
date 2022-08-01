@php $editing = isset($post) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $post->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $post->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="status"
            label="Status"
            value="{{ old('status', ($editing ? $post->status : '')) }}"
            maxlength="255"
            placeholder="Status"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="field_float"
            label="Field Float"
            value="{{ old('field_float', ($editing ? $post->field_float : '')) }}"
            max="255"
            step="0.01"
            placeholder="Field Float"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="field_integer"
            label="Field Integer"
            value="{{ old('field_integer', ($editing ? $post->field_integer : '')) }}"
            max="255"
            placeholder="Field Integer"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.checkbox
            name="field_bool"
            label="Field Bool"
            :checked="old('field_bool', ($editing ? $post->field_bool : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="field_date"
            label="Field Date"
            value="{{ old('field_date', ($editing ? optional($post->field_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="field_timestamp"
            label="Field Timestamp"
            value="{{ old('field_timestamp', ($editing ? optional($post->field_timestamp)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>
</div>
