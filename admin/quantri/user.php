<?php
    $kq='';
    $stt=0;
    foreach($user as $value){
        extract($value);
        $stt++;
        $kq.='<tr>
                <td>'.$stt.'</td>
                <td>'.$username.'</td>
                <td>'.$password.'</td>
                <td>'.$email.'</td>
                <td>'.$diachi.'</td>
                <td>'.$phone.'</td>
                <td>'.$role.'</td>
                
                <td><a href="admin.php?page=usersua&id='.$id.'" >Sửa</a> | <a href="admin.php?page=userxoa&id='.$id.'">Xóa</a></td>
            </tr>';
        }
?>
<link rel="stylesheet" href="view/admin.css">
<link rel="stylesheet" href="view/admin1.css">

<div class="container">
    <div class="column">
        <form action="admin.php?page=themuser" method="post" onsubmit="return validateForm()">
                <label for="">Tên:</label>
                <input name="username" type="text"> <br>

                <label for="">Pass:</label>
                <input name="password" type="text"> <br>

                <label for="">Email:</label>
                <input name="email" type="text"> <br>

                <label for="">Địa chỉ:</label>
                <input name="diachi" type="text"> <br>

                <label for="">Phone:</label>
                <input name="phone" type="text"> <br>

                <label for="">Role:</label>
                <input type="number" min=0 max=1 name="role"><br>
            <input type="submit" name="them_u" id="" value="Thêm">
        </form>
    </div>
<div class="column">
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Pass</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Phone</th>
            <th>Loại user</th>
            <th>Chức năng</th>
        </tr>
        <?php
            echo $kq;
        ?>
        <!-- <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="">Sửa</a> | <a href="">Xóa</a></td>
        </tr> -->
    </table>
    </div>
</div>        