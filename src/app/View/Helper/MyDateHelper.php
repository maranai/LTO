<?php

App::uses('ShareComponent', 'Controller/Component');
class MyDateHelper extends AppHelper
{	
	function getStringDate($date){
		return date("F j, Y" , strtotime($date));
	}
	
	function getPrintDate($date){
		return date("m/d/y", strtotime($date));
	}	
			
}

?>
