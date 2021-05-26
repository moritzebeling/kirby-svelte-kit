<script>
	import Header from '$lib/Header/index.svelte';
	import '../scss/global.scss';
</script>

<Header />

<main>
	<slot />
</main>

<footer>
	<p>© 2021</p>
</footer>

<style lang="scss">
	main {
		flex: 1;
		display: flex;
		flex-direction: column;
		padding: 1rem;
		width: 100%;
		margin: 0 auto;
		box-sizing: border-box;
	}

	footer {
		background-color: $violet;
		padding: 1rem;
	}
	footer p {
		margin: 0;
	}
</style>
