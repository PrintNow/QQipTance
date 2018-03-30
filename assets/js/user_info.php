<?php
date_default_timezone_set('Asia/Shanghai');
include_once(dirname(dirname(dirname(__FILE__)))."/library/functions.php");
?>
var client_ip = '<?php echo get_client_ip(); ?>';
var share_time = '<?php echo time(); ?>';
