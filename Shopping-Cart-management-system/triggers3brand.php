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
$cat_id = isset($_POST['cat_id'])?$_POST['cat_id']:NULL;
$cat_title = isset($_POST['cat_title'])?$_POST['cat_title']:NULL;
//$b_title = isset($_POST['b_title'])?$_POST['b_title']:NULL;

$sql_cat = "select * from categories";
$sql_br = "select * from brands;";
if($_POST['submit'] == 'Update Brands'){
    ///$sql2 = "CREATE TRIGGER `c` AFTER INSERT ON `categories` FOR EACH ROW begin update brands set brand_id = new.cat_id , brand_title = 'new.cat_title'";
    $sql1 = "insert into categories(cat_id,cat_title) values($cat_id,$cat_title)";
    //$result2 = $conn->query($sql2) ;
    $result1 = $conn->query($sql1) ;
    $result_br = $conn->query($sql_br) ;
    $result_cat = $conn->query($sql_cat);
    if($result_br){
        while($row = mysqli_fetch_assoc($result_br)){
            echo $row['brand_id'] . $row['brand_title'] . '<br>';
        }
    }
    
    if($result_cat){
        while($row = mysqli_fetch_assoc($result_cat)){
            echo  $row["cat_id"] . $row['cat_title'] . "<br>";
        }
    }
    
}


$conn->close();
?>