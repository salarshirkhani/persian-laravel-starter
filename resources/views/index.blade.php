@extends('layouts.app')
@section('content')
    <div data-v-5e374ada="">
        <section data-v-6e6ad759="" id="intro" class="container-fluid">
            <div data-v-6e6ad759="" class="container">
                <div data-v-6e6ad759="" class="row">
                    <section data-v-6e6ad759="">
                        <div data-v-6e6ad759="" class="" style="">
                            <h1 data-v-6e6ad759="" data-wow-delay="1.2s" class="intro-site-title">
                                پُل|پلی میان نیازمندان و ارائه دهندگان
                            </h1>
                        </div>
                        <div data-v-6e6ad759="" class="" style="">
                            <h2 data-v-6e6ad759="" data-wow-delay="1.2s" class="intro-site-title">
                                خدماتی نوین از ماهنامه صنایع چاپ و بسته بندی
                            </h2>
                        </div>
                        <div data-v-6e6ad759="" class="search-wrapper" style="">
                            <div data-v-6e6ad759="" class="search-input">
                                <input data-v-6e6ad759="" type="text" placeholder="محصول مورد نظر خود را جستجو کنید">
                                <button data-v-6e6ad759="" class="hidden-sm hidden-md hidden-lg fa fa-search"></button>
                                <button data-v-6e6ad759="" class="hidden-xs"><i data-v-6e6ad759=""
                                                                                class="fa fa-search"></i>
                                    جستجو
                                </button>
                            </div>
                            <a data-v-6e6ad759="" href="/product-list" class="green-button">لیست محصولات</a>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <section data-v-6e6ad759="" class="secondary-nav-wrapper container-fluid">
            <div data-v-6e6ad759="" class="container">
                <nav data-v-6e6ad759="" class="row">
                    <ul data-v-6e6ad759="" class="menu-wrapper list-inline">
                        <li data-v-6e6ad759="" id="menu0" class="nav-item"><h2 data-v-6e6ad759=""><a data-v-6e6ad759=""
                                                                                                     href="#"
                                                                                                     class="category-item"><i
                                        data-v-6e6ad759="" class="fa fa-angle-down"></i>
                                    میوه
                                </a></h2></li>
                        <li data-v-6e6ad759="" id="menu1" class="nav-item"><h2 data-v-6e6ad759=""><a data-v-6e6ad759=""
                                                                                                     href="#"
                                                                                                     class="category-item"><i
                                        data-v-6e6ad759="" class="fa fa-angle-down"></i>
                                    صیفی
                                </a></h2></li>
                        <li data-v-6e6ad759="" id="menu2" class="nav-item"><h2 data-v-6e6ad759=""><a data-v-6e6ad759=""
                                                                                                     href="#"
                                                                                                     class="category-item"><i
                                        data-v-6e6ad759="" class="fa fa-angle-down"></i>
                                    غلات
                                </a></h2>
                            <ul data-v-6e6ad759="" data-index="2" class="sub-categories-wrapper list-inline col-xs-12">
                                <li data-v-6e6ad759="" class="col-xs-4 col-sm-3 col-md-4 pull-right"><a
                                        data-v-6e6ad759="" href="/product-list/category/برنج" class="sub-category-item">برنج</a>
                                </li>
                                <li data-v-6e6ad759="" class="col-xs-12 button-link-wrapper"><a data-v-6e6ad759=""
                                                                                                href="/product-list"
                                                                                                class="product-link green-button"><i
                                            data-v-6e6ad759="" class="fa fa-arrow-left"></i>
                                        مشاهده همه محصولات
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section data-v-6e6ad759="" id="requests-section" class="section-wrapper container-fluid hidden-xs">
            <div data-v-6e6ad759="" class="container">
                <div data-v-6e6ad759="" class="row">
                    <div data-v-6e6ad759="" class="col-xs-12 col-md-9">
                        <div data-v-6e6ad759="" class="title-section col-xs-12">
                            <div data-v-6e6ad759="" class="row">
                                <h3 data-v-6e6ad759="">
                                    بنرها و تبلیغات
                                </h3>
                                <hr data-v-6e6ad759="">
                            </div>
                        </div>
                        <div data-v-6e6ad759="" class="col-xs-12 requests-contents box-content">
                            <div data-v-6e6ad759="" class="row hidden-xs">
                                <ul data-v-6e6ad759="" class="list-unstyled">
                                    <div id="slider1" style="height:448px;">
                                        <img data-src="{{asset('assets/images/1.jpg')}}" data-src-2x="{{asset('assets/images/1@2x.jpg')}}" src="" alt="Slide 1"/>
                                        <img data-src="{{asset('assets/images/2.jpg')}}" data-src-2x="{{asset('assets/images/2@2x.jpg')}}" src="" alt="Slide 2"/>
                                        <a href="http://www.20script.ir"><img data-src="{{asset('assets/images/3.jpg')}}"
                                                                              data-src-2x="{{asset('assets/images/3@2x.jpg')}}" src=""
                                                                              alt="Slide 3"/></a>
                                        <img data-src="{{asset('assets/images/4.jpg')}}" data-src-2x="{{asset('assets/images/4@2x.jpg')}}" src="" alt="Slide 4"/>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div data-v-6e6ad759="" class="col-xs-12 col-md-3 pull-right">
                        <div data-v-6e6ad759="" class="title-box box-content">
                            <h3 data-v-6e6ad759="">
                                خدمات مورد نیاز خود را در سایت پل جست و جو کنید . بهترین شرکت ها آماده خدمت رسانی به شما
                                هستند
                            </h3>
                            <a data-v-6e6ad759="" href="/buyer/register-request" class="green-button">
                                ثبت درخواست خدمات
                            </a>
                        </div>
                    </div>
                    <div data-v-6e6ad759="" class="col-xs-12 col-md-3 pull-right">
                        <div data-v-6e6ad759="" class="title-box box-content">
                            <h3 data-v-6e6ad759="">
                                از فروشندگان سایت پل قیمت بگیرید و با یک درخواست چندین قیمت دریافت
                                کنید
                            </h3>
                            <a data-v-6e6ad759="" href="/buyer/register-request" class="green-button">
                                ثبت درخواست خرید
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section data-v-6e6ad759="" id="mobile-requests-section"
                 class="section-wrapper container-fluid hidden-sm hidden-md hidden-lg">
            <div data-v-6e6ad759="" class="row">
                <div data-v-6e6ad759="" class="title-section col-xs-12">
                    <h3 data-v-6e6ad759="">
                        بنرها و تبلیغات
                    </h3>
                    <hr data-v-6e6ad759="">
                </div>
                <div data-v-6e6ad759="" class="col-xs-12 mobile-requests-contents">
                    <div data-v-6e6ad759="">
                        <div id="slider2" class="col-xs-12 mobile-requests-contents">
                            <img data-src="{{asset('assets/images/1.jpg')}}" data-src-2x="{{asset('assets/images/1@2x.jpg')}}" src="" alt="Slide 1"/>
                            <img data-src="{{asset('assets/images/2.jpg')}}" data-src-2x="{{asset('assets/images/2@2x.jpg')}}" src="" alt="Slide 2"/>
                            <a href="http://www.20script.ir"><img data-src="{{asset('assets/images/3.jpg')}}" data-src-2x="{{asset('assets/images/3@2x.jpg')}}" src=""
                                                                  alt="Slide 3"/></a>
                            <img data-src="{{asset('assets/images/4.jpg')}}" data-src-2x="{{asset('assets/images/4@2x.jpg')}}" src="" alt="Slide 4"/>
                        </div><!---->
                    </div>
                </div>
                <div data-v-6e6ad759="" class="container">
                    <div data-v-6e6ad759="" class="title-box box-content">
                        <h3 data-v-6e6ad759="">
                            از فروشندگان عمده قیمت بگیرید و با یک درخواست چندین قیمت دریافت
                            کنید
                        </h3> <a data-v-6e6ad759="" href="/buyer/register-request" class="green-button">
                            ثبت درخواست خرید
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section data-v-6e6ad759="" id="product-section" class="section-wrapper container-fluid latest-product">
            <div data-v-6e6ad759="" class="container">
                <div data-v-6e6ad759="" class="row">
                    <div data-v-6e6ad759="" class="col-xs-12 col-md-9">
                        <div data-v-6e6ad759="" class="title-section col-xs-12">
                            <div data-v-6e6ad759="" class="row">
                                <h3 data-v-6e6ad759="">آخرین محصولات ثبت شده</h3>
                                <hr data-v-6e6ad759="">
                            </div>
                        </div>
                        <div data-v-6e6ad759="" class="col-xs-12 products-contents">
                            <div data-v-6e6ad759="" class="row">
                                <div data-v-6e6ad759="" class="owl-carousel owl-rtl owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                             style="transform: translate3d(1170px, 0px, 0px); transition: all 0.25s ease 0s; width: 2663px; padding-left: 15px; padding-right: 15px;">
                                            <div class="owl-item" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content">
                                                    <a data-v-774e55fb=""
                                                       href="/product-view/خرید-عمده-سیب-زمینی/صیفی/2337"
                                                       class="carousel-img">
                                                        <div data-v-774e55fb="" style="">
                                                            <img data-v-774e55fb=""
                                                                 src="https://www.buskool.com/storage/thumbnails/products/Tlb4YCbZHYvvPBSL1DoOoHBGoZzu7UD8ODKiBwlj.jpeg"
                                                                 class="main-image">
                                                        </div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                        </div>
                                                    </a>
                                                    <a data-v-774e55fb=""
                                                       href="/product-view/خرید-عمده-سیب-زمینی/صیفی/2337"
                                                       class="carousel-title"><h4 data-v-774e55fb="">سیب زمینی نو، و
                                                            ...</h4></a> <a data-v-774e55fb=""
                                                                            href="/product-view/خرید-عمده-سیب-زمینی/صیفی/2337"
                                                                            class="stock-wrapper"><span
                                                            data-v-774e55fb="">موجودی</span> <span data-v-774e55fb="">400000</span>
                                                        <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                            <div class="owl-item" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content"><a data-v-774e55fb=""
                                                                                              href="/product-view/خرید-عمده-خرما/میوه/2338"
                                                                                              class="carousel-img">
                                                        <div data-v-774e55fb="" style=""><img data-v-774e55fb=""
                                                                                              src="https://www.buskool.com/storage/thumbnails/products/JJXkRJjYhRSNdXmaGR87nYEf3tN3HRnXgeIxSBPZ.jpeg"
                                                                                              class="main-image"></div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                        </div>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-خرما/میوه/2338"
                                                            class="carousel-title"><h4 data-v-774e55fb="">خرمای ربی</h4>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-خرما/میوه/2338"
                                                            class="stock-wrapper"><span data-v-774e55fb="">موجودی</span>
                                                        <span data-v-774e55fb="">800000</span> <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                            <div class="owl-item" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content"><a data-v-774e55fb=""
                                                                                              href="/product-view/خرید-عمده-پسته/میوه/2340"
                                                                                              class="carousel-img">
                                                        <div data-v-774e55fb="" style=""><img data-v-774e55fb=""
                                                                                              src="https://www.buskool.com/storage/thumbnails/products/L8XTHkhutf7cbTN9ahx9qLyn8Kj0AWAzq1cPFIV7.jpeg"
                                                                                              class="main-image"></div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                        </div>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-پسته/میوه/2340"
                                                            class="carousel-title"><h4 data-v-774e55fb="">پسته</h4></a>
                                                    <a data-v-774e55fb="" href="/product-view/خرید-عمده-پسته/میوه/2340"
                                                       class="stock-wrapper"><span data-v-774e55fb="">موجودی</span>
                                                        <span data-v-774e55fb="">2000</span> <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                            <div class="owl-item" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content"><a data-v-774e55fb=""
                                                                                              href="/product-view/خرید-عمده-هندوانه/صیفی/2328"
                                                                                              class="carousel-img">
                                                        <div data-v-774e55fb="" style=""><img data-v-774e55fb=""
                                                                                              src="https://www.buskool.com/storage/thumbnails/products/qZ5vawIKoJva7IZopZiniFpGabNjYpygrJOUIkhS.jpeg"
                                                                                              class="main-image"></div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                        </div>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-هندوانه/صیفی/2328"
                                                            class="carousel-title"><h4 data-v-774e55fb="">هندوانه</h4>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-هندوانه/صیفی/2328"
                                                            class="stock-wrapper"><span data-v-774e55fb="">موجودی</span>
                                                        <span data-v-774e55fb="">10000</span> <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                            <div class="owl-item active" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content"><a data-v-774e55fb=""
                                                                                              href="/product-view/خرید-عمده-فلفل-دلمه ای/صیفی/2330"
                                                                                              class="carousel-img">
                                                        <div data-v-774e55fb="" style=""><img data-v-774e55fb=""
                                                                                              src="https://www.buskool.com/storage/thumbnails/products/CWSceFX6T1O7eVGTsb8BiKILw4ukK4DgVMRbgZOe.jpeg"
                                                                                              class="main-image"></div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                        </div>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-فلفل-دلمه ای/صیفی/2330"
                                                            class="carousel-title"><h4 data-v-774e55fb="">فلفل دلمه ایی
                                                            س ...</h4></a> <a data-v-774e55fb=""
                                                                              href="/product-view/خرید-عمده-فلفل-دلمه ای/صیفی/2330"
                                                                              class="stock-wrapper"><span
                                                            data-v-774e55fb="">موجودی</span> <span data-v-774e55fb="">100000</span>
                                                        <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                            <div class="owl-item active" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content"><a data-v-774e55fb=""
                                                                                              href="/product-view/خرید-عمده-خرما/میوه/2331"
                                                                                              class="carousel-img">
                                                        <div data-v-774e55fb="" style=""><img data-v-774e55fb=""
                                                                                              src="https://www.buskool.com/storage/thumbnails/products/CBloPz57J6wMEE0lM4dPglV5LPFNuYRqOQGcdZqb.jpeg"
                                                                                              class="main-image"></div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                        </div>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-خرما/میوه/2331"
                                                            class="carousel-title"><h4 data-v-774e55fb="">رطب
                                                            مضافتی</h4></a> <a data-v-774e55fb=""
                                                                               href="/product-view/خرید-عمده-خرما/میوه/2331"
                                                                               class="stock-wrapper"><span
                                                            data-v-774e55fb="">موجودی</span> <span data-v-774e55fb="">1000</span>
                                                        <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                            <div class="owl-item active" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content"><a data-v-774e55fb=""
                                                                                              href="/product-view/خرید-عمده-سیب/میوه/2333"
                                                                                              class="carousel-img">
                                                        <div data-v-774e55fb="" style=""><img data-v-774e55fb=""
                                                                                              src="https://www.buskool.com/storage/thumbnails/products/uuelJ90LHXAbc9CrevYMJnw3PRlGiaDibBblH6Qg.jpeg"
                                                                                              class="main-image"></div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                        </div>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-سیب/میوه/2333"
                                                            class="carousel-title"><h4 data-v-774e55fb="">سیب ترش</h4>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-سیب/میوه/2333"
                                                            class="stock-wrapper"><span data-v-774e55fb="">موجودی</span>
                                                        <span data-v-774e55fb="">3000</span> <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                            <div class="owl-item active" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content"><a data-v-774e55fb=""
                                                                                              href="/product-view/خرید-عمده-لیمو-ترش/میوه/2341"
                                                                                              class="carousel-img">
                                                        <div data-v-774e55fb="" style=""><img data-v-774e55fb=""
                                                                                              src="https://www.buskool.com/storage/thumbnails/products/Rlr6k9CQ82Bi4bAGAiIIllRC09UXNlJezH2F8XoR.jpeg"
                                                                                              class="main-image"></div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                        </div>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-لیمو-ترش/میوه/2341"
                                                            class="carousel-title"><h4 data-v-774e55fb="">لیموترش</h4>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-لیمو-ترش/میوه/2341"
                                                            class="stock-wrapper"><span data-v-774e55fb="">موجودی</span>
                                                        <span data-v-774e55fb="">1000</span> <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                            <div class="owl-item" style="width: 262.5px; margin-left: 30px;">
                                                <article data-v-774e55fb="" data-v-6e6ad759=""
                                                         class="carousel-item box-content"><a data-v-774e55fb=""
                                                                                              href="/product-view/خرید-عمده-کیوی/میوه/2332"
                                                                                              class="carousel-img">
                                                        <div data-v-774e55fb="" style=""><img data-v-774e55fb=""
                                                                                              src="https://www.buskool.com/storage/thumbnails/products/YUQDmGwm3NclslqGMiNWWcXdl4euk9E07TiwLYey.jpeg"
                                                                                              class="main-image"></div>
                                                        <div data-v-774e55fb="" class="lds-ring" style="display: none;">
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                            <div data-v-774e55fb=""></div>
                                                        </div>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-کیوی/میوه/2332"
                                                            class="carousel-title"><h4 data-v-774e55fb="">هایوارد</h4>
                                                    </a> <a data-v-774e55fb=""
                                                            href="/product-view/خرید-عمده-کیوی/میوه/2332"
                                                            class="stock-wrapper"><span data-v-774e55fb="">موجودی</span>
                                                        <span data-v-774e55fb="">100000</span> <span data-v-774e55fb="">کیلوگرم</span></a>
                                                    <div data-v-774e55fb="" class="inquiry-button-wrapper"><!----></div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-nav">
                                        <button type="button" role="presentation" class="owl-prev">
                                            <span class="fa fa-angle-left"></span>
                                        </button>
                                        <button type="button" role="presentation" class="owl-next">
                                            <span class="fa fa-angle-right"></span>
                                        </button>

                                    </div>

                                    <div class="owl-dots">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-v-6e6ad759="" class="col-xs-12 col-md-3 pull-right">
                        <div data-v-6e6ad759="" class="title-box box-content">
                            <h3 data-v-6e6ad759="">
                                محصولات فروشندگان را ببینید و بدون واسطه با آن ها ارتباط برقرار
                                کنید
                            </h3>
                            <a data-v-6e6ad759="" href="/product-list" class="green-button">
                                لیست محصولات
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section data-v-6e6ad759="" id="services-section" class="section-wrapper container-fluid">
            <div data-v-6e6ad759="" class="container">
                <div data-v-6e6ad759="" class="row"><h3 data-v-6e6ad759="" class="col-xs-12">
                        ارتباط مستقیم بین خریداران و فروشندگان
                    </h3>
                    <div data-v-6e6ad759="" class="service-boxs-wrapper col-xs-12">
                        <div data-v-6e6ad759="" class="row">
                            <div data-v-6e6ad759="" class="col-xs-12 col-sm-4 pull-right">
                                <article data-v-6e6ad759="" class="service-box box-content"><a data-v-6e6ad759=""
                                                                                               href="/help" class="">
                                        <div data-v-6e6ad759="" class="box-image"><img data-v-6e6ad759=""
                                                                                       src="https://www.buskool.com/assets/img/new-logo-buskool.png">
                                        </div>
                                        <h4 data-v-6e6ad759="">
                                            پل چیست ؟
                                        </h4>
                                        <p data-v-6e6ad759="">
                                            پل بازار خرید و فروش بدون تعطیلی
                                            <br data-v-6e6ad759="">
                                            است که خریداران را به فروشندگان متصل کرده <br data-v-6e6ad759="">
                                            و خریداران و فروشندگان بدون واسطه می توانند با یکدیگر
                                            ارتباط برقرار کنند
                                        </p></a></article>
                            </div>
                            <div data-v-6e6ad759="" class="col-xs-12 col-sm-4 pull-right">
                                <article data-v-6e6ad759="" class="service-box box-content"><a data-v-6e6ad759=""
                                                                                               href="/help" class="">
                                        <div data-v-6e6ad759="" class="box-image"><img data-v-6e6ad759=""
                                                                                       src="https://www.buskool.com/assets/img/seller.jpg">
                                        </div>
                                        <h4 data-v-6e6ad759="">
                                            خدمات فروشندگان
                                        </h4>
                                        <p data-v-6e6ad759="">
                                            معرفی محصولات به خریداران عمده <br data-v-6e6ad759="">
                                            دسترسی به درخواست های خرید روزانه <br data-v-6e6ad759="">
                                            گسترش شبکه ی تجاری و مشتریان <br data-v-6e6ad759="">
                                            فروش بدون واسطه و مقرون به صرفه <br data-v-6e6ad759=""></p></a></article>
                            </div>
                            <div data-v-6e6ad759="" class="col-xs-12 col-sm-4 pull-right">
                                <article data-v-6e6ad759="" class="service-box box-content"><a data-v-6e6ad759=""
                                                                                               href="/help" class="">
                                        <div data-v-6e6ad759="" class="box-image"><img data-v-6e6ad759=""
                                                                                       src="https://www.buskool.com/assets/img/buyer.jpg">
                                        </div>
                                        <h4 data-v-6e6ad759="">
                                            خدمات خریداران
                                        </h4>
                                        <p data-v-6e6ad759="">
                                            استعلام قیمت از فروشندگان <br data-v-6e6ad759="">
                                            دسترسی بدون واسطه به فروشندگان متنوع <br data-v-6e6ad759="">
                                            صرفه جویی در زمان و هزینه خرید محصول <br data-v-6e6ad759="">
                                            گسترش شبکه تامین کنندگان <br data-v-6e6ad759=""></p></a></article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section data-v-6e6ad759="" class="container">
            <div data-v-7dda4b45="" data-v-6e6ad759="" class="section-wrapper col-xs-12">
                <div data-v-7dda4b45="" class="row">
                    <div data-v-7dda4b45="" class="title-section col-xs-12"><h3 data-v-7dda4b45="">
                            ثبت درخواست خرید
                        </h3>
                        <hr data-v-7dda4b45="">
                    </div>
                </div>
                <div data-v-7dda4b45="" class="row">
                    <div data-v-7dda4b45="" class="text-right col-xs-12 form-contents-wrapper wrapper-bg">
                        <div data-v-7dda4b45="" class="title-contents">
                            چی و چه مقدار؟
                        </div>
                        <div data-v-7dda4b45="" class="form-contents col-xs-12">
                            <div data-v-7dda4b45="" class="row">
                                <div data-v-7dda4b45="" class="col-xs-12 col-sm-6 pull-right"><label data-v-7dda4b45=""
                                                                                                     for="stock">
                                        دسته بندی محصول
                                    </label>
                                    <div data-v-7dda4b45="" class="input-wrapper"><select data-v-7dda4b45=""
                                                                                          id="category" class="">
                                            <option data-v-7dda4b45="" selected="selected" disabled="disabled">انتخاب
                                                دسته بندی
                                            </option>
                                            <option data-v-7dda4b45="" value="1">میوه</option>
                                            <option data-v-7dda4b45="" value="2">صیفی</option>
                                            <option data-v-7dda4b45="" value="42">غلات</option>
                                        </select></div>
                                    <p data-v-7dda4b45="" class="error-message col-xs-12"><!----></p></div>
                                <div data-v-7dda4b45="" class="col-xs-12 col-sm-6"><label data-v-7dda4b45=""
                                                                                          for="min-sale-amount">
                                        نام محصول
                                    </label>
                                    <div data-v-7dda4b45="" class="input-wrapper"><select data-v-7dda4b45=""
                                                                                          id="sub-category" class="">
                                            <option data-v-7dda4b45="" disabled="disabled" selected="selected">انتخاب
                                                زیر دسته بندی
                                            </option>
                                        </select></div>
                                    <p data-v-7dda4b45="" class="error-message"><!----></p></div>
                                <div data-v-7dda4b45="" class="col-xs-12 col-sm-6 pull-right"><label data-v-7dda4b45=""
                                                                                                     for="min-sale-price">
                                        نوع محصول
                                    </label>
                                    <div data-v-7dda4b45="" class="text-input-wrapper"><input data-v-7dda4b45=""
                                                                                              id="product-type"
                                                                                              type="text"
                                                                                              placeholder="مثلا : ماشین چاپ "
                                                                                              class=""></div>
                                    <p data-v-7dda4b45="" class="error-message"><!----></p></div>
                                <div data-v-7dda4b45="" class="col-xs-12 col-sm-6"><label data-v-7dda4b45=""
                                                                                          for="max-sale-price">
                                        میزان نیاز مندی
                                        <span data-v-7dda4b45="" class="small-label">(به کیلوگرم)</span></label>
                                    <div data-v-7dda4b45="" class="text-input-wrapper"><input data-v-7dda4b45=""
                                                                                              id="max-sale-price"
                                                                                              type="tel"
                                                                                              placeholder="مثلا : 500000"
                                                                                              pattern="[0-9]*" class="">
                                    </div>
                                    <p data-v-7dda4b45="" class="error-message"><!----></p></div>
                            </div>
                            <div data-v-7dda4b45="" class="submit-button-wrapper col-xs-12">
                                <div data-v-7dda4b45="" class="row">
                                    <button data-v-7dda4b45="" class="submit-button disabled">
                                        ثبت درخواست
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
