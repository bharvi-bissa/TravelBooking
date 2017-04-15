<?php

    /*mail('bissa_rajesh2007@rediffmail.com', 'testmail', 'This is test mail','From: freak@freakzoid.com');
    echo "mail sent";*/
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