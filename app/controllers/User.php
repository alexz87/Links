<?php

    class User extends Controller {

        public function reg() {
            if (isset($_POST['email'])) {
                $user = $this->model('UserModel');
                $user->setData(
                    $_POST['email'], 
                    $_POST['login'], 
                    $_POST['pass']
                );

                $isValid = $user->validForm();
                if ($isValid == "ok") {
                    $user->addUser(); 
                } else {
                    $message = $isValid;
                }
            }

            $detect = $this->model('Mobile_Detect');

            $data = [
                'lang' => 'ua',
                'title' => 'Реєстрація', 
                'content' => 'Реєстрація користувача', 
                'message' => $message,
                'mobile' => $detect->isMobile()
            ];
          
            $this->view('user/reg', $data);
        }

        public function dashboard() {
            $user = $this->model('UserModel');
            $detect = $this->model('Mobile_Detect');
            
            if (isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }

            $data = [
                'lang' => 'ua',
                'title' => 'Кабінет', 
                'content' => 'Кабінет користувача',
                'mobile' => $detect->isMobile(),
                'user' => $user->getUser()
            ];

            $this->view('user/dashboard', $data);
        }

        public function auth() {
            if (isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $message = $user->auth($_POST['login'], $_POST['pass']);
            }

            $detect = $this->model('Mobile_Detect');

            $data = [
                'lang' => 'ua',
                'title' => 'Авторизація', 
                'content' => 'Авторизація користувача', 
                'message' => $message,
                'mobile' => $detect->isMobile()
            ];

            $this->view('user/auth', $data);
        }
    }