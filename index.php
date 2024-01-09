<?php 
    session_start();

    if(!isset($_SESSION['username'])){
        $_SESSION['msg']="you must login first";
        header('location: login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en&th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div>
    <h1>hello world</h1>
    </div>
    <div class="content">
    <?php if (isset($_SESSION['success'])):?>
        <div class="success"> 
            <h3>
            <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
            ?>
            </h3>
        </div>
        <?php endif?>

    <!-------------------asdasdasdasd asdasdasdasd  -->
    <?php if (isset($_SESSION['username'])):?>
    <p>welcome <strong><?php echo $_SESSION['username'];?></strong></p>
    <p><a href="index.php?logout='1'" style="color: blue;">Logout</a></p>
    <?php endif ?>
    <div><img src="" alt=""> </div>
</div>
</body>
</html>