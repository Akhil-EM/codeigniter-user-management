<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SignIn</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="vendors/toaster/jnoty.min.css">

</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
            <div class="loader">
                <div class="cube">
                    <div class="sides">
                        <div class="top"></div>
                        <div class="right"></div>
                        <div class="bottom"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="back"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader END -->
    <!-- Sign in Start -->
    <section class="sign-in-page bg-white">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-6 align-self-center">
                    <div class="sign-in-from">
                        <?php if ($dbError !== null) : ?>

                            <div class="alert alert-danger" role="alert">
                                <div class="iq-alert-text"><?= $dbError ?></div>
                            </div>
                        <?php endif; ?>
                        <h1 class="mb-0">Sign in</h1>
                        <p>Enter your username and password to access admin panel.</p>
                        <?php $validation =  \Config\Services::validation(); ?>
                        <form class="mt-4" method="post" action="<?= base_url('sign-in') ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control mb-0" placeholder="Enter username" name="username" value='<?= $payload['username']; ?>'>
                                <?php if ($validation && $validation->getError('username')) : ?>
                                    <div class="text-danger"><?= $validation->getError('username') ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" id="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password" name="password" value='<?= $payload['password']; ?>'>
                                <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" onchange="showPassword(this.checked)">
                                    <label class="custom-control-label" for="customCheck1">Show Password</label>
                                </div>
                                <?php if ($validation && $validation->getError('password')) : ?>
                                    <div class="text-danger"><?= $validation->getError('password') ?></div>
                                <?php endif; ?>

                            </div>

                            <div class="d-inline-block w-100">
                                <button type="submit" class="btn btn-primary float-left">Sign in</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Forgot your password? <a href="#">Reset Now</a></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="sign-in-detail text-white" style="background: url(images/login/2.jpg) no-repeat 0 0; background-size: cover;">
                        <a class="sign-in-logo mb-5" href="#"><img src="images/logo-white.png" class="img-fluid" alt="logo"></a>
                        <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                            <div class="item">
                                <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                            </div>
                            <div class="item">
                                <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                            </div>
                            <div class="item">
                                <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                <h4 class="mb-1 text-white">Manage your orders</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="js/smooth-scrollbar.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script src="vendors/toaster/jnoty.min.js"></script>
    <script>
        function showPassword(checked) {
            const passwordInput = document.querySelector("#password");
            if (checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>

</body>

</html>