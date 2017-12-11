<?php
session_start();
//' OR '1'='1
//echo md5('missing123');

function escape($String){
    return htmlentities(trim($String),ENT_QUOTES,'UTF-8');
	
}

