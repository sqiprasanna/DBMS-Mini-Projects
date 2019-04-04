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


$sql1 = "select * from view_payment";
$sql2 = "select * from view_categories";
if($_POST['submit'] == 'view payment amount > 500'){
    $sql = "create view view_payment
            AS select * from payments 
            where payment_id between 1 and 10
            AND amount > 500;";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    if($result1){
        while($row = mysqli_fetch_assoc($result1)){
            echo $row['payment_id'] . $row['amount']. $row['customer_id']."<br>";
        }
    }
}
else if($_POST['submit'] == 'view categories'){
    $sql = "create view view_categories
     As select *
     from categories
     where cat_title
     not like 'L%' and cat_id between 2 and 6;";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    if($result2){
        while($row = mysqli_fetch_assoc($result2)){
            echo $row['cat_id'] . $row['cat_title']."<br>";
        }
    }
}

?> 
<form method="post" action="index.html">  
    <input type ="submit" value="Back" name= "submit">
</form>
</body>
</html>