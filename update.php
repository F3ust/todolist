<?php
    $dbserver = 'localhost';
    $dbusername = 'Faust';
    $dbpassword = 'Phu0ng95crA';
    $dbname = 'faust1';

    $connect = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    if ($connect->connect_error) {
        die($connect->connect_error);
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM dslop where id = '$id'";
    $res = $connect->query($sql);
    $row = $res->fetch_assoc();

    $ns = $row["ns"];
    $lp = $row["lp"];
    $ht = $row["ht"];
    $id = $row["id"];
    $ab = $row['ab'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin</title>
</head>
<body>
<form action="#" method="post">
        <input type="text" hidden name="id" value="<?php echo $id ?>">
        Họ và tên: <br> <input type="text" name="ht" value="<?php echo $ht ?>">
        <br>
        Ngày tháng năm sinh: <br> <input type="text" name="ns" value="<?php echo $ns ?>">
        <br>
        Lớp: <br> <input type="text" name="lp" value="<?php echo $lp ?>">
        <br>
        Giới thiệu: <br>
        <textarea name="ab" id="ab" cols="100" rows="20"><?php echo $ab ?></textarea>
        <br>
        <input type="submit" name="dk" value="Thay đổi">
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
        $sql = "UPDATE dslop SET ht = '$ht', lp='$lp', ns = '$ns', ab= '$ab' where id = '$id'";

        $res = $connect->query($sql);
		
        $connect->close();
	    header("Location: index.php");
    }
?>
</body>
</html>