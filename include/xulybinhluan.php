<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","game");
    $noidung = $_POST['noidung'];
    $idtin = $_POST['idtin'];
    $iduser= $_SESSION['iduser'];
    $sql = "INSERT INTO binhluan_baiviet(id_baiviet,id_user,noidungbinhluan) VALUES ('$idtin','$iduser','$noidung')";
    $ketqua = mysqli_query($conn,$sql);
?>