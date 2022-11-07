const defaultConfig = require("@wordpress/scripts/config/webpack.config.js");

module.exports = {
  ...defaultConfig,
  ...{
    entry: {
      admin: "./src/js/index.js",
    },
    externals: {
      react: "React",
      "react-dom": "ReactDOM",
    },
  },
};
