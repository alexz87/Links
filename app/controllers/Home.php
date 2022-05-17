<?php

    class Home extends Controller {

        public function index() {
            $links = $this->model('LinksModel');
            $detect = $this->model('Mobile_Detect');

            if (isset($_POST['long_link'])) {
                $short_link = '';
                $num = 0;
                $str = str_split($_POST['long_link']);
                for ($i = 0; $i < count($str); $i++) {
                    if ($i % 5 != 0) {
                        continue;
                    } else if (
                        $str[$i] == '@' || 
                        $str[$i] == '.' || 
                        $str[$i] == '/' || 
                        $str[$i] == '=' || 
                        $str[$i] == '?' || 
                        $str[$i] == ':' ||
                        $str[$i] == '&' ||
                        $str[$i] == '%' ||
                        $str[$i] == '!' ||
                        $str[$i] == ',' ||
                        $str[$i] == ';'
                    ) {
                        continue;
                    } else if ($num > 7) {
                        continue;
                    } else {
                        $short_link = $short_link . $str[$i];
                        $num++;
                    }
                }

                $links->setData($_POST['long_link'], $_POST['title'], 'https://' . $short_link . '.nasty');

                $isValid = $links->validLinks();
                if($isValid == "ok") {
                    $links->sendLinks();
                } else {
                    $message = $isValid;
                }
            }

            if(isset($_POST['link_id_delete'])) {
                $links->deleteLink($_POST['link_id_delete']);
            }

            $data = [
                'lang' => 'ua',
                'title' => 'Головна',
                'content' => 'Головна сторінка',
                'message' => $message,
                'mobile' => $detect->isMobile(),
                'user' => $links->getUser(),
                'links' => $links->getLinks()
            ];

            $this->view('home/index', $data);
        }
    }