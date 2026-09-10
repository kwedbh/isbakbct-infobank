<?php 

require_once '../../private/initialize.php'; 
Main::require_login_admin();
	Main::redirect_to(Main::url_for("/site/edit.php?id=".Main::h("1")));	
?>