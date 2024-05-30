<?php
#Variables
$int = 10;
$float = 10.5;
$string = "Variables";
$boolean1 = true;
echo "Integer is " . $int;
echo "<br>Float is " . $float;
echo "<br>String is " . $string;
echo "<br>If boolean is true = " . $boolean1;

#Arithmetic Operation
$num1 = 12;
$num2 = 11;
$sum = $num1 + $num2;
$diff = $num1 - $num2;
$product = $num1 * $num2;
$qoutient = $num1 / $num2;
echo "<br><br>Num1 = " . $num1;
echo "<br>Num2 = " . $num2;
echo "<br>The Sum of num1 and num2 is " . $sum;
echo "<br>The Different of num1 and num2 is " . $diff;
echo "<br>The Product of num1 and num2 is " . $product;
echo "<br>The Quotient of num1 and num2 is " . $qoutient;

#String Manipulation
$String1 = "Manipulation";
echo "<br><br>The lenght of the string  " . $String1 .  " is " . strlen($String1);
$String2 = "String Hype";
echo "<br>The String Hype was replaced as " . str_replace( "Hype","Type", $String2);
?>