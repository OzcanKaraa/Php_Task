<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html lang="TR">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<H3 align="center">YENİ KAYIT EKLEME FORMU</H3>
<br>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
<br>
<form action="islem.php" method="POST"  >
    <div align="center">


        <div class="form-group"><input type="text" required="" name="first_name" placeholder="Adınızı Giriniz "></p></div>

        <div class="form-group"><input type="text" required="" name="last_name" placeholder="Soyadınızı Giriniz "></p></div>

        <div class="form-group"><input type="text" required="" name="birth_place" placeholder="Dogum Yerini Giriniz"></p></div>

        <div class="form-group"><input type="date" required="" name="birth_date" placeholder=""></p></div>

        <td><p>  <button type="submit" name="insertislemi" class="btn btn-outline-primary">KAYDET</button></p></td>

        <td><p> <button type="reset" name="btn btn-danger" name="Sil" value="Sil" class="btn btn-outline-primary">TEMİZLE</button></p></td>

    </div>

</form>
</body>
</html>