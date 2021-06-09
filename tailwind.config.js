module.exports = {
    purge: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: require("./resources/tailwind/theme/colors"),
        backgroundColor: theme => ({
            cyan: theme("colors.cyan"),
            "cyan-darker": theme("colors.cyan-darker"),
            "sea-green": theme("colors.sea-green"),
            white: theme("colors.white")

        }),
        extend: {}
    },
    variants: {
        extend: {}
    },
    plugins: []
};
