<?php

namespace BLOG\core;

class App 
{
    private $controller;
    private $method;
    private $params = [];

    public function __construct()
    {
        $this->url();
        $this->render();
    }
    
    private function url()
    {
        // Check if the query string is not empty
        if (!empty($_SERVER['QUERY_STRING']))
        {
            // Split the query string into an array using '/' as the delimiter
            $url = explode("/", $_SERVER['QUERY_STRING']); 
            
            // Extract the controller name from the URL
            $this->controller = isset($url[0]) ? ucfirst($url[0]) : "Home";
            
            // Extract the method name from the URL
            $this->method = isset($url[1]) ? $url[1] : "index";
            
            // Remove the controller and method names from the URL array
            unset($url[0], $url[1]);
            
            // Re-index the URL array to start from index 0
            $this->params = array_values($url);
        }
        else 
        {
            $this->controller = 'Home';
            $this->method = 'index';
        }
    }
    
    private function render()
    {
        // Create the fully qualified class name for the controller
        $controller_class = "BLOG\\controllers\\" . $this->controller;
        
        // Check if the controller class exists
        if (class_exists($controller_class))
        {
            // Instantiate the controller class
            $controller_instance = new $controller_class();
            
            // Check if the specified method exists in the controller
            if (method_exists($controller_instance, $this->method))
            {
                // Call the specified method on the controller instance with the provided parameters
                $controller_instance->{$this->method}(...$this->params);
            }
            else
            {
                // Display an error message if the method does not exist
                echo 'Method does not exist';
            }
        }
        else
        {
            // Display an error message if the controller class does not exist
            echo 'Class does not exist';
        }
    }
}
