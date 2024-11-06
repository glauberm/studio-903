# Studio 903

## Running the project locally

1. Install [wp-cli](https://wp-cli.org/#installing).

2. Download WordPress core at the root of the project:

```
wp core download
```

3. Create a new `wp-config.php` file:

```
wp config create \
    --dbname=<YOUR_DB_NAME> \
    --dbuser=<YOUR_DB_USER> \
    --dbpass=<YOUR_DB_PASS>
```

4. Enable `WP_DEBUG`:

```
wp config set WP_DEBUG true --raw --type=constant
```

5. Install WordPress core:

```
wp core install \
    --title='Studio 903' \
    --url=localhost:8080 \
    --admin_user=<YOUR_ADMIN_USER> \
    --admin_password=<YOUR_ADMIN_PASSWORD> \
    --admin_email=<YOUR_ADMIN_EMAIL>
```

6. Install vendor plugins:

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

7. Install dependencies:

```
composer install --working-dir=wp-content/plugins/studio-903 && \
npm install --prefix wp-content/themes/studio-903
```

8. Configure environment variables:

```
cp wp-content/plugins/studio-903/.env.example wp-content/plugins/studio-903/.env && \
cp wp-content/themes/studio-903/.env.example wp-content/themes/studio-903/.env
```

9. Activate the plugin and the theme:

```
wp plugin activate studio-903 &&
wp theme activate studio-903
```

10. Run the development server:

```
wp server
```
