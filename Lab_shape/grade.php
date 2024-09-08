<?php 
class Grade{
    protected $studentName;
    
    private $grade;
    
    public function __construct($studentName){
        $this->studentName = $studentName;
    }

    public function getName(){
        return $this->studentName;
    }
    
    public function getGrade($score){
        if ($score >= 90){
            $this->grade = "A";
        } elseif ($score >= 80 ){
            $this->grade = "B";
        } elseif ($score >= 70){
            $this->grade = "C";
        } elseif ($score >= 60 ){
            $this->grade = "D";
        }else{
            $this->grade = "F";
        }
        return $this->grade;
    }
}

?>