<?php 

/*
----folder config/fortify.php 

#for modifie anything in page profile
 'features' => [
        Features::registration(),
        Features::resetPasswords(),
        // Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication([
            'confirm' => true,
            'confirmPassword' => true,
            // 'window' => 0,
        ]),
    ],



~#02::for afficher page profile 
-->config/jetstream.php 

'features' => [
        // Features::termsAndPrivacyPolicy(),
        Features::profilePhotos(),
        // Features::api(),
        // Features::teams(['invitations' => true]),
        Features::accountDeletion(),
    ],


#03::cmd(php artisan storage:link)(because the problme if i upload img not can i show it)
-----------------------------------------------
#04:go to public/storage/profile-photos/you find image profile


#05:go to .env (add)
APP_URL=http://127.0.0.1:8000/

#06:redimaer server (success show img profile)
*/

?>