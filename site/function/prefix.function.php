<?php 

/*
* this section contains functions to create a database prefix
* it takes characters between 65 and 90 (uppercase) and 97 to 122 (lowercase) randomly
* use prefixWithUnderscore to have an underscore as the ending character
* WARNING: if you don't send anything, the prefix will be 6 by default
*/


function prefix($iteration = 6)
{
    $str = '';
    random_int (0 ,1);
    for($i=0; $i<$iteration;$i++)
    {
        $random_number = random_int (0 ,1);
        if($random_number)
        {
            $str = $str.chr(random_int (65, 90));
        } else{
           $str = $str.chr(random_int (97, 122)); 
        }
    }
    return $str;
}

function prefixWithUnderscore($iteration = 6)
{
    return prefix($iteration).'_';
}

?>