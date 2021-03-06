<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style/custom.css"/>
    <title>Channel Autism</title>
</head>
<body>

<div class="container mt-1">
    <div class="row">
        <div class="col-md-6 text-left">
            <form class="form-inline my-2 my-lg-0" action="forum.php" method="get">
                <input class="form-control mr-sm-0" type="search" name="search" placeholder="Search">
                <button class="btn my_blue_hover my_blue my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>

        </div>
        <div class="col-md-6 text-right">
            <a href="https://www.instagram.com/channelautism/" target="_blank"> <i class="fab fa-instagram fa-2x my_blue my_blue_hover"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p><i class="fas fa-child fa-5x my_yellow"></i></p>
            <h1 >Channel Autism</h1>
            <h5>Channel for the Awesome!</h5>
        </div>
    </div>

    <!--Navigation Area>-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link cursor_pointer" href="index.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="forum.php"><i class="far fa-comment"></i> Forum</a>
                </li>
                <?php if (!isset($_SESSION['id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link cursor_pointer"  data-toggle="modal" data-target="#signupModal"><i class="fas fa-shapes"></i> Sign-up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cursor_pointer" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user"></i> Login</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link cursor_pointer" data-toggle="modal" data-target="#discussionModal"><i class="fas fa-comment-dots"></i> Create Discussion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cursor_pointer" href="?code=logout"><i class="fas fa-shapes"></i> Logout</a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['isAdmin']): ?>
                    <p>You are admin</p>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <h5><?= $error ?></h5>