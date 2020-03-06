<?php
    class App{
        protected $controller = 'Home';
        protected $action = 'Default';
        protected $params = [];

        public function __construct()
        {
            $arrUrl = $this->getUrl();
            
            if(file_exists('./mvc/controllers/' .$arrUrl[0]. '.php')) {
                $this->controller = $arrUrl[0];
                unset($arrUrl[0]);
            }
            require_once './mvc/controllers/' .$this->controller. '.php';
            $this->controller = new $this->controller;

            if(isset($arrUrl[1])) {
                if(method_exists($this->controller, $arrUrl[1])) {
                    $this->action = $arrUrl[1];
                }
                unset($arrUrl[1]);
            }

            $this->params = isset($arrUrl) ? $arrUrl : [];
             
            call_user_func_array([$this->controller, $this->action], $this->params);
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                return explode('/', trim($_GET['url']));
            }
        }
    }
?>