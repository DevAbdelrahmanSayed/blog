<?php
namespace BLOG\Controllers; 
use BLOG\core\Controller;
//<!--====================== Details page ====================-->
class Details extends Controller
{
    public function details()
    {
        
        $this->view('details',['title'=>'home']);
    }
   

}