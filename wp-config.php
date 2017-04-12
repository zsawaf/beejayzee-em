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
define('DB_NAME', 'bjzm-wp');

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
define('AUTH_KEY',         ')-hq^rft3m%qWboC2F:Q|cpuVw4N%:f{TKbFl-|K]h8rtmL%j-5Ta2~=9S|%|z[Z');
define('SECURE_AUTH_KEY',  'Or^*q<Vf6&=Kbj=[),0~G1U52n/VlV}/.I^}o@^5tv@2~tN^MnM9KIIO3Kgul4*Y');
define('LOGGED_IN_KEY',    '36${fZo*u`(9^!I)x;U/462}(@rhr=kon)>2RR7wM$3bPi*xN#+<%.t`krPl;z^l');
define('NONCE_KEY',        'P{Win6_I,/c%t&Q4p:B]Q#KR/>MRZL*)Gg2s_o+@v=FH>X|C67791uW,(@e[%9Qd');
define('AUTH_SALT',        'A;R1N GkV~ TRhT4nzX]v.jLl}K8Y}T1ZIBEKtf!^))&Ax>9Nubh4Vp- 9Ao6lR;');
define('SECURE_AUTH_SALT', 'b1^C1iA6mxb=B^0VU$RgsHi@,{,s/[kwsx&9P*R~>7~6bS9%0ms5(lq}~A%/09qc');
define('LOGGED_IN_SALT',   '(E>^w2_)OgQhqx@8(9>rC]s8f#Qx&2$fil*X`zeQ3K5mRWaYp RT*XHD}xM).Fma');
define('NONCE_SALT',       'B*/>#dJ6+@4*{8$q9C2Qa=1Ca -KY>2cp@nw(vbRtsG1__x!A}Lk$+AcGlYnO6n(');

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
