@php
    $metaData = DB::table('pages')->where('pageType', 3)->first();
@endphp
@extends('layout.mainLayout')
@section('title', $metaData->metaTitle)
@section('description', $metaData->metaDescriptioin)
@section('keywords', $metaData->metaKeywords)
@section('main')


    {{-- ABOUT01 --}}
    <style>
        .mission-section {
            background-color: #0e023d;
            /* Background color */
            color: white;
            /* Text color */
        }

        .mission-section h2 {
            font-size: 2.5rem;
            font-weight: 600;
        }



        .about_container {
            justify-content: space-around;
            align-items: center;
            padding-top: 18px;
            padding-bottom: 18px;
            margin-right: auto;
            margin-left: auto;
        }

        .about_card {
            columns: 12;
            height: 120px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 6px;
            position: relative;
        }

        .side_left_corner {
            width: 76px;
            height: 86px;
            border-radius: 0.5rem;
            /* 8px */
            position: absolute;
            top: -3px;
            left: -3px;
            background-color: #1b7938;
        }

        .side_right_corner {
            width: 76px;
            height: 86px;
            border-radius: 0.5rem;
            /* 8px */
            position: absolute;
            bottom: -3px;
            right: 0px;
            background-color: #1b7938;
        }

        .card_data {
            width: 97%;
            height: auto;
            border-radius: 0.5rem;
            background-color: #fff1f3;
            position: absolute;
            bottom: 4px;
            right: 4px;
            left: 4px;
            top: 4px;
        }

        .card_inner {
            padding-top: 30px;
            padding-bottom: 30px;
            padding: 30px 24px;
            display: flex;
            column-gap: 16px;
        }

        .card_img {
            height: 56px;
            width: 56px;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .card_text {
            font-size: 14px;
            /* 14px */
            /* line-height: 1.25rem; */
            /* 20px */
            padding-right: 16px;
            padding-left: 16px;
            align-items: center;
            color: #1b2124;
            font-weight: 600;
            line-height: 28px;
        }

        @media (min-width: 640px) {
            .about_card {
                columns: 12;
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .card_text {
                font-size: 14px;
                padding-right: 0px;
                padding-left: 0px;
                text-align: center;
                line-height: 19px;
                text-wrap: balance;
            }
        }

        @media (min-width: 768px) {
            .about_container {
                display: flex;
                flex-direction: column;
                padding-bottom: 32px;
            }

            .about_card {
                columns: 4;
                widows: 356px;
            }


        }

        @media (min-width: 1024px) {
            .about_container {
                display: flex;
                flex-direction: row;
                gap: 20px;
            }
        }

        @media (min-width: 1280px) {
            .card_text {
                text-align: start;
                font-size: 16px;
            }
        }
    </style>
    <section class="mission-section text-center py-5">
        <div class="container" style="max-width: 72rem;">
            <h2 class="mb-4 text-start">{{ $data->ourMissionHeading }}</h2>
            <div id="mission-cards" class="about_container">
                <div class="about_card">
                    <div class="side_left_corner"></div>
                    <div class="side_right_corner"></div>
                    <div class="card_data">
                        <div class="card_inner">
                            <div>
                                <div>
                                    <img src="{{ asset($data->ourMissionImg1) }}" alt="{{$data->ourMissionImgAlt1}}" class="card_img">
                                </div>
                            </div>
                            <div>
                                <div class="card_text">{{$data->ourMissionContent1}}</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="about_card">
                    <div class="side_left_corner"></div>
                    <div class="side_right_corner"></div>
                    <div class="card_data">
                        <div class="card_inner">
                            <div>
                                <div>
                                    <img src="{{ asset($data->ourMissionImg2) }}" alt="{{$data->ourMissionImgAlt2}}" class="card_img">
                                </div>
                            </div>
                            <div>
                                <div class="card_text">{{$data->ourMissionContent2}}</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="about_card">
                    <div class="side_left_corner"></div>
                    <div class="side_right_corner"></div>
                    <div class="card_data">
                        <div class="card_inner">
                            <div>
                                <div>
                                    <img src="{{ asset($data->ourMissionImg3) }}" alt="{{$data->ourMissionImgAlt3}}" class="card_img">
                                </div>
                            </div>
                            <div>
                                <div class="card_text">{{$data->ourMissionContent3}}</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    {{-- ABOUT01 --}}

    {{-- ABOUT02 --}}

    <style>
        .vision-section {
            background-color: #fdf5e6;
            padding: 50px 0;
        }

        .vision-section h2 {
            font-weight: bold;
            color: #333;
        }

        .vision-section .vision-text {
            display: flex;
            align-items: start;
            justify-content: center;
            flex-direction: column;

        }

        .vision-section .vision-text ul {
            list-style-type: none;
            padding: 0;
        }

        .vision-section .vision-text ul li {
            padding: 10px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .vision-section .vision-text ul li .star {
            color: gold;
        }

        .vision-section .vision-images img {
            width: 100%;
            border-radius: 10px;
        }



        @media (min-width: 768px) {
            .vision-section .vision-content {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .vision-section .vision-text {
                flex-basis: 45%;
                text-align: left;
            }

            .vision-section .vision-images {
                flex-basis: 50%;
                display: flex;
                justify-content: space-between;
            }


        }

        @media (max-width: 768px) {
            .vision-section .vision-images img {
                width: 100%;
                margin: 0 5px;
            }
        }
    </style>
    <section class="vision-section">
        <div class="container" style="max-width:72rem;">
            <div class="vision-content">
                <div class="vision-text">
                    <h2>{{$data->ourVisionHeading}}</h2>
                    <ul>
                        <li><span class="star"><img src="{{ asset('assets/star_career.webp') }}" alt="Star Icon"></span>{{$data->ourVisionContent1}}</li>
                        <li><span class="star"><img src="{{ asset('assets/star_career.webp') }}" alt="Star Icon"></span>{{ $data->ourVisionContent2 }}</li>
                        <li><span class="star"><img src="{{ asset('assets/star_career.webp') }}" alt="Star Icon"></span>{{ $data->ourVisionContent3 }} </li>
                    </ul>
                </div>
                <div class="vision-images d-flex justify-content-center">
                    <img src="{{ asset($data->ourVisionImg) }}" alt="{{$data->ourVisionImgAlt}}">
                    {{-- <img src="{{ asset('assets/a3.webp') }}" alt="Image 2">
                    <img src="{{ asset('assets/a3.webp') }}" alt="Image 3"> --}}
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT02 --}}

    {{-- ABOUT03 --}}
    <style>
        .founder {
            /* background-image: url("{{ asset('assets/founders-bg.svg') }}"); */
            /* background-image: url("/assets/founders-bg.svg"); */
            background-color: #140D52;
            margin-right: auto;
            margin-left: auto;
            background-size: cover;
        }

        .founder_cont {
            max-width: 72rem;
            padding-right: 16px;
            padding-left: 16px;
            margin: auto;
            padding-bottom: 37px;
        }

        .founder_header {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            line-height: 30px;
        }

        .founder_inner {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 24px;
        }

        .founder_card {
            display: flex;
            flex-direction: column;
            height: 440px;
            background-color: #fff;
            text-align: center;
            border-radius: 0.375rem;
            /* 6px */
        }

        @media (max-width: 768px) {
            .founder_card {
                height: 380px;
            }
        }

        .founder_innercard {
            width: 100%;
            padding-right: 32px;
            padding-left: 32px;
            padding-top: 13px;
            padding-bottom: 16px;
            overflow-y: scroll;
            scrollbar-width: none;
        }

        .founder_innercardTwo {
            width: 100%;
            padding-right: 32px;
            padding-left: 32px;
            padding-top: 32px;
            padding-bottom: 16px;
            overflow-y: scroll;
            scrollbar-width: none;
        }

        .founder_innerCard {
            animation-duration: .7s;
            --tw-enter-translate-y: -16rem;
            animation-duration: .15s;
            animation-name: enter;
            --tw-enter-opacity: initial;
            --tw-enter-scale: initial;
            --tw-enter-rotate: initial;
            --tw-enter-translate-x: initial;
            --tw-enter-translate-y: initial;
        }

        .founder_img {
            height: 100px;
            width: 100px;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
        }

        .founder_name {
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 20px;
            line-height: 30px;
            font-weight: 700;
            color: #3d3d3d;
        }

        .founder_nameH {
            padding-top: 0px;
            padding-bottom: 4px;
            font-size: 20px;
            line-height: 30px;
            font-weight: 700;
            color: #3d3d3d;
            text-align: start;
        }

        .founder_desg {
            font-size: 14px;
            font-weight: 500;
            line-height: 22px;
            color: #3d3d3d;
        }

        .rotate {
            display: inline-block;
            transform: scaleX(-1);

        }

        .founder_quote {
            padding-top: 12px;
            padding-right: 4px;
            padding-left: 4px;
            font-weight: 600;
            font-size: 16px;
            line-height: 30px;
            font-style: italic;
            color: #1b2124;
        }

        .founder_quoteH {
            padding-top: 9px;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color: #1b2124;
            text-align: start;
        }


        .read_cont {
            padding-top: 16px;
            padding-bottom: 16px;
            border-top: 2px solid #bebdbd;
            cursor: pointer;
        }

        .read_contTwo {
            padding-top: 16px;
            padding-bottom: 16px;
            border-top: 2px solid #bebdbd;
            cursor: pointer;
        }

        .read_btn {
            display: flex;
            padding-right: 16px;
            padding-left: 16px;
            justify-content: center;
            color: #5A4BDA;
            font-weight: 700;
            font-size: 14px;
            line-height: 24px;
        }

        .founder_innercardTwo {
            display: none;
            transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out;
        }

        .founder_card:hover .founder_innercard {
            display: none;
        }

        .founder_card:hover .founder_innercardTwo {
            display: block;
        }

        .read_contTwo {
            display: none;
        }

        .founder_card:hover .read_cont {
            display: none;

        }

        .founder_card:hover .read_contTwo {
            display: block;
        }

        @media (min-width: 640px) {}

        @media (min-width: 768px) {

            .founder {
                background-position: bottom;
                background-repeat: no-repeat
            }

            .founder_header {
                font-size: 32px;
                line-height: 48px;
            }

            .founder_inner {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }



            .founder_img {
                height: 168px;
                width: 168px;
            }

            .founder_name {
                font-size: 24px;
                line-height: 32px;
            }

            .founder_nameH {
                font-size: 24px;
                line-height: 32px;
            }

            .founder_desg {
                font-size: 16px;
                line-height: 24px;
            }

            .founder_quote {
                font-size: 24px;
                line-height: 32px;
            }

            .founder_quoteH {
                font-size: 16px;
                line-height: 24px;
            }

            .read_btn {
                font-size: 16px;
            }
        }


        @media (min-width: 1024px) {}

        @media (min-width: 1280px) {}
    </style>
    @php
        $founder = DB::table('founder')->where('founderStatus', 0)->limit(2)->get();
    @endphp
    <section class="founder">
        <div class="founder_cont">
            <div class="text-xl-left w-full">
                <div style="padding-top: 32px;padding-bottom:16px">
                    <h2 class="founder_header">Our Founders</h2>
                </div>
                <div class="founder_inner">
                    @foreach ($founder as $item)
                        <div class="founder_card">
                            <div class="founder_innercard">
                                <div class="founder_innerCard">
                                    <div class="d-flex justify-content-center py-3">
                                        <img src="{{ $item->founderImg }}" alt="{{ $item->founderImgAlt }}"
                                            class="founder_img">
                                    </div>
                                    <div class="founder_name">{{ $item->founderName }}</div>
                                    <div class="founder_desg">{{ $item->founderDsg }}</div>
                                    <div class="founder_quote">
                                        <span class="rotate">&rdquo;</span> {{ $item->founderMsg }} <span>&rdquo;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="founder_innercardTwo">
                                <div class="founder_innerCard">
                                    {{-- <div class="d-flex justify-content-center py-3">
                                    <img src="{{ asset('assets/Satyendra-pathak.png') }}" alt=""
                                        class="founder_img">
                                </div> --}}
                                    <div class="founder_nameH">{{ $item->founderName }}</div>
                                    {{-- <div class="founder_desg">Founder And Ceo</div> --}}
                                    <div class="founder_quoteH">
                                        {{ $item->founderDetail }}
                                    </div>
                                </div>
                            </div>
                            <div class="read_cont">
                                <div class="read_btn">
                                    <span class="pt-1">Read More about {{ $item->founderName }} </span>
                                    <span style="padding-top: 2px;">
                                        <div style="width:40px;height:30px;margin-top:3px;"><i
                                                class="fa-solid fa-chevron-up"></i></div>
                                    </span>
                                </div>
                            </div>
                            <div class="read_contTwo">
                                <div class="read_btn">
                                    <span class="pt-1">Read Less about {{ $item->founderName }} </span>
                                    <span style="padding-top: 2px;">
                                        <div style="width:40px;height:30px;margin-top:3px;"><i
                                                class="fa-solid fa-chevron-down"></i></div>
                                    </span>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

    {{-- ABOUT03 --}}


    {{-- ABOUT04 --}}

    <style>
        .font-fam-med,
        .font-fam-medium {
            font-weight: 400;
        }



        .breadcrumb {
            font-weight: 500;
            background: 0 0;
            padding: 0;
            font-size: 12px !important;
        }

        .breadcrumb {
            display: flex;
            flex-wrap: wrap;
            padding: 0 0;
            margin-bottom: 1rem;
            list-style: none;
        }

        dl,
        ol,
        ul {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        ol,
        ul {
            padding-left: 2rem;
        }

        .font-fam-bold {
            font-weight: 700;
        }

        .text-capitalize {
            text-transform: capitalize !important;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        a {
            color: #5a4bda;
            text-decoration: none;
            -webkit-transition: 0.4s;
            transition: 0.4s;
        }

        a {
            color: #0d6efd;
            text-decoration: underline;
        }

        b,
        strong {
            font-weight: bolder;
        }

        @media only screen and (max-width: 768px) {
            .container {
                max-width: 100%;
                /* Full width on smaller devices */
                padding: 0 1rem;
                /* Add some padding */
            }

            h1 {
                font-size: 1.5rem;
                /* Smaller font size */
            }

            ol,
            ul {
                padding-left: 1rem;
                /* Reduce padding */
            }

            /* Adjust other elements as needed */
        }
    </style>

    <main class="font-fam-med">

        <section class="container mt-5" style="max-width: 72rem;">

            <div>
                <h1 class="my-4 font-fam-bold text-capitalize">{{ $metaData->pageTitle }}</h1>
                <div>
                    {!! $metaData->pageDescription !!}
                </div>

            </div>
        </section>
    </main>
    {{-- ABOUT04 --}}


@endsection
