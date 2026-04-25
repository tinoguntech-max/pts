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
\$db['default']['dbprefix'] = '${DB_PREFIX:-el_}';
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
fi

# Selalu set base_url ke dynamic (auto-detect dari HTTP_HOST)
php -r "
\$file = '/var/www/html/application/config/config.php';
\$content = file_get_contents(\$file);
\$content = preg_replace(
    '/\\\\\$config\[.base_url.\]\s*=\s*[^;]+;/',
    \"\\\\\$config['base_url'] = (isset(\\\\\$_SERVER['HTTPS']) && \\\\\$_SERVER['HTTPS'] == 'on') ? 'https' : 'http';\\n\\\\\$config['base_url'] .= '://' . \\\\\$_SERVER['HTTP_HOST'];\\n\\\\\$config['base_url'] .= str_replace(basename(\\\\\$_SERVER['SCRIPT_NAME']), '', \\\\\$_SERVER['SCRIPT_NAME']);\",
    \$content
);
file_put_contents(\$file, \$content);
"

# Fix permissions
chown -R www-data:www-data /var/www/html/application/cache \
    /var/www/html/application/logs
chmod -R 777 /var/www/html/application/cache \
    /var/www/html/application/logs

exec apache2-foreground
