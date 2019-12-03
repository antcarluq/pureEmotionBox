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
define( 'DB_NAME', 'pureemotionbox' );

/** MySQL database username */
define( 'DB_USER', 'pureemotionbox' );

/** MySQL database password */
define( 'DB_PASSWORD', 'pureemotionboxPGPI21' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'p(g[Lv)3I+^D{+`/s>5L2*Kow})BHOuZ7,)*i>/A%x__5I.9O(w+H(# BYn Nu**' );
define( 'SECURE_AUTH_KEY',  'e4o,-O<G`o+K-6+IBj#t+Jxa&|~dUkexK4t2*q#cw_~FUn2j2`+k1>p*#(U@#j~Q' );
define( 'LOGGED_IN_KEY',    'Zg+d_9F-|U||lf.Lvrw|-A@am]NMri+-T+Rkl`5UWKr7RlM}?=|+~bj-Nf++Hhd9' );
define( 'NONCE_KEY',        'gO#.X0WUJr_#L{{42G7nshQunl;|,jc`}G-Z?E/zA8|cU<XV_w?E@G&_1NMib[!:' );
define( 'AUTH_SALT',        'Ox-9KX5-H?j5~!i<t,#SrKdS;[;ok )6cdksxGCa[Z=!GzFhY0K6H,CXN~SH6Eox' );
define( 'SECURE_AUTH_SALT', '94uvz#/9m-o0&QlB$toS^zUGCJ+yC<uq~DXZ9)-a[zoF)Jbe9R#co{pPDh22-&,p' );
define( 'LOGGED_IN_SALT',   'MJ$&p_sjX81}N8Y|b$$izJCZx3|m!qexo*P8v!i>SGd,4z%aQQ_0@TN96Pt^lJCo' );
define( 'NONCE_SALT',       'N8 3g|+n6l@y~sJg~$$m2Xz?BwQ+U c.Y2uCQ:s/1@jT>3tu+5ZL8v5Z`fSaw E*' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
