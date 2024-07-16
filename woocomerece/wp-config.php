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
define( 'DB_NAME', 'woocomerece' );

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
define( 'AUTH_KEY',         '>Vv!J~o T+C?<5e>YMC;Y{wvQ%;EU6>fDd)Jmv@Z-H#U)s>]wh_5.0A~UJT#RbVT' );
define( 'SECURE_AUTH_KEY',  '7hNNgbv(L;Rr`>e&w7x)Kn[CVc]e-sLWS}!*);0l^SVXv+lqmY>R~MVrZ9BV)Kq)' );
define( 'LOGGED_IN_KEY',    'A=S1x2O%Iwv]]dY/n9gyyz|J`qPI-oBr?{-ksfJOislMJz7}ie^haUNG9ps:=K[~' );
define( 'NONCE_KEY',        'ysBim+L~jNo:8Ic4F=,.~9`,?|@bR0y$BN3e|yHRH=bhJIEP)<`9~<WDxHRmu{;F' );
define( 'AUTH_SALT',        'xZk%ke;g*3&oGQ_ChdI~1yH~!}OB)^^?qyX5WIu`tfNWYf<RaxTc8%v*KYudXo$f' );
define( 'SECURE_AUTH_SALT', 'fSz`%X$4nomL{`iysFUZk5nw3,uG_0ej/QhjSFGXF{9n?hvpR.lbe|Kx}REKj)y<' );
define( 'LOGGED_IN_SALT',   'uoYs#StkzRY(_HKIPzQu~KREhJJ|id@szc<T]%`gy&(jy-P[J@04_G12+$xZT:P-' );
define( 'NONCE_SALT',       'uB&xFEY-Cv41B8@r0I&q ogj;S1byZCE),kCAl9h8{e VF14VBQ7=g`]?L( 8Jeu' );

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
