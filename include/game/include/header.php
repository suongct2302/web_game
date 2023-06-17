<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--icon-->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
            <a href="index.php" style="text-decoration: none;"><img src="https://cdn.tgdd.vn/GameApp/3/228039/Screentshots/dino-t-rex-228039-logo-31-08-2020.png" alt="logo" style="width:85px;margin-left: 23px;">
            <h4><b>Dino Gaming</b></h4></a>
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Game</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tin tức</a>
            </li>
            <li class="nav-item">
                <form class="form-inline nav-search" action="/action_page.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" size="60px">
                    <button class="btn btn-light" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </li>
            <li class="nav-item love-icon">
                <a href="" ><i class="fa fa-heart" style="color: black;font-size: 30px; margin: 30px 80px 0px 60px;"></i></a>
            </li>
            <li class="nav-item"> 
                <div class="nav-log">
                <?php       
                    if(isset($_SESSION['username']) &&  !empty($_SESSION['username'])){
                        echo'<a><b>'.$_SESSION['username'].'</b></a>';
                        echo '<a href="dangxuat.php">Đăng xuất</a>';
                    }
                    else{
                        echo '<a href="dangky.php">Đăng ký</a>';
                        echo '<a href="dangnhap.php">Đăng nhập</a>';

                    }
                ?> 
                </div>
            </li>
        </ul>
    </nav>
</body>

</html>