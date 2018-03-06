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



class  ScholarshipsController  extends AppController
{
    
    
    //public $components = ['Image'];
    
    public $components = ['Paginator'];
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Scholarships');
        $this->loadModel('Authors');
        
        
    }
    
    
    public function index()
    {
        $this->viewBuilder()->layout("frontend");
        $condition='';
        if(!empty($this->request->data('title') )){
            $condition['Scholarships.title like '] = '%'.$this->request->data['title'].'%' ;
            $this->set('job_location',$this->request->data['title']);
        }
        
       // $search=
        $scholarships=$this->Scholarships->find('all',['conditions' => $condition])->toArray();
        //$allJob =	$this->Paginator->paginate($this->Scholarships, ['limit' => 5,'conditions' => $condition])->toArray();
       // $this->set('findjob', $allJob); 
       // pr($scholarships); 
        $this->set('scholarships', $scholarships);
        
    }
    
    public function add(){
        $this->viewBuilder()->layout('frontend');
        
       $scholars=$this->Authors->find('all')->toArray();
        $this->set('authors', $scholars);
        // $currentDate = date("Y-m-d h:i:s");
        $scholarships = $this->Scholarships->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/scholarships";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
            }
            //$date =  $this->request->data['crdt'];
            // $this->request->data['crdt'] = $date;
            
            $scholarships = $this->Scholarships->patchEntity($scholarships, $this->request->data);
             //pr($scholarships);exit;
             if ($this->Scholarships->save($scholarships)) {
                $this->Flash->success(__('Your Scholarships has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Scholarships.'));
        }
        $this->set('scholarships', $scholarships);
        
    }
    
    
    
    public function edit($id=null){
        $this->viewBuilder()->layout('frontend');
        
        $scholarships = $this->Scholarships->get($id);
        
        $authors=$this->Authors->find('all')->toArray();
        
        $this->set('authorname', $authors);
        // pr($blogs); exit;
        if ($this->request->is(['put','post'])) {
            
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/scholarships";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
                //pr($this->request->data['blog_image']); exit;
            }else{
                $this->request->data['image'] =$scholarships['image'];
                // pr($blogs->blog_image); exit;
            }
            
            
            // $currentDate = date("Y-m-d h:i:s");
            //$this->request->data['posted_date'] = $currentDate;
            
            $scholarships = $this->Scholarships->patchEntity($scholarships, $this->request->data);
            if ($this->Scholarships->save($scholarships)) {
                $this->Flash->success(__('Your Scholarships has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Scholarships.'));
        }
        $this->set('scholarships', $scholarships);
        
    }
    
    
    
    public function view($id=null){
        $this->viewBuilder()->layout('frontend');
        $authors=$this->Scholarships->get($id);
        //pr($articles);
        $this->set('authors', $authors);
        
    }
    
    public function delete($id){
        // $this->viewBuilder()->layout('top');
        
        //$this->request->allowMethod(['post', 'delete']);
        $scholarships = $this->Scholarships->get($id);
        if ($this->Scholarships->delete($scholarships)) {
            $this->Flash->success(__('The Scholarships  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function disable($id=null)
    {
        $scholarships=$this->Scholarships->get($id);
        $scholarships->status=0;
        if($this->Scholarships->save($scholarships)){
            $this->Flash->success(__('Your Scholarships has been disable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function enable($id=null)
    {
        $scholarships=$this->Scholarships->get($id);
        $scholarships->status=1;
        if($this->Scholarships->save($scholarships)){
            $this->Flash->success(__('Your  Scholarships been enable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    
    
}
