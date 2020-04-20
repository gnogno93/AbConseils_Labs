<?php 

function timeRandomizer()
{
    $strTimeZone = [
                    'America/New_York', 'Europe/Paris', 
                    'Antarctica/Casey', 'Arctic/Longyearbyen', 
                    'Asia/Tokyo','Pacific/Wake', 
                    'Pacific/Gambier', 'Atlantic/St_Helena',
                    'Australia/Darwin', 'Indian/Comoro',
                    'Asia/Dubai', 'Asia/Yekaterinburg',
                    'Europe/Kiev', 'Europe/Isle_of_Man'
                    ];
                        
   return date_default_timezone_set($strTimeZone[random_int (0 , count($strTimeZone)-1)]);
}

?>