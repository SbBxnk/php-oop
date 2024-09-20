<?php
    $N=5;
    $F=1;
    $K=$N;
    while($K>1){
        $F=$F*$K;
        $K=$K-1; // $K--; $k-=1;
    }
    echo "$N! =".$F;
?>
<hr>
Recursive Function <br>
<?php
   function rec_fac($N){
     if($N==0 || $N==1)
        return 1;
     else
        return $N * rec_fac($N-1);
   }
 
   echo "$N! =".rec_fac($N);
?>