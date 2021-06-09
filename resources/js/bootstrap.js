
window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Echo from "laravel-echo";

window.Pusher = require("pusher-js");
/*
window.Echo = new Echo({
    broadcaster: "pusher",
    // eslint-disable-next-line no-process-env
    key: process.env.MIX_PUSHER_APP_KEY,
    // eslint-disable-next-line no-process-env
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
    wsHost: window.location.hostname,
    wsPort: 6001
});*/
