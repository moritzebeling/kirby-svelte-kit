<script context="module">

	const api = 'http://schoene-freiheit.test';

	// see https://kit.svelte.dev/docs#loading
	export const load = async ({ page, fetch }) => {
		const res = await fetch(`${api}${page.path}.json`);
		if (res.ok) {
			const content = await res.json();
			return {
				props: { content }
			};
		}
		const { message } = await res.json();
		return {
			error: new Error(message)
		};
	};

	import { browser, dev } from '$app/env';

	// we don't need any JS on this page, though we'll load
	// it in dev so that we get hot module replacement...
	export const hydrate = dev;

	// ...but if the client-side router is already loaded
	// (i.e. we came here from elsewhere in the app), use it
	export const router = browser;

	// since there's no dynamic data here, we can prerender
	// it so that it gets served as a static asset in prod
	export const prerender = true;
</script>

<script>

	export let content;

</script>

<svelte:head>
	<title>{ content.title }</title>
</svelte:head>

<div class="content">
	{@html content.text}
</div>

<style>
	.content {
		width: 100%;
		max-width: var(--column-width);
		margin: var(--column-margin-top) auto 0 auto;
	}
</style>
