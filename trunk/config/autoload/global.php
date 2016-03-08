<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    // ...
    'oauth_config' => array(
        'client_id'                     => '1091924398121-3vbq8ub9jb781uedmlfds2vmp204oqg7.apps.googleusercontent.com',
        'project_id'                    => 'dev---aboitiz',
        'auth_uri'                      => 'https://accounts.google.com/o/oauth2/auth',
        'token_uri'                     => 'https://accounts.google.com/o/oauth2/token',
        'auth_provider_x509_cert_url'   => 'https://www.googleapis.com/oauth2/v1/certs',
        'client_secret'                 => 'L7N17e_Vge8ihF-X83Fu1NUP'
    ),
    'request_user_info_url'             => 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=',
    'logout_url'                        => 'https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://aboitiz-dev.com/users'
    
);
