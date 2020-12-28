const { resolve } = require("path");
const webpack = require("webpack");
const ESLintPlugin = require("eslint-webpack-plugin");
const HTMLWebpackPlugin = require("html-webpack-plugin");

module.exports = {
    entry: resolve(__dirname, './src/index.js'),
    output: {
        path: resolve(__dirname, './dist'),
        filename: '[name].bundle.js',
        publicPath: '/'
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: ['babel-loader']
            },
            {
                test: /\.(scss|css)$/,
                use: ['style-loader', 'css-loader', 'sass-loader'],
            }
        ],
    },
    plugins: [
        new webpack.HotModuleReplacementPlugin(),
        new ESLintPlugin(),
        new HTMLWebpackPlugin({
            template: resolve(__dirname, "./public/index.html"),
            filename: "index.html"
        }),
    ],
    devServer: {
        contentBase: resolve(__dirname, './dist'),
        hot: true,
        port: 1234,
        compress: true,
    }
}