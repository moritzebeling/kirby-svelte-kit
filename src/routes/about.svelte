<script context="module">

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

	export async function load({ page, fetch, session, context }) {
		const url = `/about.json`;
		const res = await fetch(url);
		if (res.ok) {
			return {
				props: {
					data: await res.json()
				}
			};
		}
		/* TODO: this should output something more helpful */
		return {
			status: res.status,
			error: new Error(`Could not load ${url}`)
		};
	}

</script>

<script>

	export let data;

</script>

<svelte:head>
	<title>{ data.title }</title>
</svelte:head>

<div class="content">
	<p>{data.time}</p>
	{@html data.text}
</div>

<style>
	.content {
		width: 100%;
		max-width: var(--column-width);
		margin: var(--column-margin-top) auto 0 auto;
	}
</style>
