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
define('DB_NAME', 'nextact');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'H~-`<uKupw7w+],o3YB<mEUQY?Kj_hB_:LNV]eE6*&5OX6$A-xY@o*H`_e%/`-Yy');
define('SECURE_AUTH_KEY',  'Qg#,Ln*zk>pR=/*<#.7Q~8t_fBrmVLE98Di&w~Z$@WacASw.Qd4upj!bUV22D:!%');
define('LOGGED_IN_KEY',    '(zftF|?e:7oTUygW3LZ^ka-^O;$)~}{^Y:t`nw~cnY] Uj}VuKujP.}h<fran*?J');
define('NONCE_KEY',        '0V%:M)t@cJ,AH]7U_fB]~t#J_f)u&>:|wDAB2}Jf$(j!YpAS}%/z4w5$(|#T[0[V');
define('AUTH_SALT',        ':N)/?gj(XS/xcRkDXkVBQ,;e(H]3g~UqF-x;Mcwq}jZ:#*vYrtH~KBg~(#2.:h[o');
define('SECURE_AUTH_SALT', '=7:Sc{4ph2_0d}JA<z!kH,|yy?@O,d|nQD~HF1 _n/&i0/jMWLM~R{G.mK}//H4#');
define('LOGGED_IN_SALT',   '3&-OJFaBbwms[L6ny[BL}s~M}HLv8*;lqiA{2+*YXt|U,Zu8B%LDzF3@c&Biq|o)');
define('NONCE_SALT',       '<{EhbcBL6j8|W?ln-W{#YC.-EGe3m0`$4<(Verw3V[D!~0#8<?T-!DO`]Zta3:aX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_na_';

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
