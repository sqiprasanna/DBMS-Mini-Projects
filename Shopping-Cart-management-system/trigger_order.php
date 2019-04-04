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
//$orderid = isset($_POST['orderid'])?$_POST['orderid']:0;
$pid= isset($_POST['pid'])?$_POST['pid']:0;
$qty = isset($_POST['qty'])?$_POST['qty']:0;
$invoice = isset($_POST['invoice'])?$_POST['invoice']:0;
$status = isset($_POST['status'])?$_POST['status']:NULL;

$sql = "select * from cart";
if($_POST['submit'] == 'Insert orders'){

    //$sql1=  "CREATE DEFINER=`root`@`localhost` TRIGGER `o` BEFORE INSERT ON `orders` FOR EACH ROW delete from cart where p_id = new.p_id;";
   // mysql_query($sql1,$conn);
   $sql2 =  "insert into orders(p_id,c_id,qty,invoice_no,status,order_date) values($pid,7,$qty,$invoice,'$status','2018-02-25'); ";
    //$sql2 = "update categories set cat_title= '$Title' where cat_id=$Id ";
   //$result1 = $conn->query($sql1);
   $result2 = $conn->query($sql2);   
    $result = $conn->query($sql);
    
    if ($result) 
    {
         while($row = mysqli_fetch_assoc($result)) 
	    {
            echo $row['p_id'].$row['ip_add'].$row['qty'] ."<br>";
        }
    }
}
