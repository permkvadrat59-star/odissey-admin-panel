#!/bin/bash
# Одноразовая настройка демо-стенда при создании Codespace:
# WordPress + ACF + SQLite (вместо MySQL) + тема «Одиссей» из этого репозитория.
set -e

WORKDIR="$(pwd)"
SITE_DIR="$WORKDIR/site"

echo "== PHP-расширения =="
sudo apt-get update -y -qq
sudo apt-get install -y -qq php-sqlite3 php-gd php-mbstring php-zip php-curl unzip >/dev/null

echo "== WP-CLI =="
curl -sL https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -o /usr/local/bin/wp
chmod +x /usr/local/bin/wp

echo "== WordPress core =="
mkdir -p "$SITE_DIR"
cd "$SITE_DIR"
wp core download --allow-root --locale=ru_RU

echo "== Плагины (ACF, SQLite, Classic Editor) =="
mkdir -p wp-content/plugins
cd wp-content/plugins
curl -sL https://downloads.wordpress.org/plugin/advanced-custom-fields.latest-stable.zip -o acf.zip && unzip -q acf.zip && rm acf.zip
curl -sL https://downloads.wordpress.org/plugin/sqlite-database-integration.latest-stable.zip -o sqlite.zip && unzip -q sqlite.zip && rm sqlite.zip
curl -sL https://downloads.wordpress.org/plugin/classic-editor.latest-stable.zip -o classic.zip && unzip -q classic.zip && rm classic.zip
cd "$SITE_DIR"

echo "== Тема odissey из репозитория =="
rm -rf wp-content/themes/odissey
cp -r "$WORKDIR/theme" wp-content/themes/odissey

echo "== db.php (SQLite вместо MySQL) =="
cp wp-content/plugins/sqlite-database-integration/db.copy wp-content/db.php

echo "== wp-config.php =="
SALTS="$(curl -sL https://api.wordpress.org/secret-key/1.1/salt/ --max-time 15 || true)"
cat > wp-config.php << PHPEOF
<?php
define( 'DB_NAME', 'placeholder' );
define( 'DB_USER', 'placeholder' );
define( 'DB_PASSWORD', 'placeholder' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// Динамический адрес — Codespaces выдаёт публичный URL вида
// https://<имя>-8899.app.github.dev, который заранее неизвестен.
if ( ! empty( \$_SERVER['HTTP_HOST'] ) ) {
    \$scheme = ( ! empty( \$_SERVER['HTTPS'] ) && \$_SERVER['HTTPS'] !== 'off' )
        || ( ! empty( \$_SERVER['HTTP_X_FORWARDED_PROTO'] ) && \$_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' )
        ? 'https' : 'http';
    \$dynamic_url = \$scheme . '://' . \$_SERVER['HTTP_HOST'];
    define( 'WP_HOME', \$dynamic_url );
    define( 'WP_SITEURL', \$dynamic_url );
}

$SALTS

\$table_prefix = 'wp_';

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'FS_METHOD', 'direct' );

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
PHPEOF

echo "== Установка WordPress =="
wp core install --allow-root \
  --url="http://localhost:8899" \
  --title="Одиссей — демо админки" \
  --admin_user="odyssey_admin" \
  --admin_password="Odyssey#Demo2026!" \
  --admin_email="demo@example.com" \
  --skip-email

echo "== Активация плагинов и темы =="
wp plugin activate advanced-custom-fields sqlite-database-integration classic-editor --allow-root
wp theme activate odissey --allow-root
wp option update classic-editor-replace classic --allow-root

echo "== Страницы раздела (те же слаги, что на боевом сайте) =="
declare -A PAGES=(
  ["o-nas"]="О нас"
  ["ohrana"]="Охрана"
  ["tir"]="Тир"
  ["muzey"]="Музей"
  ["uc"]="Учебный центр"
  ["poligraf"]="Полиграф"
  ["dela"]="Добрые дела"
  ["kontakty"]="Контакты"
)
for slug in "${!PAGES[@]}"; do
  title="${PAGES[$slug]}"
  if ! wp post list --post_type=page --field=post_name --allow-root | grep -qx "$slug"; then
    wp post create --allow-root --post_type=page --post_title="$title" --post_name="$slug" --post_status=publish
    echo "  создана страница: $title ($slug)"
  fi
done

echo "== Готово =="
echo "Логин: odyssey_admin / Odyssey#Demo2026!"
