<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fin-law_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-2SCq|?9*:21emQuUYTMc_0yN%#RPr5%)9e[Ur.Q5LJPmV|^g<QA4T0x a~6Q^|i' );
define( 'SECURE_AUTH_KEY',  'D9`[T1-gSwIlsWs6I}qG3HrulUM^~#1xYd)v5fG{hd${V@;xLD6^mn*!x1RL0B?R' );
define( 'LOGGED_IN_KEY',    'd_k=I$cf/ 8?`1v$M!_*&A>ZAu1TN/o698XA$R{hMex%pM5-MR{Vs;W9Dp@ab2ME' );
define( 'NONCE_KEY',        'i9rOP {8HSZV!6SO8;r1t}t.rm$!j~j9zPDb%:ZdlY)gW(?*sg8XFRuX-aCoz g`' );
define( 'AUTH_SALT',        '>$vi1_N``C%H(OkL3I)FINRH})]O#UWoju6*rKQ)K,2$ZJwj M4vIJ&W)M-z#-4F' );
define( 'SECURE_AUTH_SALT', 's1v`yG@m%c2(1VosN4B+:?kxHYOfOq YuCx0,,i,=Z$<A{sh;d#TO2VGAL{@hEl ' );
define( 'LOGGED_IN_SALT',   'X-} w2?7-JpIy/l4[hbBWMs&w<_83MO9p<aheF[/QozVBQThJ_q w>heqAK}o2E7' );
define( 'NONCE_SALT',       'rhh9/^(7Otz>g[lp#BJwoBl6Wv:ngZ/]X&aF_6dsNh4fkj#*po>61i9TdbPA`!<7' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
