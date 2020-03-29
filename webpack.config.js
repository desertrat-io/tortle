/* eslint no-undef:off */
const path = require("path");

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const VueLoaderPlugin = require("vue-loader/lib/plugin");

module.exports = {
    name: "tortle",
    entry: {
        "tortle": "./resources/boot.js"
    },
    output: {
        path: path.resolve(__dirname, "public"),
        publicPath: "/public",
        filename: "javascripts/[name].js"

    },
    devServer: {
        contentBase: path.join(__dirname, "public/javascripts"),
        compress: false,
        port: 9000,
        hot: true
    },
    resolve: {
        alias: {
            "vue$": "vue/dist/vue.esm.js"
        }
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ["@babel/preset-env"]
                    }
                }
            },
            {
                test: /\.scss$/,
                use:
                    [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"]
            },
            {
                test: /\.vue$/,
                exclude: /(node_modules)/,
                use: [{
                    loader: "vue-loader"
                }, {
                    loader: "vue-style-loader"
                }]
            },
            {
                test: /\.(woff|woff2|ttf|otf|eot)$/,
                use: [
                    {
                        // Using file-loader too
                        loader: "file-loader",
                        options: {
                            outputPath: "public/fonts"
                        }
                    }
                ]
            },
            {
                test: /\.(png|jpg|gif)$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: "[name].[ext]",
                            outputPath: "public/images/"
                        }
                    }
                ]
            },
            {
                test: require.resolve("typeof-arguments"),
                use: "export-loader?typeCheck"
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "stylesheets/[name].css",
            chunkFilename: "[id].css"
        }),
        new VueLoaderPlugin()
    ]

};