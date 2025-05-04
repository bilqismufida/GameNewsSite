<?php

namespace App;

use Database\DataBase;

class Author
{

        protected function redirectBack()
        {
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit;
        }

        public function index()
        {

                if (!isset($_SESSION['user'])) {
                        echo "Please login first.";
                        exit;
                }

                $db = new DataBase();
                $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();

                $postCount = $db->select("SELECT COUNT(*) FROM `posts` WHERE `user_id` = ?", [$_SESSION['user']])->fetch();
                $postsViews = $db->select("SELECT SUM(view) FROM `posts` WHERE `user_id` = ?", [$_SESSION['user']])->fetch();
                $commentsCount = $db->select('SELECT COUNT(*) FROM `comments`  ;')->fetch();
                $commentsCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `user_id` = ?", [$_SESSION['user']])->fetch();
                $commentsUnseenCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status` = 'unseen' ;")->fetch();
                $commentsApprovedCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `status` = 'approved' ;")->fetch();
                $postsWithView = $db->select("SELECT * FROM `posts` WHERE `user_id` = ? ORDER BY `view` DESC LIMIT 0,5 ;", [$_SESSION['user']]);

                $posts = $db->select(
                        "SELECT posts.*, 
                        (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, 
                        (SELECT username FROM users WHERE users.id = posts.user_id) AS username, 
                        (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts
                        WHERE posts.user_id = ?  
                        ORDER BY view", [$_SESSION['user']])->fetchAll();

                $comments = $db->select(
                        "SELECT 
                                comments.*, 
                                posts.title, 
                                posts.summary, 
                                posts.image,
                                users.username, 
                                categories.name AS category
                        FROM comments
                        JOIN posts ON comments.post_id = posts.id
                        JOIN users ON posts.user_id = users.id
                        JOIN categories ON posts.cat_id = categories.id
                        WHERE posts.user_id = ?

                        ORDER BY view", [$_SESSION['user']])->fetchAll();

                $commentsX = $db->select(
                        "SELECT comments.id, comments.comment, 
                        comments.status, comments.post_id, users.username, posts.user_id, posts.title 
                        FROM comments, users, posts WHERE posts.user_id = ?", [$_SESSION['user']])->fetchAll();



                require_once(BASE_PATH . '/template/author/index.php');
        }

        //IMAGE




        protected function saveImage($image, $imagePath, $imageName = null)
        {

                if ($imageName) {
                        $extension = explode('/', $image['type'])[1];
                        $imageName = $imageName . '.' . $extension;
                } else {
                        $extension = explode('/', $image['type'])[1];
                        $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
                }

                $imageTemp = $image['tmp_name'];
                $imagePath = 'public/' . $imagePath . '/';
                if (is_uploaded_file($imageTemp)) {
                        if (move_uploaded_file($imageTemp, $imagePath . $imageName)) {
                                return $imagePath . $imageName;
                        } else {
                                return false;

                        }
                } else {
                        return false;
                }

        }

        protected function removeImage($path)
        {
                // $path = trim($this->basePath, '/ ') . '/' . trim($path, '/ ');
                $path = trim($path, '/ ');
                if (file_exists($path)) {
                        unlink($path);
                }

        }

        // POST
        public function indexPost()
        {
                $db = new DataBase();
                

                $posts = $db->select(
                        "SELECT posts.*, 
                                categories.name AS category, 
                                (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count
                        FROM posts
                        JOIN categories ON posts.cat_id = categories.id
                        WHERE posts.user_id = ?",
                        [$_SESSION['user']]
                );
                // $commentsCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `user_id` = ?", [$_SESSION['user']])->fetch();

                require_once BASE_PATH . '/template/author/post/index.php';
        }
        public function create()
        {
                $db = new DataBase();
                $categories = $db->select('SELECT * FROM categories');
                require_once BASE_PATH . '/template/author/post/create.php';
        }

        public function store($request)
        {
                $realTimestamp = substr($request['published_at'], 0, 10);
                $request['published_at'] = date("Y-m-d H:i:s", (int) $realTimestamp);
                $db = new DataBase();
                if ($request['cat_id'] != null) {
                        $request['image'] = $this->saveImage($request['image'], 'post-image');
                        if ($request['image']) {
                                $request = array_merge($request, ['user_id' => $_SESSION['user']]);
                                $posts = $db->insert('posts', array_keys($request), $request);
                                require_once BASE_PATH . '/template/author/index.php';
                        } else {
                                require_once BASE_PATH . '/template/author/index.php';
                        }
                } else {
                        require_once BASE_PATH . '/template/author/index.php';
                }
        }

        public function edit($id)
        {
                $db = new DataBase();
                $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
                $categories = $db->select('SELECT * FROM categories');
                require_once BASE_PATH . '/template/author/post/edit.php';
        }

        public function update($request, $id)
        {
                $realTimestamp = substr($request['published_at'], 0, 10);
                $request['published_at'] = date("Y-m-d H:i:s", (int) $realTimestamp);
                $db = new DataBase();
                if ($request['cat_id'] != null) {
                        if ($request['image']['tmp_name'] != null) {
                                $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
                                $this->removeImage($post['image']);
                                $request['image'] = $this->saveImage($request['image'], 'post-image');
                        } else {
                                unset($request['image']);
                        }
                        $request = array_merge($request, ['user_id' => 1]);
                        $db->update('posts', $id, array_keys($request), $request);
                        require_once BASE_PATH . '/template/author/post/index.php';
                }

        }

        public function delete($id)
        {
                $db = new DataBase();
                $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
                $this->removeImage($post['image']);
                $db->delete('posts', $id);
                $this->redirectBack();
        }

        public function breakingNews($id)
        {
                $db = new DataBase();
                $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
                if (empty($post)) {
                        $this->redirectBack();
                }

                if ($post['breaking_news'] == 1) {
                        $db->update('posts', $id, ['breaking_news'], [2]);
                } else {
                        $db->update('posts', $id, ['breaking_news'], [1]);
                }
                $this->redirectBack();
        }

        public function selected($id)
        {
                $db = new DataBase();
                $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
                if (empty($post)) {
                        $this->redirectBack();
                }

                if ($post['selected'] == 1) {
                        $db->update('posts', $id, ['selected'], [2]);
                } else {
                        $db->update('posts', $id, ['selected'], [1]);
                }
                $this->redirectBack();
        }


        public function header()
        {
                $db = new DataBase();
                $popularPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY view DESC LIMIT 0, 6')->fetchAll();
                $categories = $db->select("SELECT * FROM categories")->fetchAll();
                $setting = $db->select('SELECT * FROM websetting')->fetch();

                $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();

                require(BASE_PATH . '/template/author/layout/header.php');
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

                require_once(BASE_PATH . '/template/author/layout/footer.php');

        }

        public function sideBar()
        {
                $db = new DataBase();
                $topSelectedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE posts.selected = 2 ORDER BY created_at DESC LIMIT 0, 3')->fetchAll();
                require_once(BASE_PATH . '/template/app/layout/sidebar.php');
        }
}