<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

if (file_exists('/var/home/derm-specialists/derm-specialists.com/www/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", '/var/home/derm-specialists/derm-specialists.com/www/wp-content/wflogs/');
	include_once '/var/home/derm-specialists/derm-specialists.com/www/wp-content/plugins/wordfence/waf/bootstrap.php';
}
?>