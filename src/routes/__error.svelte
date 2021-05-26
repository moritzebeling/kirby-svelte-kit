<script context="module">
	export function load({ error, status }) {
		return {
			props: {
				code: `${status}`,
				message: `${error.message}`
			}
		};
	}
</script>

<script>
	export let code;
	export let message;
</script>

<h1>{code} {message}</h1>
