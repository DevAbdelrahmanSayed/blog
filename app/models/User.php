<?php
namespace BLOG\models;

use BLOG\core\Model;

class User extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
   
    public function insert_user($params)
    {
        // $email = $params['email'];
        // $existingUser = $this->select_email(['email' => $email]);
        
        // if ($existingUser) {
        //     throw new \Exception('Email already exists');
        // }
        
        $query = 'INSERT INTO users (username, email, password, profile,verification_code) VALUES (:username, :email, :password, :profile,:verification_code)';
        return $this->data($query, $params);
    }
    public function insert_posts($params)
    {
        
        $query = 'INSERT INTO posts (title, category, body, post_img,user_id,username) VALUES (:title, :category, :body, :post_img, :user_id,:username)';
        return $this->data($query, $params);
    }
    public function getLatestPost()
    {
        $query = 'SELECT posts.*, users.username, users.profile 
                FROM posts 
                JOIN users ON posts.user_id = users.user_id 
                ORDER BY posts.created_at DESC 
                LIMIT 1';
        return $this->select_one($query);
    }

    public function all_posts()
    {
        $query = 'SELECT posts.*, users.username, users.profile 
                  FROM posts 
                  JOIN users ON posts.user_id = users.user_id 
                  ORDER BY posts.created_at DESC';
        return $this->select_all($query);
    }
   
    public function all_user($params)
    {
        $query = 'SELECT * FROM users';
        return $this->select_all($query, $params);
    }
    public function all_cat()
    {
        $query = 'SELECT * FROM categories';
        return $this->select_all($query);
    }
    public function pos_cat()
    {
        $query = 'SELECT * FROM categories JOIN posts ON categories.posts_id posts.cat_id WHERE  posts.cat_id';
        return $this->select_all($query);
    }
    public function join_post_cat($params)
    {
        $query = 'SELECT posts.posts_id AS posts_id, posts.title AS title, posts.body AS body, posts.username AS username,posts.post_img AS post_img, 
        posts.created_at AS created_at, posts.category AS category 
        FROM categories JOIN posts ON categories.cat_id = posts.category WHERE posts.category=:cat_id;';
        return $this->select_all($query,$params);
    }
    public function id_post($params)
    {
        $query = 'SELECT * FROM posts WHERE posts_id=:posts_id';
        return $this->select_all($query, $params);
    }
    public function id_photo($params)
    {
        $query = 'SELECT * FROM posts WHERE posts_id=:posts_id';
        return $this->select_one($query, $params);
    }
    public function id_profile($params)
    {
        $query = 'SELECT profile FROM users WHERE user_id=:user_id';
        return $this->select_one($query, $params);
    }
    
    public function id_delete($params)
    {
        $query = 'DELETE FROM posts WHERE posts_id =:posts_id';
        return $this->select_all($query, $params);
    }

    public function select_users($params)
    {
        $query = 'SELECT * FROM users WHERE username = :username';
        return $this->is_exist($query, $params);
    }

    public function select_email($params)
    {
        $query = 'SELECT * FROM users WHERE email = :email';
        return $this->select_one($query, $params);
    }
    public function select_ep($params)
    {
        $query = 'SELECT * FROM users WHERE email = :email AND password = :password';
        return $this->is_exist($query, $params);
    }
    public function select_code($params)
    {
        $query = 'SELECT * FROM users WHERE verification_code = :verification_code';
        return $this->is_exist($query, $params);
    }
    public function update_post($params)
    {
        $query = 'UPDATE posts SET title = :title, body = :body, post_img = :post_img ,category = :category  WHERE posts_id = :posts_id';
        return $this->update($query, $params);
    }
   
}
