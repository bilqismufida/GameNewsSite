<?php

namespace Admin;

use database\DataBase;

class Contact extends Admin{ 
        
        public function index()
        {
                $db = new DataBase();
                $contacts = $db->select('SELECT contact.* FROM contact');
                require_once(BASE_PATH . '/template/admin/contact/index.php');
        }
}