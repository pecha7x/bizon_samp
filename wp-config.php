<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'site1');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '1йфя!ЙФЯ');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '7%J{+GWf8+HQOchkg4;4Ho(~^b7LVF_+y@u.z6+|Yxs>&F-+Fay;,u>!6Ki-PJ$-');
define('SECURE_AUTH_KEY',  '-*R(crk*nzsh9Ha)s@v$0|n|D?ew`E!+?jow~Bx`x[Kp-%$Qr6[5Acq;R(|(1[k8');
define('LOGGED_IN_KEY',    'd$QtU#g=h{ZIuQa2:,lav}u1k1u1{XAh;u;[L/4=bITd6! T.iWw(y*#|^-O<!WZ');
define('NONCE_KEY',        'X],|<kT322lWmX`(U| W[`5}:--Ky-/qP)yPtqQ%:tQ: g}qX_;3O]G|7s>MJ`@N');
define('AUTH_SALT',        'g|G. -WNv9kb.!)UF->L<(+],!hE-eA;|s%f<p|i8W/UBQnNXA/2>_^qO3%z!?K+');
define('SECURE_AUTH_SALT', '/k9n:R=Yl]5;KfH=*g+Zu!+Yw%y?-N`n;Z83ee8WP?Z/|_?vI-.Tp#WTCx;uzv6V');
define('LOGGED_IN_SALT',   ',yPpk}BtI+wvhA,ohUyc3;|oX/&4vDdU:mxR$x,-(Rp4He4eL+&< ?a[7X6k[C?z');
define('NONCE_SALT',       '0!P?q{[.iC>dH!i U/A)$cg^Qa`>:g}lnofOT4/(~96)NS,7QwT~GyscW&gB<^_y');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp1_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', true);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
if (!session_id()) { session_start(); }