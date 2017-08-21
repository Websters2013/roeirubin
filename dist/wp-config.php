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
define('DB_NAME', 'websters_roru');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '5785z<:iI`{J.>6Nh1rxjSgrhfVR,+TjMH$:>Mr=.t~d=t%o]w<t v6BocO5Jo1g');
define('SECURE_AUTH_KEY',  'amsx`ThtV@_7|l{$H|,dfDrA53YY{mz[BFVirm6[p[@#!.t1&(2y3M6bTx_=Qc)4');
define('LOGGED_IN_KEY',    'k @&75n4cqnG?<QHJYdImiCsXr^G;6&k,K)KKxlJ(&Er gJk&vemSO{~#aI:gI>_');
define('NONCE_KEY',        'T?`*^|+/[O.` MQ~}OQ28[qe$)EbRL%G&OW049}{kc!i!<jhT#/<F2Jrj}PTCDqw');
define('AUTH_SALT',        '}S+xR5XnrYBX$mRM+>)ihQZ-=o*<+be f67p}Gpt,[6vw2MDrS/N,>./y]FcU;v!');
define('SECURE_AUTH_SALT', 'UMH<X/p=[mFVBvp .eH7U|94rM)ZPBqm^^A6?$P-t7T-zEGwTw>=[{A5jLNh)>D!');
define('LOGGED_IN_SALT',   'Zr=g(ZbI5ZElL%>vYw8p8Iw#VQoV#[;b7jy798o=XG%Ik=HarR<J5o#yt5b*_eE:');
define('NONCE_SALT',       'FN9o0d1u2FLaMuy@iHR+IUeeP#|y{Mq7lkaugHFltSJ 6f)%QOtx*<%#zcDau;:s');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
