#!/bin/bash

# ================================================
# Deploy script untuk VPS 178.128.88.30
# Jalankan di VPS setelah clone/upload repo
# ================================================

set -e

VPS_IP="178.128.88.30"
APP_DIR="/opt/pts"

echo "=============================="
echo " Install Docker & Compose..."
echo "=============================="
if ! command -v docker &> /dev/null; then
    curl -fsSL https://get.docker.com | sh
    systemctl enable docker
    systemctl start docker
fi

if ! command -v docker-compose &> /dev/null; then
    curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" \
        -o /usr/local/bin/docker-compose
    chmod +x /usr/local/bin/docker-compose
fi

echo "=============================="
echo " Setup direktori aplikasi..."
echo "=============================="
mkdir -p $APP_DIR
cd $APP_DIR

echo "=============================="
echo " Build & jalankan container..."
echo "=============================="
docker-compose pull db 2>/dev/null || true
docker-compose build --no-cache
docker-compose up -d

echo "=============================="
echo " Tunggu DB siap..."
echo "=============================="
sleep 15

echo "=============================="
echo " Status container:"
echo "=============================="
docker-compose ps

echo ""
echo "Aplikasi berjalan di: http://$VPS_IP"
echo ""
echo "Untuk import database:"
echo "  docker exec -i pts_db mysql -upts_user -ppts_pass_2024 sky < dump.sql"
echo ""
echo "Untuk lihat log:"
echo "  docker-compose logs -f app"
