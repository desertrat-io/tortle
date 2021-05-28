/* eslint no-undef:off */
import "./scss/tortle.scss";
import Vue from "vue";
window.Vue = Vue;

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

const token = document.body.querySelector("input[name='csrf-token']");

if (token) {
    window.axios.defaults.headers.common["X-Csrf-Token"] = token.value;
}
 else {
    console.error("CSRF token not found");
}


const files = require.context("./js/components/", true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split("/").pop().split(".")[0], files(key).default));

require("./fa.js");
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
Vue.component("font-awesome-icon", FontAwesomeIcon);
// regular ol" mountpoint
// eslint-disable-next-line no-unused-vars
const tortle = new Vue({
    el: "#tortle"
});