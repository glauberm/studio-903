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

6. Install plugins (`advanced-custom-fields` and `polylang` are required):

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

7. Activate the Studio 903 plugin:

```
wp plugin activate studio-903
```

8. Activate the Studio 903 theme:

```
wp theme activate studio-903
```

9. Run the development server:

```
wp server
```

10. Visit [`http://localhost:8080`](http://localhost:8080) on your browser.
