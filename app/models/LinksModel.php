<?php

    require 'DB.php';

    class LinksModel {

        private $long_link;
        private $title;
        private $short_link;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstance();
        }

        public function setData($long_link, $title, $short_link) {
            $this->long_link = $long_link;
            $this->title = $title;
            $this->short_link = $short_link;
        }

        public function validLinks() {
            $checkLink = $this->checkLink();

            if($this->long_link == '') {
                return "Введіть довге посилання";
            } elseif ($checkLink['short_link'] != '') {
                return "Таке скорочення вже використовується";
            } else {
                return "ok";
            }
        }

        public function sendLinks() {
            $user = $this->getUser();
            $id_user = $user['id'];

            $sql = 'INSERT INTO links(long_link, title, short_link, id_user) VALUES(:long_link, :title, :short_link, :id_user)';
            $query = $this->_db->prepare($sql);
            $query->execute([
                'long_link' => $this->long_link, 
                'title' => $this->title,
                'short_link' => $this->short_link, 
                'id_user' => $id_user
            ]);
        }

        public function getLinks() {
            $user = $this->getUser();
            $id_user = $user['id'];

            $result = $this->_db->query("SELECT * FROM `links` WHERE `id_user` = '$id_user'");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUser() {
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users_links` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function checkLink() {
            $result = $this->_db->query("SELECT * FROM `links` WHERE `short_link` = '$this->short_link'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function deleteLink($id) {
            $result = $this->_db->query("DELETE FROM `links` WHERE `id` = '$id'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }