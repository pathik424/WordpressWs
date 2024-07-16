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
define( 'DB_NAME', 'WPbackery' );

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
define( 'AUTH_KEY',         'YUyH5]CNT9SUMn%<S%$F<h(o042eW7d-&.;ZaI$o3bHmX:yb6Wl2 JWB2h^uc!+H' );
define( 'SECURE_AUTH_KEY',  'wkXlP_Kkp+z99DalN!(!?`m25-?z{F&AZU|r?dmXvSyu-v(#Y`~iQI43qm3fD3g=' );
define( 'LOGGED_IN_KEY',    '_q5f[#dBIp.FJva^tH[gmpJ^Q]1A@Uz1PcE@ibAel-@h2xa%N(3OgF;pk]Y$R|YL' );
define( 'NONCE_KEY',        '3Obo6.OP`~YVOj_E(Y^2?|+44vh$}5Gk**p.v7S7f(`nZ*~^8nw0O[{:;pMJAs_Z' );
define( 'AUTH_SALT',        'b>Ajk`2|=,TYVnijXP`70S+6W6M/29Z#}l-h*]?r*tqa5gHw)t R6bA!+x^)ND!v' );
define( 'SECURE_AUTH_SALT', 'E;^#t/d<IF4}W&,OM]Rj<P7)9.$s}(evl&-_hHjcwIF&pG}Nn[u0b;N*R]lOf#5,' );
define( 'LOGGED_IN_SALT',   'F3o-A}##bk%WY&9<uZ9tyEahYI3xEJ16%hM/G%TGaw0^nAY)CfBw|o|!@9u`ome4' );
define( 'NONCE_SALT',       '[aQ@L^G`PN&K:~j90%lYeS|-^Vov<zW5mNFeMx$|%u/Dn]TWH.~8cXYdwY_.Qr)U' );

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
