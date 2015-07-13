<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'muse');

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
define('AUTH_KEY',         'B* o Iw2z$B9;~3 YUD{W$RC14@&fr>I+c;i?=/|2a% -E{cA+$hg>T,,mt U!*;');
define('SECURE_AUTH_KEY',  '}>.7Nv%:Z~S2_gqn-|{>wWi$-toUAd/N*9`|q.yX?|`+l&H=i!E+zH27:-d|Qa7v');
define('LOGGED_IN_KEY',    '$qM, Vj#2HAluiVW_@ Kpf&[Iw_5R-%q`OGw%q-~F;LSgV7fO_v(1QXhO|OD4R4l');
define('NONCE_KEY',        '{S|&#=h:z9SDaew&|BV?]_oj_k$+aP[fQI*$=l[|Dy/F$=jk+&?U=+]R#o9#hjyB');
define('AUTH_SALT',        '?,>@*%GQS72Osh`tnY)v`Zs|!]$NO;JM=L!@WL&ZS/<@.y.mkov~^>+_9[L*_%w7');
define('SECURE_AUTH_SALT', 'D-(->n!j@L[Wmq1Q0?I+lc7-e7/s|Fzys2,k^o|EtbeU.n[4i3,bxP>p_Yl=wLTt');
define('LOGGED_IN_SALT',   '$^>rcyg|[&=Vv9N8 Ex-H[gQVHGH&1IAb~eJp$.&y+ddfhOt#AwN#uPF==~A!>q:');
define('NONCE_SALT',       'Z2 <&4CE+HBuh|u{O1j&h{-Hc3lT!:4VTON-`<3pDH:&ie1ydhIA=z@l;!t-Nz-|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_muse_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
