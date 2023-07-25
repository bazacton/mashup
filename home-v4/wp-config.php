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
define('DB_NAME', 'u312518386_mashup_v4');

/** MySQL database username */
define('DB_USER', 'u312518386_mashup_v4');

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
define('AUTH_KEY',         '~Z.#`|:Y|*8?#U*Lm<s!imo%!Q+bCf=,fhZ>)J?.E#ZMv,]fF%P2SJH[WLuhk`a|');
define('SECURE_AUTH_KEY',  '(_TO+qc+W+4Bimfd3%,mysK)`h|-bP,y[6;=LY[GC4`9B0VDDu0:Y2jK(76Ak-S7');
define('LOGGED_IN_KEY',    'mZo&0FfTYLk2S/0D[xk-  F{OxGpwar~/CHjmOsC!YjERAC<#/(/[Uppv[_kBD0U');
define('NONCE_KEY',        'ELHq<s+C,ZLn0>kqMK>Qn&#^h~|4Xxv;Wc7a:NmJV6j5.uZ!j%t:[i.A CN7-^:|');
define('AUTH_SALT',        'iQ}+WA4OWJ2AAh{L~.Aa_>NZ7W[agwp0|;L:`l(2i:%Zh&STmT>GeQ7g,xw`Yk+}');
define('SECURE_AUTH_SALT', 'cAsK*Fj*AdHRQ~c?&r#(KwO*b;cB)-_4/Swz-_Jx#q;|%-|E@b&(-Nv7!P$|f+kO');
define('LOGGED_IN_SALT',   '$j*9!xD*/<5xI^X6N_oR!32IYG).k[mfMD9+ru-(wv~K9H(}+`ANl^QJ@!&L$J_Z');
define('NONCE_SALT',       '8wy>k? nkU2yc{z747798t!cK8)gaN-jwI]RF!DYwHkjJCpi~6kjguEn:?M,$?w%');



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
