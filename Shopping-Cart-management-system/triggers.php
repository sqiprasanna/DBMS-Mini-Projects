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
$c_name = $_POST['c_name'];
$c_id = $_POST['c_id']  ;
$sql = "SELECT * FROM customers";

if($_POST['submit'] == 'Update CustomerId'){

    $sql1=  "CREATE TRIGGER `n` AFTER UPDATE ON `customers` FOR EACH ROW update orders set c_id = new.customer_id where c_id = old.customer_id";
   // mysql_query($sql1,$conn);
   $sql2 =  "update customers set customer_id= $c_id where customer_name = '$c_name' ";
    //$sql2 = "update categories set cat_title= '$Title' where cat_id=$Id ";
   $result1 = $conn->query($sql1);
   $result2 = $conn->query($sql2);   
    $result = $conn->query($sql);
    
    if ($result) 
    {
        echo "<table>";
        echo  "<th>| Customer_name</th>"."<th>| Customer_id </th>"."<th>| Customer_contact </th>"."<th>| Customer_address</th>" ; 
        while($row = mysqli_fetch_assoc($result)) 
	    {
           echo  "<tr>"."<td>| ".$row["customer_name"] ." </td>"."<td> |". $row['customer_id'] ." </td>"."<td> |".$row['customer_contact'] ." </td>"."<td> |". $row['customer_address']. " </td>"."</tr> "."<br>";
        }
        echo "</table>";
    }
}
else if($_POST['submit'] == 'Get Customers Data'){
    $result = $conn->query($sql);
    if ($result) 
    {
        echo "<table>";
        echo  "<th>| Customer_name</th>"."<th>| Customer_id </th>"."<th>| Customer_contact </th>"."<th>| Customer_address</th>" ; 
        while($row = mysqli_fetch_assoc($result)) 
	    {
           echo  "<tr>"."<td>| ".$row["customer_name"] ." </td>"."<td> |". $row['customer_id'] ." </td>"."<td> |".$row['customer_contact'] ." </td>"."<td> |". $row['customer_address']. " </td>"."</tr> "."<br>";
        }
        echo "</table>";
    }
}

else
 {
    echo "No results found ";
}
$conn->close();
?> 
<form method="post" action="index.html">  
    <input type ="submit" value="Back" name= "submit">
</form>
</body>
</html>