@extends('layout.mainLayout')
@section('title', $batchDetail->batchMetaTitle)
@section('description', $batchDetail->batchMetaDescription)
@section('keywords', $batchDetail->batchKeywords)
@section('main')
    {{-- COURSE DETAIL01 --}}
    <style>
        .breadcrumb-item a {
            text-decoration: none;
            color: #ffffff !important;
            font-size: 14px;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: #fff;
        }

        .buy-card-parent {
            width: 100%;
            position: relative;
        }

        .font-fam-med,
        .font-fam-medium {
            font-weight: 400;
        }

        .header-section {
            background-color: #eb427e;
            background: url('{{ asset('assets/ConsumerHeader.png') }}') center center no-repeat #eb427e;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .page-heading {
            font-size: 50px;
            font-weight: 700;
            color: #fff;
        }

        .page-subheading {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
        }

        .discount-text {
            font-size: 14px;
            font-weight: bold;
            color: #fff;
        }

        .price-text {
            font-size: 36px;
            font-weight: bold;
            color: #fff;
        }

        .del-text {
            font-size: 16px;
            font-weight: 400;
            color: #fff;
        }

        .discounted-text {
            background-color: #fff;
            color: #46b586;
            font-size: 20px;
            font-weight: bold;
            border-radius: 4px;
            padding: 3px;
        }
    </style>
    <main class="font-fam-med buy-card-parent">
        <article class="header-section py-3 mb-4">
            <section class="row main-container d-flex align-items-center justify-content-between mx-auto" style="">
                <div class="d-flex flex-column head-div col col-lg-8">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://learn.careerwave.org/">Home</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('Courses', $batchDetail->examSlug) }}">{{ $batchDetail->examName }}</a></li>
                        <li class="breadcrumb-item"><a>{{ $batchDetail->batchName }}</a></li>
                    </ol>

                    <h1 class="page-heading text-capitalize">{{ $batchDetail->batchName }} </h1>


                    <div class="mt-4">
                        <span class="discount-text">Special Discounted Price</span>
                        <div class="d-flex align-items-center">
                            <span class="price-text">₹ {{ $batchDetail->originalPrice }}</span>

                            <del class="mx-3 del-text ">₹ {{ $batchDetail->discountPrice }}</del>
                            <span class="discounted-text px-1">({{ $batchDetail->discountPercentage }}% OFF)</span>

                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>

    {{-- COURSE CARD --}}
    <style>
        .buy-card {
            background-color: #ffffff;
            box-shadow: 0px 0px 20px #0000001a;
            position: fixed;
            right: 4%;
            border-radius: 10px;
            min-height: auto;
            min-width: 350px;
            margin-top: 10px;
            bottom: 15.5%;
        }

        .buy-card-fix {
            position: fixed;
            bottom: 15.5%;
        }

        .buy-card-abs {
            position: absolute;
            bottom: -0.4%;
        }

        .head-img-div {
            position: relative;
        }

        .video-box {
            background: no-repeat padding-box #211818;
            border-radius: 20px;
            height: 220px;
            width: 360px;
            overflow: hidden;
            z-index: 1;
        }

        @media(max-width:768px) {
            .video-box {
                width: auto;
                height: 117px;
                border-radius: 9px;
            }
        }

        .special-text {
            font-size: 14px;
            font-weight: bold;
            color: #333333;
        }

        .card-details-div {
            margin-left: auto;
        }

        .card-price-text {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }

        @media(max-width:768px) {
            .card-price-text {
                font-size: 20px;
            }

        }

        .card-del-text {
            font-size: 16px;
            font-weight: 400;
            color: #888;
        }

        .card-discounted-text {
            font-size: 14px;
            font-weight: bold;
            background-color: #47b586;
            border-radius: 20px;
            color: #fff;
            padding: 5px;
        }

        [type=button]:not(:disabled),
        [type=reset]:not(:disabled),
        [type=submit]:not(:disabled),
        button:not(:disabled) {
            cursor: pointer;
        }

        .btnbuynow {
            height: 50px;
            background: #5a4bda 0% 0% no-repeat padding-box;
            border-radius: 10px;
            color: #ffffff;
            width: 100%;
            outline: none !important;
            border: 1px solid #5a4bda;
        }

        @media(max-width:768px) {

            .btnbuynow {
                height: 35px;
                border-radius: 9px;
            }
        }
    </style>

    <div id="buyCardId" class="buy-card buy-card-fix  p-3 d-none d-md-block" style="z-index:600;">
        <div class="head-img-div d-flex flex-column align-items-center justify-content-center ">
            <div class="video-box">
                <img src="{{ asset($batchDetail->batchThumbnail) }}" alt="{{ $batchDetail->batchThumbnailAlt }}"
                    class="img-fluid">
            </div>
        </div>
        <div class="mt-4">
            <h4 class="special-text text-center">Special Discounted Price</h4>
            <div class="d-flex my-3 justify-content-center align-items-center card-details-div ml-4">
                <span class="card-price-text">₹ {{ $batchDetail->originalPrice }}</span>
                <del class="mx-3 card-del-text">₹ {{ $batchDetail->discountPrice }}</del>
                <span class="card-discounted-text px-3">{{ $batchDetail->discountPercentage }}% OFF</span>
            </div>
            <a href="{{ $batchDetail->batchBuyNowURL }}" target="_blank">
                <button type="button" id="btnSubmitEvent" class="btnbuynow font-fam-medium">
                    {{ $batchDetail->batchButtonName ? $batchDetail->batchButtonName : 'Buy Now' }}
                </button>
            </a>
        </div>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            const card = document.querySelector('.buy-card');
          

            // Check if the card and footer exist
            if (card ) {
                const cardBottomPosition = card.getBoundingClientRect().top;
              

                if (cardBottomPosition >= footerTopPosition) {
                    // When card reaches the footer, switch to absolute positioning
                    card.classList.remove('buy-card-fix');
                    card.classList.add('buy-card-abs');
                } else {
                    // When card is not near the footer, keep it fixed
                    card.classList.remove('buy-card-abs');
                    card.classList.add('buy-card-fix');
                }
            }
        });
    </script>


    {{-- COURSE DETAIL02 --}}

    <style>
        .main-container {
            width: 100%;
            margin-top: 20px;
            margin: 0 auto !important;
        }

        .buy-card-fix {
            position: fixed;
            bottom: 15.5%;
        }

        .buy-card-abs {
            position: absolute;
            bottom: -0.4%;
        }

        @media (min-width: 1280px) {
            .main-container {
                width: 76rem;
                margin: 0 auto !important;
            }
        }

        .batch-heading {
            font-weight: 700;
            font-size: 22px;
            line-height: 62px;
            color: #3c3c3c;
        }

        .owl-carousel.owl-loaded {
            display: block;
        }

        .owl-carousel {
            display: none;
            width: 100%;
            -webkit-tap-highlight-color: transparent;
            position: relative;
            z-index: 1;
        }

        .owl-carousel .owl-stage-outer {
            position: relative;
            overflow: hidden;
            -webkit-transform: translate3d(0px, 0px, 0px);
        }

        .owl-carousel .owl-stage-outer {
            position: relative;
            overflow: hidden;
            -webkit-transform: translate3d(0px, 0px, 0px);
        }
    </style>
    <article class="row main-container ">

        <section class="d-md-none col-xs-12 mb-4">
            <div class="buy-card-small  p-2 shadow" style="border-radius: 9px;">
                <div class="head-img-div d-flex flex-column align-items-center justify-content-center ">
                    <!--img class="card-img" src="/version12/assets/img/books.png" alt="book">
                                                                                        <img class="playicon-head" src="/version12/assets/img/batch-details/playicon.png" alt="playicon" -->

                    <div class="video-box">
                        <img src="{{ asset($batchDetail->batchThumbnail) }}" alt="{{ $batchDetail->batchThumbnailAlt }}"
                            class="img-fluid">
                    </div>

                </div>
                <div class="mt-4">
                    <h4 class="special-text text-center">Special Discounted Price</h4>
                    <div class="d-flex my-3 justify-content-between  align-items-center card-details-div ml-4">
                        <div>
                            <span class="card-price-text">₹ {{ $batchDetail->originalPrice }}</span>
                            <del class="mx-3 card-del-text ">₹ {{ $batchDetail->discountPrice }}</del>
                        </div>
                        <span class="card-discounted-text px-3">{{ $batchDetail->discountPercentage }}% OFF</span>
                    </div>

                    <!-- <a href="/study/batches/arjuna-jee-3-0-2025-592892/batch-overview?referrer_url=https%3A%2F%2Fwww.pw.live%2Fonline-course-physics-wallah-jee%2Farjuna-jee-3.0-2025&referred_from=batch&cta_type=Buy_Now&business_unit=product&page_type=batch_description&page_exam=Online IIT JEE Coaching&page_class=" class="text-decoration-none" role="button" > -->

                    <a href="{{ $batchDetail->batchBuyNowURL }}" target="_blank"><button type="button"
                            id="btnSubmitEvent1" class="btnbuynow font-fam-medium">
                            {{ $batchDetail->batchButtonName ? $batchDetail->batchButtonName : 'Buy Now' }}</button></a>

                    <!-- </a> -->
                </div>
            </div>

        </section>

        <section class="col col-md-8 ">
            <div class="batch font-fam-medium">
                <div class=" my-3">
                    <div>
                        {!! $batchDetail->batchDetails !!}
                    </div>
                </div>
            </div>
        </section>

        {{-- FAQ  --}}
        <style>
            .batch-heading {
                font-weight: 700;
                font-size: 22px;
                line-height: 62px;
                color: #3c3c3c;
            }

            @media (max-width: 992px) {
                .batch-heading {
                    font-size: 22px;
                }
            }

            #faq.accordion-item {
                border: 0 !important;
                background: #f0f4fa 0% 0% no-repeat padding-box;
                border-radius: 20px;
            }

            .accordion-item:last-of-type {
                border-bottom-right-radius: .25rem;
                border-bottom-left-radius: .25rem;
            }

            .accordion-item:first-of-type {
                border-top-left-radius: .25rem;
                border-top-right-radius: .25rem;
            }

            .accordion-item {
                background-color: transparent;
                font: 14px / 21px;
                font-weight: 500;
            }

            font-fam-bold b {
                font-weight: 700;
            }

            .font-fam-med,
            .font-fam-medium {
                font-weight: 400;
            }
        </style>
        <section class="col-12 col-md-10 col-lg-8">
            @include('include.faq')
            <!-- <div class="faqcontainer">
                                                <h2 class="batch-heading">FAQ's</h2>
                                                <div id="faq" class="accordion-item p-3">
                                                    <div class="mb-4">
                                                        <h5 class="font-fam-bold d-flex"><i class="fa-brands fa-quora"></i>. <div>Why should I
                                                                join this course and how will this be helpful?</div>
                                                        </h5>

                                                        <div class="font-fam-medium ms-3 ps-4">
                                                            <p><span style="font-weight: 400;">This course is designed to provide you with knowledge and
                                                                    skills in all subjects, which are highly relevant to the JEE exam pattern.</span></p>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                    <div class="mb-4">
                                                        <h5 class="font-fam-bold d-flex"><i class="fa-brands fa-quora"></i>. <div>How will the
                                                                classes be conducted? What will happen if I miss a class?</div>
                                                        </h5>

                                                        <div class="font-fam-medium ms-3 ps-4">
                                                            <p><span style="font-weight: 400;">All classes will be live at the scheduled time, and if you
                                                                    miss any class, you can access the recording anytime</span></p>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                    <div class="mb-4">
                                                        <h5 class="font-fam-bold d-flex"><i class="fa-brands fa-quora"></i>. <div>Can the classes
                                                                be downloaded?</div>
                                                        </h5>

                                                        <div class="font-fam-medium ms-3 ps-4">
                                                            <p><span style="font-weight: 400;">Yes, you can download videos of any courses you have enrolled
                                                                    in.</span></p>
                                                            <p><span style="font-weight: 400;">The videos can be downloaded and watched offline in the PW
                                                                    app under the download section go to the Study Page &amp; watch the downloaded video.
                                                                    These videos will be available until the expiry of Online Batches.</span></p>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                    <div class="mb-4">
                                                        <h5 class="font-fam-bold d-flex"><i class="fa-brands fa-quora"></i>. <div>What are the
                                                                class days and timings?</div>
                                                        </h5>

                                                        <div class="font-fam-medium ms-3 ps-4">
                                                            <p><span style="font-weight: 400;">Please check the lecture Planner inside the course to view
                                                                    the class schedule and timings.</span></p>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                    <div class="mb-4">
                                                        <h5 class="font-fam-bold d-flex"><i class="fa-brands fa-quora"></i>. <div>How will I
                                                                get my doubts answered?</div>
                                                        </h5>

                                                        <div class="font-fam-medium ms-3 ps-4">
                                                            <p><span style="font-weight: 400;">In Live / Recorded class we have a doubts engine portal
                                                                    where you can ask your doubts &amp; within 24 hrs you get a solution.</span></p>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                    <div class="mb-4">
                                                        <h5 class="font-fam-bold d-flex"><i class="fa-brands fa-quora"></i>. <div>What is the
                                                                Refund Policy?</div>
                                                        </h5>

                                                        <div class="font-fam-medium ms-3 ps-4">
                                                            <p><span style="font-weight: 400;">Dear students, a refund after a batch purchase is not
                                                                    allowed as we have already invested a lot in providing the best learning experience to
                                                                    our valued students, including tech infrastructure, employee salaries, etc. Please make
                                                                    a conscious decision before purchasing a batch.</span></p>
                                                        </div>
                                                        <hr />
                                                    </div>

                                                </div>
                                            </div> -->

        </section>



    </article>
@endsection
