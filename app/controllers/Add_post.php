<?php
namespace BLOG\Controllers;

use BLOG\core\Controller;
use BLOG\models\User;
use BLOG\core\Valid;

class Add_post extends Controller
{
    public function create_post()
    {
        $add_cat = new User();
        $categories = $add_cat->all_cat();
        $this->view('Add_post', ['title' => 'Add Post', 'categories' => $categories]);
    }

    public function post_create()
    {
        $errors = [];
        $valid = new Valid();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $title = $valid->testInput($_POST['title']);
            $category = $valid->testInput($_POST['category']);
            $body = $valid->testInput($_POST['body']);
            $post_img = $_FILES['post_img']['tmp_name'];

            // Validate Inputs
            if (empty($title)) $errors['title'] = 'Title is required';
            if (empty($category)) $errors['category'] = 'Category is required';
            if (empty($body)) $errors['body'] = 'Body is required';
            if (empty($post_img)) $errors['post_img'] = 'Image is required';

            if (empty($errors)) {
                // Target Directory
                $target_dir = IMAGE_UPLOAD_DIR;

                // Ensure Directory Exists
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }

                // Sanitize Filename
                $filename = pathinfo($_FILES['post_img']['name'], PATHINFO_FILENAME);
                $extension = pathinfo($_FILES['post_img']['name'], PATHINFO_EXTENSION);
                $filename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $filename); // Replace special chars with "_"
                $filename = $filename . '_' . time(); // Add timestamp to avoid duplicates
                $target_file = $target_dir . $filename . '.' . $extension;

                // Check if the file is valid
                if (move_uploaded_file($post_img, $target_file)) {
                    session_start();
                    $user_id = $_SESSION['user_id'];
                    $user_name = $_SESSION['username'];
                    $add_post = new User();
                    $data_post = [
                        'title' => $title,
                        'category' => $category,
                        'body' => $body,
                        'post_img' => $filename . '.' . $extension,
                        'user_id' => $user_id,
                        'username' => $user_name
                    ];
                    $add_post->insert_posts($data_post);
                    header('Location: ' . LINK . 'home/blog');
                    exit();
                } else {
                    $errors['post_img'] = 'Failed to move the uploaded file. Check directory permissions.';
                }
            }
        }

        $add_cat = new User();
        $categories = $add_cat->all_cat();
        $this->view('Add_post', ['title' => 'Add Post', 'errors' => $errors, 'categories' => $categories]);
    }
}
