<?php

class email extends mail{
            public $Host = "smtp.gmail.com";
            public $Port = 587;
            public $SMTPAuth = true;
            public $Username = "droidk00@gmail.com";
            public $Password = "Eslam2016";
            public $From ="droidk00@gmail.com";
            public $FromName ="Resto Website";

            public function __construct(){
                $this->isSMTP(true);
                $this->isHTML(true);
            }

            public function sendMail($to , $sub ,$body){
                $this->addAddress($to);
                $this->Subject = $sub;
                $this->Body = $body;
                if($this->send()){
                    return true;
                }
                return false;

            }
}


?>