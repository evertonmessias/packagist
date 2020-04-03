<?php

include 'api/rest.php';

if (isset($_REQUEST)) {
	echo Rest::open($_REQUEST);
}