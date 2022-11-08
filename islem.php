<?php

require_once 'baglan.php';

if (isset($_POST['insertislemi'])) {


    $kaydet = $db->prepare("INSERT into student set

		first_name=:ad,
		last_name=:soyad,
		birth_place	=:dogum_yeri,
		birth_date =:dogum_tarihi
		");

    $insert = $kaydet->execute(array(
        'ad' => $_POST['first_name'],
        'soyad' => $_POST['last_name'],
        'dogum_yeri' => $_POST['birth_place'],
        'dogum_tarihi' => $_POST['birth_date']
    ));

    if ($insert) {
//        echo "kayıt başarılı";
        Header("Location:index.php?durum=ok");

//        Header("Location:index.php?durum=ok");
        exit;

    } else {

//        echo "kayıt başarısız";
        Header("Location:index.php?durum=no");
//        Header("Location:index.php?durum=no");
        exit;
    }
}


if (isset($_POST['updateislemi'])) {

    $id = $_POST['id'];
    $sql = "UPDATE student SET first_name=?, last_name=?, birth_place=?, birth_date=? WHERE id=?";
    $update = $db->prepare($sql)->execute([$_POST['first_name'], $_POST['last_name'], $_POST['birth_place'], $_POST['birth_date'], $id]);

    if ($update) {

        //echo "kayıt başarılı";
        //Header("Location:guncelle.php?durum=ok&id=$id");
        Header("Location:index.php");
        exit;

    } else {
        //echo "kayıt başarısız";
        Header("Location:guncelle.php?durum=no&id=$id");
        exit;
    }
}

if ($_GET['delete'] == "ok") {
    $sil = $db->prepare("DELETE from student where id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['id']
    ));
}


if ($deleteislemi) {

//    echo "kayıt başarılı silindi";

    Header("Location:index.php?durum=ok&id=$deleteislemi");
    exit;

} else {

    //echo "kayıt başarısız";
    Header("Location:index.php?durum=no&id=$deleteislemi");
    exit;
}
?>
