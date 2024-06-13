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
define( 'DB_NAME', 'customtheam' );

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
define( 'AUTH_KEY',         '4Cs.S}~g6c;sUd[-<ojz[1in&`skr1lYUQ3?Z_T+N;0{dfO;nSDWl(!TjGgX H8`' );
define( 'SECURE_AUTH_KEY',  'Y*0?cs/,FMeBtSfK-+tpl*z9aE.#2$M,6rfz9?ZUkd={6x*[L#{`Rry9Mbb[+$EC' );
define( 'LOGGED_IN_KEY',    'G^-:2_]?Jk;f]AVGYN 4*)}U]yEGB[YZ7:!~I)Ys<S]bGXQ&4y=(m8;D6`o wLD&' );
define( 'NONCE_KEY',        'A-rl^r-`Vh@w%VOeV3na!8!_>P~TwfeNKJ:??DM:(qY2~SE&=8k!?t0RIEf=-=+W' );
define( 'AUTH_SALT',        'k#wa/Plgb821ao@A,0KmS+%k;c,hDz1*vW8511./q^h}<1ebz~Ft_ypR*<m(Kja;' );
define( 'SECURE_AUTH_SALT', 'H*.j~?0${ Zb6aKKq] IMEEe(%?v[Y^LZO0~&Iq|k+=-%yg(N8>p<3M=H]>u7?je' );
define( 'LOGGED_IN_SALT',   '>66Cd4W)maZO#%Z}A %=CXHRe#m@0dF>zm|JN9c(=iKEQZbo`jIUeI5EK7Z@n@71' );
define( 'NONCE_SALT',       '7V+9&_58MdDI+Wc%RE`#eVyu^k(vL%r|Q-Ct=)o>>?9;Y({#aBnG+FY%]fnL)$40' );

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
