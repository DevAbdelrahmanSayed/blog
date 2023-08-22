<?php
namespace BLOG\Controllers; 
use BLOG\core\Controller;
use BLOG\models\User;

class Home extends Controller
{
    public function index()
    {
        session_start();
        if (!empty($_SESSION['username'])) {
            $user_post = new User();
        $posts = $user_post->all_posts();
     // User is logged in, show the index page
            $categories = $user_post->all_cat();
            $this->view('home', ['title' => 'Home','posts' => $posts,'categories'=>$categories]);
        } else {
            // User is not logged in, redirect to the login page
            header('Location: ' . LINK . 'User_Login/login');
            exit;
        }
        
        
      
    }
    public function get_photo()
    {
        session_start();
    
        if (!empty($_SESSION['user_id'])) {
            $user_post = new User();
            $id=$_SESSION['user_id'];
            $profile_photo = $user_post->id_profile($id);
    
            // Pass the profile photo path to the view
            $this->view('about', ['title' => 'profile', 'profile_photo' => $profile_photo]);
        } 
    }


    public function all_Post()
    {
        $user_post = new User();
        $posts = $user_post->all_posts();
        $this->view('home', ['title' => 'Home', 'posts' => $posts]);
        
        
    }

    public function blog()
    {
        
        $user_post = new User();
        $posts = $user_post->all_posts();
        $categories = $user_post->all_cat();
        $this->view('blog', ['title' => 'blog','posts' => $posts,'categories'=>$categories]);

    }
    public function Categories()
    {
      if(isset($_GET['cat_id']))
      {
        $cat_id = $_GET['cat_id'];
        $user_cat = new User();
        $params= [
            'cat_id'=>$cat_id
        ];
        $categories_id=$user_cat->join_post_cat($params);

      }
      $this->view('categories', ['title' => 'categories', 'categories_id'=>$categories_id]);
        
    }
 
}
