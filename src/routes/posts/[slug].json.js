import { config } from '$lib/config';

export async function get( request ) {

	const { slug } = request.params;
	const url = `${config.api.base}/posts/${slug}.json`;

	const res = await fetch( url );

	if (res.ok) {
		const data = await res.json();
		return {
			body : data
		};
	}

	return { status: 404 };
}
