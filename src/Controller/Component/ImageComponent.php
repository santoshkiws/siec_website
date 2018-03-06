<?php 
namespace App\Controller\Component;
use Cake\Controller\Component;
class ImageComponent extends Component
{
	


function uploadimage($userInfo,$directorypath) {
   $image = time() . $userInfo['name']; 
   WWW_ROOT .$directorypath.$image;
    if(move_uploaded_file($userInfo['tmp_name'], WWW_ROOT .$directorypath.'/'.$image)) 
	{
	
	return $image;
	}
	else
	{
   return false;
	}	
                                
}

}

?>