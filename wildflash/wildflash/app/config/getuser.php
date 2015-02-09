<?php
//busca el parametre que especifica a quina pagina ens volem conectar
$pagina = Input::get('pagina');
// create a HybridAuth object
$socialAuth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');
// authenticate with Google
$provider = $socialAuth->authenticate($pagina);
// fetch user profile