<?php
if(isset($_POST['state_id'])){

	$state_id="cricket";
	$n=0;
	$state_id=$_POST['state_id'];
	
	if($state_id=="cricket"){
		$n=11;
	}
	else if($state_id=="football"){
		$n=11;	
	}
	else if($state_id=="badminton"){
		$n=4;	
	}
	else if($state_id=="baseball"){
		$n=7;	
	}
	else if($state_id=="tennis"){
		$n=4;	
	}
	else if($state_id=="volleyball"){
		$n=12;	
	}
	else
	{
		$n=5;	
	}
	echo "<select name='spaceavailable'>";
	for($i=1;$i<=$n;$i++){
		echo"<option>".$i."</option>";
	}
	echo "</select>";
}
?>