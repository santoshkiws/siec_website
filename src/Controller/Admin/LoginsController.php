<?php

/*
 * Developer - Amit Kumar
 * Date : 24 Mar, 2017
 * Project :tdatc
 * File Name : LoginController.php
 */

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;


class LoginsController  extends AppController
{
    
   
    public $components = ['Image'];	
   
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','logOut','forgotpassword','register']);
        $this->loadModel('Users');
      
        
    }
    
    
    public function index()
    {
        
        $this->viewBuilder()->layout("login");
		 if ($this->Auth->user())
          {
            $this->redirect(array('controller'=>'dashboards','action' => 'index')); 
          }
		   
        if ($this->request->is('post')) {
            //pr($this->request->data);
            $user = $this->Auth->identify();
            
           // pr($user);die;
            if ($user) {
                //pr($user);die;
                $this->Auth->setUser($user);
                //return $this->redirect($this->Auth->redirectUrl());
                
                if ($this->Auth->user('users_type') == 1) {
                    return $this->redirect('/admin/logins/dashboard');
                }
                
               
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    
    
    public function register(){
        $this->viewBuilder()->layout("register");
        $date = date_default_timezone_set('Asia/Kolkata');
        $today=date('Y-m-d H:i:s');
        $user = $this->Users->newEntity();
        if ($this->request->is(['post','put'])) {
            
            $checkuser=$this->Users->find('all', [
                'conditions' => ['Users.email' => $this->request->data['email']]]);
            // pr($checkuser); exit;
            $number = $checkuser->count();
            if(empty($number)){
                $userdata =$this->request->data;
                $savedata=array(
                    'username'=>$userdata['username'],
                    'email'=>$userdata['email'],
                    'password'=>$userdata['password'],
                    'mobile'=>$userdata['mobile'],
                    'crdt'=>$today,
                    'users_type'=>1,
                    'status'=>1
                );
                
                $user = $this->Users->patchEntity($user, $savedata);
                
                if ($this->Users->save($user)) {
                   // pr($user); exit;
                    /* $alphabet = "1234567890";
                     $activekey = array(); //remember to declare $pass as an array
                     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                     for ($i = 0; $i < 4; $i++) {
                     $n = rand(0, $alphaLength);
                     $activekey[] = $alphabet[$n];
                     }
                     $activekey=implode($activekey);
                     
                     $user->user_activation =$activekey;
                     $ankerkey = BASE_URL."locum/home/verification/".base64_encode($user->id);
                     $Message = '<p>Dear '.$user['username'].',</p>';
                     $Message.= '<p>You are successfully register. </p>';
                     $Message.= '<p>
                     Please click below link and verify with given Activation key.</p>';
                     $Message.="<table>
                     <tr><td>Username:</td><td>".$user['username']."</td><tr><td>Activation key :</td><td>".
                     $activekey."</td></tr>
                     <tr><td>To verification:</td>
                     <td><a href=".$ankerkey." >Click here</a></td></tr>
                     </table>";
                     $email = new Email('default');
                     $email->emailFormat('html')
                     //->from(['Locum@gmail.com' => 'Locum'])
                     ->from(['info@locum.com' => 'Locum'])
                     ->to($this->request->data['email'])
                     ->subject('Verify email')
                     ->send($Message);*/
                    $this->Flash->adminregister(__('You are successfully signup'));
                    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your post.'));
            }else{
                $this->Flash->prifile(__('Your Email id already exits'));
            }
            
            
        }
        $this->set('user', $user);
    }
    
        public function logout()
        {
            // return $this->redirect($this->Auth->logout());
            $this->Auth->logout();
            return $this->redirect(['action' => 'index']);
            //$this->redirect(BASE_URL);
        }
   
    
    public function  profile(){
        $this->viewBuilder()->layout("admin_temple");
        $admin=$this->Auth->user();
        $user_id=$admin['id'];
        $user=$this->Users->get($user_id);
        if($this->request->is('post')){
        $user->username=$this->request->data['username'];
        $user->email=$this->request->data['email'];
        $user->first_name=$this->request->data['first_name'];
        $user->last_name=$this->request->data['last_name'];
        
        
        if(!empty($this->request->data['old_password'])){
         $oldp= $this->request->data['old_password'];
         $hasher = new DefaultPasswordHasher();
         //pr($hasher->check($oldp));exit;
        $newp =$this->request->data['new_password'];
        if($hasher->check($oldp,$user->password)){
            $user->password= $newp;
        }else{
            $this->Flash->error(__('Old password not match in database'));
            return $this->redirect('/admin/logins/profile');
        }
        }
        
        if (!empty($this->request->data['user_image']['name'])){
            $directorypath  ="img/admin";
            $image = $this->Image->uploadimage($this->request->data['user_image'],$directorypath);
            // pr($image);
            $user->user_image = $image;
        }else{
            $user->user_image=$user['user_image'];
        }
        
        $user->status=1;
      //  pr($user);exit;
        if($this->Users->save($user)){
            $this->Flash->success(__('Your profile has been update.'));
            return $this->redirect('/admin/logins/dashboard');
         }
        }
        $this->set('user', $user);
        $userInfonew = $this->Users->get($user_id);   
        $this->Auth->setUser($userInfonew);
       // pr($user);*/
    }
    
    public function forgotpassword(){
    $this->viewBuilder()->layout("forgotpassword");

    
      if($this->request->is('post') || $this->request->is('put'))
        {
            $this->request->data['email'];
            $query = $this->Users->find('all',['conditions'=>['And'=>['email'=>$this->request->data['email'],'status'=>1]]]);
            $number = $query->count();
            $user = $query->first();
           
            
            if($number >0)
            {
                $user = $this->Users->get($user['id']);
               
                /*generate password*/
               $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 8; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                $pass=implode($pass);
                
                $user->password =$pass;
              //  pr($user);exit;
                /*End generate password*/
                if( $this->Users->save($user))
                {
                    $Message="<table>
        <tr><td>Username:</td><td>".$this->request->data['email']."</td><tr><td>Password :</td><td>".
        $pass."</td></tr>
        </table>";
      // pr($Message); exit;
            $email = new Email('default');
           // pr( $email);exit;
            
            $email->emailFormat('html')
            ->from(['siec@siecindia.com' => 'siec'])
            ->to($this->request->data['email'])
            ->subject('Forgot password mail')
            ->send($Message);
             $this->Flash->success(__('Password has been sent'));
              return $this->redirect('/admin');
                }
                else
                {
                    
                    $this->Flash->error(__('Some problem Password updated'));
                    
                }
                
            }
            else
            {
                
                $this->Flash->error(__('E-mail id is not registered'));
            }
        }  

    }
   
    public function dashboard(){
        $this->viewBuilder()->layout("admin_temple");
    }
    
    
    
}
