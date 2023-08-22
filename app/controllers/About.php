<?php
namespace BLOG\Controllers; 
use BLOG\core\Controller;
//<!--====================== About page ====================-->
class About extends Controller
{
    public function about()
    {
        $this->view('about',['title'=>'About']);
    }
    

}