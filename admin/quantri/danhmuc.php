<?php
    $kq='';
    $stt=0;
    foreach($danhmuc as $value){
        extract($value);
        $stt++;
        $kq.='<tr>
                <td>'.$stt.'</td>
                <td>'.$name.'</td>
                <td><a href="admin.php?page=danhmucsua&id='.$id.'">Sửa</a> | <a href="admin.php?page=danhmucxoa&id='.$id.'">Xóa</a></td>
            </tr>';
    }
?>

<link rel="stylesheet" href="view/admin.css">
<link rel="stylesheet" href="view/admin1.css">

<div class="container">
    <div class="column">
        <form action="admin.php?page=themdanhmuc" method="post">
            <label for="">Tên danh mục:</label>
            <input type="text" name="name">

            <input type="submit" name="themdm" value="Thêm danh mục">
        </form>
    </div>
    <div class="column">
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Chức năng</th>
            </tr>
        <?php
            echo $kq;
        ?>
        </table>
    </div>
  
</div>