import { config } from '$lib/config';

export async function get( request ) {

	const url = `${config.api.base}/${request.path}`;

	const res = await fetch( url );

	if (res.ok) {
		const data = await res.json();
		return {
			body : data
		};
	}

	return { status: 404 };
}
