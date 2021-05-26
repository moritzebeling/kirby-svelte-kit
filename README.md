⚠️ Work in progress... do not use in production!

# Kirby + SvelteKit Monorepo Template

This template provides a starting point for website projects with both a Kirby admin running in the background on some PHP server and a SvelteKit frontend, that can be server side rendered and deployed to services like Netlify.
After editing some content in the admin, a user will have to click a "deploy" button, that triggers a Netlify build hook, which then grabs the content from the Kirby API.

## Backend (PHP + Composer + Kirby)

The admin lives in `/admin/`
```bash
cd admin
composer install
composer update
```

Link your local Valet test domain to `admin`
```bash
valet link {project}
```

Install Kirby plugins
- run `composer require {package/id}` to [install Kirby plugins](https://getkirby.com/docs/cookbook/setup/composer#using-composer-for-kirby-plugins)
- add plugin path to `.gitignore`

When building the content structure in Kirby, don’t try to mirror the exact page

## Frontend (SvelteKit)

```bash
npm install
npm run dev

npm run build
npm run preview
```

## Deploy

Upload these directories to PHP server:
- `admin`
- `content`
and point your admin domain to `admin`.

You can also host a pre-built version of your website on the same server. Run `npm run build`, upload the newly created `build` folder to your server as well and point your public domain to it. Note, that you will have to manually recompile your website in order to reflect any changes to the content.

If you connect this repo to Netlify, everytime you push to the `main` branch, the frontend will be rebuilt using the current state of the content stored in Kirby.

## Configuration

### Netlify
- Check `netlify.toml`
- `@sveltejs/adapter-netlify` adapter is already installed (see `svelte.config.js`)
- Create a build hook
- Create 2 "Outgoing notifications" pointing to your online admin url
  - "Deploy succeeded" webhook to `{your-domain}/webhook/netlify_deploy/success`
  - "Deploy failed" webhook to `{your-domain}/webhook/netlify_deploy/error`

Read more on [Kirby Webhook Field](https://github.com/pju-/kirby-webhook-field/blob/master/docs/quickstart.md).

### Admin
- Rename `config.kirby-svelte-kit.test.php` to match your test domain
- Configure Kirby like
```php
'frontend.url' => 'https://{your-website}.netlify.app',
'pju.webhook-field.hooks' => [
    'netlify_deploy' => [
        'url' => 'https://api.netlify.com/build_hooks/{your-build-hook}'
    ]
],
```

### Frontend

...wip

## Roadmap

- Global API endpoint configuration for the frontend
- Endpoint status code for errors
- Page transitions
- Is there a way to directly preview content changes before deploying them? Maybe with Netlify preview builds? Or maybe there is a copy of the complete website on the admin server as well, that doesn’t do server side rendering but works like a SPA and fetches fresh content everytime you look at it. Maybe redirect empty `{template}.php` to the corresponding page on the frontend?
