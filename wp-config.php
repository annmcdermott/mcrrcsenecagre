<?php
# Database Configuration
define( 'DB_NAME', 'wp_mcrrcsenecagre' );
define( 'DB_USER', 'mcrrcsenecagre' );
define( 'DB_PASSWORD', 'vp3ZvP2OCv43ekub1IK4' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '2|R_`#a$h-uyQl$h(B`a;3kqQOYAt)Ycr>k8%`i.Z)qN#D3--9qd)Q*~rrsX*~;.');
define('SECURE_AUTH_KEY',  '4iEb[&U@X-x[*&bwc~G.|0DO|v~Wqf8l[~*A.Y)3/@>Nu(pOvBI2!+~/+S-.c)JC');
define('LOGGED_IN_KEY',    'JnC97{edG-H1,nG0QaIhdrc9g;])Q$,hJZw83t@eTPHmIfv:3/Z-B8cA5D86C9/<');
define('NONCE_KEY',        'Xp?MfwZTj>Fp`[eOo]?sU.W)1d7H!9mqB;#,F+Pb[D{mL0Ph,Nc;Z(yJ|Edc[l1d');
define('AUTH_SALT',        'z!Qg8~vm3f7(Jqc&|GU|G*D<I1x:<BX?P6)|(s4nknoT5+j|>L7|,*o v2h]OI?U');
define('SECURE_AUTH_SALT', 'L]BhV]C3/o,v`AlP}a~3bd#Vw,cCFYi=qeLe<0-P@s8*&fKRBTvgni8Sj!D3E>A#');
define('LOGGED_IN_SALT',   'W-5l=H@152Xk6!mPi|k,}b_@4_HBi]dI2|jx7=C_b7KO8gBS4XVb2L)),l:jb+7T');
define('NONCE_SALT',       'g_,|SN ;)a:?-3 :ieL-EK +)7aioza2+K3|iq||BN~k|Q3u~*lj&1K>I1LTTqIF');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'mcrrcsenecagre' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '34b32085e3a0ce8eae2d6a39b657bcb388b97117' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '1642' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_LBMASTER_IP', '192.155.88.124' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'mcrrcsenecagre.wpengine.com', 1 => 'senecacreekgreenwayrace.com', 2 => 'www.senecacreekgreenwayrace.com', );

$wpe_varnish_servers=array ( 0 => 'pod-1642', );

$wpe_special_ips=array ( 0 => '192.155.88.124', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( 0 =>  array ( 'match' => 'www.senecacreekgreenwayrace.com', 'zone' => '1ppb5p4bugaz14sq812oj5j8', 'enabled' => true, ), );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
