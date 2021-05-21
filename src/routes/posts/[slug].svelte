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
</script>

<script>
	export let content;
</script>

<svelte:head>
	<title>{content.title}</title>
</svelte:head>

<div class="todos">

	<h1>{content.title}</h1>

	<div class="content">
		{@html content.text}
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
