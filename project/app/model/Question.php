<?php
    class Question{
        public $question;
        public $answers;
        public $correct;
        public function __construct($question,$answers,$correct){
            $this->question = $question;
            $this->answers = $answers;
            $this->correct = $correct;
        }
        public function setAnswers($answers){
            $this->answers = $answers;
        }
        public function setQuestion($question){
            $this->question = $question;
        }
        public function setCorrect($correct){
            $this->correct = $correct;
        }
        public function getQuestion(){
            return $this->question;
        }
        public function getCorrect(){
            return $this->correct;
        }
        public function getAnswers(){
            return $this->answers;
        }
    }
?>