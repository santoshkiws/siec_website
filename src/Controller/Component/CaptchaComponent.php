<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Controller;



class CaptchaComponent extends Component
{
    
    public $characters =array();
    public $numberchars=4;
    
    public function initialize(array $config){
        $this->characters= array_merge(range('a', 'z'),range('A', 'Z'),range('0', '9'));
    }
     
   public function getCaptcha(){
          shuffle($this->characters);
          // debug($this->characters); die;
         for ($i=0;$i<$this->numberchars;$i++){
              $result[]=$this->characters[$i];
          }
          return $result;
      }
      
}

?>