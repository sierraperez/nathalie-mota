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
define( 'DB_NAME', 'nathalie-mota' );

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
define( 'AUTH_KEY',         ';l9rxdC;T8Obw~w Aa^KUT] KDW?_m${4:i=MMR]DC50o7PJG8M/xPBSoc@4)l@/' );
define( 'SECURE_AUTH_KEY',  'ZSz;nWG@N0E$`2Bk(^rZSzmR`uy!o@/EdKl66s$ +hAb](&pI%lgClsntgt;PP)w' );
define( 'LOGGED_IN_KEY',    't;kRf.=n9/ K*QZsd/![n7=ZQKk)J&)m5Hvzu&cL2`0gU&^s${>%76><WUl45|wE' );
define( 'NONCE_KEY',        '8$vJO@jK=RyFwfw|DF%1Zb]7CS: bV=uq4i@HVIow5guI*hHF7l+G$oh63*c*Q?G' );
define( 'AUTH_SALT',        ';EPxZ ags{v-J`7qrO3pY2Dr#xT6mO79rta0Bd#8B&fXEKHpB];zY@xBJrfn6X8,' );
define( 'SECURE_AUTH_SALT', 'Z+qq,s4^v4D.P5}~=XkOI<i>J{gmssVw%rnu!8e -JU`kGlB?V),BD`n<K*}H|%8' );
define( 'LOGGED_IN_SALT',   'nJ*Z2+YPsm(?:Q^kE=KlzN;8!{]<w)4/{@+b3@R?mKcr7<!(4_lZ]j2Iq,U&g22B' );
define( 'NONCE_SALT',       'ji|8JttQW*-g:Z)U]@^3_if FKrmN--_5mT7&3A4Ip1:Jy7^XkSQ8*yd-a4I<;Jh' );

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


