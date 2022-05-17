<?php

    require 'DB.php';

    class UserModel {
        
        private $email;
        private $login;
        private $pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstance();
        }

        public function setData($email, $login, $pass) {
            $this->email = $email;
            $this->login = $login;
            $this->pass = $pass;
        }

        public function validForm() {
            $checkUser = $this->checkUser($this->email);

            if (strlen($this->email) < 3) {
                return "Email за короткий";
            } else if ($checkUser['email'] != '') {
                return "Такий email вже зареєстрований";
            } else if (strlen($this->pass) < 8) {
                return "Пароль не може бути меньше 8 символів";
            } else {
                return "ok";
            }
        }

        public function addUser() {
            $sql = 'INSERT INTO users_links(email, login, pass) 
                VALUES(:email, :login, :pass)';
            $query = $this->_db->prepare($sql);
            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute([
                'email' => $this->email, 
                'login' => $this->login, 
                'pass' => $pass
            ]);

            $this->setAuth($this->email);
        }

        public function checkUser($email) {
            $result = $this->_db->query("SELECT * FROM `users_links` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function getUser() {
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users_links` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function logOut() {
            setcookie('login', $this->email, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }

        public function auth($email, $pass) {
            $user = $this->checkUser($email);

            if($user['email'] == '') {
                return 'Пользователя с таким email не существует';
            } else if(password_verify($pass, $user['pass'])) {
                $this->setAuth($email);
            } else {
                return 'Пароли не совпадают';
            }
        }

        public function setAuth($email) {
            setcookie('login', $email, time() + 3600 * 24, '/'); // + 3600(1 година) * 24(1 день) * 30(1 місяць)
            header('Location: /home/index');
        }
    }