<?php

    var_dump($_POST);
    $img = $_POST['save_image'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $fileData = base64_decode($img);
    $fileName = '../uploads/' . uniqid() . 'myCanvas.png';
    file_put_contents($fileName, $fileData);

    // $target = "../uploads/". $fileName;
    // move_uploaded_file($fileName, $target);
?>