<?php
    $dbserver = 'localhost';
    $dbusername = 'Faust';
    $dbpassword = 'Phu0ng95crA';
    $dbname = 'faust1';

    $connect = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    if ($connect->connect_error) {
        die($connect->connect_error);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <form action="#" method="post">
        Họ và tên: <br> <input type="text" name="ht">
        <br>
        Ngày tháng năm sinh: <br> <input type="text" name="ns">
        <br>
        Lớp: <br> <input type="text" name="lp">
        <br>
        Giới thiệu: <br>
        <textarea name="ab" id="ab" cols="100" rows="20"></textarea>
        <br>
        <input type="submit" name="dk" value="Thêm">
    </form>

<?php
    if (isset($_POST['dk'])) {
        $ns = $_POST["ns"];
		$lp = $_POST["lp"];
		$fn = $_POST["ht"];
        $ab = $_POST["ab"];
        $dbserver = 'localhost';
        $dbusername = 'Faust';
        $dbpassword = 'Phu0ng95crA';
        $dbname = 'faust1';
        $connect = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
        if ($connect->connect_error) {
            die($connect->connect_error);
        }
        $sql = "INSERT INTO dslop VALUES(NULL, '$fn', '$ns', '$lp', '$ab')";

        $res = $connect->query($sql);
		
        $connect->close();
	    header("Location: index.php");
    }
?>
</body>
</html>
