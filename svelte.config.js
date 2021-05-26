import adapter from '@sveltejs/adapter-netlify'
import sveltePreprocess from 'svelte-preprocess'

/** @type {import('@sveltejs/kit').Config} */
const config = {
	preprocess: sveltePreprocess({
		defaults: {
			style: 'scss'
		},
		scss: {
			// relative to root
			prependData: `@import 'src/scss/_mixins.scss';`
		},
	}),
	kit: {
		// hydrate the <div id="svelte"> element in src/app.html
		target: '#svelte',
		adapter: adapter(),
	}
};

export default config;
