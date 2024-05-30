<?php
echo "CONDITIONAL STATEMENTS<br>";
#if statement
    $grade = 2.6;
    echo "<br>";
    echo "If Statement<br>";
    echo "<br>";
echo "Your Grade in ITE-221 is $grade<br>";
if($grade <= 3){;
echo "You Passed<br>";
echo "<br>";
}

#else statement
    echo "Else statement<br>";
    echo "<br>";
    $grade = 5;
echo "Your Grade in ITE-221 is $grade<br>";
if($grade <= 3){;
echo "You Passed<br>";
}
else{
    echo "You Failed";
echo "<br>";
}

#elseif statement
echo "<br>";
    echo "Elseif statement<br>";
    echo "<br>";
    $grade = 0;
echo "Your Grade in ITE-221 is $grade<br>";
if($grade <= 3){;
echo "You Passed<br>";
}
elseif($grade == 0){
    echo "You Don't Have Grade Yet";
}
else{
    echo "You Failed";
}
echo "<br>";
echo "LOOP CONSTRUCTS<br>";
echo "<br>";
#for loop
echo "For loop<br><br>";
for ($x = 1; $x <= 10; $x++){
    echo "This is number " . $x . "<br>";
}

#foreach loop
echo "<br>Foreach loop<br><br>";
$name = array("Dana","Elaijah","Lizz");
foreach ($name as $n) {
    echo $n . "<br>";
}

#while and do-while 
echo "<br>While and Do-While<br><br>";
    #while
echo "-While-<br>";
    echo "Grades<br>";
    $grade = 1;
while ($grade <= 5){
    echo $grade . "<br>";
    $grade++;
}
    #do-while
echo "<br>-Do-While-<br>";
    $grade = 1;
    echo "Grades<br>";
do{
    echo $grade . "<br>";
    $grade++;
} while ($grade <= 5);
echo "<br><br>";

echo "Combining Loops and Conditions";
echo "<br><br>";

$number = array(1,2,3,4,5,6,7,8,9,10);
echo "This are the Even Numbers: ";
foreach($number as $number){
    if($number % 2 == 0){
        echo $number . " ";
    }   
}
echo "<br>";
$number = array(1,2,3,4,5,6,7,8,9,10);
echo "This are the Odd Numbers: ";
foreach($number as $number){
    if($number % 2 == 1){
        echo $number . " ";
    } 
}

?>