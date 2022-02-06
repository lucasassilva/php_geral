var path = require('path');

module.exports = {
  entry: './app.js',
  output: {
    path: path.resolve(__dirname, "assets", "js"),
    filename: 'bundle.js'
  }
};