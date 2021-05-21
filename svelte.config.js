const sveltePreprocess = require('svelte-preprocess');
module.exports = {
  preprocess: sveltePreprocess({
    defaults: {
      style: 'scss'
    },
    scss: {
      includePaths: ['src/styles'],
      prependData: `@import './variables';`
    },
    postcss: {
    	plugins: [require('autoprefixer')],
    },
  }),
};
