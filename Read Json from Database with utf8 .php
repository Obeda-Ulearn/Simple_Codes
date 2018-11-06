<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clothesapp";
// Create connection
  header('Content-Type: application/json;charset=utf-8');  

$conn = new mysqli($servername, $username, $password, $dbname);

// this code to convert chars to utf8
$conn->set_charset("utf8");

/*
Do not forget to change connection  info 
I mean database name , user name ,password and the host
لا تنس تغيير معلومات الاتصال الخاصة بك 
اسم قاعدة البيانات واسم المستخدم واسم الجدول 
*/

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// numsub means how much of data you want to appear everytime
$NumSub = 500;

$start = (int)$_GET['limit'];
$sql = "SELECT * FROM clothesapi  LIMIT $start , $NumSub";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
echo "\n \n \n\n \n \n";

	$All_storys = array();
    while($row = $result->fetch_assoc()) {
        $All_storys[] = $row;
    }
} else {
    echo "0 results";
}

	$json_re=array();
	array_push($json_re,array("All_storys"=>$All_storys));
	echo json_encode($json_re);
	
 
	
$conn->close();
?>
