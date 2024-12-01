const { defineConfig } = require('@vue/cli-service');
module.exports = defineConfig({
  devServer: {
    port: 8082,
  },
  publicPath: process.env.NODE_ENV === 'production' ? '/CI4-EcoTrack/public' : '/'
});
