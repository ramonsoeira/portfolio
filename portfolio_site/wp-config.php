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

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'projetos_portifolio_site');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '(jlqegn3G90Z,SV^agk6%v@^v$i@|jT*&laA8;^{iqlN0E?_DiWT b+#y|D/;[EV');
define('SECURE_AUTH_KEY',  '=wYWzR*&Yvh01pFD^+Bx>N&EIP1<gnQmh7 $V4W?oe] [!3EK-iHTAoevMMuan& ');
define('LOGGED_IN_KEY',    'cv)nU3<*R  /mU*s=tj~#B^Z3g]*jl>R5~6TdfoG=(Dh;MRB7vVy>Dh=9yK@`{[5');
define('NONCE_KEY',        '(:>YjcQ5~H@l8>HaI2<4-?$>MRLBIe:(Q]6yeM@(_JtNXs)PK{fB1?Vl]`HN,@l{');
define('AUTH_SALT',        '?(@.|p]?7!O3r*!Mmm(gq<?_YmIT)a{x8uK~,N @84)I8}}dK*F;G.E++xbmhlJG');
define('SECURE_AUTH_SALT', '%G M?73+>#FjX2zcZ u%<H=VeU[fi3~)@qPu{NPd34l<*$pn^tX/}eg0Ms19kq?a');
define('LOGGED_IN_SALT',   'GAVxQG4jp2Ig~lqo2^P(#GE6G13xC9dU#aTEGBC<*vYmtPTXgP/;h.GFEFj,^lQ|');
define('NONCE_SALT',       'eRWE!VKKwuBgN4UA59J[gvqiu7;2r.w0:EZ1V&+zxFyt=}kR0/RDm>HZwDC:;dxO');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'hc_';

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
