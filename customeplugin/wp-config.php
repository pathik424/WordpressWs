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
define( 'DB_NAME', 'customeplugin' );

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
define( 'AUTH_KEY',         '+Uva1BjrHAor@Ge%Yy^!qF6)G^cG1-n|W(%hkp6{GmIxf}SIA5*<%`pw:[Aif^#V' );
define( 'SECURE_AUTH_KEY',  '1y@$[iO1{R&dzN3Di{vwo^_I;)j58M~NaP_)$:K]X#vFEWq0.]3?QmG5}.rz6=Z4' );
define( 'LOGGED_IN_KEY',    'Wh5rCDGWCmL<7*8s/CAd4eEqBZ|/<9Q,idX&n4g=0R2TN&0M!&C&^zI}~T z`5fK' );
define( 'NONCE_KEY',        'i>>!BOs^QH=~UZ;8*e+rl&k369I5jUMYvO).6irVS<Df[Z&qqy!?KW:EidSbCT}S' );
define( 'AUTH_SALT',        '8zjZ9S14FjydOw YF]9_!D5BDhXz$]@j>xKE`tb7]JZ@`a(a&48I}0rOOy;VZ,u@' );
define( 'SECURE_AUTH_SALT', '/ h0uOri{W0e^==#e>[@1#Fdf:lFV7LlW|c1+cQ?s`_D0F4=z:BNQKh=)FQyt~Tr' );
define( 'LOGGED_IN_SALT',   ':GK%$vL$FLLO;Aac]3Yt%:>Pi:kngA=(FgL&%z#nobU):>a2wKA`wKI`{p$sxN 9' );
define( 'NONCE_SALT',       'Zbi+,Y<WvU[~K#9:G>>_^!Oftm)Z(*!5:aVn]NKGx:]r]t#9Xl8r5OP_Ad+Gf{D&' );

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
