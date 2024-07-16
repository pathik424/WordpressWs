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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'acf' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ')e6 3TguTK+`F~{sx^9mu 4Ar} C>siA{.%X]fF{f`$1%d=zh(Q.{o?::F~%|Il7' );
define( 'SECURE_AUTH_KEY',  'x@V8CIcF5ZGizD!5[?LSbn1UMqv/pN[w<:`{Y*:pzTrE{C1L&[mxYR(t?5Vl!ov^' );
define( 'LOGGED_IN_KEY',    'OPKy2n ;lyPQ|YKk w(s 9G1E.V@AlM<_?6 7H3;U[E{yd!B,[(80~1+.N(Ey0M=' );
define( 'NONCE_KEY',        'FCfMW6,qG|d9Tz3-dgB(K=$8-EH7_Q%R(ix5a?EQ+(f*/mxr%6<9A*H]8JBNn_ba' );
define( 'AUTH_SALT',        'Qmo7Z3463k_6@?vz1hx&qIElf[o_>CY7%EW0HW.5g[!MlC7y0F^X,b-(MQ%S_?tI' );
define( 'SECURE_AUTH_SALT', 'n3nS!?]C@asVPi0hDJSa`q3QtK#ph8rpbaUh>7}@dB0AU[Yo/$pTIjdEAb84K!VL' );
define( 'LOGGED_IN_SALT',   'rKxuWWU 0lvji)Y.FOdno3aypF~OmQg%8%N;VI,!g|u3#j Ec|!ybibw+@c{Tj(.' );
define( 'NONCE_SALT',       '8bUrHq892P0W]RJxd`Umc|d`*b^|-t05>fBISXU8P0i+?MR3~7?*|7,W8+xJ0r 2' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
