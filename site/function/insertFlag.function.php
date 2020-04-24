<?php

function insertFlag ($dataStr, $search, $insertion) 
{
    return substr_replace($dataStr, $insertion, strpos($dataStr, $search)+ strlen($search), 0);
}

?>