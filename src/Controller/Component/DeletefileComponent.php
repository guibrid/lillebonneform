<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class DeletefileComponent extends Component
{
    public function delete($type , $data )
    {
        return $type.'//'.$data;
        /*$file = new File(WWW_ROOT.'/files/diplomas/diploma_doc/2b67e974-e77f-4596-9a0c-2374450ba8be/les-estivales.pdf', false , 0777);
        if($file->delete()){
           echo "file/image deleted successfully";
        }else{
           echo "file/image failed to be delete";
        }*/
    }
}
