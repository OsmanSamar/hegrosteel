const path = require('path');
const miniCssExtractPlugin = require("mini-css-extract-plugin");
const postcssCssnext = require('postcss-preset-env');

module.exports = {
  plugins: [
    new miniCssExtractPlugin({
      filename: "css/styles.min.css",
      chunkFilename: "css/[id].css"
    })
  ],
  entry: './src/js/script.js',
  output: {
    filename: 'js/script.min.js',
    path: path.resolve(__dirname),
  },
  devtool: "source-map",
  module: {
    rules: [
      {
        test: /\.(eot|otf|ttf|woff|woff2)(\?.*)?$/,
        use: {
          loader: 'file-loader',
          options: {
            name: '[path][name].[ext]',
          },
        },
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          miniCssExtractPlugin.loader,
          { 
            loader: 'css-loader', 
            options: { 
              url: false 
            } 
          },
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                plugins: [
                  [
                    postcssCssnext({
                      browsers: '> 1%',
                      features: {
                        'nesting-rules': false // Let nesting be handled by sass-loader
                      }
                    })
                  ]
                ]
              }
            }
          },
          "sass-loader",
        ],
      },
    ],
  },
};