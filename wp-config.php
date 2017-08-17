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
define('DB_NAME', 'sample_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '<hz,~zFfJ2U-n07P9][pv%<o`,-ZNgSBE]Ao[NGw^Krg !V@0!(@#VP={isa(lA=');
define('SECURE_AUTH_KEY',  '4Ujsv}%c;CkGUD8^]|PbB)NY1;6u~JwkK^+}W @&|xXYM1[ HCrZ{(ZXep>?Ro!H');
define('LOGGED_IN_KEY',    'x{o}l2Vd.k;JY*q5{hb#?p=0lPyq;Js`&7%CVZTxx:Z+D;)$*]t4~ tpHH}ux9i@');
define('NONCE_KEY',        'S22Q^ W%qT(6M4s$E}GHH?>=@}%L3p=dI4R_d8~uT6[WMu$~MNft}V1q6xP7n+E{');
define('AUTH_SALT',        'x?3Uc~F1$bW}ivYDnEc,D9o$crnc=3G+EbEZ#SM}(<8<X$%KT<&7D-oE6DU(<+4`');
define('SECURE_AUTH_SALT', '6hL#RpIJ:x$&%C|eC@QMOvp*2q%V^z=t.boCB,+51CDms@aI/m!L;4iv=:OC]:zB');
define('LOGGED_IN_SALT',   '0VcjA>0hgO)-[Z%qOy:M.wLMATL*{3._}z|C-uiE_>uVo%&nf9YdyMI1WAKp)TNs');
define('NONCE_SALT',       'r&2fjtg9@?R:*pb6#6wOn|q6lQ~=Z}|T5okm_p^BztYLE^Zm#: Md+|V,eWt<HrL');

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
