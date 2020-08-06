<template>
    <div id="tortle-signup-form">
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
        <div class="buttons">
            <button class="button is-success">Sign Up</button>
            <button class="button is-warning">Go back</button>
        </div>
    </div>
</template>

<script>

import Password from "vue-password-strength-meter";
export default {
    data() {
        return {
            email: "",
            password: "",
            passwordConfirm: "",
            passLength: 8 // this is validated on the backend too, don't even try to disable it
        };
    },
    components: {
        Password
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
    }
}
</script>