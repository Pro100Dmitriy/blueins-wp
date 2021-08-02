const path = require('path')
const webpack = require('webpack')
const CaseSensitivePathsWebpackPlugin = require('case-sensitive-paths-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')


module.exports = {

    context: path.resolve( __dirname, 'assets/js' ),

    entry: './common.js',

    output: {
        path: path.resolve( __dirname, 'dist' ),
        filename: 'bundle.js'
    },

    plugins: [
        new CaseSensitivePathsWebpackPlugin(),
        new webpack.DefinePlugin({
            //GLOBAL Variable
        }),
        new MiniCssExtractPlugin({
            filename: '[name].css',
            chunkFilename: '[id].css'
        })
    ],

    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [ MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader' ],
            }
        ]
    },

    optimization: {
        minimize: true,
        minimizer: [
            new CssMinimizerPlugin()
        ]
    },

    watch: true,
    devtool: 'eval',
    mode: 'development'

}