<?php
    $dbserver = 'localhost';
    $dbusername = 'Faust';
    $dbpassword = 'Phu0ng95crA';
    $dbname = 'faust1';

    $connect = new mysqli($dbserver, $dbusername, $dbpassword, $dbname);
    if ($connect->connect_error) {
        die($connect->connect_error);
    }

    $sql = "SELECT * FROM dslop ";
    $res = $connect->query($sql);
    $nrows = $res->num_rows;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSLOP</title>
    <style>
        table {
            width: 100%;
        }
        table, td, tr {
            border: 2px solid black;
            border-collapse: collapse;
        }
        .nut {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="6" style="text-align: center;"><h2>DANH SÁCH HỌC SINH</h2></td>
        </tr>
        <tr>
            <td colspan="5" style="border: none;"><button><a class="nut" href="index.php">Trang chủ</a></button></td>
            <td colspan="1" style="border: none;"><button style="margin-left: 500px; margin-right: 20px;"><a class="nut" href="adding.php">Thêm học sinh</a></button></td>
        </tr>
        <tr>
            <td width = 3%>ID</td>
            <td width= 10%>Function</td>
            <td width= 20%>Họ tên</td>
            <td width= 15%>Ngày tháng năm sinh</td>
            <td width= 5%%>Lớp</td>
            <td rowspan="<?php echo $nrows+1; ?>" style="text-align: center; vertical-align: text-top;">
<?php
    if (!isset($_GET['id'])) {
?>
                <h3>About A2K31 - Ly Tu Trong high school for gifted</h3>
                <p>About 18 mavericks but 18 genius</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi architecto natus ipsam molestias quis, consectetur aliquid error fugit rerum cupiditate et delectus atque vel voluptates debitis in facilis repellendus reprehenderit?</p>
<?php
    } else {
        $id = $_GET["id"];
        $sql = "SELECT * FROM dslop where id = '$id' ";
        $C_res = $connect->query($sql);
        $c_row = $C_res->fetch_assoc();
?>
        <h3>Profile of: <?php echo $c_row['ht'];?></h3>
        <p><?php echo $c_row['ab'] ?></p>
<?php
    }
?>
            </td>
        </tr>

<?php
    $cnt = 1;
    while ($row = $res->fetch_assoc()) {
        $id = $row["id"];
        $ht= $row["ht"];    
        $ns = $row['ns'];
        $lp = $row['lp'];

?>
        <tr>
            <td>
                <?php echo "<a class='nut' href='index.php?id=$id'>$cnt</a>"; ?>
            </td>
            <td>
                <?php echo "<button><a class='nut' href='update.php?id=$id'>Chỉnh sửa</a></button>";?>   
                <?php echo "<button><a class='nut' href='delete.php?id=$id'>Xóa</a></button>";?>   
            </td>
            <td>
                <?php echo "<a href='index.php?id=$id'>$ht</a>"; ?>   
            </td>
            <td>
                <?php echo "$ns"; ?>
            </td>
            <td>
                <?php echo "$lp"; ?>
            </td>
        </tr>
<?php
        $cnt = $cnt + 1;
    }
?>
        <tr>
            <td colspan="6" style="text-align: center;">Design by @Mahiro</td>
        </tr>

    </table>
<?php 
    $connect->close();
?>
</body>
</html>