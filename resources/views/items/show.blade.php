@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/product.css')}}"/>
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                rtl: true,
                nav: false,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
            });
        });
    </script>
@endsection
@section('content')
    <div id="app">
        <div data-v-074176c4="">
            <div data-v-074176c4="">
                <div data-v-af130e1a="" class="container" id="main-content" is-user-login="">
                    <main data-v-af130e1a="" id="main" class="row">
                        <div data-v-af130e1a="" class="col-xs-12 col-lg-8 pull-right">
                            <section data-v-af130e1a="" class="main-content">
                                <div data-v-af130e1a="" class="row">
                                    <div data-v-59bcc1bb="" data-v-af130e1a="" class="wrapper-bg main-product-wrapper">
                                        <!---->
                                        <div data-v-59bcc1bb="" class="images-wrapper" style="margin-bottom: 16px">
                                            <div data-v-59bcc1bb="" class="images">
                                                <div data-v-59bcc1bb="" class="image-wrapper">
                                                    <a href="#"
                                                       style="">
                                                        <img
                                                            src="{{ Storage::url($item->photo) }}"
                                                            alt="فروش عمده ی سایر گردو  اقلید - فارس">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-v-59bcc1bb="" class="main-contents-wrapper">
                                            <div data-v-59bcc1bb="" class="main-contents">
                                                <h1 data-v-59bcc1bb="">{{ $item->name }}</h1>
                                                <div data-v-59bcc1bb="" class="product-info-table">
                                                    <ul data-v-59bcc1bb="" class="product-info-list">
                                                        <li data-v-59bcc1bb="">
                                                            <span data-v-59bcc1bb="" class="gray-text">دسته بندی</span>
                                                            <span data-v-59bcc1bb="">{{ $item->category->name }}</span>
                                                        </li>
                                                        <li data-v-59bcc1bb="">
                                                            <span data-v-59bcc1bb=""
                                                                  class="gray-text">استان / شهر</span>
                                                            <span
                                                                data-v-59bcc1bb="">{{ $item->company->province }} - {{ $item->company->city }}</span>
                                                        </li>

                                                        <li data-v-59bcc1bb="">
                                                            <span data-v-59bcc1bb="" class="gray-text">قیمت</span>
                                                            <span data-v-59bcc1bb="">استعلام بگیرید</span>
                                                        </li>
                                                    </ul>
                                                    <div data-v-59bcc1bb="" class="product-description">
                                                        <p data-v-59bcc1bb="">{{ $item->short_description }}</p>
                                                        <p data-v-59bcc1bb="">{{ $item->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </section>

                        </div>


                        <div data-v-af130e1a="" class="col-xs-12 col-lg-4 pull-left">
                            <div data-v-8eb0bc3c="" data-v-af130e1a="" class="user-info-wrapper wrapper-bg active">
                                <a data-v-8eb0bc3c="" href="/profile/13vzbtx" class="user-information-link text-rtl">
                                    <div data-v-8eb0bc3c="" class="user-information-content-image">
                                        <div data-v-8eb0bc3c="" class="user-image">
                                            <img data-v-8eb0bc3c=""
                                                 src="/images/user-defult.png?669551148fff1b5e07b52606f97716a5"
                                                 class="image_defult">
                                        </div>
                                        <div data-v-8eb0bc3c="" class="valid-icon">

                                        </div> <!---->
                                    </div>
                                    <div data-v-8eb0bc3c="" class="user-information-content">
                                        <p data-v-8eb0bc3c="" class="user-position">فروشنده</p>
                                        <p data-v-8eb0bc3c="">{{ $item->company->name }}</p>
                                        @if(($sub = $item->company->creator->subscription('owner')) && $sub->canUseFeature('verified_seller_mark'))
                                            <p data-v-8eb0bc3c="" class="user-valid-text">کاربر تایید شده</p>
                                        @endif
                                    </div>
                                </a>
                                <div data-v-8eb0bc3c="" class="user-info-actions">
                                    <a data-v-8eb0bc3c="" href="/profile/13vzbtx" class="green-button green-button-o">مشاهده
                                        پروفایل</a>
                                    <button data-v-8eb0bc3c="" class="green-button"> ارسال پیام<i data-v-8eb0bc3c=""
                                                                                                  class="fa fa-envelope"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>

            <section class="section-wrapper container latest-product" style="margin-top:15px;" id="product-section">
                <section data-v-af130e1a="" class="main-content">
                    <div data-v-af130e1a="" class="row">
                        <div data-v-af130e1a="" class="col-xs-12 col-lg-8 pull-right"
                             style="margin-bottom:10px; padding-right: 0px !important; padding-left: 0px !important; ">
                            <div id="features">
                                <div id="internet-police-warning">
                                    <aside class="card">
                                        <ul class="left-right warning-control">
                                            <small style="font-size: 100%;">شناسه محصول: {{ $item->id }}</small>


                                        </ul>
                                    </aside>
                                    <aside class="warning card">
                                        <div id="banner-content">
                                            <img src="{{asset('assets/img/verified.svg')}}">
                                            <p>
                                                <strong>خرید کالاهایی که امکان خرید امن ندارند را به صورت حضوری انجام
                                                    دهید و پیش از رویت و دریافت کالا هیچ مبلغی را واریز نکنید.</strong>
                                            </p>
                                        </div>

                                        <small class="normal-banner-subtitle">
                                            <strong>پل در قبال آگهی‌هایی که امکان خرید امن ندارند، مسئولیتی ندارد و هیچ‌
                                                گونه منفعتی از معامله شما نمی‌برد.</strong>
                                        </small>
                                        <ul>
                                            <li class="pull-right">
                                                <a target="_blank" rel="nofollow" class="blue"
                                                   href="http://sheypoor.uservoice.com/knowledgebase/articles/808698-%D8%B1%D8%A7%D9%87%D9%86%D9%85%D8%A7%DB%8C-%D8%AE%D8%B1%DB%8C%D8%AF-%D8%A7%D9%85%D9%86">راهنمای
                                                    خرید مطمئن</a>
                                            </li>
                                        </ul>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            <!--
            <div data-v-3e7be19c="" data-v-af130e1a="" class="section-wrapper col-xs-12">
              <div data-v-3e7be19c="" class="row">
                  <div data-v-3e7be19c="" class="title-section col-xs-12">
                      <h3 data-v-3e7be19c="">استعلام شرایط فروش </h3>
                      <hr data-v-3e7be19c="">
                  </div>
              </div>
              <div data-v-3e7be19c="" class="row">
                  <div data-v-3e7be19c="" class="text-right col-xs-12 form-contents-wrapper wrapper-bg">
                      <div data-v-3e7be19c="" class="title-contents">
                          <div data-v-3e7be19c="" class="user-image">
                              <img data-v-3e7be19c="" src="https://www.buskool.com/assets/img/user-defult.png" alt="">
                          </div>
                          <div data-v-3e7be19c="" class="user-name">استعلام از سام لطف الهی</div>
                      </div>
                      <div data-v-3e7be19c="" class="form-contents col-xs-12">
                          <div data-v-3e7be19c="" class="row">
                              <div data-v-3e7be19c="" class="col-xs-12 pull-right">
                                  <label data-v-3e7be19c="" for="inquiry-text" class="text-rtl">
                                  جزییات مورد نیاز را از فروشنده بپرسید (قیمت، بسته بندی و ...)
                                  </label>
                                  <div data-v-3e7be19c="" class="text-input-wrapper">
                                      <textarea data-v-3e7be19c="" id="inquiry-text" type="text" rows="3" placeholder="جزییات مورد نیاز را از فروشنده بپرسید..." class="text-right text-rtl"></textarea>
                                  </div>
                                  <p data-v-3e7be19c="" class="error-message"></p>
                              </div>
                          </div>
                          <div data-v-3e7be19c="" class="submit-button-wrapper col-xs-12">
                              <div data-v-3e7be19c="" class="row">
                                  <button data-v-3e7be19c="" class="submit-button disabled">ثبت </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

              <div data-v-af130e1a="" class="fix-send-message-wrapper hidden-lg hidden-md hidden-sm">
                  <button data-v-af130e1a="" class="green-button"> استعلام قیمت <i data-v-af130e1a="" class="fa fa-envelope"></i></button>
              </div> -->
@endsection
