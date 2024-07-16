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
define( 'DB_NAME', 'form' );

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
define( 'AUTH_KEY',         '4Sm!F6]E4HH52aD$6~.Zy=w=4Hv)~9xY^Cs-sAom3V[UI04Gi+be|qZ=jkw].:`|' );
define( 'SECURE_AUTH_KEY',  'Y!>v?wqQ#,/Ye,0CRT{BHs@ni:nHGC`NPlrD~U+mp6F.E``]IGxs##:(OVB0V)[p' );
define( 'LOGGED_IN_KEY',    'WyVl4w46<{yO4~M:>TkEq,~jSy!2+&ix%._l#vqF6C;vqfapT<W#`DU[deH$mAdY' );
define( 'NONCE_KEY',        '@o77f3s>BJu0yoqcXD)#(Pd3/(*.);M rx:0kQz3Q BF[x&] .4Q-p;imOKo_CcR' );
define( 'AUTH_SALT',        '|2$Jt&/H$k<iYK4(%OyoNT}?qPuT^5Ob`vSvw!FC2,H:}4:c+[y|rgQIk~D e{8h' );
define( 'SECURE_AUTH_SALT', '+yiaoOHW_FcSH-kw.jAYMV3F4NW1G)tr{+|V%6[!7p01OXyio[fOyuJ7,_(g<f53' );
define( 'LOGGED_IN_SALT',   'PfNH})Aw;b@wU(;:M/$}f!!Wp2M>AslF|Eh<5Br$pLS||J~rVJg*/GYAyW^{/[|L' );
define( 'NONCE_SALT',       'X p7@lP9Tdhw[`*4InKZs]N`DD#0-; f#%T0o&2_bM}H*ixo{CY`&nN0]_n63+%!' );

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
