<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Config\Config;
use Zend\Session\Container;
use Zend\Session\SessionManager;

class IndexController extends AbstractActionController
{
    protected $em;
    protected $provider;
    
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
    public function _checkAccess(){
        $container = new Container('access');
        if($container->offsetExists('user_profile')){
            return true;
        } else {
            return false;
        }
    }
    
    public function indexAction()
    {
        /*
         * $apiService = $this->getServiceLocator()->get('Application\Service\ApiService');
         *
        
        return new ViewModel(array(
            // 'data' => $this->getEntityManager()->getRepository('Application\Service\UserService')->findAll()
            'data' => $apiService->isValid($this->params('api-key'))
        ));
         * 
         */
        $config = $this->serviceLocator->get('config');
        $container = new Container('access');
        
        /** @var $entityService \my\Service\EntitynameService */
        $entityService = $this->getServiceLocator()->get('UserService');

        // A query that finds all stuff
        $allEntities = $entityService->findAll();

        // A query that finds an ID 
        $idEntity = $entityService->find(1);

        // A query that finds entities based on a Query
        $queryEntity = $entityService->findByQuery(function($queryBuilder){
            /** @var $queryBuilder\Doctrine\DBAL\Query\QueryBuilder */
            return $queryBuilder; 
        });
        
        $list = $entityService->getList();
        
        $this->layout()->setVariable('logout_url', '/users/index/logout');
        if($container->offsetExists('user_profile')){
            $this->layout()->setVariable('user_profile', $container->user_profile);
        }
        return new ViewModel(array(
            // 'data' => $this->getEntityManager()->getRepository('Application\Service\UserService')->findAll()
            'data'          => (array)$list,
            'accessible'    => $this->_checkAccess()
        ));
        
    }
    
    public function loginAction(){
        // Consumes the configuration array
        $config = $this->serviceLocator->get('config');
        $container = new Container('access');
        
        // Start OAuth2
        $this->provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId'                => $config['oauth_config']['client_id'],    // The client ID assigned to you by the provider
            'clientSecret'            => $config['oauth_config']['client_secret'],   // The client password assigned to you by the provider
            'redirectUri'             => 'http://aboitiz-dev.com/users/index/login',
            'urlAuthorize'            => $config['oauth_config']['auth_uri'],
            'urlAccessToken'          => $config['oauth_config']['token_uri'],
            'urlResourceOwnerDetails' => $config['oauth_config']['auth_provider_x509_cert_url']
        ]);

        // If we don't have an authorization code then get one
        $request = $this->getRequest();
        
        if (!isset($_GET['code'])) {

            // Fetch the authorization URL from the provider; this returns the
            // urlAuthorize option and generates and applies any necessary parameters
            // (e.g. state).
            $authorizationUrl = $this->provider->getAuthorizationUrl([
                'scope' => 'profile'
            ]);

            // Get the state generated for you and store it to the session.
            $_SESSION['oauth2state'] = $this->provider->getState();

            // Redirect the user to the authorization URL.
            header('Location: ' . $authorizationUrl);
            exit;

        // Check given state against previously stored one to mitigate CSRF attack
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

        unset($_SESSION['oauth2state']);
        exit('Invalid state');

        } else {

            try {

                // Try to get an access token using the authorization code grant.
                $accessToken = $this->provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);

                // We have an access token, which we may use in authenticated
                // requests against the service provider's API.
                /**
                 * echo $accessToken->getToken() . "\n";
                 * echo $accessToken->getRefreshToken() . "\n";
                 * echo $accessToken->getExpires() . "\n";
                 * echo ($accessToken->hasExpired() ? 'expired' : 'not expired') . "\n";
                **/

                // Using the access token, we may look up details about the
                // resource owner.
                $resourceOwner = $this->provider->getResourceOwner($accessToken);

                // var_export($resourceOwner->toArray());

                // The provider provides a way to get an authenticated API request for
                // the service, using the access token; it returns an object conforming
                // to Psr\Http\Message\RequestInterface.
                $request = $this->provider->getAuthenticatedRequest(
                    'GET',
                    'http://aboitiz-dev.local/users/index/login',
                    $accessToken
                );
                
                $userProfile = $this->getUserProfile($accessToken->getToken());
                $this->layout()->setVariable('user_profile', $userProfile);
                $this->layout()->setVariable('logout_url', $config['logout_url']);
                
                $container->offsetSet('user_profile', $userProfile);
                
                // End OAuth2
                /*
                 * return new ViewModel(array(
                 *
                 *   'access_token' => $userProfile
                 * ));
                 */

            } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

                // Failed to get the access token or user details.
                exit($e->getMessage());

            }

        }
        
    }
    
    public function getUserProfile($accessToken = null){
        // Consumes the configuration array
        $config = $this->serviceLocator->get('config');
        
        $userDetails = file_get_contents($config['request_user_info_url'] . $accessToken);
        $userData = json_decode($userDetails);

        if (!empty($userData)) {
          $googleUserId = '';
          $googleEmail = '';
          $googleVerified = '';
          $googleName = '';
          $googleUserName = '';

          if (isset($userData->id)) {
            $googleUserId = $userData->id;
          }
          if (isset($userData->email)) {
            $googleEmail = $userData->email;
            $googleEmailParts = explode("@", $googleEmail);
            $googleUserName = $googleEmailParts[0];
          }
          if (isset($userData->verified_email)) {
            $googleVerified = $userData->verified_email;
          }
          if (isset($userData->name)) {
            $googleName = $userData->name;
          }
          return $userData;
        } else {
          return false;
        }
    }
    
    public function logoutAction(){
        $config = $this->serviceLocator->get('config');
        
        $container = new Container('access');
        if($container->offsetExists('user_profile')){
            $container->offsetUnset('user_profile');
            $this->redirect()->toUrl($config['logout_url']);
        }
    }
}
