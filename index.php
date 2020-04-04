<?php
namespace api;
include './vendor/autoload.php';

if (isset($_REQUEST)) {
	echo Rest::open($_REQUEST);
}