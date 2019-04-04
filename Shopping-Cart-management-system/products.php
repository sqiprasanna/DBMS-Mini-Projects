<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppingcart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$pid=$_POST['pid'];
$ip = $_POST['ip'];
$qty= $_POST['qty'];
//$qty = 2;
$option = isset($_POST['product']) ? $_POST['product'] : false;
echo "PRODUCTS IN YOUR CART:";
$sql = "SELECT * FROM cart";

if($_POST['submit'] == 'Add to cart'){
    $sql2 = "insert into cart(p_id , ip_add , qty) values('$pid','$ip','$qty') ";
    $result2 =  $conn->query($sql2);
    $result = $conn->query($sql);
    if($result)
    {   
        echo "<table>";
        echo  "<th>| Product Id </th>"."<th>| Ip_add </th>"."<th>| qty </th>" ;
         while($row = mysqli_fetch_assoc($result)) 
	    {
            echo "<tr>"."<td>| ".$row['p_id']. " </td>"."<td>|". $row['ip_add']." </td>"."<td> |". $row['qty']." </td>"."</tr>" ;
        }
        echo "</table>";
    }
}
else if($_POST['submit'] == 'Remove from cart'){
    $sql2 = "delete from cart where p_id='$pid' and ip_add ='$ip'  and qty= '$qty' ";
    $result2 =  $conn->query($sql2);
    $result = $conn->query($sql);
    if($result)
    {   
        echo "<table>";
        echo  "<th>| Product Id </th>"."<th>| Ip_add </th>"."<th>| qty </th>" ;
         while($row = mysqli_fetch_assoc($result)) 
	    {
            echo "<tr>"."<td>| ".$row['p_id']. " </td>"."<td>|". $row['ip_add']." </td>"."<td> |". $row['qty']." </td>"."</tr>" ;
        }
        echo "</table>";
    }
}
else if($_POST['submit'] == 'Get Cart')
{   
    $result = $conn->query($sql);
    if($result)
    {   
        echo "<table>";
        echo  "<th>| Product Id </th>"."<th>| Ip_add </th>"."<th>| qty </th>" ;
         while($row = mysqli_fetch_assoc($result)) 
	    {
            echo "<tr>"."<td>| ".$row['p_id']. " </td>"."<td>|". $row['ip_add']." </td>"."<td> |". $row['qty']." </td>"."</tr>" ;
        }
        echo "</table>";
    }
}
else if($_POST["submit"] == 'Update'){
    $sql3 =  "update cart set p_id = $pid ,ip_add  = $ip , qty = $qty where p_id = $pid ";
    $result3 = $conn->query($sql3);
    $result = $conn->query($sql);
    if($result)
    {   
        echo "<table>";
        echo  "<th>| Product Id </th>"."<th>| Ip_add </th>"."<th>| qty </th>" ;
         while($row = mysqli_fetch_assoc($result)) 
	    {
            echo "<tr>"."<td>| ".$row['p_id']. " </td>"."<td>|". $row['ip_add']." </td>"."<td> |". $row['qty']." </td>"."</tr>" ;
        }
        echo "</table>";
    }
}

else{
    echo "No results found";
}
$conn->close();
?> 

<form method="post" action="index.html">  
    <input type ="submit" value="Back" name= "submit">
</form>
</body>
</html>