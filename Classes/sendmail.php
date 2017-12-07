<?php

    
    class sendmail{
    	$var_to;
    	$var_from;
    	$var_body;
    	$var_subject;
    	function mailtosend($to,$subject,$body,$from){
    		$to=this->$var_to;
    		$from=this->$var_from;
    		$body=this->
    		mail($to,$subject,$body,$from);
    		return "mail sent";
    	}
    }
   
?>
