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

		return {
			status: res.status,
			error: new Error(`Could not find ${url}`)
		};
	}

</script>

<script>
	export let data;
</script>

<svelte:head>
	<title>{data.title}</title>
</svelte:head>

<section>

	<h1>{data.title}</h1>
	<p>{data.time}</p>

	<div class="content">
		{@html data.text}
	</div>

</section>

<style lang="scss">
	section {
		width: 100%;
	}
</style>
