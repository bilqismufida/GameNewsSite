<?php

namespace App;

use Database\DataBase;

class Home 
{

        public function index()
        {
                $db = new DataBase();

                // $setting = $db->select('SELECT * FROM websetting')->fetch();

                //anomali buatan
                $categories = $db->select("SELECT * FROM categories")->fetchAll();


                // $breakingNewsZ = $db->select('SELECT * FROM posts WHERE breaking_news = 2 ORDER BY created_at DESC LIMIT 0,3')->fetch();
                $breakingNews = $db->select('SELECT * FROM posts WHERE breaking_news = 2 ORDER BY created_at DESC LIMIT 0,3');

                $lastPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts ORDER BY created_at DESC LIMIT 0, 9')->fetchAll();

                $bodyBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();
                $sidebarBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();

                $popularPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY view DESC LIMIT 0, 3')->fetchAll();

                $mostCommentsPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY comments_count DESC LIMIT 0, 4')->fetchAll();


                require_once(BASE_PATH . '/template/app/index.php');
        }

        public function header(){
                $db = new DataBase();
                $popularPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY view DESC LIMIT 0, 6')->fetchAll();
                $categories = $db->select("SELECT * FROM categories")->fetchAll();
                $setting = $db->select('SELECT * FROM websetting')->fetch();
                
                $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();

                require(BASE_PATH . '/template/app/layout/header.php');
        }

        public function footer()
        {
                $db = new DataBase();
                $breakingNews = $db->select('
                SELECT 
                        posts.*, 
                        (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count 
                FROM posts 
                WHERE breaking_news = 2 
                ORDER BY view DESC 
                LIMIT 0, 1
                ')->fetchAll();

                require_once(BASE_PATH . '/template/app/layout/footer.php');

        }

        public function sideBar(){
                $db = new DataBase();
                $topSelectedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE posts.selected = 2 ORDER BY created_at DESC LIMIT 0, 3')->fetchAll();
                require_once(BASE_PATH . '/template/app/layout/sidebar.php');
        }

        public function show($id)
        {
                $db = new DataBase();

                // Update view count
                $db->select("UPDATE posts SET view = view + 1 WHERE id = ?", [$id]);

                // Fetch post
                $post = $db->select('SELECT posts.*, 
                        (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, 
                        (SELECT username FROM users WHERE users.id = posts.user_id) AS username, 
                        (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category, 
                        (SELECT id FROM categories WHERE categories.id = posts.cat_id) AS cat_id 
                        FROM posts WHERE id = ?', [$id])->fetch();

                // Check if post exists
                if (!$post) {
                        echo "Post not found.";
                        exit;
                }

                // Fetch comments
                $comments = $db->select("SELECT *, 
                             (SELECT username FROM users WHERE users.id = comments.user_id) AS username 
                             FROM comments WHERE post_id = ? AND status = 'approved'", [$id])->fetchAll();

                // Fetch other necessary data
                $categories = $db->select("SELECT * FROM categories")->fetchAll();
                $setting = $db->select('SELECT * FROM websetting')->fetch();
                $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();
                $catz = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();
                $sidebarBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();
                $popularPosts = $db->select('SELECT posts.*, 
                                (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, 
                                (SELECT username FROM users WHERE users.id = posts.user_id) AS username, 
                                (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category 
                                FROM posts ORDER BY view DESC LIMIT 0, 3')->fetchAll();
                $mostCommentsPosts = $db->select('SELECT posts.*, 
                                      (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, 
                                      (SELECT username FROM users WHERE users.id = posts.user_id) AS username, 
                                      (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category 
                                      FROM posts ORDER BY comments_count DESC LIMIT 0, 4')->fetchAll();

                // Load the view
                require_once(BASE_PATH . '/template/app/show-post.php');

        } 


        // public function show($id)
        // {

        //         $db = new DataBase();

        //         //anomali buatan
        //         $categories = $db->select("SELECT * FROM categories")->fetchAll();

        //         $post = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE id = ?', [$id])->fetch();

        //         $comments = $db->select("SELECT *, (SELECT username FROM users WHERE users.id = comments.user_id) AS username FROM comments WHERE post_id = ? AND status = 'approved'", [$id])->fetchAll();

        //         $setting = $db->select('SELECT * FROM websetting')->fetch();

        //         $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();

        //         $catz = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();

        //         $sidebarBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();

        //         $popularPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY view DESC LIMIT 0, 3')->fetchAll();

        //         $mostCommentsPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY comments_count DESC LIMIT 0, 4')->fetchAll();


        //         require_once(BASE_PATH . '/template/app/show-post.php');

        // }


        public function commentStore($request)
        { 

                if (isset($_SESSION['user'])) {
                        if ($_SESSION['user'] != null) {
                                $db = new DataBase();
                                $db->insert('comments', ['user_id', 'post_id', 'comment'], [$_SESSION['user'], $request['post_id'], $request['comment']]);
                                $this->redirectBack();
                        } else {
                                $this->redirectBack();
                        }
                } else {
                        $this->redirectBack();
                }

        }

        public function mostViewed(){
                $db = new DataBase();
                $popularPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY view DESC LIMIT 0, 6')->fetchAll();
                require_once(BASE_PATH . "/template/app/most-viewed.php");

        }

        public function category($id)
        {
                $db = new DataBase();
                $category = $db->select("SELECT * FROM `categories` WHERE `id` = ? ORDER BY `id` DESC ;", [$id])->fetch();

                $topSelectedPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category  FROM posts where posts.selected = 2 ORDER BY `created_at` DESC LIMIT 0,1 ;")->fetchAll();


                $categoryPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE cat_id = ?  ORDER BY `created_at` DESC LIMIT 0,6 ;", [$id])->fetchAll();

                $popularPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();

                $breakingNews = $db->select("SELECT * FROM posts WHERE breaking_news = 2 ORDER BY `created_at` DESC LIMIT 0,1 ;")->fetch();

                $mostCommentsPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username  , (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY `comments_count` DESC LIMIT 0,4 ;")->fetchAll();

                $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ;')->fetchAll();

                $setting = $db->select("SELECT * FROM `websetting`;")->fetch();

                $sidebarBanner = $db->select("SELECT * FROM `banners` LIMIT 0,1;")->fetch();
                $bodyBanner = $db->select("SELECT * FROM `banners` ORDER BY created_at DESC LIMIT 0,1;")->fetch();

                require_once(BASE_PATH . "/template/app/show-category.php");
        }

        public function profile()
        {
                if (!isset($_SESSION['user'])) {
                        echo "Please login first.";
                        exit;
                }

                $db = new DataBase();
                $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();

                require_once(BASE_PATH . '/template/app/profile.php');
        }
        public function contact()
        {
                require_once(BASE_PATH . '/template/app/contact.php');
        }
        public function indexAuthor()
        {
            $db = new DataBase();
    
            // $setting = $db->select('SELECT * FROM websetting')->fetch();
    
            //anomali buatan
            $categories = $db->select("SELECT * FROM categories")->fetchAll();
    
    
            // $breakingNewsZ = $db->select('SELECT * FROM posts WHERE breaking_news = 2 ORDER BY created_at DESC LIMIT 0,3')->fetch();
            $breakingNews = $db->select('SELECT * FROM posts WHERE breaking_news = 2 ORDER BY created_at DESC LIMIT 0,3');
    
            $lastPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts ORDER BY created_at DESC LIMIT 0, 9')->fetchAll();
    
            $bodyBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();
            $sidebarBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();
    
            $popularPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY view DESC LIMIT 0, 3')->fetchAll();
    
            $mostCommentsPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY comments_count DESC LIMIT 0, 4')->fetchAll();
    
    
            require_once(BASE_PATH . "/template/author/index.php");
        }


        protected function redirectBack()
        {
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit;
        }
}