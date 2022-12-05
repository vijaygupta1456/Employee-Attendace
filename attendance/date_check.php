<?php 

    $time1 = '08:00:00';
    $time2 = '09:30:00';
    $array1 = explode(':', $time1);
    $array2 = explode(':', $time2);

    $minutes1 = ($array1[0] * 60.0 + $array1[1]);
    $minutes2 = ($array2[0] * 60.0 + $array2[1]);

    echo "Time is :<br>";
    echo $diff = $minutes2 - $minutes1 .' Minutes';

    echo "<br>";

   $datetime1 = new DateTime('09:30 AM');
   $datetime2 = new DateTime('10:45 PM');
   $interval = $datetime1->diff($datetime2);
   echo $interval->format('%hh %im');
   echo "<br>";

   $timestamp1 = '8:10 AM';  
   $timestamp2 = '8:20 PM'; 
    
   $num1 = date("H", strtotime($timestamp1)) * 60  + date("i", strtotime($timestamp1));
   $num2 = date("H", strtotime($timestamp2)) * 60 + date("i", strtotime($timestamp2));

   echo '<br/>';
   // echo $num1. "<br>" .$num2 . "<br>";
   echo abs($num2 - $num1);

   echo '<br/>';

   $dif = abs($num2 - $num1);

   if( $dif < 210){
        echo "A";
    }
   elseif (210 <= $dif AND $dif <= 360) {
        echo "H";
    }
   elseif (360 < $dif AND $dif < 500) {
        echo "S";
    }
   elseif (500 <= $dif ) {
        echo "F";
    }

?>