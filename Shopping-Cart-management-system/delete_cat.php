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
$Id = $_POST['Id']  ;
$Title = $_POST['Title'];
$sql = "SELECT * FROM categories";

//print_r($result);
if($_POST['submit'] == 'Add Categories'){
    $sql1 = "insert into categories(cat_title) values('$Title')";
    $result1 = $conn->query($sql1);
    $result = $conn->query($sql);
    if ($result) 
    {
         while($row = mysqli_fetch_assoc($result)) 
	    {
           echo  $row["cat_id"] . $row['cat_title'] . "<br>";
        }
    }
}
else if($_POST['submit'] == 'Remove Categories'){
    $sql2 =  "delete from categories where cat_title='$Title' ";
    $result2 = $conn->query($sql2);
    $result = $conn->query($sql);
    if ($result) 
    {
         while($row = mysqli_fetch_assoc($result)) 
	    {
           echo  $row["cat_id"]  .$row['cat_title'] . "<br>";
        }
    }
}
else if($_POST['submit'] == 'Update Categories'){
    $sql3 =  "update categories set cat_id= $Id where cat_title = '$Title'";
    //$sql3 = "update categories set cat_title= '$Title' where cat_id=$Id ";
    
    $result3 = $conn->query($sql3);
    $result = $conn->query($sql);
    if ($result) 
    {
         while($row = mysqli_fetch_assoc($result)) 
	    {
           echo  $row["cat_id"] . $row['cat_title'] . "<br>";
        }
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