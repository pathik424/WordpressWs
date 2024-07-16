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
define( 'DB_NAME', 'superadmin' );

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
define( 'AUTH_KEY',         'y~U>*F`c{*glt?$t`zJ+{ R9.N_awN}HcJ_Uy+D@ugFw+y1J`L]T+R7Eafj?6_L3' );
define( 'SECURE_AUTH_KEY',  '4qDM.M9~+u <967>Jmh5_znDO$;?h@me+P5kf><[<VJt]|*r.bLp%&EHd.I$ZI<o' );
define( 'LOGGED_IN_KEY',    '^^/tx4R]85x7)nAd%.T:`#P o5OAud6^1gP<J27[{(:DQ2t.@`eL#VB^YZG4Dl$B' );
define( 'NONCE_KEY',        '<|pcZBNG2M7_Rd` F`9:6>lO%f`%Jp1l`7Qt^eNIF QH2xC$,pp^rb=(M ufwaOp' );
define( 'AUTH_SALT',        '3Svuhj.*M}C6`N+wX(nfZfYMeU@@d2+$,$=c,z#d54{TEM=M85aa%XRmC[=.1n~j' );
define( 'SECURE_AUTH_SALT', 'P7dk`P+}-EV: )M8|(<B] LKwN5*S<{76-[`bjnY6q!X=AazRJ6!5vY28_CO{v<4' );
define( 'LOGGED_IN_SALT',   'Vbo,^kWI2PO)JYU2`Q4 fgY*0F5ntn{)xHD=]cZD4eOz9B9va!4$=g<fY`--}w$-' );
define( 'NONCE_SALT',       'Z`wwT*`O(47G|kSKlexq~f_/(*;MSz. r1f(%t+tPK:[$o{{9#s]?scRrygji<{#' );

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

define('WP_ALLOW_MULTISITE', true);

define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'localhost' );
define( 'PATH_CURRENT_SITE', '/wordpressWs/superadmin/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
