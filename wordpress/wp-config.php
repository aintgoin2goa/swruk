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

 $http_host = $_SERVER['HTTP_HOST'];
 $whitelist = array (
    'swruk.org',
    'www.sruk.org',
    'swruk.local',
    'swruk.herokuapp.com',
    'swruk-heroku-18.herokuapp.com'
 );

 $allowed = false;

 foreach($whitelist as $host){
    if(strpos($http_host, $host) !== FALSE){
        $allowed = true;
    }
 }

 if(!$allowed){
    header('HTTP/1.0 403 Forbidden');
    exit();
 }

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('SWRUK_DB'));

/** MySQL database username */
define('DB_USER', getenv('SWRUK_DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('SWRUK_DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('SWRUK_DB_HOST'));

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
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

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

define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );
define('WP_DEBUG_DISPLAY', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('FS_METHOD', 'direct');

define( 'DBI_AWS_ACCESS_KEY_ID', getenv('AWS_ACCESS_KEY_ID') );
define( 'DBI_AWS_SECRET_ACCESS_KEY', getenv('AWS_SECRET_ACCESS_KEY') );


