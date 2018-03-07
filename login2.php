<?php
   $conn = mysqli_connect("localhost","id4266396_abhay","94060","id4266396_price");
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
      
   if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $sql = 'SELECT period, item1, item2, item3, item4 FROM price';

if ($result= mysqli_query($conn,$sql))
  {
	echo "<table>";
	echo "<tr>
	<th>Period</th>
	<th>Household Cleaner</th>
	<th>Deodorant</th>
	<th>Paper Tissue</th>
	<th>Juice</th>
	</tr>";
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    { 
	echo "<tr>
	<td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td>$row[4]</td>
	</tr>";
	}
	    echo "<table>";
}

if(isset($_GET['submit'])) {
$price = $_GET['updateprice'];
$period = $_GET['updateperiod'];
$item = $_GET['updateitem'];

switch ($item) {
    case 1:
        $sql1 = "UPDATE price SET item1='$price' WHERE period='$period'";
        if (mysqli_query($conn, $sql1)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        break;
    
    
    case 2:
        $sql2 = "UPDATE price SET item2='$price' WHERE period='$period'";
        if (mysqli_query($conn, $sql2)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        break;
    
    
    case 3:
        $sql3 = "UPDATE price SET item3='$price' WHERE period='$period'";
        if (mysqli_query($conn, $sql3)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        break;
    
    
    case 4:
        $sql4 = "UPDATE price SET item4='$price' WHERE period='$period'";
        if (mysqli_query($conn, $sql4)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        break;
    
    
    default:
        echo "Choose a correct number";
}

/*
if($item = 1) {
}

else if($item = 2) {
}

else if($item = 3) {
$sql3 = "UPDATE price SET item3='$price' WHERE period='$period'";
if (mysqli_query($conn, $sql3)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}

else if($item = 4) {
$sql4 = "UPDATE price SET item4='$price' WHERE period='$period'";
if (mysqli_query($conn, $sql4)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
*/
    
}
mysqli_close($conn);
?>

<HTML>
<TITLE>LOGIN PORTAL</TITLE>
<style>
form {
	margin-bottom : 10px;
	padding : 5px;
	width : 70%;
}

input[type=text], input[type=password] {
    width: 60%;
    padding: 12px 20px;
    margin: 10px 10px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 7px 0;
    border: none;
    cursor: pointer;
    width: 30%;	
}
submit:hover {
    opacity: 0.4;
}
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 200px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 100%;
    left: 50%;
    margin-left: -60px;
    
    /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
    opacity: 0;
    transition: opacity 1s;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
table {
margin: auto;
width : 600px;
text-align:center;

}

th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #666;
color: #FFF;
padding: 1px 6px;
border-collapse: separate;
border: 1px solid #000;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
}

</style>
<BODY>
<center>
<form action=login2.php method="GET">
<p>Choose Period : <input type="number" name="updateperiod"/></p>
<div class="tooltip"><p>Item Number : <input type="number" name="updateitem"/>
<span class="tooltiptext">
Item 1 : Household Cleaner<br/>
Item 2 : Deodorant<br/>
Item 3 : Paper Tissue<br/>
Item 4 : Juice<br/>
</span>
</div>
<p>Price to update : <input name="updateprice"/><br/></p>
<p><input type="submit" name="submit" value="Submit"></p>
</form>
<form action=try3.php method="GET">
<input type="submit" name="submit" value="Go to shopping cart">
</form>
</center>
</BODY>
</HTML>