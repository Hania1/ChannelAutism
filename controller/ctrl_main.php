<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 date_default_timezone_set ("Europe/London");
require_once ('controller/ctrl_login.php');


?>