<?php

    class About extends Controller {

        public function index() {
            $user = $this->model('UserModel');
            $detect = $this->model('Mobile_Detect');

            $data = [
                'lang' => 'ua',
                'title' => 'Про нас', 
                'content' => "Сторінка про нас",
                'user' => $user->getUser(),
                'mobile' => $detect->isMobile()
            ];

            $this->view('about/index', $data);
        }
    }
