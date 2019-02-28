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
define( 'WP_MEMORY_LIMIT', '256M' );
define('DB_NAME', 'windesco_wp_2018');



/** MySQL database username */

define('DB_USER', 'authoring');



/** MySQL database password */

define('DB_PASSWORD', 'pyromania');



/** MySQL hostname */

define('DB_HOST', 'localhost');



/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');



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

define('AUTH_KEY',         'CFf+7ggSG$NA0bKUQ$54');

define('SECURE_AUTH_KEY',  'zAPVxSU1G&p#ULz0A9IC');

define('LOGGED_IN_KEY',    '15c)V*@BKV&+V8#7jX/6');

define('NONCE_KEY',        'Vn*!Pw68@E/zsKmhwPg4');

define('AUTH_SALT',        'BFNS4%@kKk5w=3dv22BE');

define('SECURE_AUTH_SALT', '9wI$dj284$dEcg6s&BC8');

define('LOGGED_IN_SALT',   'sLZh8VYk_NYBpdFDGsU5');

define('NONCE_SALT',       'J!F91U2(4&t*xa-Nag=G');

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
