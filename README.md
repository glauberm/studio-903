# Studio 903

## Running the project locally

Install [wp-cli](https://wp-cli.org/#installing).

Download WordPress core at the root of the project:

```
wp core download
```

Create a new `wp-config.php` file:

```
wp config create \
    --dbname=<YOUR_DB_NAME> \
    --dbuser=<YOUR_DB_USER> \
    --dbpass=<YOUR_DB_PASS>
```

Enable `WP_DEBUG`:

```
wp config set WP_DEBUG true --raw --type=constant
```

Install WordPress core:

```
wp core install \
    --title='Studio 903' \
    --url=localhost:8080 \
    --admin_user=<YOUR_ADMIN_USER> \
    --admin_password=<YOUR_ADMIN_PASSWORD> \
    --admin_email=<YOUR_ADMIN_EMAIL>
```

Install vendor plugins:

```
wp plugin install \
    classic-editor \
    advanced-custom-fields \
    polylang \
    regenerate-thumbnails \
    post-types-order \
    user-role-editor \
    google-sitemap-generator \
    wordpress-importer \
    --activate
```

Install dependencies:

```
composer install --working-dir=wp-content/plugins/studio-903 && \
npm install --prefix wp-content/themes/studio-903
```

Configure environment variables:

```
cp wp-content/plugins/studio-903/.env.example wp-content/plugins/studio-903/.env && \
cp wp-content/themes/studio-903/.env.example wp-content/themes/studio-903/.env
```

Activate the plugin and the theme:

```
wp plugin activate studio-903 &&
wp theme activate studio-903
```

Run the development server:

```
wp server
```

## Running the tests

```
php wp-content/plugins/studio-903/vendor/bin/phpunit \
    --configuration=wp-content/plugins/studio-903/phpunit.xml
```

## Watching for assets changes

```
npm run dev --prefix wp-content/themes/studio-903
```
