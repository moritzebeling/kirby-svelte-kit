export async function load( path ) {
	const url = `/json/${path}`;
	console.log(`load ${url}`);

	const res = await fetch( url );
	const data = await res.json();

	if (res.status === 200) {
		console.log( data.data );
		return data.data;
	} else {
		throw new Error(data);
	}
}
