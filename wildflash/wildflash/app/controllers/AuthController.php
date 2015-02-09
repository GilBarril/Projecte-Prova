<?php

class AuthController extends Controller {
    public function connect_google($action='') {
        if ($action == "auth") {
		// process authentication
		try {
			Hybrid_Endpoint::process();
                        
		}
		catch (Exception $e) {
			// redirect back to http://URL/social/
			return Redirect::route('hybridauth');
		}
		return;
	}
	try {
            
            //fitxer on es crea la sessio de l'usuari.
                require_once('../app/config/getuser.php');
		$userProfile = $provider->getUserProfile();
	}
	catch(Exception $e) {
		// exception codes can be found on HybBridAuth's web site
		return $e->getMessage();
	}
	// access user profile data
	echo "Connected with: <b>{$provider->id}</b><br />";
	echo "As: <b>{$userProfile->displayName}</b><br />";
	echo "<pre>" . print_r( $userProfile, true ) . "</pre><br />";
        echo "<a href='logout/?pagina=".$pagina."'> Log Out </a>";
    }
    
    public function logout_google() {
        require_once('../app/config/getuser.php');
        $provider->logout();
        return Redirect::to('/');
    }
    
}
