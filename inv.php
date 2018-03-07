<?php

$conn = mysqli_connect("localhost","id4266396_abhay","94060","id4266396_price");
if(! $conn ) {
      die('Could not connect: ' . mysql_error());
}   
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  session_start();
  
 $_SESSION['i1']=$_GET['item1'];
 $_SESSION['i2']=$_GET['item2'];
 $_SESSION['i3']=$_GET['item3'];
 $_SESSION['i4']=$_GET['item4'];
 
 $itm1=$_GET['item1'];
  $itm2=$_GET['item2'];
   $itm3=$_GET['item3'];
    $itm4=$_GET['item4'];
	
	$totalExp = $itm1*$_SESSION['itemi1'] + $itm2*$_SESSION['itemi2'] + $itm3*$_SESSION['itemi3'] + $itm4*$_SESSION['itemi4'];
	
//	if($totalExp > 1500){
//	echo "You have exceeded the limit of purchase";
//	}
	
	
	if($totalExp > 1500){
	echo "<script type='text/javascript'>alert('You have exceeded the limit of purchase');</script>";
	}

	else if($itm1+$_SESSION['q1']<=0){
	echo "You have no Household Cleaner for this period";
	}
	
	else if($itm2+$_SESSION['q2']<=0){
	echo "<script type='text/javascript'>alert('You have no Deodorant for this period');</script>";
	}
 	
	else if($itm3+$_SESSION['q3']<=0){
	echo "<script type='text/javascript'>alert('You have no Paper Tissue for this period');</script>";
	}
	
	else if($itm4+$_SESSION['q4']<=0){
	echo "<script type='text/javascript'>alert('You have no Juice for this period');</script>";
	}
 else{
 $item1=$_GET['item1']-1;
 $item2=$_GET['item2']-1;
 $item3=$_GET['item3']-1;
 $item4=$_GET['item4']-1;
 
 $_SESSION['totalExp']=$totalExp;

 $sql = "UPDATE inventory SET item1=item1+'$item1',item2=item2+'$item2',item3=item3+'$item3',item4=item4+'$item4' WHERE id =1";
if(mysqli_query($conn,$sql)){	
   header("Location: try3.php"); 
}

mysqli_close($conn);

}
?>


