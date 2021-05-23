<script context="module">

	import { dev } from '$app/env';
	export const hydrate = dev;
	export const prerender = true;

	export async function load({ page, fetch, session, context }) {
		const url = `/posts/${page.params.slug}.json`;
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
	<title>{data.title}</title>
</svelte:head>

<div class="todos">

	<h1>{data.title}</h1>
	<p>{data.time}</p>

	<div class="content">
		{@html data.text}
	</div>

</div>

<style>
	.todos {
		width: 100%;
		max-width: var(--column-width);
		margin: var(--column-margin-top) auto 0 auto;
		line-height: 1;
	}
</style>
