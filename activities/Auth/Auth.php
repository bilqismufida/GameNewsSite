<?php

namespace Auth;

use Database\DataBase;
class Auth
{

    protected function redirect($url)
    {
        header('Location: ' . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit;
    }

    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    private function hash($password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashPassword;
    }

    public function register()
    {
        require_once BASE_PATH . '/template/auth/register.php';
    }

    public function registerStore($request)
    {
        if (empty($request['email']) || empty($request['username']) || empty($request['password'])) {
            flash('register_error', 'All fields are required');
            $this->redirectBack();
        } else if (strlen($request['password']) < 8) {
            flash('register_error', 'Password must be at least 8 characters long');
            $this->redirectBack();
        } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            flash('register_error', 'The email entered is not valid');
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM users WHERE email = ?", [$request['email']])->fetch();
            if ($user != null) {
                flash('register_error', 'Email already exists');
                $this->redirectBack();
            } else {
                $request['password'] = $this->hash($request['password']);
                $db->insert('users', ['email', 'password', 'username'], [
                    $request['email'],
                    $request['password'],
                    $request['username']
                ]);

                flash('register_success', 'Registration successful. You can now login.');
                $this->redirect('login');
            }

            flash('register_error', 'The activation email was not sent');
            $this->redirectBack();

        }
    }

    public function login()
    {
        $db = new DataBase();
        $categories = $db->select("SELECT * FROM categories")->fetchAll();
        $setting = $db->select('SELECT * FROM websetting')->fetch();
        require_once BASE_PATH . '/template/auth/login.php';
    }

    public function checkLogin($request)
    {
        if (empty($request['email']) || empty($request['password'])) {
            flash('login_error', 'All fields are required');
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM users WHERE email = ?", [$request['email']])->fetch();
            if ($user != null) {
                if (password_verify($request['password'], $user['password'])) {
                    $_SESSION['user'] = $user['id'];
                    $_SESSION['permission'] = $user['permission'];
                    $this->redirect('admin');
                } else {
                    flash('login_error', 'The password is wrong');
                    $this->redirectBack();
                }
            } else {
                flash('login_error', 'User not found');
                $this->redirectBack();
            }
        }
    }


    public function edit($id)
    {
        $db = new DataBase();
        $user = $db->select('SELECT * FROM users WHERE id = ?;', [$id])->fetch();
        require_once(BASE_PATH . '/template/app/profile.php');
    }

    public function update($request, $id)
{
    // Pastikan semua field penting terisi
    if (empty($request['email']) || empty($request['username'])) {
        flash('update_error', 'All fields are required');
        $this->redirectBack();
    } else if (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
        flash('update_error', 'The email entered is not valid');
        $this->redirectBack();
    } else {
        $db = new DataBase();

        // Cek apakah email sudah terdaftar (untuk validasi email)
        $user = $db->select("SELECT * FROM users WHERE email = ? AND id != ?", [$request['email'], $id])->fetch();
        if ($user != null) {
            flash('update_error', 'Email already exists');
            $this->redirectBack();
        }

        // Siapkan data yang akan diupdate
        $updateData = ['username' => $request['username'], 'email' => $request['email']];

        // Kalau password diisi dan panjangnya lebih dari 8 karakter, hash passwordnya
        if (!empty($request['password'])) {
            if (strlen($request['password']) < 8) {
                flash('update_error', 'Password must be at least 8 characters long');
                $this->redirectBack();
            }
            // Hash password baru
            $updateData['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
        }

        // Update data user di database
        $db->update('users', $id, array_keys($updateData), $updateData);

        flash('update_success', 'Update successful.');
        $this->redirect('profile');
    }

    // Jika email atau data lain gagal, beri pesan error
    flash('update_error', 'The activation email was not sent');
    $this->redirectBack();
}

    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();
            if ($user != null) {
                if ($user['permission'] != 'admin') {
                    $this->redirect('home');
                }

            } else {
                $this->redirect('home');
            }
        } else {
            $this->redirect('home');
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect('home');

    }


}
