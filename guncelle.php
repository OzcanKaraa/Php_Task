<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title></title>
</head>
<header>
    <div class="container">
        <div class="row">
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="btn-group">
                </div>
            </div>
        </div>
    </div>
    <br>
</header>
<body >
<h2 align="center"> Güncelleme Sayfası</h2>
<hr>

<div class="row" align="center">
    <div class="col">
        <div class="btn-group">
            <a href="ekle.php"  class="btn btn-outline-primary">YENİ ÖĞRENCİ EKLE</a>
        </div>
    </div>
</div>

<?php


$students=$db->prepare("SELECT * from student where id=:id");
$students->execute(array(
    'id' => $_GET['id']
));
$studentAll=$students->fetch(PDO::FETCH_ASSOC);
?>


<form action="islem.php" method="POST" align="center">
    <div class="form-group"><input type="text" required="" name="id" value="<?php echo $studentAll['id'] ?>"></div>
    <div class="form-group"><input type="text" required="" name="first_name" value="<?php echo $studentAll['first_name'] ?>"></div>
        <div class="form-group"><input type="text" required="" name="last_name" value="<?php echo $studentAll['last_name'] ?>"></div>
            <div class="form-group"><input type="text" required="" name="birth_place" value="<?php echo $studentAll['birth_place'] ?>"></div>
                <div class="form-group"><input type="date" required="" name="birth_date" value="<?php echo $studentAll['birth_date'] ?>"></div>

    <input type="hidden" value="<?php echo $studentAll['id'] ?>" name="id">
    <button type="submit" name="updateislemi"   class="btn btn-outline-success"><a href="index.php"></a> GÜNCELLE</button>
</form>
<br>

</body>
</html>