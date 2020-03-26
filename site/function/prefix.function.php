<?php 


function Prefix($iteration = 6)
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

function PrefixWithUnderscore($iteration = 6)
{
    return Prefix($iteration).'_';
}

?>