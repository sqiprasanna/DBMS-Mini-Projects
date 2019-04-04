<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "shoppingcart";

$conn = new mysqli($servername,$username,$password,$db_name);

if($conn->connect_error){
    die("connection failed : " .$conn->connect_error );
}
$orderid = isset($_POST['orderid'])?$_POST['orderid']:0;
$pid= isset($_POST['pid'])?$_POST['pid']:0;
$qty = isset($_POST['qty'])?$_POST['qty']:0;
$invoice = isset($_POST['invoice'])?$_POST['invoice']:0;
$status = isset($_POST['status'])?$_POST['status']:NULL;

$sql = "SELECT * FROM orders";
//$sql1 = "SELECT * FROM orders where order_id = $orderid";


if($_POST['submit'] == 'Get Orders'){
    $result = $conn->query($sql);
    if($result){
        echo "<table>";
        echo  "<th> Order id </th>"."<th> product_id </th>"."<th> customer_id </th>"."<th> quantity </th>"."<th> invoice_no </th>"."<th> status </th> "."<th> order_date </th>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>"."<td>| ".$row['order_id']. " </td>"."<td>| ".$row['p_id']. " </td>"."<td>|". $row['c_id']." </td>"."<td> |". $row['qty']." </td>"."<td>| ".$row['invoice_no']. " </td>"."<td>| ".$row['status']. " </td>"."<td>| ".$row['order_date']. " </td>"."</tr>" ; 
        }
        echo "</table>";
    }
}
else if($_POST['submit'] == 'Update Orders'){
    $sql3 =  "update orders set p_id  = case when $pid != 0 then $pid else p_id end,
                               qty = case when $qty != 0 then $qty else qty end ,
                               invoice_no = case when $invoice != 0 then $invoice else invoice_no end,
                               status ='$status'     
                               where order_id = $orderid";
    $result3 = $conn->query($sql3);
    $result = $conn->query($sql);
    if($result){
        echo "<table>";
        echo  "<th> Order id </th>"."<th> product_id </th>"."<th> customer_id </th>"."<th> quantity </th>"."<th> invoice_no </th>"."<th> status </th> "."<th> order_date </th>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>"."<td>| ".$row['order_id']. " </td>"."<td>| ".$row['p_id']. " </td>"."<td>|". $row['c_id']." </td>"."<td> |". $row['qty']." </td>"."<td>| ".$row['invoice_no']. " </td>"."<td>| ".$row['status']. " </td>"."<td>| ".$row['order_date']. " </td>"."</tr>" ; 
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