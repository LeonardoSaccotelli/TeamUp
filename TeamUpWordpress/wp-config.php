<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Chiavi Segrete
 * * Prefisso Tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'nomedb' );

/** Nome utente del database MySQL */
define( 'DB_USER', 'user' );

/** Password del database MySQL */
define( 'DB_PASSWORD', 'psw' );

/** Hostname MySQL  */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Puug~l:ZpMC6iACAe@!$u>z:md6bVW6:n$AzgjT`2i@a$U,e@dxlR;%nSF$)]NVL' );
define( 'SECURE_AUTH_KEY',  ';k`]WvgaG*bF?yBTXZ3l*os%o}h3_j]|*IHsQiubA7IN*N/[>&Vyqk5j?+W3S8M^' );
define( 'LOGGED_IN_KEY',    'ZqN=a i#pE`p36g(>PR3_IbS<%,86gqpp| [8wQUjv1Ok(W|*1`VITa$!9D/F`9w' );
define( 'NONCE_KEY',        'CIcwGIwD,tu|!@BOe:vZz%#G=t!=b+hS6Aqa%@t`Bcn6Kl-h$.h4Az@Y0H>v`Ka@' );
define( 'AUTH_SALT',        'lina[I?1jSF73.o%cM8UAJiLky n~.X:hqV6KTjz;AAvPH$C}_vc($mBf37ph>5~' );
define( 'SECURE_AUTH_SALT', 'bc6d#DK90>[|:)Uz<4^G*:0::kyQz8BRbD@u@qQHWt1w3t(OIV;q[),:_s;84un}' );
define( 'LOGGED_IN_SALT',   '@Hh1j~B6BW42zNPI#Kv` 3X)iqZ]YeEkp~EVXch{G|Sr|^[O=kSy&=|b9KB[4|)|' );
define( 'NONCE_SALT',       'g6|5PMl|S@/G,O{im1[Il_T+TsA|o)yx$-OqI8{F<fsreXbHzvDpmG#r9f~$.6hO' );

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
