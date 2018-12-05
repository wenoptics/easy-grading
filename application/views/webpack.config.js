const webpack = require('webpack')
const ExtractTextPlugin = require("extract-text-webpack-plugin")
const path = require('path')

const extractSass = new ExtractTextPlugin({
  filename: "styles.css",
});

module.exports = {
  entry: './src/index.js',
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'dist')
  },
  watch: true,
  module: {
    rules: [
      {
        test: /\.js$/,
        include: path.resolve(__dirname, 'src'),
        use: [{
          loader: 'babel-loader',
          options: {
            presets: [
              ['es2015', { modules: false }]
            ]
          }
        }]
      },
      {
	    test: /\.(scss)$/,
	    use: [{
	      loader: 'style-loader', // inject CSS to page
	    }, {
	      loader: 'css-loader', // translates CSS into CommonJS modules
	    }, {
	      loader: 'postcss-loader', // Run post css actions
	      options: {
	        plugins: function () { // post css plugins, can be exported to postcss.config.js
	          return [
	            require('precss'),
	            require('autoprefixer')
	          ];
	        }
	      }
	    }, {
	      loader: 'sass-loader' // compiles Sass to CSS
	    }]
	  },
	  {
        test: /\.(png|jp(e*)g|svg)$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 8000, // Convert images < 8kb to base64 strings
              name: 'images/[hash]-[name].[ext]'
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      Popper: ['popper.js', 'default']
    }),
    extractSass
  ]
};