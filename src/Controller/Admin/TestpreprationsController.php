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



class TestpreprationsController  extends AppController
{
    
    
    public $components = ['Image'];
    
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel('TestPreprations');
        
        
    }
    
    
    public function index()
    {
        $this->viewBuilder()->layout("admin_temple");
        $testpreprations=$this->TestPreprations->find('all')->toArray();
        // pr($scholarships);
        $this->set('testpreprations', $testpreprations);
        
    }
    
    public function add(){
        $this->viewBuilder()->layout('admin_temple');
        // $currentDate = date("Y-m-d h:i:s");
        $testpreprations = $this->TestPreprations->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image']['name'])){
                $directorypath  ="img/testpreprations";
                $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                // pr($image); exit;
                $this->request->data['image'] = $image;
            }
            $testpreprations = $this->TestPreprations->patchEntity($testpreprations, $this->request->data);
            //pr($scholarships);exit;
            if ($this->TestPreprations->save($testpreprations)) {
                $this->Flash->success(__('Your Testpreprations has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your Branchs.'));
        }
        $this->set('testpreprations', $testpreprations);
        
    }
    
    
    
    public function edit($id=null){
        $this->viewBuilder()->layout('admin_temple');
        
        $testpreprations = $this->TestPreprations->get($id);
         if ($this->request->is(['put','post'])) {
             
             if (!empty($this->request->data['image']['name'])){
                 $directorypath  ="img/testpreprations";
                 $image = $this->Image->uploadimage($this->request->data['image'],$directorypath);
                 // pr($image); exit;
                 $this->request->data['image'] = $image;
             }else{
                 $this->request->data['image'] = $testpreprations['image'];
             }
            
             $branchs = $this->TestPreprations->patchEntity($testpreprations, $this->request->data);
             if ($this->TestPreprations->save($testpreprations)) {
                $this->Flash->success(__('Your Branchs has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Branchs.'));
        }
        $this->set('testpreprations', $testpreprations);
        
    }
    
    
    
    public function view($id=null){
        $this->viewBuilder()->layout('admin_temple');
        $testpreprations=$this->TestPreprations->get($id);
        //pr($articles);
        $this->set('testpreprations', $testpreprations);
        
    }
    
    public function delete($id){
        // $this->viewBuilder()->layout('top');
        
        //$this->request->allowMethod(['post', 'delete']);
        $testpreprations = $this->TestPreprations->get($id);
        if ($this->TestPreprations->delete($testpreprations)) {
            $this->Flash->success(__('The TestPreprations  with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function disable($id=null)
    {
        $testpreprations=$this->TestPreprations->get($id);
        $testpreprations->status=0;
        if($this->TestPreprations->save($testpreprations)){
            $this->Flash->success(__('Your TestPreprations has been disable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function enable($id=null)
    {
        $testpreprations=$this->TestPreprations->get($id);
        $testpreprations->status=1;
        if($this->TestPreprations->save($testpreprations)){
            $this->Flash->success(__('Your TestPreprations been enable.'));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    
    
}
