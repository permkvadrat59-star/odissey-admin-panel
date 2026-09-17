#!/bin/bash
# Запускается при каждом старте Codespace (в т.ч. после переоткрытия).
set -e
WORKDIR="$(pwd)"
SITE_DIR="$WORKDIR/site"

if [ ! -f "$SITE_DIR/wp-config.php" ]; then
  echo "Сайт ещё не установлен (setup.sh не отработал?) — пропускаю запуск сервера."
  exit 0
fi

# на всякий случай гасим старый процесс на этом порту перед перезапуском
fuser -k 8899/tcp 2>/dev/null || true
sleep 1

cd "$SITE_DIR"
nohup php -S 0.0.0.0:8899 > /tmp/wp-server.log 2>&1 &
echo "PHP-сервер запущен на порту 8899 (лог: /tmp/wp-server.log)"
