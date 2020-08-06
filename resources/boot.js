/* eslint no-undef:off */
import "./scss/tortle.scss";
import Vue from "vue";
window.Vue = Vue;
const files = require.context("./js/components/", true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split("/").pop().split(".")[0], files(key).default));

// regular ol" mountpoint
// eslint-disable-next-line no-unused-vars
const tortle = new Vue({
    el: "#tortle"
});