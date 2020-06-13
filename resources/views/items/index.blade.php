@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/product.css')}}"/>
@endsection
@section('content')
    <div data-v-71c0874a="">
        <div data-v-71c0874a="">

            <div data-v-516c4d6e="" id="main-content" not_found_image="https://www.buskool.com/assets/img/def404.png"
                 defimgitem="https://www.buskool.com/assets/img/product.jpg"
                 site_logo="https://www.buskool.com/assets/img/new-logo-buskool.png"
                 site_logo_white="https://www.buskool.com/index/images/logo_white.png"
                 incobaicon="https://www.buskool.com/assets/img/lo.png"
                 img_about_us_1="https://www.buskool.com/assets/img/about-us/1.jpg"
                 img_about_us_2="https://www.buskool.com/assets/img/about-us/2.jpg"
                 img_about_us_3="https://www.buskool.com/assets/img/about-us/3.jpg"
                 img_about_us_4="https://www.buskool.com/assets/img/about-us/4.jpg"
                 img_about_us_5="https://www.buskool.com/assets/img/about-us/5.jpg"
                 img_about_us_6="https://www.buskool.com/assets/img/about-us/6.jpg"
                 img_pricing_38="https://www.buskool.com/index/images/Group_38.png"
                 img_pricing_36="https://www.buskool.com/index/images/Group_36.png"
                 img_pricing_34="https://www.buskool.com/index/images/Group_34.png"
                 img_pricing_32="https://www.buskool.com/index/images/Group_32.png"
                 img_success_project="https://www.buskool.com/index/images/current.png"
                 img_success_verified="https://www.buskool.com/index/images/farmer.png" is-user-login="" user-type="">


                <div data-v-516c4d6e="" class="container">
                    <div data-v-516c4d6e="" id="filter-modal" tabindex="-1" role="dialog"
                         class="filter-modal modal fade">
                        <div data-v-516c4d6e="" role="document" class="modal-dialog modal-dialog-centered">
                            <div data-v-516c4d6e="" class="modal-content">
                                <div data-v-516c4d6e="" class="modal-header"><a data-v-516c4d6e="" href="#"
                                                                                class="close-modal"><i
                                            data-v-516c4d6e="" class="fa fa-times"></i></a>
                                    <div data-v-516c4d6e="" class="modal-title"><span data-v-516c4d6e="">مرتب سازی بر اساس</span>
                                    </div>
                                </div>
                                <div data-v-516c4d6e="" class="modal-body col-xs-12">
                                    <ul data-v-516c4d6e="" class="form-check-wrapper">
                                        <li data-v-516c4d6e="">
                                            <button data-v-516c4d6e="" class="default-button-list">
                                                احتمال پاسخگویی
                                            </button>
                                            <i data-v-516c4d6e="" class="fa fa-angle-left"></i></li>
                                        <li data-v-516c4d6e="">
                                            <button data-v-516c4d6e="" class="default-button-list">
                                                سرعت پاسخگویی
                                            </button>
                                            <i data-v-516c4d6e="" class="fa fa-angle-left"></i></li>
                                        <li data-v-516c4d6e="">
                                            <button data-v-516c4d6e="" class="default-button-list">
                                                جدیدترین ها
                                            </button>
                                            <i data-v-516c4d6e="" class="fa fa-angle-left"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-v-516c4d6e="" class="flat-plust-icon hidden-lg hidden-md"><a data-v-516c4d6e="" href="#"><i
                            data-v-516c4d6e="" class="fa fa-exclamation"></i></a></div>
                <div data-v-516c4d6e="">
                    <button data-v-516c4d6e="" class="guide-button hidden-sm hidden-xs">
                        راهنما
                    </button>
                </div>
                <div data-v-516c4d6e="" class="sub-header-fix sub-header hidden-lg hidden-md hidden-sm container-fluid">
                    <div data-v-516c4d6e="" class="search-box col-sm-8 col-xs-12 col-lg-5 pull-right"><input
                            data-v-516c4d6e="" type="text" placeholder="اینجا جستجو کنید">
                        <button data-v-516c4d6e="" class="btn-search"><i data-v-516c4d6e="" class="fa-search fa"></i>
                        </button>
                    </div>
                    <div data-v-516c4d6e="" class="rate-filter-mobile-wrapper">
                        <div data-v-516c4d6e="" class="rate-filter">
                            <button data-v-516c4d6e="" class="green-button bg-gray"><i data-v-516c4d6e=""
                                                                                       class="fas fa-sort-amount-down-alt"></i>
                                مرتب سازی
                            </button>
                        </div>
                        <button data-v-516c4d6e="" class="btn-filter hidden-lg"><i data-v-516c4d6e=""
                                                                                   class="fa fa-filter"></i>
                            دسته ها و فیلتر
                        </button>
                    </div>
                </div>
                <main data-v-516c4d6e="" id="main" class="container" style="position: relative;">
                    <div data-v-516c4d6e="" class="col-xs-12 col-lg-9">
                        <div data-v-516c4d6e="" class="row">
                            <section data-v-516c4d6e="" class="hidden-xs col-xs-12">
                                <div data-v-516c4d6e="" class="rate-filter-desktop-wrapper">
                                    <ul data-v-516c4d6e="" class="list-unstiled list-inline">
                                        @foreach($sorts as $label => $data)
                                        <li data-v-516c4d6e="">
                                            <a href="{{ route('items.index', array_merge(request()->input(), $data)) }}" data-v-516c4d6e="" class="{{ array_intersect(request()->input(), $data) == $data ? 'active' : '' }}">
                                                {{ $label }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <button data-v-516c4d6e="" data-toggle="modal" data-target="#searchFilter"
                                            class="btn-filter hidden-lg">
                                        دسته ها و فیلتر
                                        <i data-v-516c4d6e="" class="fa fa-filter"></i></button>
                                </div>
                            </section>
                            <section data-v-516c4d6e="" class="main-content col-xs-12">
                                <div data-v-516c4d6e="" class="row" id="article-list">
                                    @foreach($items as $item)
                                    <div data-v-516c4d6e="" class="col-xs-12">
                                        <article data-v-600ff58e="" data-v-516c4d6e="" class="main-content-item"><!---->
                                            <div data-v-e34355cc="" data-v-600ff58e=""
                                                 class="user-information-wrapper row">
                                                <div data-v-e34355cc="" class="user-information-contents">
                                                    <a data-v-e34355cc="" href="{{ route('items.show', ['type' => (is_subclass_of($item, \App\Product::class) ? 'product' : 'service'), 'item' => $item->id]) }}"
                                                       class="user-information-link">
                                                        <div data-v-e34355cc="" class="user-information-content-image">
                                                            <div data-v-e34355cc="" class="user-image">
                                                                <img data-v-e34355cc=""
                                                                     src="https://www.buskool.com/assets/img/user-defult.png"
                                                                     class="image_defult">
                                                            </div>
                                                        </div>
                                                        <div data-v-e34355cc="" class="user-information-content">
                                                            <a data-v-e34355cc="" href="#"
                                                               class="user-name-link">{{ $item->company->name }}</a>
                                                        </div>
                                                    </a>
                                                    <a data-v-e34355cc="" href="#"
                                                       class="user-action-link green-text">مشاهده پروفایل</a>
                                                </div>
                                                <div data-v-e34355cc="" class="article-action-buttons">
                                                    <button data-v-e34355cc="" class="green-button">
                                                        <i data-v-e34355cc="" class="fa fa-envelope"></i>
                                                        استعلام قیمت
                                                    </button>
                                                </div>
                                            </div>
                                            <div data-v-345499b0="" data-v-600ff58e=""
                                                 class="main-article-contents-wrapper pointer-class is-user-valid-content">
                                                <div data-v-345499b0="" class="main-article-contents-image-wrapper">
                                                    <div data-v-8f532698="" data-v-345499b0=""
                                                         class="main-article-image">
                                                        <a data-v-8f532698=""
                                                           href="{{ route('items.show', ['type' => (is_subclass_of($item, \App\Product::class) ? 'product' : 'service'), 'item' => $item->id]) }}" class=""
                                                           style="">
                                                            <img data-v-8f532698=""
                                                                 src="{{ Storage::url($item->photo) }}"
                                                                 alt="فروش عمده ی برنج برنج  کهنوج - كرمان">
                                                        </a>
                                                        <div data-v-8f532698="" class="lds-ring"
                                                             style="display: none;"></div>
                                                        <div data-v-8f532698="" class="image-count-item">
                                                            <i data-v-8f532698="" class="fas fa-images"></i>
                                                            <span data-v-8f532698="">4</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-v-345499b0="" class="main-article-contents"><!---->
                                                    <div data-v-345499b0="">
                                                        <h3 data-v-345499b0="" class="article-title">
                                                            <a data-v-345499b0="" href="{{ route('items.show', ['type' => (is_subclass_of($item, \App\Product::class) ? 'product' : 'service'), 'item' => $item->id]) }}" class="">
                                                                {{ $item->name }}
                                                                <span style="color: #777">{{ $item->category->name }}</span>
                                                            </a>
                                                        </h3>
                                                        <p data-v-345499b0="">
                                                            استان / شهر:
                                                            <span data-v-345499b0="">كرمان -  کهنوج</span>
                                                        </p>
                                                        <p data-v-345499b0="" class="product-description">
                                                            توضیحات
                                                            <a data-v-345499b0=""
                                                               href="{{ route('items.show', ['type' => (is_subclass_of($item, \App\Product::class) ? 'product' : 'service'), 'item' => $item->id]) }}" class="">{{ $item->short_description }}</a>
                                                        </p>
                                                    </div>
                                                    <a data-v-345499b0="" href="#"
                                                       class="share-link hidden">
                                                        <i data-v-345499b0="" class="fa fa-share"></i>
                                                        <span data-v-345499b0="">اشتراک گذاری</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div data-v-600ff58e="" class="footer-article"><!---->
                                                <div data-v-600ff58e=""
                                                     class="article-action-buttons pull-right full-width-button">
                                                    <button data-v-600ff58e="" class="green-button">
                                                        <i data-v-600ff58e="" class="fa fa-envelope"></i>
                                                        استعلام قیمت
                                                    </button>
                                                </div>
                                            </div>
                                            <script data-v-600ff58e="" type="application/ld+json"></script>
                                        </article>
                                    </div>
                                    @endforeach
                                    <div data-v-516c4d6e="" class="load-more-button col-xs-12">
                                        {{ $items->links() }}
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <aside data-v-516c4d6e="" id="sidebar"
                           class="product-sidebar sidebar hidden-xs hidden-sm hidden-md col-lg-3 is-affixed"
                           style="position: relative;">
                        <div data-v-516c4d6e="" class="row">
                            <div data-v-516c4d6e="" class="sidebar__inner col-xs-12"
                                 style="position: relative; transform: translate3d(0px, 0px, 0px);">
                                <div data-v-516c4d6e="">
                                    <div data-v-6cad7a0b="" class="content-sidebar">
                                        <div data-v-6cad7a0b="" class="title-widget">
                                            <div data-v-6cad7a0b="">دسته‌بندی‌ها</div>
                                            <hr data-v-6cad7a0b="">
                                        </div>
                                        <div data-v-6cad7a0b="" class="category-products-widget">
                                            <ul data-v-6cad7a0b="">
                                                <li data-v-6cad7a0b="" class="collapse-category-1">
                                                    <h2 data-v-6cad7a0b="">
                                                        <a data-v-6cad7a0b="" href="{{ route('items.index', collect(request()->input())->forget('category')->all()) }}" class="collapse-button-1">
                                                            <i data-v-6cad7a0b="" class="fa fa-angle-left"></i>
                                                            <span data-v-6cad7a0b="" style="@if(!request()->has('category'))text-decoration: underline;@endif">تمام محصولات و خدمات</span>
                                                        </a>
                                                    </h2>
                                                </li>
                                                @foreach($categoryTypes as $type => $label)
                                                <li data-v-6cad7a0b="" class="collapse-category-1">
                                                    <h2 data-v-6cad7a0b="">
                                                        <a data-v-6cad7a0b="" href="#" class="collapse-button-1">
                                                            <i data-v-6cad7a0b="" class="fa fa-angle-left"></i>
                                                            <span data-v-6cad7a0b="">{{ $label }}</span>
                                                        </a>
                                                    </h2>
                                                    <ul data-v-6cad7a0b="" class="sub-category-product little">
                                                        @foreach($categories->where('type', $type) as $category)
                                                        <li data-v-6cad7a0b="" class="sub-category-item">
                                                            <h4 data-v-6cad7a0b="">
                                                                <a data-v-6cad7a0b=""
                                                                   href="{{ route('items.index', array_merge(request()->input(), ['category' => $category])) }}"
                                                                   data-dismiss="modal"
                                                                   style="@if(request()->input('category', null) == $category->id)text-decoration: underline;@endif">
                                                                    {{ $category->name }}
                                                                </a>
                                                            </h4>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!--
                                    <div><div class="content-sidebar"><div class="title-widget"><div>موقعیت جغرافیایی</div> <hr></div> <div class="box-sidebar"><i class="fa-building fa"></i> <select><option disabled="disabled" selected="selected">استان</option> <option value="1">آذربایجان شرقی</option><option value="2">آذربایجان غربی</option><option value="3">اردبیل</option><option value="4">اصفهان</option><option value="5">البرز</option><option value="6">ایلام</option><option value="7">بوشهر</option><option value="8">تهران</option><option value="9">چهارمحال و بختیاری</option><option value="10">خراسان جنوبی</option><option value="11">خراسان رضوی</option><option value="12">خراسان شمالی</option><option value="13">خوزستان</option><option value="14">زنجان</option><option value="15">سمنان</option><option value="16">سیستان و بلوچستان</option><option value="17">فارس</option><option value="18">قزوین</option><option value="19">قم</option><option value="20">كردستان</option><option value="21">كرمان</option><option value="22">كرمانشاه</option><option value="23">کهگیلویه و بویراحمد</option><option value="24">گلستان</option><option value="25">گیلان</option><option value="26">لرستان</option><option value="27">مازندران</option><option value="28">مركزی</option><option value="29">هرمزگان</option><option value="30">همدان</option><option value="31">یزد</option></select></div> <div class="box-sidebar"><i class="fa-home fa"></i> <select><option disabled="disabled" selected="selected">شهر</option> </select></div> <div class="sidebar-buttons"><button data-dismiss="modal" class="btn green-button hidden-lg">
                        جستجو
                      </button> <a href="#" data-dismiss="modal" class="btn red-button">حذف فیلتر ها</a></div></div></div>
                      -->
                                </div>

                                <div dir="ltr" class="resize-sensor"
                                     style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;">
                                    <div class="resize-sensor-expand"
                                         style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;">
                                        <div
                                            style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 295px; height: 974px;"></div>
                                    </div>
                                    <div class="resize-sensor-shrink"
                                         style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;">
                                        <div
                                            style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 200%; height: 200%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div dir="ltr" class="resize-sensor"
                         style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;">
                        <div class="resize-sensor-expand"
                             style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;">
                            <div
                                style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 1180px; height: 2713px;"></div>
                        </div>
                        <div class="resize-sensor-shrink"
                             style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;">
                            <div
                                style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 200%; height: 200%;"></div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
