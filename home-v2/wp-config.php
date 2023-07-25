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
define('DB_NAME', 'u312518386_mashup_v2');

/** MySQL database username */
define('DB_USER', 'u312518386_mashup_v2');

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
define('AUTH_KEY',         '(-LL-dJSeM}tb 2Cy/W7`wNp.ttGS3c;/-tgLB|$?cD,ou@u((Znz+(Gn|[KIWx@');
define('SECURE_AUTH_KEY',  'Z`1A}/-c;`FiDq=Iz~UU9^jn(,WJ@>hH5-wYis$sk4!.1[=/A:Zsbj:]]/.L%/ye');
define('LOGGED_IN_KEY',    '/~z4 A{*;HGuj;Vg07KbkZf1Ux~2kFWDwFoRU>9u`Aw9$K-[z,]t-&`B@HFs C7g');
define('NONCE_KEY',        'f*hW#Dp|dE-`-|VPUDQ[mrlW*0~D*MSy7 ]Fy|?DUQ8D]yWN`.=h@m%.(*x5(Fq?');
define('AUTH_SALT',        'TD5fdO]#**8E;M-ch}N#++L+uOyk/eWvpQ8XPS&gxa{O[m/+t]Nsut=G_@9s=IJv');
define('SECURE_AUTH_SALT', '(C2[nB<*1pw^nP,,Yw^oWbW,2MrA=8t:Ibx6SQJ/O|a%)AG&rQQOaCO}n0gqxX0d');
define('LOGGED_IN_SALT',   '*{-,4I|eGGj9:EBO0hn>nt:Al!u,DW| ACu~4WW!w-{)+jY[+5`<n9taH*O<PW2a');
define('NONCE_SALT',       ';)yYICvHG{q9<;nNj=Bm?T0p 7FovOvRO8&D0+|Ou8L-!^0KG=y@!/>gWokK9%9V');



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
