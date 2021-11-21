<template>
    <button
        :id="id"
        :class="joinedButtonClasses"
        :type="buttonType"
        class="tortle-btn"
    >
        <slot/>
    </button>
</template>

<script>

    import UtilMixin from "../../mixins/util-mixin";

    export default {
        emits: [],
        mixins: [UtilMixin],
        data() {
            return {};
        },
        computed: {
            joinedButtonClasses() {
                return this.arrToSpacedStr(this.buttonClasses) + ` ${this.variantClass}`;
            },
            variantClass() {
                // TODO: candidate for vuex?
                return "tortle-btn-" + this.buttonVariant;
            }
        },
        props: {
            id: {
                type: String,
                required: true
            },
            name: {
                type: String,
                required: false,
                default: "tortle-button"
            },
            buttonClasses: {
                type: [String, Array],
                required: false,
                default: ""
            },
            buttonVariant: {
                type: String,
                required: false,
                default: "ok",
                validator: val => ["ok", "cancel", "action"].indexOf(val) !== -1
            },
            buttonType: {
                type: String,
                required: false,
                default: "button",
                validator: val => ["button", "submit", "reset"].indexOf(val) !== -1
            }
        }
    };
</script>
