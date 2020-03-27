<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'meusite' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cJY~D)x*HRe K`;K*|=<Tab8>%Tj=?j96fPYU;k-gjPz:S200_H9L0:@]R`{|&JB' );
define( 'SECURE_AUTH_KEY',  'Dm>6znLb$m{T_,vr.)w_*)2*<dOinIIIbl%E WQ]GW7_|o9Ip)b(TmK/u`{_Q5}t' );
define( 'LOGGED_IN_KEY',    'UsTioD6^ |aYU(kOUe;(Fc1ptJtRtVRa}Q>*2B_Qf2#BOt/[*WL-VzQ)M)oz?q|*' );
define( 'NONCE_KEY',        'c. zTNJE3{&<!*j,?f&B~T*j^5*Hsa<xD{7kOAjGypR a(NjWiP=4]v6)EtYeuWs' );
define( 'AUTH_SALT',        'ACD0mzHSBLXZBQ QO-Kpg4LEj.sALva/IMeI}TTG[Df%;|[Vld%A0?_[4aSy#,eJ' );
define( 'SECURE_AUTH_SALT', 'wFiT&5fr~&`,Ol?qfC~N@ZS=H^F-c#VOh[91di!hPH;Q?m4bwf5T;4k,gXhe+_LW' );
define( 'LOGGED_IN_SALT',   'uIBr@ac`$$-h$mU+m=Nk@m/CvoB#qpn:8@A@-;=|l{ymP_P#HZxQ=:u]Kh0+s8!c' );
define( 'NONCE_SALT',       '9&YR8~oPC:vMY@Ot@Gb?<]s<6-[PRp.l&BL;_kJ!rg-#G}Eb{g0C2Q?g`|oy[E^2' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
