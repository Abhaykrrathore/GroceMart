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
$_SESSION['count'] = ((isset($_SESSION['count'])) ? $_SESSION['count'] : 1);
$_SESSION['totalExp'] = ((isset($_SESSION['totalExp'])) ? $_SESSION['totalExp'] : 0);
$_SESSION['q1'] = ((isset($_SESSION['q1'])) ? $_SESSION['q1'] : 0);
$_SESSION['q2'] = ((isset($_SESSION['q2'])) ? $_SESSION['q2'] : 0);
$_SESSION['q3'] = ((isset($_SESSION['q3'])) ? $_SESSION['q3'] : 0);
$_SESSION['q4'] = ((isset($_SESSION['q4'])) ? $_SESSION['q4'] : 0);

global $q1,$q2,$q3,$q4;

if($_SESSION['totalExp'] ==0){	
 $sql6 = "UPDATE inventory SET item1=0,item2=0,item3=0,item4=0 WHERE id =1";
 mysqli_query($conn,$sql6);
}

$q1=$_SESSION['q1'];
$q2=$_SESSION['q2'];
$q3=$_SESSION['q3'];
$q4=$_SESSION['q4'];

if(isset($_GET['button'])){
	
$_SESSION['totalExp']=0;
$_SESSION['count']++;

 $_SESSION['i1']=0;
 $_SESSION['i2']=0;
 $_SESSION['i3']=0;
 $_SESSION['i4']=0;
 
 	 $sql5 = "SELECT item1, item2, item3, item4 FROM inventory WHERE id=1";	 
     $result5= mysqli_query($conn,$sql5);
			
  while ($row5=mysqli_fetch_array($result5))
    {
	$q1 = $row5['item1'];
	$q2 = $row5['item2'];
	$q3 =  $row5['item3'];
	$q4 =  $row5['item4'];		
 
 $_SESSION['q1']=$q1;
 $_SESSION['q2']=$q2;
 $_SESSION['q3']=$q3;
 $_SESSION['q4']=$q4;
}
}

  $abc=$_SESSION['count'];
  $sql = "SELECT period, item1, item2, item3, item4 FROM price WHERE period='$abc'";
  
$result= mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
	global $itemi1,$itemi2,$itemi3,$itemi4;
	$itemi1 =  $row[1];
	$itemi2 =  $row[2];
	$itemi3 =  $row[3];
	$itemi4 =  $row[4];

 $_SESSION['itemi1']=$itemi1;
 $_SESSION['itemi2']=$itemi2;
 $_SESSION['itemi3']=$itemi3;
 $_SESSION['itemi4']=$itemi4;

    }
}
else{
	echo "You have completed shopping for all the 12 periods.";
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

echo <<<END
<script type="text/javascript">alert('You have completed shopping for all 12 periods');
window.location = "try3.php"; </script>
END;
}
mysqli_close($conn);
?>

<HTML>
<HEAD>
<link rel="stylesheet" type="text/css" href="try2css.css">
</HEAD>
<BODY>
<h1 class="GroceMart"><center>GroceMart</center></h1>
<div class="shopping-cart">
  <!-- Title -->		
  <div class="title">
    Shopping Bag
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Period : <?php echo $abc; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<a href="login.php">Admin</a>
  </div>

<table class="myTable" border="1">
 <tr>
   <td>
   <!-- Product #1 -->
    <label class="itemName">Household Cleaner</label> 
     <label class="inventory">Inventory at home : <?php echo $q1; ?><label id="returninv1"></label></label>
	
    <div class="item">
	 <div class="image">
      <img src="pictures/household.png" height="110" width="60"/>
     </div>

	<div class="price">
	  <span>Regular Price (in E) = 157.50</span>
	  <span>Current Price (in E) = <label id="returnPrice1"></label></span>
	</div>
	<div>
	  <form id="quantity" method="GET">
	  Quantity you would like to buy : <input type="number" name="item1" id="id_item_1" value="<?php echo $_SESSION['i1']; ?>" maxlength="70" style="width:80px;">	
	</div>
  </div>
   </td>
   <td>
   <!-- Product #2 -->
   <label class="itemName">Household Cleaner</label> 
     <label class="inventory">Inventory at home : <?php echo $q2; ?><label id="returninv2"></label></label>
	
    <div class="item">
	 <div class="image">
      <img src="pictures/Deodorant.png" height="60" width="60"/>
     </div>

	<div class="price">
	  <span>Regular Price (in E) = 157.50</span>
	  <span>Current Price (in E) = <label id="returnPrice2"></label></span>
	</div>
	<div>
	  Quantity you would like to buy : <input type="number" name="item2" id="id_item_2" value="<?php echo $_SESSION['i2']; ?>" maxlength="70" style="width:60px;">
	</div>
  </div>
   </td>
 </tr>
 <tr>
   <td>
   <!-- Product #3 -->
   <label class="itemName">Paper Tissue</label> 
     <label class="inventory">Inventory at home : <?php echo $q3; ?><label id="returninv3"></label></label>
	
	<div class="item"> 
    <div class="image">
      <img src="pictures/Tissue.png" height="55" width="60"/>
    </div>
 	
	<div class="price">
	  <span>Regular Price (in E) = 315.00</span>
	  <span>Current Price (in E) = <label id="returnPrice3"></label></span>
	</div>
 
    <div>
	  Quantity you would like to buy : <br> <input type="number"  name="item3" id="id_item_3" value="<?php echo $_SESSION['i3']; ?>" maxlength="70" style="width:100px;">
	</div>
  </div>
   </td>
   <td>
   <!-- Product #4 -->
   <label class="itemName">Juice</label> 
     <label class="inventory">Inventory at home : <?php echo $q4; ?><label id="returninv4"></label></label>

   <div class="item">
    <div class="image">
      <img src="pictures/Milk.png" height="90" width="60"/>
    </div>
	
	<div class="price">
	  <span>Regular Price (in E) = 315.00</span>
	  <span>Current Price (in E) = <label id="returnPrice4"></label></span>
	</div>

    <div>
Quantity you would like to buy : <br> <input type="number"  name="item4" id="id_item_4" value="<?php echo $_SESSION['i4']; ?>" maxlength="70" style="width:100px;">	
	</div>
  </div>
   </td>
 </tr>
</table>

  <div id="results"></div>
  <div class="nextperiod">
<center>  
	<label for="btn-estimate">Total Expenditure (in E) :</label>
	<input type="submit" name="estimate" value="Estimate Total" id="btn-estimate" onclick="submitForm('inv.php')" />
	<input type="text" id="txt-estimate" placeholder="0.00 E" value="<?php echo $_SESSION['totalExp'],' E'; ?>">
</center>	
<p>
<center>
<input type="submit" name="button" onclick="submitForm('try3.php')" value="Shop again for the next period"/>
</center>
 </p> </form>
  </div>

  <!--
  <center>  
  <p>
	<label for="btn-estimate">Total Expenditure (in E) :</label>
	
	<input type="submit" name="estimate" value="Estimate Total" onclick="holyCow()" id="btn-estimate" />
	<textarea name="message" id="results" rows="1" cols="30"></textarea>
	<input type="text" id="txt-estimate" placeholder="0.00 E">
	
  </p>
  </center>
    		
  <div id="results"></div>
  
  <div class="nextperiod">
 
 <center>
 
   <input type="submit" name="button" onclick="submitForm('try3.php')" value="<?php echo $abc; ?>"/>
   </form>
  </center>  
  </div>
-->
 </div>
<script type="text/javascript">
"use scrict";
	var itemi1 = <?php echo $itemi1; ?>;
	var itemi2 = <?php echo $itemi2; ?>;
	var itemi3 = <?php echo $itemi3; ?>;
	var itemi4 = <?php echo $itemi4; ?>;
function submitForm(action)
{
        document.getElementById('quantity').action = action;
        document.getElementById('quantity').submit();
}

function submitForm2(action)
{
		var item_1 = parseInt(document.getElementById('id_item_1').value, 10) || 0,
	    item_2 = parseInt(document.getElementById('id_item_2').value, 10) || 0,
		item_3 = parseInt(document.getElementById('id_item_3').value, 10) || 0,
		item_4 = parseInt(document.getElementById('id_item_4').value, 10) || 0;

	var totalExp = item_1*itemi1 + item_2*itemi2 + item_3*itemi3 + item_4*itemi4;
	
	if(totalExp > 1500){
	alert("You have exceeded the limit of purchase");
	}	
	if((item_1+inventory1==0)){alert('You have no Household Cleaner for this period');}
	if((item_2+inventory2==0)){alert('You have no Deodorant for this period');}
	if((item_3+inventory3==0)){alert('You have no Paper Tissue for this period');}
	if((item_4+inventory4==0)){alert('You have no Juice for this period');}
	else{
//	document.getElementById('results').innerHTML = 'Total Expenditure: ' + totalExp;

	document.getElementById('quantity').action = action;
        document.getElementById('quantity').submit();

	}	        
}

function holyCow()
{	
	var item_1 = parseInt(document.getElementById('id_item_1').value, 10) || 0,
	    item_2 = parseInt(document.getElementById('id_item_2').value, 10) || 0,
		item_3 = parseInt(document.getElementById('id_item_3').value, 10) || 0,
		item_4 = parseInt(document.getElementById('id_item_4').value, 10) || 0;

	var totalExp = item_1*itemi1 + item_2*itemi2 + item_3*itemi3 + item_4*itemi4;
		
	if(totalExp > 1500){
	alert("You have exceeded the limit of purchase");
	}	
	if((item_1+inventory1==0)){alert('You have no Household Cleaner for this period');}
	if((item_2+inventory2==0)){alert('You have no Deodorant for this period');}
	if((item_3+inventory3==0)){alert('You have no Paper Tissue for this period');}
	if((item_4+inventory4==0)){alert('You have no Juice for this period');}
	else{
	document.getElementById('results').innerHTML = 'Total Expenditure: ' + totalExp; 
	}	
}

function myFunction1() {
	return itemi1 + "0 E";
}
document.getElementById('returnPrice1').innerHTML = myFunction1();
function myFunction2() {
	return itemi2 + "0 E";
}
document.getElementById('returnPrice2').innerHTML = myFunction2();
function myFunction3() {
	return itemi3 + ".00 E";
}
document.getElementById('returnPrice3').innerHTML = myFunction3();
function myFunction4() {
	return itemi4 + ".00 E";
}
document.getElementById('returnPrice4').innerHTML = myFunction4();
</script>
</BODY>
</HTML>