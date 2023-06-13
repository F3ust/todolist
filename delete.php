
<?php  
		$dbserver = 'localhost';
        $dbusername = 'Faust';
        $dbpassword = 'Phu0ng95crA';
        $dbname = 'faust1';

        $conn = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die($conn->connect_error);
        }   
		
		    $id = $_GET["id"];
		    $sql = "DELETE FROM dslop WHERE id = '$id'";
		    $res = $conn->query($sql);		

		$conn->close();
		header("Location: index.php");
?>