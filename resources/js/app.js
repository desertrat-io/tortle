
require("./bootstrap");

window.Vue = require("vue").default;

const files = require.context("./", true, /\.vue$/i);
// eslint-disable-next-line no-undef
files.keys().map(key => Vue.component(key.split("/").pop().split(".")[0], files(key).default));

// eslint-disable-next-line no-undef,no-unused-vars
const app = new Vue({
    el: "#app"
});
