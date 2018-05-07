<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'appworkstudio_db');

/** MySQL database username */
define('DB_USER', 'kenny');

/** MySQL database password */
define('DB_PASSWORD', 'REwq$#21');

/** MySQL hostname */
define('DB_HOST', '159.89.237.149');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<bL}s)O#j2c.(a;lZc41C2a%rfyz%${ebV!@FH8#yX<J&w;K~8}{lM*4dT$qr*N+');
define('SECURE_AUTH_KEY',  '?O68gwaI/R2/ZBZN)o%TyM}qmARi.%3%2]K;y8:dFm[19ox`muuUzbw#sOn;{B3C');
define('LOGGED_IN_KEY',    ']H=Sy;XxO+`zdPIgM>NABRu|v<;y<|~uo~8>XVGjQ y+itVa]fZSnqnS*!3Y$5C^');
define('NONCE_KEY',        'q/)~J%D3?aw-;d`iwlHREii9o1q?&y-D[oQ$Dy]d<n0R%>?*lH>DpR^3Cwt=j=ZP');
define('AUTH_SALT',        'MLuGMIR<*Z9>m]7Ibv{KzykSZ}V:gAgL&}M~J+[4xM$up,:2&_#|R#HA|imn WS,');
define('SECURE_AUTH_SALT', '$RK?]@dx^3`SPf(mx-Ta^{fy)u:ZK-S)SE;SoUZ xg5LouQju}}ltKeog3X)_FVS');
define('LOGGED_IN_SALT',   '0Aw/#GTPl<mFq]gUW|-&d<lD)BeXklZpn${TD:Nj}9;)p2?>A70bfN#m9o.%>nu*');
define('NONCE_SALT',       '?GfgagREc0?Ij!_<,]In:OiIro5M )8Nz!cJE+k:1S),2vD*$+^7+9]NoJ*qFAyl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'apx_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
