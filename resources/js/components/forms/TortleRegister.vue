<template>
    <form
        autocomplete="off"
        class="flex flex-col gap-y-2 w-full mt-40"
    >
        <tortle-input
            id="tortle-email"
            name="email"
            type="email"
            label="Email: "
            v-model="email"
            autocomplete="new-password"
            class="text-2xl"
            input-classes="rounded-md h-16 pl-2 pr-2 w-full"
        ></tortle-input>
        <tortle-input
            id="tortle-password"
            name="password"
            type="password"
            v-model="password"
            label="Password: "
            autocomplete="new-password"
            class="text-2xl"
            input-classes="rounded-md h-16 pl-2 pr-2 w-full"
        ></tortle-input>
        <tortle-input
            id="tortle-password-confirm"
            name="password-confirm"
            type="password"
            v-model="passwordConfirm"
            label="Confirm Password: "
            autocomplete="new-password"
            class="text-2xl"
            input-classes="rounded-md h-16 pl-2 pr-2 w-full"
        ></tortle-input>
        <div class="grid grid-cols-12">
            <div class="col-start-9 col-end-10">
                <tortle-button
                    id="reset-button"
                    name="reset-button"
                    button-variant="cancel"
                    button-type="reset"
                    @click="reset"
                >
                    Reset
                </tortle-button>
            </div>
            <div class="col-start-11 col-end-12">
                <tortle-button
                    id="register-button"
                    name="register-button"
                >
                    Register
                </tortle-button>
            </div>
        </div>
    </form>
</template>

<script>

    import TortleInput from "./controls/TortleInput";
    import TortleButton from "./controls/TortleButton";

    export default {
        data() {
            return {
                email: "",
                password: "",
                passwordConfirm: ""
            };
        },
        components: {
            TortleInput, TortleButton
        },
        methods: {
            reset() {
                this.email = "";
                this.password = "";
                this.passwordConfirm = "";
            }
        }
    };
</script>
