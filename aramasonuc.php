<?php
require_once("baglan.php");
?>

    <!doctype html>
    <html lang="tr-TR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="tr">
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="" crossorigin="">
        <title>Veri Tabanı PDO</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
              integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>

    </head>

<body>

<tr align="center">
    <td><?php
        $GelenKelime = filtre($_GET["kelime"]??'');
        $Kosul = "%$GelenKelime%";
        //    $Sorgu = $VeriTabaniBaglantisi->prepare("Select * from eşyalar WHERE adi LIKE `%?`%");
        //                    $Sorgu = $VeriTabaniBaglantisi->prepare("Select * from eşyalar WHERE adi LIKE `%$GelenKelime%`");
        $Sorgu = $db->prepare("SELECT * FROM student WHERE first_name LIKE ?");
        $Sorgu -> execute([$Kosul]);
        //                    $Sorgu -> execute();
        $KayitSayisi = $Sorgu->rowCount();
        $Kayitlar = $Sorgu->fetchAll(PDO::FETCH_ASSOC);
        //                    echo  "</br>";


        foreach ($Kayitlar as $Satirlar){
            //print_r($Satirlar);
            echo $Satirlar["first_name"] ."<br/>".$Satirlar["last_name"]  ;
        }
        ?> </td>
</tr>

<table class="table">
    <thead>
    <tr>

        <th scope="col">AD</th>
        <th scope="col">SOYAD</th>

    </tr>
    </thead>
    <tbody>

    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>

        <td></td>
        <td></td>

    </tr>
    </tbody>

</table>
</form>
</body>
    </html>
    <?php
    $VeriTabaniBaglantisi = null;
    ?>