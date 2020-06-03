/* eslint no-undef:off */
import "./scss/tortle.scss";
import Vue from "vue";

const files = require.context("./js/vue", true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split("/").pop().split(".")[0], files(key).default));

// regular ol" mountpoint
const tortle = new Vue({
    el: "#tortle"
});