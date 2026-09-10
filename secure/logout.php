<?php

 require './private/initialize.php';

$session->logout();
unset($_SESSION['account_pin']);

Main::redirect_to(Main::url_for('/'));
