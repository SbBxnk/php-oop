<?php
	class Classnum{
    	private $a;
        private $b;
        public function __construct($num_a,$num_b){
        	$this->a = $num_a;
            $this->b = $num_b;
        } //end construct
        public function add(){
        	return $this->a + $this->b;}//บวก
        public function substract(){
        	return $this->a - $this->b;}//ลบ
        public function multiply(){
        	return $this->a * $this->b;}//คูณ
        public function div(){
        	return $this->a / $this->b;}//หาร
    }//end class
?>