<?php

namespace BLOG\Controllers;

use BLOG\core\Controller;
use BLOG\models\User;
use BLOG\core\Valid;

class Post extends Controller
{
    public function read_post()
    {
        if (isset($_GET['posts_id'])) {
            $id_Post = $_GET['posts_id'];
            $select_id = new User();
            $params = [
                'posts_id' => $id_Post
            ];
            $post_id = $select_id->id_post($params);

            if (!$post_id) {
                // No posts available, show 404 error
                $this->view('404', ['title' => '404 Page Not Found']);
                die;
            }
        } else {
            // Invalid or missing posts_id parameter, display error or redirect
            $this->view('404', ['title' => '404 Page Not Found']);
            die;
        }

        $this->view('Post', ['title' => 'Post', 'post_id' => $post_id]);
    }

    public function update_post()
    {
        $select_id = new User(); // Instantiate User class
    
        if (isset($_GET['upd_id']) && !empty($_GET['upd_id'])) {
            $update = $_GET['upd_id'];
            $params = [
                'posts_id' => $update
            ];
            $id_Posts = $select_id->id_post($params);
    
            if (!$id_Posts) {
                // No posts available, show 404 error
                $this->view('_404', ['title' => '404 Page Not Found']);
                die;
            }
        } else {
            // Invalid or missing upd_id parameter, display error or redirect
            $this->view('_404', ['title' => '404 Page Not Found']);
            die;
        }
    
        if (isset($_POST['submit'])) {
            $errors = [];
            $valid = new Valid();
            $title = $valid->testInput($_POST['title']);
            $body = $valid->testInput($_POST['body']);
            $category = $valid->testInput($_POST['category']);
            $img_post = $_FILES['post_img']['tmp_name'];
    
            if (empty($title)) {
                $errors['title'] = 'Title is required';
            }
            if (empty($body)) {
                $errors['body'] = 'Body is required';
            }
            if (empty($category)) {
                $errors['category'] = 'Category is required';
            }
            $params = [
                'posts_id' => $update
            ];
            $select_photo = $select_id->id_photo($params);
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] !== $select_photo['user_id']) {
                // User doesn't have permission, show 404 error
                $this->view('_404', ['title' => '404 Page Not Found']);
                die;
            }
    
            if (empty($errors)) {
                // File upload handling
                $target_dir = IMAGE_UPLOAD_DIR;
                $filename = '';
                $extension = '';
            
    
                if (!empty($_FILES['post_img']['name'])) {
                    $filename = pathinfo($_FILES['post_img']['name'], PATHINFO_FILENAME);
                    $extension = pathinfo($_FILES['post_img']['name'], PATHINFO_EXTENSION);
                    $target_file = $target_dir . $filename . '.' . $extension;

                    // Validate the uploaded file if necessary
                    // Add your validation checks here
    
                    // Move the uploaded file to the target directory
                    if (!move_uploaded_file($img_post, $target_file)) {
                        // Display error message or handle the error
                        $this->view('_404', ['title' => '404 Page Not Found']);
                        die;
                    }
    
                    // Delete the previous file
                    $file_path = $target_dir . $select_photo['post_img'];
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                } else {
                    // Keep the existing photo if no new photo is uploaded
                    $filename = pathinfo($select_photo['post_img'], PATHINFO_FILENAME);
                    $extension = pathinfo($select_photo['post_img'], PATHINFO_EXTENSION);
                }
    
                // Update the post with new information
                $params = [
                    'title' => $title,
                    'body' => $body,
                    'category' => $category,
                    'posts_id' => $update,
                    'post_img' => $filename . '.' . $extension,
                ];
    
                $select_id->update_post($params);
    
                header('location:' . LINK . 'home');
                exit();
            } else {
                // Display error message
                $this->view('_404', ['title' => '404 Page Not Found']);
                die;
            }
        }
    
        $this->view('update_post', ['title' => 'update_post', 'id_Post' => $id_Posts]);
    }
    
    


    public function delete_Post()
    {
        if (isset($_GET['del_id'])) {
            $delete = $_GET['del_id'];
            $delete_id = new User();
            $params = [
                'posts_id' => $delete
            ];
            $select_id = $delete_id->id_photo($params);
            $file_path = IMAGE_UPLOAD_DIR . $select_id['post_img'];

            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $postUserID = $select_id['user_id'];
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] !== $postUserID) {
                // User doesn't have permission, show 404 error
                $this->view('_404', ['title' => '404 Page Not Found']);
                die;
            }

            $delete_id->id_delete($params);
            header('location:' . LINK . 'home');
        } else {
            $this->view('_404', ['title' => '404 Page Not Found']);
            die;
        }
    }
}
?>
