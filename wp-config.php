<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'Tna (psoU4asqN>N%[vFAtjItbXoVAa2_x enF18=`6:!p7;b$1I,c;#dc5T7!Y{' );
define( 'SECURE_AUTH_KEY',  '$Kmm%05>8p>p1{#SXf.ll}=$MeGVRl6U,5O#{2dj^GCD9ZfaDg^CZwU7LdR7`/0J' );
define( 'LOGGED_IN_KEY',    '1j0cQDkNrQD<9Ow1@{F{/nb|#t1f~3YVOQ/dV]E=kZrm}QX?&hr]%Dmtufi8K|m]' );
define( 'NONCE_KEY',        'M]voUrU9_ZNkbf}XX>nfn2igYIcoRW6?}/0;C#4OxiSI(ErXDL;,m3V^xf[UUXQ1' );
define( 'AUTH_SALT',        '>ui%373Jpm:4IunG(i]rX>=naAraG^E-ycafZ1s2ap*DR$3TMF`lR}vI_-)t@oO5' );
define( 'SECURE_AUTH_SALT', 'b6M:+??b zrth*zfJ}.(8{(z!LLrI:CYhQh,|e%M{l{KY_g([k/vFBQi~K1f~&d}' );
define( 'LOGGED_IN_SALT',   'KJHv3ABZZ/hL(gCdw?H]$h!kG(Crw-F()A~EWo&jghWyVLK?W~f1v(Vj7!/j 5jH' );
define( 'NONCE_SALT',       '6@c,6{IN-9Yzy,=D6c#fTbr!-bxES3t=a-vsNO7D:fqnNuxW^)TZRnrWU.N+`o[G' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
