#!/bin/bash
set -e

# Generate database.php dari env
cat > /var/www/html/application/config/database.php <<EOF
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

\$active_group = 'default';
\$active_record = TRUE;

\$db['default']['hostname'] = '${DB_HOST:-db}';
\$db['default']['username'] = '${DB_USER:-pts_user}';
\$db['default']['password'] = '${DB_PASS:-pts_pass_2024}';
\$db['default']['database'] = '${DB_NAME:-sky}';
\$db['default']['dbdriver'] = 'mysqli';
\$db['default']['dbprefix'] = '';
\$db['default']['pconnect'] = FALSE;
\$db['default']['db_debug'] = FALSE;
\$db['default']['cache_on'] = FALSE;
\$db['default']['cachedir'] = '';
\$db['default']['char_set'] = 'utf8';
\$db['default']['dbcollat'] = 'utf8_general_ci';
\$db['default']['swap_pre'] = '';
\$db['default']['autoinit'] = TRUE;
\$db['default']['stricton'] = FALSE;
EOF

# Generate config.php jika belum ada
if [ ! -f /var/www/html/application/config/config.php ]; then
    cp /var/www/html/application/config/config.sample.php \
       /var/www/html/application/config/config.php
    # Set base_url ke IP VPS
    sed -i "s|\$config\['base_url'\] = ''|\$config['base_url'] = 'http://${APP_URL:-178.128.88.30}/'|" \
        /var/www/html/application/config/config.php
    # Set encryption key
    sed -i "s|\$config\['encryption_key'\] = ''|\$config['encryption_key'] = '$(openssl rand -hex 16)'|" \
        /var/www/html/application/config/config.php
fi

# Fix permissions
chown -R www-data:www-data /var/www/html/application/cache \
    /var/www/html/application/logs
chmod -R 777 /var/www/html/application/cache \
    /var/www/html/application/logs

exec apache2-foreground
