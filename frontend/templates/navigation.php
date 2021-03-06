<header class="logo">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="margin-left: 10px" href="../views/"><img width="100px" height="50px" src="../assets/logo4_1.webp"  style="position:relative;top:-5px" alt="..."></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#onDisplayResolutionChange" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse collapse justify-content-end navbar-collapse" id="onDisplayResolutionChange">
                <ul class="navbar-nav">
                <?php
                if (isset($_SESSION['userName']) || isset($_SESSION['adminName'])) {
                    echo '<li class="nav-item" style="margin-right: 20px"><a class="nav-link" href="../views/watched.php?page=1"><i style="margin-right: 5px" class="far fa-star"></i> Obserwowane</a></li>';
                }
                ?>
                    <?php
                        if (isset($_SESSION['userName'])) {
                            echo '<li class="nav-item" style="margin-right: 20px"><a class="nav-link" href="../views/userprofile.php"><i style="margin-right: 5px" class="fas fa-user"></i>'.$_SESSION['userName'].'</a></li>
                            <li class="nav-item" style="margin-right: 20px"><a class="nav-link" href="../../backend/server/logout.php"><i style="margin-right: 5px" class="fas fa-user-plus"></i>Wyloguj się</a></li>';
                        }
                        else if(isset($_SESSION['adminName']))
                        {
                            echo '<li class="nav-item" style="margin-right: 20px"><a class="nav-link" href="../views/adminprofile.php"><i style="margin-right: 5px" class="fas fa-user"></i>'.$_SESSION['adminName'].'</a></li>
                            <li class="nav-item" style="margin-right: 20px"><a class="nav-link" href="../../backend/server/logout.php"><i style="margin-right: 5px" class="fas fa-user-plus"></i>Wyloguj się</a></li>';
                        }
                        else {
                            echo '<li class="nav-item" style="margin-right: 20px"><a class="nav-link" href="../views/signin.php"><i style="margin-right: 5px" class="fas fa-user"></i> Zaloguj się</a></li>
                            <li class="nav-item" style="margin-right: 20px"><a class="nav-link" href="../views/signup.php"><i style="margin-right: 5px" class="fas fa-user-plus"></i> Zarejestruj się</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>        