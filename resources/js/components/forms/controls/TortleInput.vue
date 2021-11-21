<template>
    <div
        :class="formattedContainerClasses"
    >
        <label
            :id="id + '_label'"
            :aria-label="label"
            :class="formattedLabelClasses"
            :for="id"
        >{{ label }}</label>
        <input
            :id="id"
            :aria-labelledby="id + '_label'"
            :autocomplete="autocomplete"
            :class="formattedInputClasses"
            :name="name"
            :type="type"
            :value="modelValue"
            class="border border-black border-solid"
            @input="$emit('update:modelValue', $event.target.value)"
        >
    </div>
</template>

<script>

    import UtilMixin from "../../mixins/util-mixin";

    export default {
        mixins: [UtilMixin],
        computed: {
            formattedContainerClasses() {
                return this.arrToSpacedStr(this.containerClasses);
            },
            formattedInputClasses() {
                return this.arrToSpacedStr(this.inputClasses);
            },
            formattedLabelClasses() {
                return this.arrToSpacedStr(this.labelClasses);
            }
        },
        data() {
            return {};
        },
        props: {
            type: {
                type: String,
                required: false,
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
            },
            autocomplete: {
                type: String,
                required: false,
                default: ""
            },
            containerClasses: {
                type: [String, Array],
                required: false,
                default: ""
            },
            inputClasses: {
                type: [String, Array],
                required: false,
                default: ""
            },
            labelClasses: {
                type: [String, Array],
                required: false,
                default: ""
            }
        }
    };
</script>
