<script context="module">

	import { browser, dev } from '$app/env';

	export const hydrate = dev;
	export const router = browser;
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

<style lang="scss">
	.content {
		width: 100%;
		box-sizing: border-box;
	}
</style>
