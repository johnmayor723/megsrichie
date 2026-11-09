# Megs-Richie International – WordPress rebuild package

Rebuilt from `megsrichie_com-20250209-183021-823.zip` (All-in-One WP Migration, WordPress 6.7.1, PHP 8.3, MariaDB 10.6).
Verified: stock WordPress 6.7.1 + this `wp-content` + this database renders the full site.

## Contents
- `wp-content/`   themes (Hello Elementor + child), plugins (Elementor, Pro Elements, ElementsKit Lite, Themesflat Addons), uploads
- `database/megsrichie.sql`   full database, table prefix `wp_`, URLs still `https://megsrichie.com`
- `scripts/replace-domain.php`   serialization-safe URL swap (only needed for a different domain / staging)
- `static-snapshot/`   plain HTML copy of all 15 pages (host anywhere; contact form will not work)

## Relaunch on megsrichie.com (once you own the domain again)
1. Download WordPress 6.7.1 (or newer 6.7.x) and upload it to the host.
2. Copy `wp-content/` over the new install's `wp-content/`.
3. Create an empty database and import `database/megsrichie.sql`.
4. Create `wp-config.php` with the new DB credentials, `$table_prefix = 'wp_';`, and fresh salts.
5. Point the domain at the host. No URL change needed. Visit Settings > Permalinks and click Save.
6. Log in. The admin password is unknown, so reset it first:
   `UPDATE wp_users SET user_pass = MD5('NewStrongPassword') WHERE ID = 1;` (WordPress upgrades the hash on first login), then change it in the dashboard.

## Different domain or staging
After step 3-4, from the WordPress root run:
`php scripts/replace-domain.php https://megsrichie.com https://your-new-domain.com`
then Elementor > Tools > Regenerate CSS & Data (Elementor's cached CSS files contain the old domain).

## Known gaps
- The backup tool strips the active theme/plugin settings; the SQL file re-adds them at the end.
- Old host's mu-plugins (cache/stack helpers) and the migration plugin were intentionally left out.
- One image referenced by old CSS (`uploads/2023/11/image-10.png`) was not in the backup.
- Contact form (Elementor Forms) needs mail/SMTP configured on the new host; not tested.
- Google Fonts (Manrope, Merriweather) load from Google at runtime.
