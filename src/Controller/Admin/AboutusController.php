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



class  AboutusController  extends AppController
{
    
    
    public $components = ['Image'];
    
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('MissionVisions');
        $this->loadModel('Authors'); 
        $this->loadModel('OurServices');
        
    }
    
    
    public function index()
    {
        
        $this->viewBuilder()->layout("admin_temple");
        $aboutus=$this->MissionVisions->find('all')->toArray();
       // pr($aboutus); exit;
        $this->set('aboutus', $aboutus);
        
    }
    
    public function add(){
        $this->viewBuilder()->layout('admin_temple');
        
        $authors=$this->Authors->find('all')->toArray();
        
        $this->set('authorname', $authors);
       // pr($authors);
        // $currentDate = date("Y-m-d h:i:s");
        $missionvisions = $this->MissionVisions->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['imgaes']['name'])){
                $directorypath  ="img/aboutus";
                $image = $this->Image->uploadimage($this->request->data['imgaes'],$directorypath);
                // pr($image); exit;
                $this->request->data['imgaes'] = $image;
            }
            //$date =  $this->request->data['crdt'];
            // $this->request->data['crdt'] = $date;
            
            $missionvisions = $this->MissionVisions->patchEntity($missionvisions, $this->request->data);
            // pr($articles);exit;
            if ($this->MissionVisions->save($missionvisions)) {
                $this->Flash->success(__('Your Authors has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Aauthors.'));
        }
        $this->set('authors', $missionvisions);
        
    }
    
    
    
    public function edit($id=null){
        $this->viewBuilder()->layout('admin_temple');
        
        $missionvisions = $this->MissionVisions->get($id);
        
        $authors=$this->Authors->find('all')->toArray();
        
        $this->set('authorname', $authors);
        // pr($blogs); exit;
        if ($this->request->is(['put','post'])) {
            
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/aboutus";
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
            
            $missionvisions = $this->MissionVisions->patchEntity($missionvisions, $this->request->data);
            if ($this->MissionVisions->save($missionvisions)) {
                $this->Flash->success(__('Your Authors has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Authors.'));
        }
        $this->set('authors', $missionvisions);
        
    }
    
    
    
    public function view($id=null){
        $this->viewBuilder()->layout('admin_temple');
        $authors=$this->MissionVisions->get($id);
        //pr($articles);
        $this->set('authors', $authors);
        
    }
    
    public function delete($id){
        // $this->viewBuilder()->layout('top');
        
        //$this->request->allowMethod(['post', 'delete']);
        $authors = $this->MissionVisions->get($id);
        if ($this->MissionVisions->delete($authors)) {
            $this->Flash->success(__('The MissionVisions  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function disable($id=null)
    {
        $authors=$this->MissionVisions->get($id);
        $authors->status=0;
        if($this->MissionVisions->save($authors)){
            $this->Flash->success(__('Your MissionVisions has been disable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function enable($id=null)
    {
        $authors=$this->MissionVisions->get($id);
        $authors->status=1;
        if($this->MissionVisions->save($authors)){
            $this->Flash->success(__('Your  MissionVisions been enable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    
    public function serviceindex()
    {
        $this->viewBuilder()->layout('admin_temple');
        $ourservices=$this->OurServices->find('all')->toArray();
        $this->set('ourservices', $ourservices);
    }
    
    public function serviceadd()
    {
        $this->viewBuilder()->layout('admin_temple');
        $ourservices = $this->OurServices->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/aboutus";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
            }
            //$date =  $this->request->data['crdt'];
            // $this->request->data['crdt'] = $date;
            
            $ourservices = $this->OurServices->patchEntity($ourservices, $this->request->data);
            // pr($articles);exit;
            if ($this->OurServices->save($ourservices)) {
                $this->Flash->success(__('Your OurServices has been saved.'));
                return $this->redirect(['action' =>'serviceindex']);
            }
            $this->Flash->error(__('Unable to add your OurServices.'));
        }
        $this->set('ourservices', $ourservices);
    }
    
    public function serviceedit($id=null)
    {
        $this->viewBuilder()->layout('admin_temple');
        
        $ourservices = $this->OurServices->get($id);
        
      
        if ($this->request->is(['put','post'])) {
            
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/aboutus";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
                //pr($this->request->data['image']); exit;
            }else{
                $this->request->data['image'] =$ourservices['image'];
                // pr($blogs->blog_image); exit;
            }
            
            
            // $currentDate = date("Y-m-d h:i:s");
            //$this->request->data['posted_date'] = $currentDate;
            
            $ourservices = $this->OurServices->patchEntity($ourservices, $this->request->data);
            if ($this->OurServices->save($ourservices)) {
                $this->Flash->success(__('Your OurServices has been update.'));
                return $this->redirect(['action' => 'serviceindex']);
            }
            $this->Flash->error(__('Unable to update your OurServices.'));
        }
        $this->set('ourservices', $ourservices);
    }
    
    
    public function serviceview($id=null)
    {
        $this->viewBuilder()->layout('admin_temple');
    }
    
    
    public function servicedelete($id=null)
    {
       
        
        $authors = $this->OurServices->get($id);
        if ($this->OurServices->delete($authors)) {
            $this->Flash->success(__('The OurServices  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'serviceindex']);
        }
    }
    
    public function servicedisable($id=null)
    {
        $authors=$this->OurServices->get($id);
        $authors->status=0;
        if($this->OurServices->save($authors)){
            $this->Flash->success(__('Your OurServices has been disable.'));
            return $this->redirect(['action' => 'serviceindex']);
        }
    }
    
    public function serviceenable($id=null)
    {
        $authors=$this->OurServices->get($id);
        $authors->status=1;
        if($this->OurServices->save($authors)){
            $this->Flash->success(__('Your  OurServices been enable.'));
            return $this->redirect(['action' => 'serviceindex']);
        }
    }
}
