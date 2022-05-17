<?php

    class Contact extends Controller {

        public function index() {
            $user = $this->model('UserModel');

            if (isset($_POST['name'])) {
                $mail = $this->model('ContactModel');
                $mail->setData($_POST['name'], $_POST['email'], $_POST['message']);

                $isValid = $mail->validForm();
                if ($isValid == "ok") {
                    $message = $mail->mail(); 
                } else {
                    $message = $isValid;
                }
            }

            $detect = $this->model('Mobile_Detect');

            $data = [
                'lang' => 'ua',
                'title' => 'Контакт', 
                'content' => "Зворотній зв'язок", 
                'message' => $message,
                'user' => $user->getUser(),
                'mobile' => $detect->isMobile()
            ];

            $this->view('contact/index', $data);
        }
    }
