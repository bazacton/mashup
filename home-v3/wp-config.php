<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u312518386_mashup_v3');

/** MySQL database username */
define('DB_USER', 'u312518386_mashup_v3');

/** MySQL database password */
define('DB_PASSWORD', 'Ah2o@[dDzTG=');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD','direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+?8g{7!C[a;XTX+2SM*qG8N|%g?7S ME-zD)]]2b+xsv]OO.||)r,!Fr[aFhEjov');
define('SECURE_AUTH_KEY',  'hp3+p7B@0+GC!,7I~Ip?/xEhdQt,x3Q|_Y`/;p;n)1|dSZ`B&40_!0GB~S@~;.{K');
define('LOGGED_IN_KEY',    'G%Bi>ybt~{E=--&Ip| (R?EzdTzq-5+49bigeIH]b4d:VHk=5E49V~hkosgYUuSf');
define('NONCE_KEY',        'szXhR$T.B68A,EEknl=Nc2bQ$a:^giy!th^IP|Jh(*v,+:B%Gg8ZjE&*@npPWd|k');
define('AUTH_SALT',        'v{SV!4_vF=#x{%PQ.nH[seJn`{8-$Ycq2;tRSGb;tf+qY*,;V%sn/V7ej%9;s-Xg');
define('SECURE_AUTH_SALT', '*r5Eh-zv,g7l3&:83=nm;~t(!?;ClLC2F&Ej%C&9X~:.W6|)g$<?MxTu<XGPP 1`');
define('LOGGED_IN_SALT',   'a52OxMiTH* ;]Zsx>IJ}=rERqv#ZC0#1q1ws1K^2*3bz`&jD%u<N,]3Reu<yhkqR');
define('NONCE_SALT',       'ec(.9O]Sk*g%(@O/5&bg#*$:RZqQ4Sbvy*Hz$sZJq5!OKNu-ukR+{?/&fwRFftiD');




/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mashup_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
