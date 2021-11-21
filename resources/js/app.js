import {createApp} from "vue";

require("./bootstrap");

window.Vue = require("vue");



const app = createApp({});

const files = require.context("./", true, /\.vue$/i);
// eslint-disable-next-line no-undef
files.keys().map(key => app.component(key.split("/").pop().split(".")[0], files(key).default));

app.mount("#tortle");
