import { dev } from '$app/env';
const base = dev ? 'http://kirby-svelte-kit.test' : 'https://headless.moritzebeling.com';

export async function get( request ) {

	const url = `${base}/${request.path}`;

	const res = await fetch( url );

	if (res.ok) {
		const data = await res.json();
		return {
			body : data
		};
	}

	return { status: 404 };
}
