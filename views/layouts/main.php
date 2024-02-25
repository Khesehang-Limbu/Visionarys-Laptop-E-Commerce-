<?php
//include_once("../templates/header.php");
use evil\phpmvc\Application;

/* @var $this evil\phpmv\view */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>The Visionarys Laptops | <?php echo $this->title; ?></title>
    <script src="https://kit.fontawesome.com/6dff41c16b.js" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet" />

    <!-- Google Font Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php if (Application::$app->session->getFlashMessage("success")) : ?>
        <div class="alert alert-success">
            <?php echo Application::$app->session->getFlashMessage("success") ?>
        </div>
    <?php endif; ?>
    <nav>
        <div class="logo">
            <a href="/">
                <img src="images/Logo.png" alt="VLG Logo" />
            </a>
        </div>
        <div class="nav-links">
            <ul>
                <li><i class="fa-solid fa-magnifying-glass"></i></li>
                <li><a href="/cart">Cart</a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/about">About Us</a></li>

                <?php if (Application::isGuest()) : ?>
                    <li><a href="login"><i class="fa-solid fa-user"></i></a></li>
                <?php else : ?>
                    <li>
                        Welcome <?php echo Application::$app->user->getDisplayName(); ?>
                        <a href="profile">
                            <i class="fa-solid fa-gear"></i>
                        </a>

                        <a href="logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    {{content}}
    <?php
    //include_once("../templates/footer.php");
    ?>
    <footer>
        <div class="logo-section">
            <div clss="logo">
                <img src="images/Logo.png" alt="footer-logo" />
            </div>
            <div class="cotacts">
                <h2>Contact</h2>
                <div>
                    <i class="fa-solid fa-envelope"></i>
                    <span>sales@slg.com.np</span>
                </div>
                <div>
                    <i class="fa-solid fa-phone"></i>
                    <span>01-1234567/9863784674</span>
                </div>
                <div>
                    <i class="fa-solid fa-location-dot"></i>
                    <span>Tinkune, Kathmandu</span>
                </div>
            </div>
        </div>

        <div class="copyright-section">
            <span>Khesehang Yonghang &copy; 2024</span>
        </div>

        <div class="social-section">
            <div>
                <h2>Our Socials</h2>
                <div>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
