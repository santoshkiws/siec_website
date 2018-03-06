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
use Cake\Core\Configure;
use Cake\Mailer\Email;



class  BlogsController  extends AppController
{
    
   
    public $components = ['Image'];	
   
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Blogs');
        
    }
    
    
    public function index()
    {
        
        $this->viewBuilder()->layout("admin_temple");
        $blogs=$this->Blogs->find('all')->toArray();
		$this->set('blogs', $blogs);
       
    }
    
    public function add(){
        $this->viewBuilder()->layout('admin_temple');
       
       // $currentDate = date("Y-m-d h:i:s");
        $blogs = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['blog_image']['name'])){
                $directorypath  ="img/blogs";
                $image = $this->Image->uploadimage($this->request->data['blog_image'],$directorypath);
                 // pr($image); exit;
                $this->request->data['blog_image'] = $image;
            }
            //$date =  $this->request->data['crdt'];
            // $this->request->data['crdt'] = $date;
            
            $blogs = $this->Blogs->patchEntity($blogs, $this->request->data);
            // pr($articles);exit;
            if ($this->Blogs->save($blogs)) {
                $this->Flash->success(__('Your Blogs has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Blogs.'));
        }
        $this->set('blogs', $blogs);
        
    }
    
    
    
    public function edit($blog_id=null){
        $this->viewBuilder()->layout('admin_temple');
        
        $blogs = $this->Blogs->get($blog_id);
       // pr($blogs); exit;
        if ($this->request->is(['put','post'])) {
            
            if (!empty($this->request->data['blog_image']['name'])){
                $directorypath  ="img/blogs";
                $image = $this->Image->uploadimage($this->request->data['blog_image'],$directorypath);
                // pr($image); exit;
                $this->request->data['blog_image'] = $image;
                 //pr($this->request->data['blog_image']); exit;
            }else{
                $this->request->data['blog_image'] =$blogs['blog_image'];
               // pr($blogs->blog_image); exit;
            }
            
           
           // $currentDate = date("Y-m-d h:i:s");
            //$this->request->data['posted_date'] = $currentDate;
            
            $blogs = $this->Blogs->patchEntity($blogs, $this->request->data);
            if ($this->Blogs->save($blogs)) {
                $this->Flash->success(__('Your Blogs has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Articles.'));
        }
        $this->set('blogs', $blogs);
        
    }
    
    
   
    public function view($id=null){
        $this->viewBuilder()->layout('admin_temple');
        $blogs=$this->Blogs->get($id);
        //pr($articles);
        $this->set('blogs', $blogs);
        
    }
    
    public function delete($id){
        // $this->viewBuilder()->layout('top');
        
        //$this->request->allowMethod(['post', 'delete']);
        $blogs = $this->Blogs->get($id);
        if ($this->Blogs->delete($blogs)) {
            $this->Flash->success(__('The blog  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function disable($id=null)
    {
        $blogs=$this->Blogs->get($id);
        $blogs->status=0;
        if($this->Blogs->save($blogs)){
            $this->Flash->success(__('Your Blogs has been disable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function enable($id=null)
    {
        $blogs=$this->Blogs->get($id);
        $blogs->status=1;
        if($this->Blogs->save($blogs)){
            $this->Flash->success(__('Your Feed Blogs been enable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
 
       
}
