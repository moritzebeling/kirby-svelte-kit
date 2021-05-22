# Kirby + SvelteKit Monorepo Template

## Backend

PHP, Composer, Kirby

- Pont your host to `admin/`
```
cd admin
valet link {project}
```

- run `composer install` to install Kirby and required plugins

## Frontend

```
npm install
npm run dev
```

## Deploy

This template is ready to be deployed to Netlify through
- `netlify.toml`
- `@sveltejs/adapter-netlify`
