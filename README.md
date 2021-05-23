# Kirby + SvelteKit Monorepo Template

## Backend

PHP, Composer, Kirby

- Point your local host to `admin`:
```bash
cd admin
valet link {project}
```

- run `composer install` to install Kirby and required plugins

## Frontend

```bash
npm install
npm run dev
```

## Build

```bash
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
