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


    if ((isset($_GET['id'])) && ($_GET['id'] > 0)) {
        $id = $_GET['id'];
        $danhmucsua = get_danhmuc($id);
        extract($danhmucsua);
    }
?>

<link rel="stylesheet" href="view/admin.css">
<link rel="stylesheet" href="view/admin1.css">

<div class="container">
    <div class="column">
        <form action="admin.php?page=danhmucluu" method="post" onsubmit="return validateForm()">
            <label for="">Tên danh mục:</label>
            <input type="text" name="name" value="<?=$name?>">

            <input type="submit" name="capnhat" value="Sửa">
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