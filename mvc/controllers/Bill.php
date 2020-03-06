<?php
    class Bill extends Control{

        public function Default(){
            $bill = $this->model('ModelBill');
            $bill->exportExel();
        }
    }
?>