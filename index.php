<?php
    session_start();
    
    include("connect.php");
    if (isset($_SESSION['id'])) {
        $uid = $_SESSION['id'];
    } else $uid = -1;
    

    $sql = "SELECT * FROM todolist where usid = '$uid' ";
    $res = $connect->query($sql);
    $nrows = $res->num_rows;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOLIST</title>
    <style>
        html, body {
            height: 100%;
            margin: 0 0 0 0;
        }
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
         .footer {
            background-color:#ccc;
            text-align:center;
            //padding:25px;
            font-size:18px;
            position: absolute;
            width : 100%;
            bottom: 0;
            padding-top: 25px;
            padding-bottom: 25px;
            //padding-left: 25px;
        }
        header {
            background-color:#ccc;
            //text-align:center;
            //padding:25px;
            padding-top: 25px;
            padding-bottom: 25px;
            //padding-left: 25px;
            font-size:18px;
            //position: absolute;
            width : 100%;
            top: 0;
        }
        .login {
            text-align: right;
        }
        .lg {
            right = 0;
            //padding:25px;
        }
    </style>
</head>
<body>
    <header>
         <div class = "tt">
            <h3>Faust no TODOLIST</h3>
        </div>
        <div class = "login">
<?php
    if (!isset($_SESSION['tk'])) {
?>
            <button class = "lg"><a class="nut" href="login.php">Đăng nhập</a></button>
            <button class = "lg"><a class="nut" href="signup.php">Đăng ký</a></button>
<?php
    } else {      
?>
              <?php echo $_SESSION['ht']; ?> 
              <button class = "lg"><a class="nut" href="logout.php">Đăng xuất</a></button>
<?php
    }
?>
        </div>

    </header>
    <h2 style="text-align: center;">
        <a href="index.php">TODOLIST</a>
    </h2>
    <table style="margin-bottom: 50px; border: none !important;">
        <tr>
            <td style="text-align: right;">

            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: center;" width = 5%>Thứ tự</td>
            <td style="text-align: center;">
                Việc cần làm
<?php
            if (isset($_SESSION['tk'])) {
                echo "<a href='adding.php?uid=$uid'>(Thêm mới)</a>";
            }
?>
        </td>
            <td style="text-align: center;" width= 12%>Thao tác</td>

        </tr>

<?php
    $cnt = 1;
    while ($row = $res->fetch_assoc()) {
        $id = $row["id"];
        $nm= $row["nm"];    
        $ab = $row['ab'];
?>
        <tr>
            <td style='text-align: center;'>
                <?php echo "<a  class='nut' href='index.php?id1=$id'>$cnt</a>"; ?>
            </td>
            <td>
<?php
    if (!isset($_GET['id1'])) {
        echo "<a href='index.php?id1=$id'>$nm</a>";
    } else {
        $id1 = $_GET["id1"];
        $sql = "SELECT * FROM todolist where id = '$id1' ";
        $C_res = $connect->query($sql);
        $c_row = $C_res->fetch_assoc();
        if ($id == $id1) {
?>
        <h3><?php echo $c_row['nm'];?></h3>
        <p><?php echo $c_row['ab'] ?></p>
<?php
        } else {
            echo "<a href='index.php?id1=$id'>$nm</a>";
        }
?>
<?php

    }
?>   
                
            </td>
            <td>
                <?php echo "<button style='margin-left: 20px;'><a  class='nut' href='update.php?id1=$id'>Chỉnh sửa</a></button>";?>   
                <?php echo "<button style='margin-left: 20px;'><a class='nut' href='delete.php?id=$id'>Xóa</a></button>";?>   
            </td>
            
        </tr>
<?php
        $cnt = $cnt + 1;
    }
?>

    </table>
    <footer>
        <div class = "footer">
            Mini project by Faust >.<
        </div>
    </footer>
<?php 
    $connect->close();
?>
</body>
</html>
