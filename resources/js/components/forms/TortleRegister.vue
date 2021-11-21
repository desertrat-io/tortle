<template>
    <form
        ref="registration-form"
        :action="postTo"
        autocomplete="off"
        class="flex flex-col gap-y-2 w-full mt-40"
        method="post"
    >
        <input :value="csrf" name="_token" type="hidden">
        <tortle-input id="tortle-name" v-model="name" class="text-2xl"
                      input-classes="rounded-md h-16 pl-2 pr-2 w-full"
                      label="Name: "
                      name="name"
                      type="text"
        ></tortle-input>
        <tortle-input
            id="tortle-email"
            v-model="email"
            autocomplete="new-password"
            class="text-2xl"
            input-classes="rounded-md h-16 pl-2 pr-2 w-full"
            label="Email: "
            name="email"
            type="email"
        ></tortle-input>
        <tortle-input
            id="tortle-password"
            v-model="password"
            autocomplete="new-password"
            class="text-2xl"
            input-classes="rounded-md h-16 pl-2 pr-2 w-full"
            label="Password: "
            name="password"
            type="password"
        ></tortle-input>
        <tortle-input
            id="tortle-password-confirm"
            v-model="passwordConfirm"
            autocomplete="new-password"
            class="text-2xl"
            input-classes="rounded-md h-16 pl-2 pr-2 w-full"
            label="Confirm Password: "
            name="password-confirm"
            type="password"
        ></tortle-input>
        <div class="grid grid-cols-12">
            <div class="col-start-9 col-end-10">
                <tortle-button
                    id="reset-button"
                    button-type="reset"
                    button-variant="cancel"
                    name="reset-button"
                    @click="reset"
                >
                    Reset
                </tortle-button>
            </div>
            <div class="col-start-11 col-end-12">
                <tortle-button
                    id="register-button"
                    name="register-button"
                    @click="doRegister"
                >
                    Register
                </tortle-button>
            </div>
        </div>
        <loading :active="isRegistering"></loading>
    </form>
</template>

<script>

import TortleInput from "./controls/TortleInput";
import TortleButton from "./controls/TortleButton";
import Loading from "vue-loading-overlay";
import axios from "axios";

export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            passwordConfirm: "",
            isRegistering: false,
            postTo: ""
        };
    },
    components: {
        TortleInput, TortleButton, Loading
    },
    methods: {
        doRegister() {
            this.isRegistering = true;
            axios.post("/api/v1/user/register", {
                name: this.name,
                email: this.email,
                password: this.password,
                // for validation purposes, this is not correct naming in our standard
                // so I've delimited it as a string property
                "password_confirmation": this.passwordConfirm
            }).then(response => {
                this.isRegistering = false;
                this.postTo = response.data.data.post_to;
                this.$nextTick(() => this.$refs["registration-form"].submit());
                console.log(response);

            }).catch(error => {
                this.isRegistering = false;
                console.error(error);
            });
        },
        reset() {
            this.name = "";
            this.email = "";
            this.password = "";
            this.passwordConfirm = "";
        }
    },
    props: {
        csrf: {
            type: String,
            required: true
        }
    }
};
</script>
