<template>
    <div>
        <label
            :for="id"
            :id="id + '_label'"
            :aria-label="label"
        >{{ label }}</label>
        <input
            :type="type"
            :aria-labelledby="id + '_label'"
            :value="modelValue"
            :id="id"
            :name="name"
            @input="$emit('update:modelValue', $event.target.value)"
        >
    </div>
</template>

<script>
    export default {
        data() {
            return {};
        },
        props: {
            type: {
                type: String,
                required: true,
                default: "text"
            },
            label: {
                type: String,
                required: false,
                default: ""
            },
            id: {
                type: String,
                required: true
            },
            name: {
                type: String,
                required: false,
                default: ""
            },
            modelValue: {
                type: [String, Number, Boolean],
                required: false,
                default: ""
            }
        }
    };
</script>
