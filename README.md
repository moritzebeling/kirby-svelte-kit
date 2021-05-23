# Kirby + SvelteKit Monorepo Template

## Backend in `admin`

PHP, Composer, Kirby

- Point your local host to `admin`:
```bash
cd admin
valet link {project}
```

- run `composer install` to install Kirby and plugins
- run `composer update` to update all packages

Install Kirby plugins
- run `composer require {package/id}` to [install kirby plugins](https://getkirby.com/docs/cookbook/setup/composer#using-composer-for-kirby-plugins)
- add plugin path to `.gitignore`

## Frontend

```bash
npm install
npm run dev

npm run build
npm run preview
```

## Deploy

Upload these directories to PHP server:
- `admin`
- `build`
- `content`

Point your public domain to `build`.

You can also deploy to netlify. Settings are made in:
- `netlify.toml`
- `@sveltejs/adapter-netlify`

## Configuration

### Netlify
- Create a build hook
- Create 2 "Outgoing notifications" pointing to your online admin url
  - "Deploy succeeded" webhook to `{your-domain}/webhook/netlify_deploy/success`
  - "Deploy succeeded" webhook to `{your-domain}/webhook/netlify_deploy/error`

Read more on [Kirby Webhook Field](https://github.com/pju-/kirby-webhook-field/blob/master/docs/quickstart.md).

### Admin
- Rename `config.kirby-svelte-kit.test.php` to match your test domain
- Configure kirby like
```php
'frontend.url' => 'https://{your-website}.netlify.app',
'pju.webhook-field.hooks' => [
    'netlify_deploy' => [
        'url' => 'https://api.netlify.com/build_hooks/{your-build-hook}'
    ]
],
```

### Frontend
