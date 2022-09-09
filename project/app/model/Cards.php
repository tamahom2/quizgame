<?php
    class Cards{
        private $id;
        public $name;
        public $questions;
        public function __construct($name,$questions){
            $this->name = $name;
            $this->questions = $questions;
        }
        public function setName($name){
            $this->name=$name;
        }
        public function setQuestions($questions){
            $this->questions=$questions;
        }
        public function getName(){
            return $this->name;
        }
        public function getQuestions(){
            return $this->questions;
        }
    }
?>