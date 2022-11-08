<?php

try {

    $db=new PDO("mysql:host=localhost;dbname=phpschool;charset=utf8",'root','');

//    echo "Veritabanı bağlantısı başarılı";

} catch (PDOExpception $e) {

    echo $e->getMessage();
}


//SEARCH İÇİN
//Filtre fonksiyonla temizletip alma
function filtre($Deger){
    $Bir = trim($Deger); //Basindaki sonundaki bosluklar yok eder
    $Iki = strip_tags($Bir);  //Html tag bosluklar yok eder
    $Uc = htmlspecialchars($Iki , ENT_QUOTES); //Tirnaklari etkisiz hale getirme
    $Sonuc =  $Uc;
    return  $Sonuc;
}


?>