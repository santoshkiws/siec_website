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



class  AuthorsController  extends AppController
{
    
   
    public $components = ['Image'];	
   
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Authors');
        
        
    }
    
    
    public function index()
    {
        
        $this->viewBuilder()->layout("admin_temple");
        $authors=$this->Authors->find('all')->toArray();
        $this->set('authors', $authors);
       
    }
    
    public function add(){
        $this->viewBuilder()->layout('admin_temple');
       
       // $currentDate = date("Y-m-d h:i:s");
        $authors = $this->Authors->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/authors";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                 // pr($image); exit;
                $this->request->data['image'] = $image;
            }
            //$date =  $this->request->data['crdt'];
            // $this->request->data['crdt'] = $date;
            
            $authors = $this->Authors->patchEntity($authors, $this->request->data);
            // pr($articles);exit;
            if ($this->Authors->save($authors)) {
                $this->Flash->success(__('Your Authors has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Aauthors.'));
        }
        $this->set('authors', $authors);
        
    }
    
    
    
    public function edit($id=null){
        $this->viewBuilder()->layout('admin_temple');
        
        $authors = $this->Authors->get($id);
       // pr($blogs); exit;
        if ($this->request->is(['put','post'])) {
            
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/authors";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
                 //pr($this->request->data['blog_image']); exit;
            }else{
                $this->request->data['image'] =$authors['image'];
               // pr($blogs->blog_image); exit;
            }
            
           
           // $currentDate = date("Y-m-d h:i:s");
            //$this->request->data['posted_date'] = $currentDate;
            
            $authors = $this->Authors->patchEntity($authors, $this->request->data);
            if ($this->Authors->save($authors)) {
                $this->Flash->success(__('Your Authors has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Authors.'));
        }
        $this->set('authors', $authors);
        
    }
    
    
   
    public function view($id=null){
        $this->viewBuilder()->layout('admin_temple');
        $authors=$this->Authors->get($id);
        //pr($articles);
        $this->set('authors', $authors);
        
    }
    
    public function delete($id){
        // $this->viewBuilder()->layout('top');
        
        //$this->request->allowMethod(['post', 'delete']);
        $authors = $this->Authors->get($id);
        if ($this->Authors->delete($authors)) {
            $this->Flash->success(__('The Authors  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function disable($id=null)
    {
        $authors=$this->Authors->get($id);
        $authors->status=0;
        if($this->Authors->save($authors)){
            $this->Flash->success(__('Your Authors has been disable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function enable($id=null)
    {
        $authors=$this->Authors->get($id);
        $authors->status=1;
        if($this->Authors->save($authors)){
            $this->Flash->success(__('Your  Authors been enable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
 
       
}
