<?php
namespace Blog\Core;

class Controller
{
    public function view($path,$parm)
    {
        extract($parm);
        require_once VIEW . $path . '.view.php';
    }
    
    
}
 