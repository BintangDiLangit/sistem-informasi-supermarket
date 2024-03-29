<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Sistem Informasi Supermarket</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('landing/images/fevicon.png') }}" type="image/gif" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    {{-- <div class="loader_bg">
        <div class="loader"><img src="{{ asset('landing/images/loading.gif') }}" alt="#" /></div>
    </div> --}}
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header-top">
            <div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="index.html"><img src="{{ asset('landing/images/logo-cart.png') }}"
                                                width="30%" alt="#" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">

                            <div class="menu-area">
                                <div class="limit-box">
                                    <nav class="main-menu ">
                                        <ul class="menu-area-main">
                                            <li class="active"> <a href="index.html">Home</a> </li>
                                            <li> <a href="#about">About</a> </li>
                                            <li> <a href="#vegetable">Vegetable</a> </li>

                                            @if (Route::has('login'))

                                                @auth
                                                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                @else
                                                    <li> <a href="{{ route('login') }}">Log in</a></li>
                                                    @if (Route::has('register'))
                                                        <li><a href="{{ route('register') }}">Register</a></li>
                                                    @endif
                                                @endauth

                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->

        <!-- end header -->
        <section class="slider_section">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="container-fluid padding_dd">
                            <div class="carousel-caption">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="text-bg">
                                            <span>Welcome To SI Supermarket</span>
                                            <h1>Sistem Informasi Supermarket</h1>
                                            <p>It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout. The point of
                                                using Lorem Ipsum is that it has a more-or-less normal </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="images_box">
                                            <figure><img src="{{ asset('landing/images/img2.png') }}"></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">

                        <div class="container-fluid padding_dd">
                            <div class="carousel-caption">

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="text-bg">
                                            <span>Welcome To Shree</span>
                                            <h1>Vegetables Shop</h1>
                                            <p>It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout. The point of
                                                using Lorem Ipsum is that it has a more-or-less normal </p>
                                            <form class="Vegetable">
                                                <input class="Vegetable_fom" placeholder="Vegetable" type="text"
                                                    name=" Vegetable">
                                                <button class="Search_btn">Search</button>
                                            </form>
                                            <a href="#">Contact Us</a> <a href="#">Vegetable</a>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="images_box">
                                            <figure><img src="{{ asset('landing/images/img2.png') }}"></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="carousel-item">

                        <div class="container-fluid padding_dd">
                            <div class="carousel-caption ">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="text-bg">
                                            <span>Welcome To Shree</span>
                                            <h1>Vegetables Shop</h1>
                                            <p>It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout. The point of
                                                using Lorem Ipsum is that it has a more-or-less normal </p>
                                            <form class="Vegetable">
                                                <input class="Vegetable_fom" placeholder="Vegetable" type="text"
                                                    name=" Vegetable">
                                                <button class="Search_btn">Search</button>
                                            </form>
                                            <a href="#">Contact Us</a> <a href="#">Vegetable</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="images_box">
                                            <figure><img src="{{ asset('landing/images/img2.png') }}"></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>

        </section>
        </div>
    </header>



    <!-- about  -->
    <div id="about" class="about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="about-box">
                        <h2>About us</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to using 'Content here, content
                            here', making it look like readable English. Many desktop publishing packages andIt is a
                            long established fact that a reader will be distracted by the readable content of a page
                            when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                            normal distribution of letters, as opposed to using 'Content here, content here', making it
                            look like readable English. Many</p>
                        <a href="Javascript:void(0)">Read more</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 padding_rl">
                    <div class="about-box_img">
                        <figure><img src="{{ asset('landing/images/about.jpg') }}" alt="#" /></figure>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end abouts -->



    <!-- vegetable -->
    <div id="vegetable" class="vegetable">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2> Fresh <strong class="llow">vegetable</strong> </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 ">
                    <div class="vegetable_shop">
                        <h3>Best Vegetables Shop</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to using 'Content here, content
                            here', making it look like readable English. Many desktop publishing packages andIt is a
                            long established fact that a reader will be distracted </p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 ">
                    <div class="vegetable_img">
                        <figure><img src="{{ asset('landing/images/v1.jpg') }}" alt="#" /></figure>
                        <span>01</span>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 ">
                    <div class="vegetable_img margin_top">
                        <figure><img src="{{ asset('landing/images/v2.jpg') }}" alt="#" /></figure>
                        <span>02</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end vegetable -->

    <br>
    <br>
    <br>
    <br>
    <!--  footer -->
    <footer>
        <div class="footer ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" class="logo_footer"> <img src="{{ asset('landing/images/logo2.png') }}"
                                alt="#" /></a>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ">
                                <div class="address">
                                    <h3>Address </h3>
                                    <ul class="loca">
                                        <li>
                                            <a href="#"></a>It is a long established fact
                                            <br>that a reader will be
                                        </li>
                                        <li>
                                            <a href="#"></a>(+71 1234567890)
                                        </li>
                                        <li>
                                            <a href="#"></a>demo@gmail.com
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="address">
                                    <h3>Social Link</h3>
                                    <ul class="Menu_footer">
                                        <li class="active"> <a href="#">Twitter</a> </li>
                                        <li><a href="#">Facebook</a> </li>
                                        <li><a href="#">Instagram</a> </li>
                                        <li><a href="#">Linkdin</a> </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-6 ">
                                <div class="address">
                                    <h3>Newsletter</h3>
                                    <form class="news">
                                        <input class="newslatter" placeholder="Enter your email" type="text"
                                            name=" Enter your email">
                                        <button class="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright © 2021 Design by <a href="https://html.design/">Rahmat Zaki</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('ladning/js/jquery.min.js') }}"></script>
    <script src="{{ asset('ladning/js/popper.min.js') }}"></script>
    <script src="{{ asset('ladning/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('ladning/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('ladning/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('ladning/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('ladning/js/custom.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>





</body>

</html>
