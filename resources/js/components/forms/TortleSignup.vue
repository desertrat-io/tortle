<template>
    <form id="tortle-signup-form" @submit.prevent>
        <loader :show="working"></loader>
        <div class="field">
            <label class="label" for="tortle-signup-email">Email:</label>
            <div class="control">
                <input id="tortle-signup-email" v-model="email" class="input" type="email"
                       placeholder="Enter your email..."/>
            </div>
        </div>
        <div class="field">
            <label class="label" for="tortle-signup-password">Password:</label>
            <div class="control">
                <input type="password" id="tortle-signup-password" v-model="password" class="input"
                       :class="passwordsMatch"
                       placeholder="Enter a password..." autocomplete="new-password">
            </div>
        </div>
        <div class="field">
            <label class="label" for="tortle-signup-password-confirm">Confirm Password:</label>
            <div class="control">
                <input type="password" id="tortle-signup-password-confirm" v-model="passwordConfirm" class="input"
                       :class="passwordsMatch"
                       placeholder="Confirm password..." autocomplete="new-password">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <password v-model="password" :strength-meter-only="true" :secure-length="passLength"/>
            </div>
        </div>
        <p class="buttons">

            <button class="button is-warning">
                <span>Go back</span>
                <span class="icon is-small">

                        <font-awesome-icon :icon="['fas', 'arrow-alt-circle-left']"></font-awesome-icon>
                </span>
            </button>

            <button class="button is-success" @click="submitSignupForm">
                <span>Sign Up</span>
                <span class="icon is-small">
                        <font-awesome-icon :icon="['fas', 'check-circle']"></font-awesome-icon>
                </span>
            </button>
        </p>
    </form>
</template>

<script>

import Password from "vue-password-strength-meter";
import axios from "axios";
import Loader from "../widgets/Loader";
export default {
    data() {
        return {
            email: "",
            password: "",
            passwordConfirm: "",
            passLength: 8, // this is validated on the backend too, don't even try to disable it
            working: false,
            hasErrors: false,
            errorMsgs: []
        };
    },
    components: {
        Password, Loader
    },
    computed: {
        passwordsMatch() {
            if (this.passwordConfirm === "") {
                return null;
            }
            return {
                "is-success": this.password === this.passwordConfirm,
                "is-danger": this.password !== this.passwordConfirm
            }
        }
    },
    methods: {
        submitSignupForm() {
            this.working = true;
            axios.post("/signup", {
                email: this.email,
                password: this.password,
                passwordConfirm: this.passwordConfirm
            }).then(response => {
                console.log(response);
                this.hasErrors = false;
                this.working = false;
                this.errorMsgs = [];
            }).catch(errors => {
                this.hasErrors = true;
                this.working = false;
                this.errorMsgs = errors.response.data;
            });
        }
    }
}
</script>