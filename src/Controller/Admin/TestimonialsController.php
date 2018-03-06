<?php

/*
 * Developer - santosh Kumar
 * Date : 25 jan, 2018
 * Project :siecindia
 * File Name : AuthorsController.php
 */

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Mailer\Email;



class  TestimonialsController  extends AppController
{
    
    
    public $components = ['Image'];
    
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Testimonials');
        $this->loadModel('Countries');
       
    }
    
    
    public function index()
    {
        
        $this->viewBuilder()->layout("admin_temple");
        $testimonials=$this->Testimonials->find('all')->toArray();
        $this->set('testimonials', $testimonials);
        
    }
    
    public function add(){
        $this->viewBuilder()->layout('admin_temple');
        
        $countries=$this->Countries->find('all')->toArray();
        $this->set('countries', $countries);
        // pr($authors);
        // $currentDate = date("Y-m-d h:i:s");
        $testimonials = $this->Testimonials->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/testimonials";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
            }
            //$date =  $this->request->data['crdt'];
            // $this->request->data['crdt'] = $date;
            
            $testimonials = $this->Testimonials->patchEntity($testimonials, $this->request->data);
            // pr($articles);exit;
            if ($this->Testimonials->save($testimonials)) {
                $this->Flash->success(__('Your Testimonials has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Testimonials.'));
        }
        $this->set('testimonials', $testimonials);
        
    }
    
    
    
    public function edit($id=null){
        $this->viewBuilder()->layout('admin_temple');
        
        $testimonials = $this->Testimonials->get($id);
        //pr($testimonials);
        
        $countries=$this->Countries->find('all')->toArray();
        $this->set('countries', $countries);
        
        if ($this->request->is(['put','post'])) {
            
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/testimonials";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
                //pr($this->request->data['blog_image']); exit;
            }else{
                $this->request->data['image'] =$testimonials['image'];
                // pr($blogs->blog_image); exit;
            }
            
            
            // $currentDate = date("Y-m-d h:i:s");
            //$this->request->data['posted_date'] = $currentDate;
            
            $testimonials = $this->Testimonials->patchEntity($testimonials, $this->request->data);
            if ($this->Testimonials->save($testimonials)) {
                $this->Flash->success(__('Your Testimonials has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Testimonials.'));
        }
        $this->set('testimonials', $testimonials);
        
    }
    
    
    
    public function view($id=null){
        $this->viewBuilder()->layout('admin_temple');
        $testimonials=$this->Testimonials->get($id,['contain' => ['Countries']]);
      //  pr($testimonials);
        $this->set('testimonials', $testimonials);
        
    }
    
    public function delete($id){
        // $this->viewBuilder()->layout('top');
        
        //$this->request->allowMethod(['post', 'delete']);
        $testimonials = $this->Testimonials->get($id);
        if ($this->Testimonials->delete($testimonials)) {
            $this->Flash->success(__('The Testimonials  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function disable($id=null)
    {
        $testimonials=$this->Testimonials->get($id);
        $testimonials->status=0;
        if($this->Testimonials->save($testimonials)){
            $this->Flash->success(__('Your Testimonials has been disable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function enable($id=null)
    {
        $testimonials=$this->Testimonials->get($id);
        $testimonials->status=1;
        if($this->Testimonials->save($testimonials)){
            $this->Flash->success(__('Your  Testimonials been enable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    
    
   
    
}
