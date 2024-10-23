@extends('layout.mainLayout')
@section('title', $exams->examMetaTitle)
@section('description', $exams->examMetaDescription)
@section('keywords', $exams->examKeywords)
@section('main')
    {{-- COURSE01 --}}
    <style>
        .course-bg {
            background: url("{{ asset('assets/ConsumerHeader.png') }}") center center no-repeat #eb427e;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            height: auto;
           
        }

        .breadcrumb-item a {
            color: #ffffff !important;
            font-size: 14px;
            text-decoration: none;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            float: left;
            padding-right: .5rem;
            color: #fff;
            content: var(--bs-breadcrumb-divider, "/");
        }

        .course-title {
            font-weight: 700;
            font-size: 50px;
            line-height: 60px;
            letter-spacing: 0;
            color: #fff;
        }

        .course_desc {
            font-weight: 500;
            font-size: 18px;
            line-height: 22px;
            letter-spacing: 0;
            color: #fff;
        }
    </style>

    <section class="py-4 course-bg">
        <div class="container" style="max-width:76rem;">
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="https://learn.careerwave.org">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $exams->examName }}</a></li>
                </ol>
            </div>
            <div class="row">

                <h1 class="course-title">{{ $exams->examTitle }}</h1>

                <div class="course_desc mt-4">
                    {!! $exams->examDescription !!}
                </div>
            </div>
        </div>
    </section>

    {{-- COURSE02 --}}
    <style>
        a {
            color: #5a4bda;
            text-decoration: none;
            -webkit-transition: 0.4s;
            transition: 0.4s;
        }

        .box-classCourse {
            background: no-repeat padding-box #fff;
            box-shadow: 0 3px 20px #0000001a;
            border-radius: 9px;
            min-height: 237px;
            padding: 15px;
        }
        @media(max-width:768px){
            .box-classCourse {
                min-height: 237px;
            }

        }
        .video-box {
            background: no-repeat padding-box #211818;
            border-radius: 9px;
            height: 220px;
            width: 360px;
            overflow: hidden;
            z-index: 1;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        img,
        svg {
            vertical-align: middle;
        }

        .class-desc {
            font-weight: 500;
            font-size: 14px;
            line-height: 22px;
            letter-spacing: 0;
            color: #000;
        }

        .class-price {
            font-weight: 700;
            font-size: 24px;
            color: #333;
        }

        .class-old-price,
        .class-price {
            line-height: 49px;
            letter-spacing: 0;
        }

        .class-old-price {
            font-weight: 300;
            font-size: 14px;
            color: #888;
        }

        .class-old-price,
        .class-price {
            line-height: 49px;
            letter-spacing: 0;
        }

        .class-price-off {
            background: no-repeat padding-box #46b284;
            box-shadow: 0 3px 10px #00000014;
            border-radius: 20px;
            height: 29px;
            line-height: 7px;
            padding: 12px;
            font-size: 14px;
            color: #fff;
            margin-top: 10px;
            font-weight: 700;
        }

        .spe-price {
            font-size: 14px;
            line-height: 32px;
            font-weight: 700;
            letter-spacing: 0;
            color: #333;
        }

        .font-fam-med,
        .font-fam-medium {
            font-weight: 400;
        }

        .course02BtnCont {
            float: end;
        }

        @media (max-width: 768px) {
            .video-box {
                width: 100%;
                height: 150px;
                object-fit: cover;
            }

            .class-header {
                font-size: 20px;
                text-align: center;
                font-weight: 700;
            }

            .box-classCourse {
                min-height: 237px;
            }

            .spe-price {
                font-size: 11px;
                margin-top: -32px;
                text-align: center;
            }

            .spe-price {
                font-size: 12px;
            }

            .class-price {
                font-size: 20px;
            }

            .class-old-price {
                font-size: 20px;
            }

            .class-old-price,
            .class-price {
                line-height: 20px;
            }

            .class-price-off {
                margin-top: -3px;
                font-size: 14px;
            }

            .course02BtnCont {
                float: center;
            }

            .expCourse {
                width: 100%;
                margin: 0 auto;
            }

            .ExpBtn {
                width: 100%;
                margin-top: 10px;
            }
        }

        .box-classCourse {
            background-color: #fff;
            box-shadow: 0 3px 20px rgba(0, 0, 0, 0.1);
            border-radius: 9px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .course-header {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 16px;
            margin-bottom: 15px;
            color: #333;
        }

        .course-description h2 {
            font-size: 30px;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: 0;
            margin: 16px;
            margin-top: 20px;
            margin-bottom: 15px;
            color: #333;
        }

        .course-description p {
            font-size: 16px;
            margin: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 15px;
        }

        .course-description ul {
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .course-description ul li {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
            margin-bottom: 10px;
        }
        .evnCourse{
            padding-right: 0px;
            padding-left: 0px;

        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .course-header {
                font-size: 22px;
            }

            .course-description h2 {
                font-size: 20px;
            }

            .course-description p,
            .course-description ul li {
                font-size: 14px;
            }

            .box-classCourse {
                padding: 15px;
            }
            .evnCourse{
            padding-right: 1rem;
            padding-left: 1rem;

        }
        }
    </style>

    <section class="mt-2">
        <div class="container" style="max-width: 76rem;">
            <div class="row" id="courseList">

                @foreach ($batchList as $batch)
                    <a href="{{ route('CourseDetail', $batch->batchSlug) }}" class="evnCourse " id="courseId1">
                        <div class="box-classCourse col-12 col-md-12 d-md-flex mt-3 p-2 shadow">
                            <div class="col-12 col-md-4 video-box  me-0 me-md-4">
                                <!--<iframe height="220" width="360" src="" title="YouTube video" allowfullscreen></iframe>-->
                                <img src="{{ asset($batch->batchThumbnail) }}" alt="{{ $batch->batchThumbnailAlt }}"
                                    class="img-fluid">
                            </div>
                            <div class="col-12 col-md-8 ps-0 ps-md-3 mt-2">
                                <div class="d-md-flex justify-content-between mb-2">
                                    <h3 class="class-header" id="courseTitle1">{{ $batch->batchName }}</h3>
                                    <!--div class="rating"><i class="fa fa-star"></i> 4.1</div-->
                                </div>
                                <div class="mb-2 class-desc"></div>
                                <div class="d-flex col-12 col-md-8 justify-content-center mb-4">
                                </div>
                                <div class="justify-content-start spe-price">Special Discounted Price</div>

                                <div class="d-md-flex justify-content-between">
                                    <div class="d-flex justify-content-between col-md-5">
                                        <div class="d-flex gap-3">
                                            <div class="class-price" id="evnCoursePrice1">
                                                &#x20B9; {{ $batch->discountPrice }} </div>
                                            <div class="class-old-price">
                                                <del>&#x20B9; {{ $batch->originalPrice }} </del>
                                            </div>
                                        </div>
                                        <div class="class-price-off">{{ $batch->discountPercentage }}% OFF</div>
                                    </div>

                                    <div class="course02BtnCont">
                                        <div class="font-fam-med font-16 col-12">
                                            <span class="expCourse" id="evn_explore1"><button type="button"
                                                    class="btn btn-block btn-primary px-4 px-md-5 ExpBtn">Explore</button></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                @endforeach
                <div class="box-classCourse col-12 col-md-12 mt-3" style="max-width: 77rem;">
                    {!! $exams->examLongDescription !!}
                </div>


            </div>
        </div>
    </section>

    {{-- COURSE03 --}}
    <style>
        .box-classCourse {
            background: no-repeat padding-box #fff;
            box-shadow: 0 3px 20px #0000001a;
            border-radius: 9px;
            min-height: 237px;
            padding: 15px;
        }

        .font-fam-bold {
            font-weight: 700;
        }

        .accordion-item:last-of-type {
            border-bottom-right-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }

        .accordion-item:first-of-type {
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }

        .accordion-button {
            font-size: 16px;
            font-weight: 700;
            background-color: #fff;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .fa-brands .fa-quora:before {
            content: '\edd9';
            font-family: fontello;
            display: inline-block;
            margin-right: .5em;
        }
    </style>

    <section class="mt-3">
        <div class="container" style="max-width: 77rem">
            <div class="row">
                @include('include.faq')
            </div>
        </div>
    </section>
@endsection
