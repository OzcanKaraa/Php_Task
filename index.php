<?php require_once 'baglan.php';

if (isset($_GET['Sayfalama'])) {
    $GelenSayfalama = $_GET['Sayfalama'];

} else {
    $GelenSayfalama = 1;
}
$SayfalamaIcinSolVeSagButonSayisi = 2;
$SayfaBasinaGosterilecekKayitSayisi = 5;
$ToplamKayitSayisiSorgusu = $db->prepare("SELECT * from student"); //Database ilişkilendirme
$ToplamKayitSayisiSorgusu->execute(); //Kayıtları çıktı
$ToplamKayitSayisi = $ToplamKayitSayisiSorgusu->rowCount(); //rowCount() Satır Sayısını gösterir
$SayfalamayaBaslanacakKayitSayisi = intval(($GelenSayfalama * $SayfaBasinaGosterilecekKayitSayisi) - $SayfaBasinaGosterilecekKayitSayisi); //Kayıt Sayısı
$BulunanSayfaSayisi = ceil($ToplamKayitSayisi / $SayfaBasinaGosterilecekKayitSayisi);  //Bulunan Sayfa Sayfası


//Kayıt lıstesı
//$kayitsayisi = 5;
$liste = ($GelenSayfalama * $SayfaBasinaGosterilecekKayitSayisi) - $SayfaBasinaGosterilecekKayitSayisi;
//echo $liste;


?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="" crossorigin="">
    <title>Veri Tabanı PDO</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <style>
        .SayfalamaAlaniKapsayicisi {
            display: block;
            width: 100%;
            height: auto;
            margin: 0;
            padding: 10px 0 10px 0;
            /*border: 1px solid black;*/
            outline: none;
            text-align: center;
            text-decoration: none;
        }

        .SayfalamaAlaniIciMetinAlaniKapsayicisi {
            display: block;
            width: 100%;
            height: auto;
            margin: 0;
            padding: 5px 0 5px 0;
            /*border: 1px solid black;*/
            outline: none;
            text-align: center;
            text-decoration: none;
        }

        .SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi {
            display: block;
            width: 100%;
            height: auto;
            margin: 0;
            padding: 5px 0 5px 0;
            /*border: 1px solid black;*/
            outline: none;
            text-align: center;
            text-decoration: none;

        }

        .Pasif {
            display: inline-block;
            width: auto;
            height: 20px;
            margin: 0;
            /*padding: 0 0.5px;*/
            /*padding: 5px 7.5px;*/
            background: #FFFFFF;
            /*border: 1px solid ;*/
            outline: none;
            font-size: 15px;
            font-style: normal;
            font-variant: normal;
            line-height: 20px;
            text-align: center;
            text-decoration: none;
        }

        .Pasif a:visited, a:hover, a:active {
            text-decoration: none;
            color: blue;
        }

        .Aktif {
            display: inline-block;
            width: auto;
            height: 20px;
            margin: 0;
            /*padding: 0 0.5px;*/
            /*padding: 5px 7.5px;*/
            background: #F6F6F6;
            color: #FF0000;
            border: 1px solid #DADADA;
            outline: none;
            font-size: 15px;
            font-style: normal;
            font-variant: normal;
            font-weight: bold;
            line-height: 20px;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>

<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="display-3 text-center">Öğrenci Kayıt İşlemi </h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="btn-group">
                    <a href="ekle.php" class="btn btn-outline-primary">Öğrenci Ekle</a>
                </div>
            </div>
            <div class="col">
                <form action="aramasonuc.php" method="GET">
                    <table width="500" border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td>
                                <input type="submit" class="btn btn-outline-primary" value="ARA"
                                       style="height: 30px; float:right;">

                                <input type="text" name="kelime"
                                       style="height:30px;float:right;">
                            </td>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <br>


</header>

<br>

<?php

$_GET["sort"] = $_GET["sort"] ?? 'id';
$_GET["type"] = $_GET["type"] ?? 'ASC';

?>


<table align="center" style="width: 80%">
    <tr>
        <th><b><u>
                    <?= (($_GET["type"] == "ASC") ?
                        '<i class="fa-solid fa-arrow-down"></i>' :
                        '<i class="fa-solid fa-arrow-up"></i>'
                    ) ?>
                    <a href="?sort=ID&type=<?= (($_GET["type"] == "ASC") ? 'DESC' : 'ASC') ?>">ID</a>
                </u></b></th>
        <!--        <i class="fa-solid fa-chevron-up"></i>-->
        <!--        <i class="fa-solid fa-chevron-down"></i>-->
        <th><b><u><?= (($_GET["type"] == "ASC") ?
                        '<i class="fa-solid fa-arrow-down"></i>' :
                        '<i class="fa-solid fa-arrow-up"></i>'
                    ) ?>
                    <a href="?sort=first_name&type=<?= (($_GET["type"] == "ASC") ? 'DESC' : 'ASC') ?>">AD</a></u></b>
        </th>

        <th><b><u><?= (($_GET["type"] == "ASC") ?
                        '<i class="fa-solid fa-arrow-down"></i>' :
                        '<i class="fa-solid fa-arrow-up"></i>'
                    ) ?>
                    <a href="?sort=last_name&type=<?= (($_GET["type"] == "ASC") ? 'DESC' : 'ASC') ?>">Soyad</a></u></b>
        </th>

        <th><b><u><?= (($_GET["type"] == "ASC") ?
                        '<i class="fa-solid fa-arrow-down"></i>' :
                        '<i class="fa-solid fa-arrow-up"></i>'
                    ) ?>
                    <a href="?sort=birth_place&type=<?= (($_GET["type"] == "ASC") ? 'DESC' : 'ASC') ?>">DOĞUM
                        YERİ</a></u></b></th>

        <th><b><u><?= (($_GET["type"] == "ASC") ?
                        '<i class="fa-solid fa-arrow-down"></i>' :
                        '<i class="fa-solid fa-arrow-up"></i>'
                    ) ?>
                    <a href="?sort=birth_date&type=<?= (($_GET["type"] == "ASC") ? 'DESC' : 'ASC') ?>">DOĞUM TARİHİ</a></u></b>
        </th>
    </tr>

    <?php


    //print_r($_GET);


    $students = $db->prepare("SELECT * 
                        FROM student  
                        ORDER BY {$_GET["sort"]} {$_GET["type"]}  
                        LIMIT  {$SayfalamayaBaslanacakKayitSayisi}, {$SayfaBasinaGosterilecekKayitSayisi}         
                        "); //$students
    //    $studentsdb = $db->query($students)->fetchAll(PDO::FETCH_ASSOC);
    $students->execute();
    //    Foreach($studentsdb as $data){
    //        echo "$data";
    //    }

    //    $say = 0;
    if (!empty($students)) {
        while ($studentAll = $students->fetch(PDO::FETCH_ASSOC)) {
//            $say++;
            ?>
            <tr>
                <!--                <td>--><?php //echo $liste+$say; ?><!--</td>-->
                <td><?php echo $studentAll['id'] ?></td>
                <td><?php echo $studentAll['first_name'] ?></td>
                <td><?php echo $studentAll['last_name'] ?></td>
                <td><?php echo $studentAll['birth_place'] ?></td>
                <td><?php echo $studentAll['birth_date'] ?></td>


                <td align="center"><a href="guncelle.php?id=<?php echo $studentAll['id'] ?>">
                        <button class="btn btn-outline-success">Güncelle</button></td>
                </a>
                <td align="center"><a href="islem.php?id=<?php echo $studentAll['id'] ?>&delete=ok">
                        <!--                <td align="center"><a href="islem.php?id=-->
                        <?php //echo $studentAll['id'] ?><!--&delete=ok">-->
                        <!--                <td align="center"><a href="?sil=-->
                        <?php //echo $studentAll['id'] ?><!--">-->
                        <!--                    <script type="text/javascript" language="JavaScript">alert("Silmek için emin misiniz") </script>-->
                        <button class="btn btn-outline-danger" onclick="ConfirmDelete()" class="text-light"> Sil
                        </button>
                </td>
            </tr>
        <?php }
    } ?>
</table>

<div class="SayfalamaAlaniKapsayicisi">
    <div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
        Toplam <?php echo $BulunanSayfaSayisi; ?> sayfada, <?php echo $ToplamKayitSayisi; ?> adet kayıt bulunmaktadır.
    </div>

    <div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
        <?php
        if ($GelenSayfalama > 0) {
            echo "<span class='Pasif'><a href='index.php?Sayfalama=1'>Geri</a></span>";
//            $SayfalamaIcinSayfaDegeriniBirGeriAl = $GelenSayfalama - 1;
//            echo " <span class='Pasif'><a href='index.php?Sayfalama=" . $SayfalamaIcinSayfaDegeriniBirGeriAl . "'></a></span>";
        }

        for ($SayfalamaIcinSayfaIndexDegeri = $GelenSayfalama - $SayfalamaIcinSolVeSagButonSayisi;
             $SayfalamaIcinSayfaIndexDegeri <= $GelenSayfalama + $SayfalamaIcinSolVeSagButonSayisi;
             $SayfalamaIcinSayfaIndexDegeri++) {

            if (($SayfalamaIcinSayfaIndexDegeri > 0) and ($SayfalamaIcinSayfaIndexDegeri <= $BulunanSayfaSayisi)) {
                if ($GelenSayfalama == $SayfalamaIcinSayfaIndexDegeri) {
                    echo " <span class='Aktif'>" . $SayfalamaIcinSayfaIndexDegeri . "</span>";
                } else {
                    echo " <span class='Pasif'><a href='index.php?Sayfalama=" . $SayfalamaIcinSayfaIndexDegeri . "'>" . $SayfalamaIcinSayfaIndexDegeri . "</a></span>";
                }
            }
        }

        if ($GelenSayfalama != $BulunanSayfaSayisi) {
            $SayfalamaIcinSayfaDegeriniBirIleriAl = $GelenSayfalama + 1;
            echo " <span class='Pasif'><a href='index.php?Sayfalama=" . $SayfalamaIcinSayfaDegeriniBirIleriAl . "'>İleri</a></span>";
//            echo " <span class='Pasif'><a href='index.php?Sayfalama=" . $BulunanSayfaSayisi . "'>>></a></span>";
        }
        ?>
    </div>
</div>

<script type="text/javascript">
    function ConfirmDelete() {
        if (confirm("Silmek istediğinize emin misiniz?"))
            location.href = 'islem.php';
    }
</script>


<!--<input type="button"  value="deletislem">-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>