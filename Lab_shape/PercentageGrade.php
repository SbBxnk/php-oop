<?php
require_once("grade.php");

class PercentageGrade extends Grade
{
    private $score;
    public function __construct($studentName, $score)
    {
        parent::__construct($studentName);
        $this->score = $score;
    }
    public function getScore()
    {
        return $this->score;
    }
}

$studentName = 'Mr.Chayakorn';
$score = 85;
$PercentageGrade = new PercentageGrade($studentName, $score);
$grade = $PercentageGrade->getGrade($score);
?>

<p class="my-0">The student's <span class="text-danger fw-bold"><?php echo $PercentageGrade->getName() ?></span></p>
<p class="my-0">Test score is <?php echo $PercentageGrade->getScore() ?></p>
<p class="my-0">Grade is <?php echo $grade ?>.</p>