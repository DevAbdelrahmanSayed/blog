<?php
namespace BLOG\Controllers; 
use BLOG\core\Controller;
//<!--====================== About page ====================-->
class Admin extends Controller
{
    public function dashboard()
    {
        
        $this->view('admin/dashboard',['title'=>'Admin']);
    }
    public function edit_category()
    {
        $this->view('admin/editcategory',['title'=>'EditCategory']);
    }
    public function add_category()
    {
        $this->view('admin/addcategory',['title'=>'AddCategory']);
    }
    public function manage_categories()
    {
        $this->view('admin/managecategories',['title'=>'ManageCategories']);
    }
    public function add_user()
    {
        $this->view('admin/adduser',['title'=>'AddUser']);
    }
    public function edit_user()
    {
        $this->view('admin/edituser',['title'=>'EditUser']);
    }
    public function manage_user()
    {
        $this->view('admin/manageusers',['title'=>'ManageUser']);
    }
    
    public function add_post()
    {
        $this->view('admin/addpost',['title'=>'AddPost']);
    }
    public function edit_post()
    {
        $this->view('admin/editpost',['title'=>'EditPost']);
    }
    
    
}