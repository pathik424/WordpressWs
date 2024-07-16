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
define( 'DB_NAME', 'qs' );

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
define( 'AUTH_KEY',         '2=+=H4,,&O-^F0mNcr(Tj[El0k-9uc?R!#79iU|e4`Nn/(,mk]lWolX`A904W;HW' );
define( 'SECURE_AUTH_KEY',  '6+0okdIZCu`M<3[{jJ/`B3zis`$<^%52s$d|F8A J`VTy8aV[5%?pvM2{__>$W]w' );
define( 'LOGGED_IN_KEY',    'u{n}B^|xrCm,CQsDYfIh#y@(HTbqMIFxmMwn3kZVyp0oSB >_|/D{F4JI_gEr(NE' );
define( 'NONCE_KEY',        '`>mhIC#7!V%a07](RT,4w[hU{J-|zZGC6%+OiaJZig/,21yD<Cv/c8w$o1M5B](c' );
define( 'AUTH_SALT',        'y&2Q=YZ29 DW*E/r>HSJlj+<O;K,Th0!F[xsL62zPZpsrsi@=Z@aMK|d%:ACUGT0' );
define( 'SECURE_AUTH_SALT', 'X_!iw)_yR,l%Vln[t|!k>(Bdy2T,Ea/K>4Hs}~}HqzDb1<g{NAV{lUB7,1E~Isq8' );
define( 'LOGGED_IN_SALT',   'pu:4|IY6BMX&T.&-hV#D3!#r{XAu`GC@6yXgq8j]2d1G2K,1^H2orpKM[htY#:.+' );
define( 'NONCE_SALT',       'E]uV(hvPBK  7yA^bqc]p,reSM$(zC<5*d!7&H*MkXj!)39!j?]i#B|%1zM%eM7~' );

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


define( 'CONCATENATE_SCRIPTS', true );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
