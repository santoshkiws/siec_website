<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ]
        ]);
        
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        
        
        if (!empty( $this->Auth->user())) {
            
            $user =$this->Auth->user();
            
            $this->set('loggedUser', $user);
            
        }
        
        
        /*   require_once(ROOT . '/vendor/fb/autoload.php');
        
        
        
        $fb = new \Facebook\Facebook([
        'app_id' => '1621263234629479',
        'app_secret' => 'b02a970c8b994de517dfcc8e9f0d4d44',
        'default_graph_version' => 'v2.10',
        //'default_access_token' => '{access-token}', // optional
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $login_url= $helper->getLoginUrl("http://localhost/fb-login/");
        //print_r($login_url);
        try{
        $accessToken=$helper->getAccessToken();
        if(isset($accessToken)){
        $_SESSION['access-token']=(string)$accessToken;
        header("Location:index.php");
        }
        }catch(Exception $exc){
        echo $exc->getTraceAsString();
        
        }
        
        if(isset($_SESSION['access-token'])){
        try{
        $fb->setDefaultAccessToken($_SESSION['access-token']);
        $res=$fb->get('/me?locale=en_US&fields=name,email');
        $user=$res->getGraphUser();
        echo $user->getField('name');
        }catch(Exception $exc){
        echo $exc->getTraceAsString();
        }
        
        }*/
        
    }
}
