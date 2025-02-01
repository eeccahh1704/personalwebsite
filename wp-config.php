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
define( 'DB_NAME', 'ecah_cv' );

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
define( 'AUTH_KEY',         '@!2jH<aEgy#N9 ~%X&{l/?vcFi]>)d4k}VbDw_{IZ8Oww8&GBw],t{[|$4Rly5Ot' );
define( 'SECURE_AUTH_KEY',  ',G&u |[%Jc;wH[!&{T&/~$oxaCQI^TyLFNQJ,vSt{rQXZ%v8&9il]axfiz)srqoA' );
define( 'LOGGED_IN_KEY',    '(^^y8{`v1anGmvsTtB.C064aW]1@!2nPHy9%Ky}N7)gfEj FwY4P%x5K^h_WpR2*' );
define( 'NONCE_KEY',        '1SDC4 (>h97aZ3u,v:{[gFp6y9uw@R0:s/LsG PKWl]#(QB7/ 7R~uZdpz:F2-k;' );
define( 'AUTH_SALT',        'jZtZy~Dd=K#Zah^G=@)q?CZ)2,DQg73/1=W~)mq8%zg{P|KPj+hF/9%K]qDxdC<E' );
define( 'SECURE_AUTH_SALT', '/2`Pzy_)i5D|&(&OFAGhF<7~`:=hMnVs3BjH&A/zxe${Y#N|B0w2Xot }pma?}?a' );
define( 'LOGGED_IN_SALT',   '(KZ;B2`w0sv(jh|gqWqncn%v<J/zv;Yj6l`u#+6(ZqV73mAll%pzS&]d0,F=fm,q' );
define( 'NONCE_SALT',       'B_#-a0xPVO2sW*5(8elfA_j-]8=t?hQPQy-`oN|gH>/d~yxI2~mY<0tM=J j.dNI' );

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
