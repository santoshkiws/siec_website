<?php

/*
 * Developer - Bhupendra yadav
 * Date : 8 Feb, 2018
 * Project :tdatc
 * File Name : LoginController.php
 */

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Mailer\Email;



class  EventsController  extends AppController
{
    
   
    public $components = ['Image'];	
   
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('Events');
        
    }
    
    
    public function index()
    {
        
        $this->viewBuilder()->layout("admin_temple");
        $events=$this->Events->find('all')->toArray();
        
		$this->set('events', $events);
       
    }
    
    public function add(){
        $this->viewBuilder()->layout('admin_temple');
       
       // $currentDate = date("Y-m-d h:i:s");
        $events = $this->Events->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/events";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                 // pr($image); exit;
                $this->request->data['image'] = $image;
            }
            //$date =  $this->request->data['crdt'];
            // $this->request->data['crdt'] = $date;
            
            $events = $this->Events->patchEntity($events, $this->request->data);
            // pr($articles);exit;
            if ($this->Events->save($events)) {
                $this->Flash->success(__('Your Events has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Events.'));
        }
        $this->set('events', $events);
        
    }
    
    
    
    public function edit($id=null){
        $this->viewBuilder()->layout('admin_temple');
        
        $events = $this->Events->get($id);
       // pr($events); exit;
        if ($this->request->is(['put','post'])) {
            
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/events";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
                 //pr($this->request->data['image']); exit;
            }else{
                $this->request->data['image'] =$events['image'];
               // pr($events->image); exit;
            }
            
           
           // $currentDate = date("Y-m-d h:i:s");
            //$this->request->data['posted_date'] = $currentDate;
            
            $events = $this->Events->patchEntity($events, $this->request->data);
            if ($this->Events->save($events)) {
                $this->Flash->success(__('Your Events has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Articles.'));
        }
        $this->set('events', $events);
        
    }
    
    
   
    public function view($id=null){
        $this->viewBuilder()->layout('admin_temple');
        $events=$this->Events->get($id);
        //pr($articles);
        $this->set('events', $events);
        
    }
    
    public function delete($id){
        // $this->viewBuilder()->layout('top');
        
        //$this->request->allowMethod(['post', 'delete']);
        $events = $this->Events->get($id);
        //pr($events); exit();
        if ($this->Events->delete($events)) {
            $this->Flash->success(__('The event  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function disable($id=null)
    {
        $events=$this->Events->get($id);
        $events->status=0;
        if($this->Events->save($events)){
            $this->Flash->success(__('Your Events has been disable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function enable($id=null)
    {
        $events=$this->Events->get($id);
        $events->status=1;
        if($this->Events->save($events)){
            $this->Flash->success(__('Your Feed Events been enable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
 
       
}
