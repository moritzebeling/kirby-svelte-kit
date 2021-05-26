import { dev } from '$app/env';
import jsonxml from 'jsontoxml';
const base = dev ? 'http://kirby-svelte-kit.test' : 'https://headless.moritzebeling.com';

/*
This is a HACK
It only works, as long as the backend urls are equal to frontend urls

TODO: Crawl all routes
- https://dev.to/yafkari/how-to-render-your-sitemap-xml-file-in-your-svelte-sapper-blog-2joh
*/

function mapImage( image ){
	return {
		name: 'image:image',
		children: {
			'image:loc': image
		}
	}
}

function mapPage( page ){
	let props = [
		{name: 'loc', text: page.loc},
		{name: 'lastmod', text: page.lastmod},
		{name: 'priority', text: page.priority},
	];
	if( page.image ){
		props.push( mapImage( page.image ) );
	}
	return {
		name: 'url',
		children: props
	};
}

function mapPages( pages ){
	return pages.map(mapPage);
}

export async function get() {

	const url = `${base}/sitemap.json`;
	const res = await fetch( url );

	if (res.ok) {

		const pages = await res.json();
		const xml = jsonxml([
			{
				name: 'urlset',
				attrs: {
					'xmlns': 'http://www.sitemaps.org/schemas/sitemap/0.9',
					'xmlns:image': 'http://www.google.com/schemas/sitemap-image/1.1'
				},
				children: mapPages( pages )
			}
		]);

		return {
			status: 200,
			headers: {
				'Cache-Control': `max-age=0, s-max-age=${60*60}`,
				'Content-Type': 'text/xml'
			},
			body : `<?xml version="1.0" encoding="UTF-8"?>${xml}`
		};
	}

	return {
		status: 404,
		body: 'Page not found'
	};

}
