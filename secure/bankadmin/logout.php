<?php

 require '../private/initialize.php';

$admin_session->admin_logout();

Main::redirect_to(Main::url_for('/bankadmin/login.php'));
