<?php
namespace BLOG\Controllers; 
use BLOG\core\Controller;
//<!--====================== Details page ====================-->
class Contact extends Controller
{
    public function contact()
    {
        
        $this->view('Contact',['title'=>'Contact']);
    }
   

}