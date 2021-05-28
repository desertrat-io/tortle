<template>
   <div :id="containerId"></div>
</template>

<script>

import "js-loading-overlay";

/**
 * All options match the options available to
 * @see https://js-loading-overlay.muhdfaiz.com/
 */
export default {
    name: "Loader",
    data() {
        return {};
    },
    mounted() {
        JsLoadingOverlay.setOptions({
            overlayBackgroundColor: this.overlayBackgroundColor,
            overlayOpacity: this.overlayOpacity,
            spinnerIcon: this.spinnerIcon,
            spinnerColor: this.spinnerColor,
            spinnerSize: this.spinnerSize,
            overlayIDName: this.overlayIdName,
            spinnerIDName: this.spinnerIdName,
            offsetY: this.offsetY,
            offsetX: this.offsetX,
            lockScroll: this.lockScroll,
            containerID: this.containerId,
            spinnerZIndex: this.spinnerZIndex,
            overlayZIndex: this.overlayZIndex
        });
    },
    watch: {
        show() {
            if (this.show) {
                // eslint-disable-next-line no-undef
                JsLoadingOverlay.show();
            }
            else {
                // eslint-disable-next-line no-undef
                JsLoadingOverlay.hide();
            }
        }
    },
    props: {
        show: {
            type: Boolean,
            required: false,
            default: false
        },
        overlayBackgroundColor: {
            type: String,
            required: false,
            default: "#666666"
        },
        overlayOpacity: {
            type: Number,
            required: false,
            default: 0.6
        },
        spinnerIcon: {
            type: String,
            required: false,
            default: "ball-spin-clockwise-fade"
        },
        spinnerColor: {
            type: String,
            required: false,
            default: "#00ddd2"
        },
        spinnerSize: {
            type: String,
            required: false,
            default: "3x"
        },
        overlayIdName: {
            type: String,
            required: false,
            default: "overlay"
        },
        spinnerIdName: {
            type: String,
            required: false,
            default: "spinner"
        },
        offsetY: {
            type: Number,
            required: false,
            default: 0
        },
        offsetX: {
            type: Number,
            required: false,
            default: 0
        },
        lockScroll: {
            type: Boolean,
            required: false,
            default: false
        },
        containerId: {
            type: String,
            required: false,
            default: null
        },
        spinnerZIndex: {
            type: Number,
            required: false,
            default: 99999
        },
        overlayZIndex: {
            type: Number,
            required: false,
            default: 99998
        }
    }
}
</script>

<style scoped>

</style>