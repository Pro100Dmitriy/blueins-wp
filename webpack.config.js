const path = require('path');


module.exports = {

    context: path.resolve( __dirname, 'assets/js' ),

    entry: '../common.js',

    output: {
        filename: 'bundle.js',
        path: path.resolve( __dirname, 'dist' )
    },

    resolve: {
        extentions: ['.js']
    },

    watch: true

}