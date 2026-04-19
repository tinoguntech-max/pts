#!/bin/bash

# ================================================
# Auto Backup DB dari 139.59.230.215
# Dijalankan di VPS 143.198.222.36
# Dijadwalkan 6x sehari via cron
# Retensi: simpan 7 hari terakhir
# ================================================

DATE=$(date +"%Y-%m-%d_%H-%M-%S")
BACKUP_DIR="/var/backups/db"
BACKUP_FILE="$BACKUP_DIR/backup_pts_$DATE.sql"
LOG_FILE="$BACKUP_DIR/backup.log"
RETENTION_DAYS=7
NOTIFY_EMAIL="admin@pts11.smkn1kras.com"

mkdir -p $BACKUP_DIR

echo "[$DATE] Mulai backup..." >> $LOG_FILE

# Cek koneksi ke server DB dulu
nc -z -w5 139.59.230.215 3306
if [ $? -ne 0 ]; then
    echo "[$DATE] SERVER DB DOWN! Tidak bisa koneksi ke 139.59.230.215" >> $LOG_FILE
    echo "Backup DB GAGAL - Server 139.59.230.215 tidak bisa diakses pada $DATE" | \
        mail -s "[ALERT] Backup DB Gagal - Server Down" $NOTIFY_EMAIL 2>/dev/null
    exit 1
fi

mysqldump -h 139.59.230.215 -u tino -ptinocaem --column-statistics=0 sky > $BACKUP_FILE

if [ $? -eq 0 ]; then
    echo "[$DATE] Backup berhasil: $BACKUP_FILE" >> $LOG_FILE

    # Hapus backup lebih dari 7 hari
    find $BACKUP_DIR -name "backup_pts_*.sql" -mtime +$RETENTION_DAYS -delete
    echo "[$DATE] Backup lama (>$RETENTION_DAYS hari) dihapus" >> $LOG_FILE
else
    echo "[$DATE] Backup GAGAL!" >> $LOG_FILE
    echo "Backup DB GAGAL pada $DATE" | \
        mail -s "[ALERT] Backup DB Gagal" $NOTIFY_EMAIL 2>/dev/null
    rm -f $BACKUP_FILE
    exit 1
fi
