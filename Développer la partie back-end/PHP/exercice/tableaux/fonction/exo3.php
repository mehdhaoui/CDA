<?php
function checkpwd($pwd){
    $lenght = strlen($pwd);
    
    for($i = 0; $i < $lenght; $i++) 	{
 
        // On sélectionne une à une chaque lettre
        $letter = $pwd[$i];
     
        if ($letter>='a' && $letter<='z')&&($letter>='A' && $letter <='Z')&&($letter>='0' && $letter<='9')&&($lenght >=8) {
           return true;
        }
        
        else {
            return false;
        }

}
$pwd = bonjour;
checkpwd($pwd);