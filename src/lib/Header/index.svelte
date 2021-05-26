<script>
	import { page } from '$app/stores';

	let pages = [
		['/','Home'],
		['/about','About'],
		['/posts','Posts'],
	];
</script>

<header>
	<nav>
	{#each pages as [path, title]}
		<a aria-current="{$page.path === path ? 'page' : ''}" sveltekit:prefetch href={path}>{title}</a>
	{/each}
	</nav>
</header>

<style>

	header {
		padding: 1rem 0.5rem;
		background-color: burlywood;
	}
	nav a {
		padding: 0.5rem;
		color: var(--heading-color);
		transition: color 0.2s linear;
	}
	a:hover {
		color: var(--accent-color);
	}
	a[aria-current=page]{
		color: var(--accent-color);
	}
</style>
