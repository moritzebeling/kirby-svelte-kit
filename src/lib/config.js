import { dev } from '$app/env';

const development = {
    api: {
        base: 'http://kirby-svelte-kit.test'
    }
};

const production = {
    api: {
        base: 'https://headless.moritzebeling.com'
    }
};

export let config = dev ? development : production;
