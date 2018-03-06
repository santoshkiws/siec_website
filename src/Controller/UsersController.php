<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
//use PhpParser\Node\Expr\Cast\String_;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

   
    public $components = ['Captcha'];	
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','add','userlogin','uregistration']);
        $this->loadModel('Users');
        $this->loadModel('MasterBranchs');
       
        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('homepage');
        /*$users = $this->paginate($this->Users);

        $this->set(compact('users'));*/
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    public  function userlogin(){
        
    }
    
    public function uregistration(){
       // $this->viewBuilder()->setLayout(false);
       // $this->autoRender = false;
      
        $masterbranchs=$this->MasterBranchs->find('all')->toArray();
        $this->set('masterbranchs', $masterbranchs);
       
        
        $captcha=  $this->Captcha->getCaptcha();
        $string=implode("", $captcha);
        //$session = $this->request->session();
         //$and=  $session->write('name', 'Virat Gandhi');
      //   $session->write('string',$string);
         
         $user = $this->Users->newEntity();
         if ($this->request->is('post')) {
             
             $checkuser=$this->Users->find('all', [
                 'conditions' => ['Users.email' => $this->request->data['email']]]);
             // pr($checkuser); exit;
             $number = $checkuser->count();
             if(empty($number)){
                 $user = $this->Users->patchEntity($user,$this->request->data);
             
             if ($this->Users->save($user)) {
              //   pr($user->id); exit;
                 $this->Flash->success(__('The user has been saved.'));
                 return $this->redirect(['action' => 'index']);
             }
             $this->Flash->error(__('The user could not be saved. Please, try again.'));
             }else{
                 $this->Flash->error(__('Your email id is all ready exits.'));
             }
         }
        
       $this->set(compact('string','user'));
       // pr($string); 
        // debug($session);
        
        
    }
    
  /*  public function check()
    {
        $session = $this->request->session();
       // pr($session->read('string')); 
       // debug($this->request->data['captha']);
        //$this->Session->setFlash('Incurrect captha');
       /* if(!empty($this->request->data['captha'])){
            //varification
             if($this->request->data['captha']==$session->read('string')){
                 $this->Flash->success('currect');
             }else{
                 $this->Flash->error('Incurrect captha');
             }
             $this->redirect(array('action'=>'uregistration'));
        }else{
            $this->redirect(array('action'=>'uregistration'));
        }*/
        
     /*   $users = $this->Users->newEntity();
        //Entity is a set of one record of table and their relational table, on that you can perform operation without touch of database and encapsulate property of entity (fields of table) as you want.
        
        if ($this->request->is('post')) {
           // pr($this->request->data); die();
            if(!empty($this->request->data['captha'])){
                if($this->request->data['captha']==$session->read('string')){
                    $this->request->data['captha']=$this->request->data['captha'];
                    $users = $this->Users->patchEntity($users, $this->request->data);
                 //   pr($users); exit;
                    if ($this->Users->save($users)) {
                       // pr($users); exit;
                        $this->Flash->success(__('Your Users has been saved.'));
                        return $this->redirect(['Controller'=>'Users','action' => 'index']);
                    }
                }else{
                    $this->Flash->error('Incurrect captha'); 
                    return $this->redirect(['action' => 'uregistration']);
                }
            }
            $this->Flash->error(__('Unable to add your Users.'));
        }
        $this->set('users', $users);
       // $this->autoRender = false;
    }*/
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
           // pr($user); exit;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
