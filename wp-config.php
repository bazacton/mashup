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
define('DB_NAME', 'u312518386_mashup');

/** MySQL database username */
define('DB_USER', 'u312518386_mashup');

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
define('AUTH_KEY',         '&X0:c+P/[)JfbT[Oqutec~7Au!Y#JT-:bCW|UEP=hXQ83k)V-VU&cJMiE7A[Z:r?');
define('SECURE_AUTH_KEY',  'cz{> NczW}=;Tr$XZ.u9-^6j+;Azu:xX@[ <+U@AG)72|;wjeueYYtW=&+@7mci-');
define('LOGGED_IN_KEY',    'vuUi!`)Vk7KOO7veod>ohJ(uWIRU.U-=#%hzxal]$vaici%26;CQ)k!/:R)U%}+*');
define('NONCE_KEY',        'FUVqLLvDmA21rZeLqqsmcR(vKxm>7.nB? b2]1DHe}A%c(%^| (fNoyulu($G$Y|');
define('AUTH_SALT',        '}<w=}:.Dmw(PZqBG]%!!H|.|^+iD2Qa3ZC}&3a;*+xI%jQ=49CC}m*ItrFlMPWxN');
define('SECURE_AUTH_SALT', '&Uw04|QVsF<km|LL/=ywlLS`?*J!TMDg(|g`Qsqv;,q._g5I>2Dv5(>}zr_t0 .8');
define('LOGGED_IN_SALT',   'W]_so<lDR7P6{Zv{5/u/fC.vXOsNv47[g;W.8+{f$~%4zQq[d5(F~c+0`X8hY?+K');
define('NONCE_SALT',       'p}$XV~t|r6w0Pz?zbRF^n]C-j(5}<e1a7qc`z$.q,LrK(Q7TVfE8+)Q^HrM_H*kX');


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
