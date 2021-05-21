const sveltePreprocess = require('svelte-preprocess');
module.exports = {
  preprocess: sveltePreprocess({
    defaults: {
      style: 'scss'
    },
    scss: {
      includePaths: ['src/styles'],
      prependData: `@import './mixins';`
    },
    postcss: {
      plugins: [require('autoprefixer')],
    },
  }),
};
