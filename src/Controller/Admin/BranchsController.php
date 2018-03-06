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



class  BranchsController  extends AppController
{
    
    
    public $components = ['Image'];
    
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('MasterBranchs');
        
        
    }
    
    
    public function index()
    {
        $this->viewBuilder()->layout("admin_temple");
        $branchs=$this->MasterBranchs->find('all')->toArray();
        // pr($scholarships);
        $this->set('branchs', $branchs);
        
    }
    
    public function add(){
        $this->viewBuilder()->layout('admin_temple');
        // $currentDate = date("Y-m-d h:i:s");
        $branchs = $this->MasterBranchs->newEntity();
        if ($this->request->is('post')) {
            //$date =  $this->request->data['crdt'];
            // $this->request->data['crdt'] = $date;
            $branchs = $this->MasterBranchs->patchEntity($branchs, $this->request->data);
            //pr($scholarships);exit;
            if ($this->MasterBranchs->save($branchs)) {
                $this->Flash->success(__('Your Branchs has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Branchs.'));
        }
        $this->set('branchs', $branchs);
        
    }
    
    
    
    public function edit($id=null){
        $this->viewBuilder()->layout('admin_temple');
        
        $branchs = $this->MasterBranchs->get($id);
         if ($this->request->is(['put','post'])) {
            // $currentDate = date("Y-m-d h:i:s");
            //$this->request->data['posted_date'] = $currentDate;
            
             $branchs = $this->MasterBranchs->patchEntity($branchs, $this->request->data);
             if ($this->MasterBranchs->save($branchs)) {
                $this->Flash->success(__('Your Branchs has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Branchs.'));
        }
        $this->set('branchs', $branchs);
        
    }
    
    
    
    public function view($id=null){
        $this->viewBuilder()->layout('admin_temple');
        $branchs=$this->MasterBranchs->get($id);
        //pr($articles);
        $this->set('branchs', $branchs);
        
    }
    
    public function delete($id){
        // $this->viewBuilder()->layout('top');
        
        //$this->request->allowMethod(['post', 'delete']);
        $branchs = $this->MasterBranchs->get($id);
        if ($this->MasterBranchs->delete($branchs)) {
            $this->Flash->success(__('The Branchs  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function disable($id=null)
    {
        $branchs=$this->MasterBranchs->get($id);
        $branchs->status=0;
        if($this->MasterBranchs->save($branchs)){
            $this->Flash->success(__('Your Branchs has been disable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function enable($id=null)
    {
        $branchs=$this->MasterBranchs->get($id);
        $branchs->status=1;
        if($this->MasterBranchs->save($branchs)){
            $this->Flash->success(__('Your Branchs been enable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    
    
}
