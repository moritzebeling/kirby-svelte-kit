<script context="module">

	import { dev } from '$app/env';
	export const hydrate = dev;
	export const prerender = true;

	export async function load({ page, fetch, session, context }) {
		const url = `/posts.json`;
		const res = await fetch(url);
		if (res.ok) {
			return {
				props: {
					posts: await res.json()
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
	export let posts;
</script>

<svelte:head>
	<title>Posts</title>
</svelte:head>

<section>

	<h1>Posts</h1>

	<ul>
		{#each posts as post}
			<li><a sveltekit:prefetch href="/{post.url}">{post.title}</a></li>
		{/each}
	</ul>

</section>

<style lang="scss">
	section {
		width: 100%;
	}
</style>
