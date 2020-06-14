<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="keywords" content="محصولات کشاورزی,خرید مستقیم صیفی,فروشگاه آنلاین کشاورزی,باسکول">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="https://www.buskool.com/assets/img/logo-Inco-mobile.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>پُل | پلی میان خریداان و فروشندگان</title>
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/ResizeSensor.js')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/boot.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/setting.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ideal-image-slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
    <style media="screen">
        #slider {
            max-width: 900px;
            margin: 55px auto;
        }
    </style>
    <script src="{{asset('assets/js/axios.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                rtl:true,
                nav:false,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:1000,
            });
        });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
    <!-- mega menu -->
    <link rel="stylesheet" type="text/css" href="https://packprinting.ir/css/mega-menu/mega_menu.css" />

    <!-- font awesome -->
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Themify icons -->
    <link rel="stylesheet" type="text/css" href="https://packprinting.ir/css/themify-icons.css" />

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('styles', '')
</head>
<body>

<!--=================================
   header -->

<header id="header" class="default">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="topbar-left text-center text-md-left">
                        <ul class="list-inline">
                            <li> <a href="{{ route('register') }}" style="font-size:12px;"> ثبت نام رایگان</a></li>
                            <li><a href="{{ route('login') }}" style="font-size:12px;">ورود اعضا</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="topbar-right  text-md-right">
                        <ul class="list-inline">
                            <li><a href="" style="color:#ff4949"> |(B2B) بازار خرید و فروش </a> </li>
                            <li><a href="http://packprinting.ir/packworld" > | دنیای بسته بندی</a></li>
                            <li><a href=""> | خدمات برندینگ </a> </li>
                            <li><a href="http://directory.packprinting.ir"> |بانک اطلاعاتی  </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu">
        <!-- menu start -->
        <nav id="menu" class="mega-menu">
            <!-- menu list items container -->
            <section class="menu-list-items">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- menu logo -->
                            <ul class="menu-logo">
                                <li>
                                    <a href="{{ route('index') }}"><img id="logo_img" src="https://packprinting.ir/images/logo-dark.png" alt="logo"> </a>
                                </li>
                            </ul>
                            <!-- menu links -->
                            <ul class="menu-links" >
                                <!-- active class -->
                                <li ><a  href="">کلیپ آموزشی و تبلیغاتی<i class="fa fa-angle-down fa-indicator"></i></a>
                                    <!-- drop down multilevel  -->

                                </li>
                                <!-- active class -->
                                <li><a href="">فرم اشتراک انلاین مجله<i class="fa fa-angle-down fa-indicator"></i></a>
                                    <!-- drop down multilevel  -->

                                </li>
                                <li><a href="">فروش اینترنتی مجله<i class="fa fa-angle-down fa-indicator"></i></a>
                                    <!-- drop down multilevel  -->

                                </li>
                                <li><a href="">پادکست<i class="fa fa-angle-down fa-indicator"></i></a>
                                    <!-- drop down multilevel  -->

                                </li>
                                <li><a href="">مجله الکترونیکی<i class="fa fa-angle-down fa-indicator"></i></a>
                                    <!-- drop down multilevel  -->

                                </li>

                                <li><a href="{{ route('index' )}}"> خانه <i class="fa fa-angle-down fa-indicator"></i> </a>
                                    <!-- drop down multilevel  -->

                                </li>
                                <li>
                                    <div class="search-button">
                                        <a class="search-trigger" href="#search"> <span></span></a>
                                    </div>
                                </li>
                                <li class="side-menu-main">
                                    <div class="side-menu">
                                        <div class="mobile-nav-button">
                                            <div class="mobile-nav-button-line"></div>
                                            <div class="mobile-nav-button-line"></div>
                                            <div class="mobile-nav-button-line"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
        <!-- menu end -->
    </div>
</header>


<div class="search-overlay"></div>
<div class="menu-overlay"></div>
<div id="search" class="search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="search" placeholder="کلمه مورد نظر را تایپ کنید و سپس اینتر را بزنید ">
            </div>
        </div>
    </div>
</div>
<div class="side-content" id="scrollbar">
    <div class="side-content-info">
        <div class="menu-toggle-hamburger menu-close"><span class="ti-close"> </span></div>
        <div class="side-logo">
            <img class="img-fluid mb-3" src="{{ asset('assets/images/logo-dark.png') }}" alt="ماهنامه صنایع چاپ و بسته بندی">
            <p style="text-align: right;">

                امروزه ترسیم مرزهای مشخص مابین صنایع چاپ و بسته بندی کار بسیار مشکلی می باشد کاملا مشخص است کسانی که بسته بندی فیزیکی مانند کارتن – بطری – قوطی های فلزی را می سازند بخشی از صنعت بسته بندی هستند ولی در بسیاری از موارد شرکتهای که بسته بندی را انجام می دهند روی بسته نیز عملیات چاپ و تکمیلی انجام داده ، بخشی از صنعت چاپ و تمامی دست اندرکاران این صنعت می توانند در صنعت بسته بندی به حساب آورده شوند . درحال حاضر با رشد روز افزون صنایع چاپ و بسته بندی درک و فهم پل های ارتباطی میان دو تکنیک بسیار مشکل و پیچیده شده و با رشد تکنولوژی و علم ، مرزهای موجود در حال از بین رفتن بوده و تلفیق ماشین آلات و تکنیک های مختلف تولید از چاپ و تبدیل به صورت یک محصول بسته بندی به صورت یک خط کامل تبدیل شده و تعداد بسیار زیادی از ماشین آلات چاپ و نرم افزارهای کامپیوتری صرفا برای چاپ بر روی بسته بندی محصولات طراحی و ساخته شده اند .
                هم اکنون از یک سو با رشد روز افزون کاربرد مواد ، تنوع طراحی در بسته بندی محصولات و کالا و نیز افزایش توقع مصرف کنندگان نسبت به کیفیت بسته بندی ، و از سوی دیگر پیشرفت تکنولوژی در صنایع چاپ و بسته بندی و با توجه به اهمیت صادرات غیر نفتی و نقش یک بسته بندی با کیفیت به عنوان عامل اصلی در رشد صادرات کالا و حفظ بازارهای هدف در صادرات و برای پایان دادن به استیلای طلای سیاه به عنوان اصلی ترین منبع در تامین بودجه کشور لازم است علاوه بر سیاست های حمایتی دولت از صادر کنندگان و بخش خصوصی فعال در این حوزه ، رسانه های تخصصی مانند مجلات فعال در این بخش ، نیز بیش از گذشته با افزایش کیفی موضوعات مطرح از لحاظ علمی به رسالت اصلی خویش یعنی فرهنگ سازی و ارتقاء دانش دست اندرکاران در این حوزه پرداخته و بیشتر با ارائه مباحث آموزشی و اطلاع رسانی مناسب از تازه ها و نوع آوری ها در این صنعت ، نشریات را به عنوان یک ابزار مدیریتی کاربردی برای فعالان در این عرصه تبدیل نمایند .
                مسئولین صنایع چاپ و بسته بندی از تمامی اساتید و صاحب نظران ، پیشکسوتان و ذی النفعان و دانشجویان دعوت به عمل آورده تا مجله خویش را مانند گذشته وام دار احسان خویش نموده تا زمینه پیشرفت در صنایع چاپ و بسته بندی بیش از گذشته در ایران عزیزمان فراهم گردد . انشاء ا...</p>
            <hr class="mt-2 mb-3" />
        </div>

        <div class="contact-box mb-2">
            <div class="contact-icon">
                <i class="ti-headphone-alt text-blue"></i>
            </div>
            <div class="contact-info">
                <div class="text-left">
                    <h6>00989371016366</h6>
                    <span>پاسخگویی در 6 روز هفته در ساعات اداری</span>
                </div>
            </div>
        </div>
        <div class="contact-box mb-2">
            <div class="contact-icon">
                <i class="ti-email text-blue"></i>
            </div>
            <div class="contact-info">
                <div class="text-left">
                    <h6>info@packprintng.ir</h6>
                    <span>پاسخگویی 24 ساعته</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- for add picture in header -->
<!--
<div class="side-content-image">
   <img class="img-fluid" src="images/pack.jpg" alt="">
</div>

</div>  -->
<div id="app">
    @yield('content')
</div>
<!--Footer Area-->
<footer class="footer-area section-padding-2 dark-overlay "
        style="background: url('http://packprinting.info/images/foooter.gif') no-repeat center / cover; text-align: right; direction: rtl;">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget jb_cover">
                    <h3>بانک اطلاعاتی</h3>
                    <div class="site-category">
                        <ul>
                            <li>
                                <a href="http://directory.packprinting.ir">
                                    <i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>
                                    صفحه داینامیک اختصاصی
                                </a>
                            </li>
                        </ul>
                    </div>
                    <h3 style="margin-top:29px;">فروشگاه (B2B)</h3>
                    <div class="site-category">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>خریداران
                                    کالا </a></li>
                            <li><a href="#"><i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>فروشندگان
                                    کالا</a></li>
                        </ul>
                    </div>
                    <h3 style="margin-top:29px;">پل ارتباطی</h3>
                    <div class="site-category">
                        <ul>
                            <li><a href="http://packprinting.ir/contact"><i class="fas fa-hand-point-left"
                                                                            style="padding-left: 5px;"></i>تماس با ما
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget jb_cover">
                    <h3>برندینگ و بازاریابی</h3>
                    <div class="site-category">
                        <ul>
                            <li><a href="#"><i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>چاپ آگهی و
                                    رپرتاژ </a></li>
                            <li><a href="#"><i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>درج آگهی در
                                    سایت و فضای مجازی</a></li>
                            <li><a href="#"><i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>طراحی سایت
                                </a></li>
                            <li><a href="#"><i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>ایمیل انبوه
                                    و تبلیغات گوگل </a></li>
                            <li><a href="#"><i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>خدمات چاپ و
                                    بسته بندی</a></li>
                            <li><a href="#"><i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>عکاسی و
                                    ساخت تیزر </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget jb_cover">
                    <h3>مجله الکترونیکی</h3>
                    <div class="site-category">
                        <ul>
                            <li><a href="http://packprinting.ir/podcast"><i class="fas fa-hand-point-left"
                                                                            style="padding-left: 5px;"></i>پادکست </a>
                            </li>
                            <li><a href="http://packprinting.ir/magazine"><i class="fas fa-hand-point-left"
                                                                             style="padding-left: 5px;"></i>فروش آنلاین
                                    مجله</a></li>
                            <li><a href="http://packprinting.ir/subscribe"><i class="fas fa-hand-point-left"
                                                                              style="padding-left: 5px;"></i>فرم اشتراک
                                    آنلاین مجله</a></li>
                            <li><a href="#"><i class="fas fa-hand-point-left" style="padding-left: 5px;"></i>دنیای بسته
                                    بندی </a></li>
                            <li><a href="http://packprinting.ir/news"><i class="fas fa-hand-point-left"
                                                                         style="padding-left: 5px;"></i>اخبار</a></li>
                            <li><a href="http://packprinting.ir/article"><i class="fas fa-hand-point-left"
                                                                            style="padding-left: 5px;"></i>مقالات</a>
                            </li>
                            <li><a href="http://packprinting.ir/picnews"><i class="fas fa-hand-point-left"
                                                                            style="padding-left: 5px;"></i>گزارش تصویری</a>
                            </li>
                            <li><a href="http://packprinting.ir/gallery"><i class="fas fa-hand-point-left"
                                                                            style="padding-left: 5px;"></i>گالری تصاویر</a>
                            </li>
                            <li><a href="http://packprinting.ir/exhibition"><i class="fas fa-hand-point-left"
                                                                               style="padding-left: 5px;"></i>برنامه
                                    نمایشگاهی </a></li>
                            <li><a href="http://packprinting.ir/specialexhibition"><i class="fas fa-hand-point-left"
                                                                                      style="padding-left: 5px;"></i>برنامه
                                    نمایشگاهی مجله </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget ">
                    <a href="#" class="footer-logo"><img src="https://packprinting.ir/images/footerlogo.png"
                                                         alt="لوگوی فوتر ماهنامه صنایع چاپ و بسته بندی"></a>
                    <p>مجله بین المللی در زمینه چاپ و بسته بندی و صنایع وابسته </p>
                    <p>تلفن :09371016366</p>
                    <div class="social">
                        <a href="#" class="cl-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="cl-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="cl-youtube"><i class="fa fa-youtube-play"></i></a>
                        <a href="#" class="cl-pinterest"><i class="fa fa-pinterest-p"></i></a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</footer><!--/Footer Area-->

<!--Copyright-->
<div class="copyright jb_cover">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <a href="http://salarshirkhani.ir"><p>© SalarShirkhani</p></a> & <a href="https://linkedin.com/in/hosseynjf"><p>HosseyNJF</p></a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <p>تمامی حقوق نزد چاپ و بسته بندی محفوظ است</p>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/js/idleTimer.js')}}"></script>

<script>
    $(document).ready(function () {
        $(document).idleTimer(7200000);

        $('.main-loader-wrapper').css('display', 'none');
    });

    $(document).on("idle.idleTimer", function () {
        window.location.href = '/login'
    });

    function getUserId() {
        let userId = 5002;
        return userId;
    }
</script>

<script src="{{asset('assets/js/ideal-image-slider.js')}}"></script>
<script>
    var slider = new IdealImageSlider.Slider('#slider1');
    slider.start();
</script>
<script>
    var slider = new IdealImageSlider.Slider('#slider2');
    slider.start();
</script>

<script type="7e5f9cd5b16100e74e97c153-text/javascript"
        src="https://packprinting.ir/js/mega-menu/mega_menu.js"></script>
<script src="https://packprinting.ir/assets1/js/jquery-3.2.1.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>
<script src="https://packprinting.ir/assets1/js/jquery-migrate.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>

<script src="https://packprinting.ir/assets1/js/popper.js" type="7e5f9cd5b16100e74e97c153-text/javascript"></script>
<script src="https://packprinting.ir/assets1/js/bootstrap.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>
<script src="https://packprinting.ir/assets1/js/owl.carousel.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>

<script src="https://packprinting.ir/assets1/js/magnific-popup.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>
<script src="https://packprinting.ir/assets1/js/imagesloaded.pkgd.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>
<script src="https://packprinting.ir/assets1/js/isotope.pkgd.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>

<script src="https://packprinting.ir/assets1/js/waypoints.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>
<script src="https://packprinting.ir/assets1/js/jquery.counterup.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>
<script src="https://packprinting.ir/assets1/js/wow.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>
<script src="https://packprinting.ir/assets1/js/scrollUp.min.js"
        type="7e5f9cd5b16100e74e97c153-text/javascript"></script>


<!--=================================
back to top -->

<!-- jquery  -->
<script type="7e5f9cd5b16100e74e97c153-text/javascript" src="https://packprinting.ir/js/jquery.min.js"></script>
<script type="7e5f9cd5b16100e74e97c153-text/javascript" src="https://packprinting.ir/js/popper.min.js"></script>

<!-- bootstrap -->
<script type="7e5f9cd5b16100e74e97c153-text/javascript" src="https://packprinting.ir/js/bootstrap.min.js"></script>

<!-- mega-menu -->
<script type="7e5f9cd5b16100e74e97c153-text/javascript"
        src="https://packprinting.ir/js/mega-menu/mega_menu.js"></script>

<!-- owl-carousel -->
<script type="7e5f9cd5b16100e74e97c153-text/javascript"
        src="https://packprinting.ir/js/owl-carousel/owl.carousel.min.js"></script>


</body>
</html>
