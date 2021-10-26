<?php
//require_once './db.php';
        //$username = $_POST['username'];
        //$password = $_POST['password'];
        //echo $username."<br>";
        //echo $password;
        /**$connect = getConnect();
        $sql = "select * from users";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();

        var_dump($users)*/
session_start();
 
 
//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
    //Kết nối tới database
    require_once './db.php';
     
    //Lấy dữ liệu nhập vào
    $name = addslashes($_POST['name']);
    $password = addslashes($_POST['password']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$name || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    // mã hóa pasword
    $password = md5($password);
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysql_query("SELECT name, password FROM users WHERE name='$name'");
    if (mysql_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysql_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='/'>Về trang chủ</a>";
    die();
}   
?> 

