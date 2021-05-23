<script context="module">
	import { dev } from '$app/env';
	const api = dev ? 'http://kirby-svelte-kit.test' : 'https://headless.moritzebeling.com';

	// see https://kit.svelte.dev/docs#loading
	export const load = async ({ page, fetch }) => {
		const res = await fetch(`${api}${page.path}.json`);
		if (res.ok) {
			const posts = await res.json();
			return {
				props: { posts }
			};
		}
		const { message } = await res.json();
		return {
			error: new Error(message)
		};
	};
</script>

<script>
	export let posts;
</script>

<svelte:head>
	<title>Posts</title>
</svelte:head>

<div class="todos">

	<h1>Posts</h1>

	<ul>
		{#each posts as post}
			<li><a sveltekit:prefetch href="/{post.url}">{post.title}</a></li>
		{/each}
	</ul>

</div>

<style>
	.todos {
		width: 100%;
		max-width: var(--column-width);
		margin: var(--column-margin-top) auto 0 auto;
		line-height: 1;
	}
</style>
