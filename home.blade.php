@extends('layout.mainLayout')

@section('main')
    {{-- HEADER --}}
    <style>
        .carousel-item .imgbig {
            height: 100%;
            display: block;
        }

        .carousel-item .imgsmall {
            height: 100%;
            display: none;
        }

        @media (max-width: 640px) {
            .carousel-item .imgbig {
                height: 100%;
                display: none;
            }

            .carousel-item .imgsmall {
                height: 100%;
                display: block;
            }
        }
    </style>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
        </div>

        <!-- Carousel Wrapper -->
        <div class="carousel-inner">
            <!-- Item 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('assets/headerslide_m.png') }}" class="imgbig w-100 " alt="...">
                <img src="{{ asset('assets/headerslide_d.png') }}" class="imgsmall w-100 " alt="...">
            </div>
            <!-- Item 2 -->
            <div class="carousel-item">
                <img src="{{ asset('assets/headerslide_m.png') }}" class="imgbig w-100 " alt="...">
                <img src="{{ asset('assets/headerslide_d.png') }}" class="imgsmall w-100 " alt="...">

            </div>
            <!-- Item 3 -->
            <div class="carousel-item">
                <img src="{{ asset('assets/headerslide_m.png') }}" class="imgbig w-100 " alt="...">
                <img src="{{ asset('assets/headerslide_d.png') }}" class="imgsmall w-100 " alt="...">

            </div>
            <!-- Item 4 -->
            <div class="carousel-item">
                <img src="{{ asset('assets/headerslide_m.png') }}" class="imgbig w-100 " alt="...">
                <img src="{{ asset('assets/headerslide_d.png') }}" class="imgsmall w-100 " alt="...">

            </div>
            <!-- Item 5 -->
            <div class="carousel-item">
                <img src="{{ asset('assets/headerslide_m.png') }}" class="imgbig w-100 " alt="...">
                <img src="{{ asset('assets/headerslide_d.png') }}" class="imgsmall w-100 " alt="...">

            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- SECTION01 --}}
    <style>
        .sec1 .outerCont {
            max-width: 1152px;
            display: flex;
            align-items: center;
            padding-top: 60px;
            padding-bottom: 60px;
            justify-content: space-between;
            flex-direction: column;
            margin: auto;
            position: relative;
        }

        @media (min-width: 1280px) {

            .sec1 .outerCont {
                flex-direction: row;
            }


        }

        .platform-innCont {
            font-weight: 500;
            line-height: 18px;
            font-size: 12px;
            justify-items: center;
        }

        @media (max-width: 640px) {
            .sec1 .outerCont {
                padding-top: 30px;
                padding-bottom: 30px;
            }

            .platform-innCont {
                font-size: 14px;
                line-height: 20px;
            }
        }

        .platform-head {
            color: #1B2124;
            margin-bottom: 6px;
            font-size: 40px;
            line-height: 50px;
        }

        @media (max-width: 768px) {
            .platform-head {
                padding-left: 50px;
                padding-right: 50px;
                font-size: 1.5rem;
                line-height: 2rem;
            }
        }

        .platform-subhead {
            font-size: 14px;
            padding-left: 0px;
            padding-right: 0px;
            text-align: center;
            color: #3D3D3D;
            margin-bottom: 0.875rem;
        }

        @media (min-width: 768px) {
            .platform-subhead {
                font-size: 0.875rem;
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (min-width: 1200px) {
            .platform-subhead {
                text-align: start;
                margin-bottom: 2.5rem;
                padding-left: 0px;
                padding-right: 0px;
            }
        }

        .platform-btn {
            padding-left: 28px;
            padding-right: 28px;
            padding-top: 14px;
            padding-bottom: 14px;
            width: 240px;
            border-radius: 0.375rem;
            background-color: #5A4BDA;
            color: white;
            font-weight: 600;
            font-size: 17px;
            line-height: 27px;
            align-items: center;
            border: none;
            transition: #4437B8 200ms ease-in-out;
        }

        .platform-btn:hover {
            background-color: #4437B8;
        }

        .platform-innerCont {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        @media (min-width: 640px) {
            .platform-innerCont {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
        }

        .platform-cont {
            background-color: white;
            font-size: 12px;
            padding: 0.5rem;
            position: absolute;
            height: 34px;
            right: 85px;
            top: 48px;
            border-radius: 0.375rem;
            z-index: 0;
            box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.08);
        }

        @media (min-width: 640px) {
            .platform-cont {
                font-size: 14px;
                height: 36px;
                right: 180px;
                top: 85px;
            }
        }

        .platform-name {
            background-color: white;
            width: 12px;
            height: 12px;
            border-radius: 0.125rem;
            margin: auto;
            transform: rotate(45deg);
        }

        @media (min-width: 640px) {
            .platform-name {
                width: 14px;
                height: 14px;
            }
        }

        .platform-cont1 {
            background-color: #140D52;
            font-size: 12px;
            padding: 0.5rem;
            height: 36px;
            color: white;
            position: absolute;
            left: 85px;
            top: 115px;
            border-radius: 0.375rem;
            z-index: 0;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.08);
        }


        @media (min-width: 640px) {
            .platform-cont1 {
                font-size: 14px;
                height: 34px;
                left: 170px;
                top: 158px;
            }
        }

        .platform-name2 {
            background-color: #140D52;
            width: 12px;
            height: 12px;
            border-radius: 0.125rem;
            margin: auto;
            transform: rotate(45deg);
        }

        @media (min-width: 640px) {
            .platform-name2 {
                width: 14px;
                height: 14px;
            }
        }

        .platform-name3 {
            background-color: #140D52;
            font-size: 12px;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            padding-top: 0.25rem;
            padding-bottom: 0.5rem;
            height: 28px;
            color: white;
            position: absolute;
            left: 85px;
            top: 141px;
            border-radius: 0.375rem;
            z-index: 1;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.08);
            width: 195px;
        }

        @media (min-width: 640px) {
            .platform-name3 {
                font-size: 14px;
                height: 30px;
                left: 170px;
                top: 185px;
                width: 222px;
            }
        }

        .platform-name4 {
            background-color: #140D52;
            font-size: 12px;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            padding-top: 0.25rem;
            padding-bottom: 0.5rem;
            height: 28px;
            color: white;
            position: absolute;
            left: 85px;
            top: 161px;
            border-radius: 0.375rem;
            z-index: 1;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.08);
            width: 195px;
        }

        .platform-img {
            display: block;
        }

        .platform-img2 {
            display: none;
        }


        @media (min-width: 640px) {
            .platform-name4 {
                font-size: 14px;
                height: 30px;
                left: 170px;
                top: 208px;
                width: 222px;
            }

            .platform-img {
                display: none;
            }

            .platform-img2 {
                display: block;
            }
        }


        .platform-heading {
            text-align: center;
            width: 100%;
        }

        @media (min-width: 1280px) {

            .platform-heading {
                text-align: left;
                width: 36%;
            }
        }
    </style>

    <div class="mx-auto postion-relative sec1">
        <div class="bg-image"
            style="
              background-image: url('{{ asset('assets/compress_background.webp') }}');
              position: absolute;
              height: 120vh;
              width: 100%;
              left: 0;
              top: 0;
              right: 0;
              bottom: 0;
             color:transparent;
              z-index: -1;
            ">
        </div>
        <div class="outerCont">
            <div class="platform-heading">
                <h1 class="fw-bold  platform-head">
                    India’s
                    <span style="color:#5A4BDA; ">Leading &amp; Most Reliable</span>
                    Educational Platform
                </h1>

                <div class="platform-subhead">
                    Unlock your potential by joining Career Wave — the most accessible learning platform for affordable
                    solutions.
                </div><button class="platform-btn ">
                    Get
                    Started</button>
            </div>
            <div class="platform-innerCont">
                <div class="position-relative platform-innCont">
                    <img alt="hero-student" fetchPriority="high" loading="eager" width="320" height="225"
                        decoding="async" data-nimg="1" class="platform-img"
                        style="color: transparent; height: 225px; width: 320px; background-position: center; background-repeat: no-repeat; background-size: contain;"
                        src="{{ asset('assets/hero-student-m.webp') }}" />

                    <img alt="hero-student" fetchPriority="high" loading="eager" width="600" height="318"
                        decoding="async" data-nimg="1" class="platform-img2"
                        style="color: transparent; height: 318px; width: 600px; background-position: center; background-repeat: no-repeat; background-size: contain;"
                        src="{{ asset('assets/happy_student.webp') }}" />

                    <div class="platform-cont">
                        <div class="position-absolute d-flex"
                            style="width: 20px;height:100%;right:-10px;z-index:-1;top:0;">
                            <div class="platform-name">
                            </div>
                        </div>
                        <p>Satyendra Sir, What is CareerWave?</p>
                    </div>
                    <div class="platform-cont1">
                        <div class="position-absolute d-flex " style="width:20px;height:100%;left:-6px;top:0:z-index:-1;">
                            <div class="platform-name2">
                            </div>
                        </div>
                        <p>Career Wave is India’s leading Edtech</p>
                    </div>
                    <div class="platform-name3">
                        <div class=" h-100 position-absolute d-flex " style="width: 20px;left:-6px;top:0;z-index:-1;">
                        </div>
                        <p>Company that is democratizing</p>
                    </div>
                    <div class="platform-name4">
                        <div class=" h-100 position-absolute d-flex " style="width: 20px;left:-6px;top:0;z-index:-1;">
                        </div>
                        <p>education at Scale.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION02 --}}
    <style>
        .sec02 {
            padding-left: 0.625rem;
            /* 10px */
            padding-right: 0.625rem;
            padding-top: 1rem;
            /* 16px */
            padding-bottom: 1rem;
            margin-left: 1rem;
            /* 16px */
            margin-right: 1rem;
            position: relative;
            border-radius: 0.375rem;
            background-color: white;
            justify-content: space-between;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            row-gap: 0.75rem;
            margin-top: -1%;
            overflow-y: hidden;
            box-shadow: 0px 1px 8px 0px rgba(0, 0, 0, 0.08);
        }

        @media (min-width: 640px) {
            .sec02 {

                padding-left: 1rem;
                /* 16px */
                padding-right: 1rem;
                padding-top: 1.5rem;
                /* 24px */
                padding-bottom: 1.5rem;
                margin-left: 1.5rem;
                /* 24px */
                margin-right: 1.5rem;

            }
        }

        @media (min-width: 1280px) {
            .sec02 {
                margin-left: 0px;
                /* 24px */
                margin-right: 0px;
            }
        }

        @media (min-width: 768px) {
            .sec02 {
                border-radius: 0.375rem;
                display: flex;
                flex-wrap: wrap;
            }
        }

        @media (min-width: 1024px) {
            .sec02 {
                flex-wrap: nowrap;
                justify-content: space-evenly;
            }
        }

        .sec02-h {
            display: none;
        }

        @media (max-width: 1024px) {
            .sec02-h {
                display: block;
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        .sec02-b {
            display: block;
        }

        @media (max-width: 1024px) {
            .sec02-b {
                display: none;
            }
        }

        .sec02-container {
            display: flex;
            flex-direction: column;
            text-align: center;
            width: 154px;
            column-count: 6;
        }

        @media (min-width: 640px) {
            .sec02-container {
                width: 330px;
            }
        }

        @media (min-width: 768px) {
            .sec02-container {
                column-count: 3;
            }
        }

        @media (min-width: 1024px) {
            .sec02-container {
                width: 240px;
            }
        }

        .sec02-innercontainer {
            align-self: center;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .sec02-innercontainer {
                margin-bottom: 14px;
            }
        }

        .sec02-img {
            width: 32px;
            height: 32px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        @media (min-width: 640px) {
            .sec02-img {
                width: 48px;
                height: 48px;
            }
        }

        .sec02-head {
            font-size: 0.875rem;
            font-weight: 600;
            color: #1B2124;
        }

        @media (min-width: 768px) {
            .sec02-head {
                font-size: 1.125rem;
            }
        }

        .sec02-subhead {
            font-size: 0.75rem;
            line-height: 1rem;
            /* font-weight: 500; */
            color: #1B2124;
        }

        @media (min-width: 768px) {
            .sec02-subhead {
                font-size: 1rem;
                line-height: 1.5rem;
            }
        }

        .sec02-element {
            margin: 1.5rem 0;
            display: none;
        }

        @media (min-width: 1024px) {
            .sec02-element {
                display: block;
            }
        }

        .sec02-element::after {
            content: "";
            display: block;
            background-color: #D9DCE1;
            width: 1px;
            height: 4rem;
        }
    </style>

    <div style="max-width: 72rem; margin: 0 auto;">
        <div class="sec02">
            <div class="sec02-h">
                <div class="TransitionWrapper_wrapper__8W2Z3">
                    <div class="sec02-container">
                        <div class="sec02-innercontainer">
                            <div class="sec02-img" style="background-image:url('{{ asset('assets/daily-live.webp') }}')">
                            </div>
                        </div>
                        <div class="sec02-head">Daily Live</div>
                        <div class="sec02-subhead">Interactive classes</div>
                    </div>
                </div>
            </div>
            <div class="sec02-b">
                <div class="flex justify-center">
                    <div class="TransitionWrapper_wrapper__8W2Z3">
                        <div class="sec02-container">
                            <div class="sec02-innercontainer">
                                <div class="sec02-img"
                                    style="background-image:url('{{ asset('assets/daily-live.webp') }}')"></div>
                            </div>
                            <div class="sec02-head">Daily Live</div>
                            <div class="sec02-subhead">Interactive classes</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sec02-element"></div>

            <div class="sec02-h">
                <div class="TransitionWrapper_wrapper__8W2Z3">
                    <div class="sec02-container">
                        <div class="sec02-innercontainer">
                            <div class="sec02-img" style="background-image:url('{{ asset('assets/millions.webp') }}')">
                            </div>
                        </div>
                        <div class="sec02-head">10 Million +</div>
                        <div class="sec02-subhead">Tests, sample papers &amp; notes</div>
                    </div>
                </div>
            </div>
            <div class="sec02-b">
                <div class="flex justify-center">
                    <div class="TransitionWrapper_wrapper__8W2Z3">
                        <div class="sec02-container">
                            <div class="sec02-innercontainer">
                                <div class="sec02-img"
                                    style="background-image:url('{{ asset('assets/millions.webp') }}')"></div>
                            </div>
                            <div class="sec02-head">10 Million +</div>
                            <div class="sec02-subhead">Tests, sample papers &amp; notes</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sec02-element"></div>

            <div class="sec02-h">
                <div class="TransitionWrapper_wrapper__8W2Z3">
                    <div class="sec02-container">
                        <div class="sec02-innercontainer">
                            <div class="sec02-img" style="background-image:url('{{ asset('assets/247.webp') }}')"></div>
                        </div>
                        <div class="sec02-head">24 x 7</div>
                        <div class="sec02-subhead">Doubt solving sessions</div>
                    </div>
                </div>
            </div>
            <div class="sec02-b">
                <div class="flex justify-center">
                    <div class="TransitionWrapper_wrapper__8W2Z3">
                        <div class="sec02-container">
                            <div class="sec02-innercontainer">
                                <div class="sec02-img" style="background-image:url('{{ asset('assets/247.webp') }}')">
                                </div>
                            </div>
                            <div class="sec02-head">24 x 7</div>
                            <div class="sec02-subhead">Doubt solving sessions</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sec02-element"></div>

            <div class="sec02-h">
                <div class="TransitionWrapper_wrapper__8W2Z3">
                    <div class="sec02-container">
                        <div class="sec02-innercontainer">
                            <div class="sec02-img"
                                style="background-image:url('{{ asset('assets/offline-centers.webp') }}')"></div>
                        </div>
                        <div class="sec02-head">100 +</div>
                        <div class="sec02-subhead">Offline centres</div>
                    </div>
                </div>
            </div>
            <div class="sec02-b">
                <div class="flex justify-center">
                    <div class="TransitionWrapper_wrapper__8W2Z3">
                        <div class="sec02-container">
                            <div class="sec02-innercontainer">
                                <div class="sec02-img"
                                    style="background-image:url('{{ asset('assets/offline-centers.webp') }}')"></div>
                            </div>
                            <div class="sec02-head">100 +</div>
                            <div class="sec02-subhead">Offline centres</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION03 --}}

    <style>
        .sec03 {
            margin-top: 24px;
            margin-right: auto;
            margin-left: auto;
            padding-left: 1rem;
            /* 16px */
            padding-right: 1rem;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

        }

        @media (min-width: 768px) {
            .sec03 {
                margin-top: 40px;
            }
        }

        @media (min-width: 1024px) {
            .sec03 {
                max-width: 72rem;
            }
        }

        @media (min-width: 1280px) {
            .sec03 {
                padding-right: 0px;
                padding-left: 0px;
            }
        }

        .sec03-heading {
            font-size: 20px;
            line-height: 30px;
            font-weight: 700;
            margin-top: 8px;
            margin-bottom: 8px;
            text-align: center;
        }

        @media (min-width: 768px) {
            .sec03-heading {
                font-size: 32px;
                line-height: 48px;
            }

            .sec03-subheading {
                font-size: 18px;
                line-height: 24px;
            }
        }

        .sec03-subheading {
            font-size: 14px;
            color: #3D3D3D: text-align: center;
            line-height: 20px;
            font-weight: 500;
            text-align: center;
        }

        .sec03-examCard {
            display: grid;
            align-items: start;
            justify-content: center;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .sec03-examCard {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .sec03-examCard {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        a {
            text-decoration: none;
        }

        .innerCard {
            box-shadow: 0 1px 8px 0 #00000014;
            border: 0.25px solid #D9DCE1;
            width: 328px;
            max-width: 100%;
            padding: 16px;
            position: relative;
            transition: all 0.2s;
        }

        .innerCard:hover {
            border-color: #3D3d3D;
        }

        .innerCardLeft {
            width: 220px;
        }

        .innerCardName {
            font-size: 18px;
            font-weight: 700;
            line-height: 20px;
        }

        .buttonContainer {
            padding-top: 16px;
            width: 232px;
        }

        .sec03-button {
            font-size: 12px;
            margin-right: 12px;
            line-height: 20px;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 7px 12px;
            color: #3d3d3d;
            text-align: center;
            border: 1px solid #d9dce1;
            border-radius: 28px;
        }

        .buttonContainer a {
            text-decoration: none;
            color: #3d3d3d;
        }

        .buttonCont {
            margin-top: 12px;
            color: #1B2124;
        }

        .buttonContName {
            padding-right: 12px;
            font-size: 14px;
            line-height: 12px;
        }

        .buttonContIcon {
            background-color: #F8F8F8;
            padding: 4px 10px;
            border-radius: 100px;
            display: flex;
            align-items: center;
        }

        @media (max-width: 330px) {
            .innerCard {
                width: 300px;
            }
        }

        @media (min-width: 768px) {
            .innerCard {
                width: 100%;
                padding: 20px;
            }

            .innerCardLeft {
                width: 232px;
            }

            .innerCardName {
                font-size: 20px;
                line-height: 30px;
            }

            .buttonContainer {
                width: 220px;
            }

            .sec03-button {
                font-size: 14px;
                margin-right: 8px;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .buttonCont {
                margin-top: 16px;
            }

            .buttonContName {
                line-height: 24px;
            }
        }

        @media (min-width: 1024px) {
            .innerCard {
                padding: 24px;
            }

            .innerCardName {
                font-size: 24px;
                line-height: 32px;
            }

            .buttonContainer {
                padding-top: 12px;
            }

            .sec03-button {
                padding-left: 20px;
                padding-right: 20px;
            }

            .buttonCont {
                margin-top: 20px;
            }

            .buttonContName {
                font-size: 16px;
            }
        }

        .innerCardRight {
            width: 56px;
        }

        .innerCardRight img {
            width: 2.5rem;
            height: 2.5rem;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            transform: scale(1);
        }

        .innerCardRightSec {
            background-color: rgb(255, 242, 242);
            border-radius: 100%;
            position: absolute;
            display: flex;
            align-items: center;
            aspect-ratio: 1 / 1;
            height: 165%;
        }

        .group:hover .buttonContName {
            color: #4437B8;
            text-decoration: underline;
            text-decoration-thickness: auto;
        }

        .group:hover .buttonContIcon {
            background-color: #4437B8;
            color: white;
        }

        .group:hover .buttonContIcon svg path {
            fill: white;
            /* Changes the arrow color to white */
        }


        @media (min-width: 768px) {
            .innerCardRight {
                width: 106px;
            }

            .innerCardRight img {
                width: 46px;
                height: 46px;
                margin-left: 40px;
            }

            .innerCardRightSec {
                height: 135%;
            }
        }

        /* XL */
        @media (min-width: 1280px) {
            .innerCardRight img {
                width: 72px;
                height: 72px;
                margin-left: 32px;
            }
        }
    </style>
    <div class="sec03">
        <div>
            <h2 class="sec03-heading">Exam Categories</h2>
        </div>
        <div>
            <div class="sec03-subheading">
                Career Wave is preparing students for 18 exam categories. Scroll down to find the one you are preparing for
            </div>
        </div>
        <div class="sec03-examCard">
            <div class="d-flex postion-relative flex-row rounded overflow-hidden innerCard">
                <div class="d-flex flex-column innerCardLeft">
                    <div class="d-flex flex-row innerCardName " style="white-space: nowrap;">
                        <div style="width: 220px;overflow:hidden;">
                            NEET
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-start flex-wrap overflow-y-auto buttonContainer">
                        <a href="#" class="sec03-button cursor-pointer">Class 11</a>
                        <a href="#" class="sec03-button cursor-pointer">Class 12</a>
                        <a href="#" class="sec03-button cursor-pointer">Dropper</a>

                    </div>
                    <a href="#" class="d-flex flex-row align-items-center buttonCont group">
                        <div class="cursor-pointer buttonContName">Explore Category</div>
                        <div class="buttonContIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.9697 3.96967C13.2626 3.67678 13.7374 3.67678 14.0303 3.96967L21.5303 11.4697C21.671 11.6103 21.75 11.8011 21.75 12C21.75 12.1989 21.671 12.3897 21.5303 12.5303L14.0303 20.0303C13.7374 20.3232 13.2626 20.3232 12.9697 20.0303C12.6768 19.7374 12.6768 19.2626 12.9697 18.9697L19.1893 12.75H3C2.58579 12.75 2.25 12.4142 2.25 12C2.25 11.5858 2.58579 11.25 3 11.25H19.1893L12.9697 5.03033C12.6768 4.73744 12.6768 4.26256 12.9697 3.96967Z"
                                    fill="#1B2124"></path>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="d-flex align-items-center innerCardRight">
                    <div class="innerCardRightSec">
                        <img src="{{ asset('assets/neet.webp') }}" alt="" lazy="loading" width="40"
                            height="40" class="">
                    </div>
                </div>
            </div>

            <div class="d-flex postion-relative flex-row rounded overflow-hidden innerCard">
                <div class="d-flex flex-column innerCardLeft">
                    <div class="d-flex flex-row innerCardName " style="white-space: nowrap;">
                        <div style="width: 220px;overflow:hidden;">
                            NEET
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-start flex-wrap overflow-y-auto buttonContainer">
                        <a href="#" class="sec03-button cursor-pointer">Class 11</a>
                        <a href="#" class="sec03-button cursor-pointer">Class 12</a>
                        <a href="#" class="sec03-button cursor-pointer">Dropper</a>

                    </div>
                    <a href="#" class="d-flex flex-row align-items-center buttonCont group">
                        <div class="cursor-pointer buttonContName">Explore Category</div>
                        <div class="buttonContIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.9697 3.96967C13.2626 3.67678 13.7374 3.67678 14.0303 3.96967L21.5303 11.4697C21.671 11.6103 21.75 11.8011 21.75 12C21.75 12.1989 21.671 12.3897 21.5303 12.5303L14.0303 20.0303C13.7374 20.3232 13.2626 20.3232 12.9697 20.0303C12.6768 19.7374 12.6768 19.2626 12.9697 18.9697L19.1893 12.75H3C2.58579 12.75 2.25 12.4142 2.25 12C2.25 11.5858 2.58579 11.25 3 11.25H19.1893L12.9697 5.03033C12.6768 4.73744 12.6768 4.26256 12.9697 3.96967Z"
                                    fill="#1B2124"></path>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="d-flex align-items-center innerCardRight">
                    <div class="innerCardRightSec">
                        <img src="{{ asset('assets/neet.webp') }}" alt="" lazy="loading" width="40"
                            height="40" class="">
                    </div>
                </div>
            </div>

            <div class="d-flex postion-relative flex-row rounded overflow-hidden innerCard">
                <div class="d-flex flex-column innerCardLeft">
                    <div class="d-flex flex-row innerCardName " style="white-space: nowrap;">
                        <div style="width: 220px;overflow:hidden;">
                            NEET
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-start flex-wrap overflow-y-auto buttonContainer">
                        <a href="#" class="sec03-button cursor-pointer">Class 11</a>
                        <a href="#" class="sec03-button cursor-pointer">Class 12</a>
                        <a href="#" class="sec03-button cursor-pointer">Dropper</a>

                    </div>
                    <a href="#" class="d-flex flex-row align-items-center buttonCont group">
                        <div class="cursor-pointer buttonContName">Explore Category</div>
                        <div class="buttonContIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.9697 3.96967C13.2626 3.67678 13.7374 3.67678 14.0303 3.96967L21.5303 11.4697C21.671 11.6103 21.75 11.8011 21.75 12C21.75 12.1989 21.671 12.3897 21.5303 12.5303L14.0303 20.0303C13.7374 20.3232 13.2626 20.3232 12.9697 20.0303C12.6768 19.7374 12.6768 19.2626 12.9697 18.9697L19.1893 12.75H3C2.58579 12.75 2.25 12.4142 2.25 12C2.25 11.5858 2.58579 11.25 3 11.25H19.1893L12.9697 5.03033C12.6768 4.73744 12.6768 4.26256 12.9697 3.96967Z"
                                    fill="#1B2124"></path>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="d-flex align-items-center innerCardRight">
                    <div class="innerCardRightSec">
                        <img src="{{ asset('assets/neet.webp') }}" alt="" lazy="loading" width="40"
                            height="40" class="">
                    </div>
                </div>
            </div>

            <div class="d-flex postion-relative flex-row rounded overflow-hidden innerCard">
                <div class="d-flex flex-column innerCardLeft">
                    <div class="d-flex flex-row innerCardName " style="white-space: nowrap;">
                        <div style="width: 220px;overflow:hidden;">
                            NEET
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-start flex-wrap overflow-y-auto buttonContainer">
                        <a href="#" class="sec03-button cursor-pointer">Class 11</a>
                        <a href="#" class="sec03-button cursor-pointer">Class 12</a>
                        <a href="#" class="sec03-button cursor-pointer">Dropper</a>

                    </div>
                    <a href="#" class="d-flex flex-row align-items-center buttonCont group">
                        <div class="cursor-pointer buttonContName">Explore Category</div>
                        <div class="buttonContIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.9697 3.96967C13.2626 3.67678 13.7374 3.67678 14.0303 3.96967L21.5303 11.4697C21.671 11.6103 21.75 11.8011 21.75 12C21.75 12.1989 21.671 12.3897 21.5303 12.5303L14.0303 20.0303C13.7374 20.3232 13.2626 20.3232 12.9697 20.0303C12.6768 19.7374 12.6768 19.2626 12.9697 18.9697L19.1893 12.75H3C2.58579 12.75 2.25 12.4142 2.25 12C2.25 11.5858 2.58579 11.25 3 11.25H19.1893L12.9697 5.03033C12.6768 4.73744 12.6768 4.26256 12.9697 3.96967Z"
                                    fill="#1B2124"></path>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="d-flex align-items-center innerCardRight">
                    <div class="innerCardRightSec">
                        <img src="{{ asset('assets/neet.webp') }}" alt="" lazy="loading" width="40"
                            height="40" class="">
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- SECTION04 --}}
    <style>
        .sec04 {
            margin-top: 24px;
            margin-right: auto;
            margin-left: auto;
            padding-left: 16px;
            padding-right: 16px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .sec04-head {
            font-size: 20px;
            line-height: 30px;
            font-weight: 700;
            margin-top: 8px;
            margin-bottom: 8px;
            text-align: center;
        }

        .sec04-subhead {
            font-size: 14px;
            color: #3d3d3d;
            text-align: center;
            line-height: 20px;
            font-weight: 500;
        }

        .sec04-cont {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 32px;
            margin-bottom: 32px;
        }

        .sec04-card {
            height: 158px;
            width: 158px;
            border-radius: 4px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: rgb(255, 243, 227);
        }

        .sec04_subname {
            font-size: 0.875rem;
            /* 14px */
            line-height: 1.25rem;
            color: #3d3d3d;
            font-weight: 500;
        }

        .sec04-innerCard {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            animation-duration: .3s;
            transition-duration: .3s;

        }

        .happy_card_parent .happy_card_child:first-child {
            margin-block: 95px;
        }

        .happy_card_parent:hover .happy_card_child:first-child {
            margin-block: 40px
        }

        .happy_card_parent:hover .happy_card_child:last-child {
            opacity: 1
        }

        .sec04_name {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 55px;
        }

        .sec04_img {
            opacity: 0.5;
            width: 100%;
            height: 110px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            margin-top: 3px;

        }

        .sec04_img :hover {
            transform: translateY(0px);
        }

        .sec04_btn {
            padding: 14px 28px;
            width: 240px;
            border-radius: 0.375rem;
            animation-duration: .2s;
            transition-duration: .2s;
            transition-property: all;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            background-color: #5A4BDA;
            align-items: center;
            color: #fff;
            font-weight: 600;
            line-height: 16px;
            font-size: 17px;
            border: none;
        }

        /* MD */
        @media (min-width:768px) {
            .sec04 {
                margin-top: 40px;
            }

            .sec04-head {
                font-size: 32px;
                line-height: 48px;
            }

            .sec04-subhead {
                font-size: 18px;
                line-height: 24px;
            }

            .sec04-cont {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .sec04-card {
                height: 200px;
                width: 230px;
                border-radius: 16px;
            }

            .sec04_subname {
                font-size: 1.125rem;
                /* 18px */
                line-height: 1.75rem;
            }

            .sec04_name {
                font-size: 38px;
            }

        }

        /* LG */
        @media(min-width:1024px) {
            .sec04 {
                max-width: 72rem;
            }

            .sec04-card {
                height: 265px;
                width: 265px;
                justify-content: start;
            }

            .sec04_name {
                font-size: 40px;
            }
        }

        /* XL */
        @media(min-width:1280px) {
            .sec04 {
                padding-right: 0px;
                padding-left: 0px;
            }

            .sec04-cont {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }
    </style>
    <div class="sec04">
        <div>
            <h2 class="sec04-head">A Platform Trusted by Students Worldwide</h2>
        </div>
        <div>
            <div class="sec04-subhead">Don't Just Take Our Word for It. Delve into the Numbers and Witness the Excellence
                for Yourself!</div>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="sec04-cont">
                <div>
                    <div class="sec04-card happy_card_parent">
                        <div class="sec04-innerCard happy_card_child">
                            <div class="d-flex flex-row align-items-center justify-content-center sec04_name">15 Million+
                            </div>
                            <div class="sec04_subname">Happy Students</div>
                        </div>
                        <div class="happy_card_child sec04_img"
                            style="background-image:url('{{ asset('assets/happy.webp') }}')">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="sec04-card happy_card_parent">
                        <div class="sec04-innerCard happy_card_child">
                            <div class="d-flex flex-row align-items-center justify-content-center sec04_name">15 Million+
                            </div>
                            <div class="sec04_subname">Happy Students</div>
                        </div>
                        <div class="happy_card_child sec04_img"
                            style="background-image:url('{{ asset('assets/happy.webp') }}')">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="sec04-card happy_card_parent">
                        <div class="sec04-innerCard happy_card_child">
                            <div class="d-flex flex-row align-items-center justify-content-center sec04_name">15 Million+
                            </div>
                            <div class="sec04_subname">Happy Students</div>
                        </div>
                        <div class="happy_card_child sec04_img"
                            style="background-image:url('{{ asset('assets/happy.webp') }}')">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="sec04-card happy_card_parent">
                        <div class="sec04-innerCard happy_card_child">
                            <div class="d-flex flex-row align-items-center justify-content-center sec04_name">24000+
                            </div>
                            <div class="sec04_subname">Mock Tests</div>
                        </div>
                        <div class="happy_card_child sec04_img"
                            style="background-image:url('{{ asset('assets/happy.webp') }}')">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="sec04_btn">Get Started</button>
            </div>
        </div>
    </div>

    {{-- SECTION05 --}}

    <style>
        .sec05 {
            padding-top: 28px;
            padding-bottom: 28px;
            max-width: 72rem;
            margin-right: auto;
            margin-left: auto;
        }

        .sec05_head {
            font-weight: 700;
            font-size: 1.25rem;
            /* 20px */
            line-height: 1.75rem;
        }

        .sec05_subhead {
            margin-top: 12px;
            margin-right: auto;
            margin-left: auto;
            max-width: 48rem;
            color: rgb(61 61 61);
            font-weight: 500;
            padding-bottom: 16px;
            font-size: 0.875rem;
            /* 14px */
            line-height: 1.25rem;
        }

        .sec05_btnCont {
            width: 100%;
            padding-bottom: 4px;
            margin-bottom: 16px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .sec05_Cont {
            display: flex;
            flex-wrap: nowrap;
            justify-content: start;
            gap: 12px;
        }

        .sec05_btn {
            display: inline-flex;
            white-space: nowrap;
            gap: 0.5rem;
            align-items: center;
            border-radius: 9999px;
            cursor: pointer;
            border: 1px solid lightgray;
            padding: 0.5rem 0.75rem;
            /* Equivalent to px-3 py-2 */
            font-size: 0.875rem;
            /* 14px */
            line-height: 1.25rem;
            font-weight: 500;

            animation-duration: .2s;
            transition-duration: .2s;
            transition-property: all;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            outline: none;

        }

        .sec05_btn:focus {
            ring-width: 2px;
            ring-color: var(--ring);
            ring-offset-width: 2px;
        }

        .sec05_btn {
            border-color: var(--stroke-light);
            /* Equivalent to border-stroke-light */
            background-color: white;
            /* Equivalent to bg-white */
        }

        .sec05_btn:hover {
            background-color: #fafafa;
            border-color: lightgray;

        }


        @media(min-width:768px) {
            .sec05_head {
                font-size: 2.25rem;
                /* 36px */
                line-height: 2.5rem;
            }

            .sec05_subhead {
                font-size: 1.125rem;
                /* 18px */
                line-height: 1.75rem;
            }

            .sec05_Cont {
                justify-content: center;

            }
        }
    </style>
    <div class="sec05">
        <div>
            <h2 class="sec05_head text-center ">Academic Excellence : Results</h2>
            <p class="sec05_subhead text-center">Giving wings to a millions dreams, a million more to go</p>
            <div class="sec05_btnCont">
                <div class="sec05_Cont">
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>NEET (UG)
                            2024</span></div>
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>IIT JEE</span>
                    </div>
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>UPSC CSE </span>
                    </div>
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>GATE </span>
                    </div>
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>Board Exams -
                            CBSE
                            10th </span></div>
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>Board Exams -
                            ICSE
                            10th </span></div>
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>CA </span></div>
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>MBA </span></div>
                    <div class="sec05_btn" data-img-src="{{ asset('assets/headerslide_m.png') }}"><span>SSC </span></div>
                </div>

            </div>
            <div class="rounded overflow-hidden mx-auto pb-5" style="max-width:72rem;">
                <div class="w-100 ">
                    <div id="customDynamicCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div>
                            <div class="carousel-inner custom-carousel-inner ">
                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/headerslide_m.png') }}" class="d-block w-100 h-auto"
                                        alt="Initial Slide">
                                </div>
                                <!-- Dynamic images will be loaded here -->
                            </div>
                        </div>


                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#customDynamicCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#customDynamicCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->

    <!-- Custom Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.sec05_btn');
            const carouselInner = document.querySelector(
                '.custom-carousel-inner'); // Custom class for dynamic carousel
            const carousel = document.querySelector('#customDynamicCarousel');

            // Function to add dynamic image to the carousel
            function addImageToCarousel(imgSrc) {
                // Remove 'active' class from all items
                const items = carouselInner.querySelectorAll('.carousel-item');
                items.forEach(item => item.classList.remove('active'));

                // Create new carousel item
                const newCarouselItem = document.createElement('div');
                newCarouselItem.classList.add('carousel-item', 'active');
                newCarouselItem.innerHTML = `<img src="${imgSrc}" class="d-block w-100" alt="Dynamic Slide">`;

                // Append new item to carousel inner
                carouselInner.appendChild(newCarouselItem);
            }

            // Add event listeners to buttons
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const imgSrc = this.getAttribute(
                        'data-img-src'); // Get image source from data attribute
                    addImageToCarousel(imgSrc); // Add new image to the carousel
                });
            });

            // Stop auto-slide on hover
            carousel.addEventListener('mouseenter', function() {
                bootstrap.Carousel.getInstance(carousel).pause();
            });

            // Restart auto-slide on mouse leave
            carousel.addEventListener('mouseleave', function() {
                bootstrap.Carousel.getInstance(carousel).cycle();
            });

            // Start carousel auto-slide on page load
            const carouselInstance = new bootstrap.Carousel(carousel, {
                interval: 3000, // Slide every 3 seconds
                ride: 'carousel'
            });
        });
    </script>


    {{-- SECTION08 --}}

    <style>
        .sec08 {
            background-color: #f8f8f8;
            padding-top: 40px;
            padding-bottom: 40px;
            row-gap: 1.25rem;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .sec08_cont {
            margin-bottom: 20px;

        }

        .sec08_head {
            font-weight: 700;
            margin-bottom: 8px;
            color: #1b2124;
            font-size: 1.25rem;
            /* 20px */
            line-height: 1.75rem;
            text-align: center;
        }

        .sec08_subhead {
            font-weight: 500;
            color: #3D3d3D;
            font-size: 0.875rem;
            /* 14px */
            line-height: 1.25rem;
            text-align: center;
        }

        .sec08_testCont {
            box-shadow: 0px 1px 8px 0px #00000014;
            max-width: 72rem;
            margin: auto;
            border-radius: 0.25rem;
            background-color: white;
            margin-left: 16px;
            margin-right: 16px;
            padding: 16px;
            gap: 20px;
            display: flex;
            flex-direction: column;

        }

        .sec08_testImg {
            color: transparent;
            width: 100%;
            height: 166px;
            cursor: pointer;
            border-radius: 0.25rem;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .sec08_testPlay {
            color: transparent;
            height: 3.5rem;
            width: 3.5rem;
            cursor: pointer;
            left: 143px;
            bottom: 54px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: contain;
            position: absolute;
        }

        .sec08_testData {
            font-size: 0.875rem;
            /* 14px */
            line-height: 1.25rem;
            color: #3d3d3d;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .sec08_testOtherData {
            color: #3D3d3D;
            height: 148px;
            scrollbar-width: none;
            overflow: scroll;
            font-weight: 500;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .sec08_testName {
            bottom: 0;
        }

        .sec08_testSlide {
            align-items: center;
        }

        .sec08_testSlider {
            scrollbar-width: none;
            overflow: hidden;
            padding-right: 16px;
            padding-left: 16px;
            scroll-behavior: smooth;
            max-width: 72rem;
            margin: auto;
            display: flex;
            gap: 20px;
            overflow-x: scroll;
        }

        .sec08_testCard {
            box-shadow: 0px 1px 8px 0px #00000014;
            background-color: white;
            justify-content: space-between;
            min-height: 304px;
            min-width: 286px;
            padding: 16px;
            row-gap: 12px;
            display: flex;
            flex-direction: column;
            border-radius: 0.25rem;
        }

        @media(min-width:640px) {
            .sec08_testCont {
                padding: 24px;
                margin-left: 24px;
                margin-right: 24px;
                flex-direction: row;
            }

            .sec08_testImg {
                height: 235px;
                width: 270px;
            }

            .sec08_testPlay {
                bottom: 6rem;
                left: 2rem;
            }

            .sec08_testData {
                font-size: 1rem;
                /* 16px */
                line-height: 1.5rem;
                margin-bottom: 24px;

            }

            .sec08_testSlide {
                width: 100%
            }

            .sec08_testCard {
                min-width: 370px;
                padding: 24px;
                row-gap: 18px;
            }

            .sec08_testOtherData {
                font-size: 1rem;
                /* 16px */
                line-height: 1.5rem;
            }

        }

        @media(min-width:768px) {
            .sec08_cont {
                margin-bottom: 24px;
            }

            .sec08_testCont {
                gap: 32px
            }

        }

        @media(min-width:1024px) {
            .sec08_testPlay {
                bottom: 5rem;
                left: 6rem;
            }

            .sec08_testName {
                position: absolute;
                bottom: 0;
            }
        }

        @media(min-width:1280px) {
            .sec08_cont {
                margin-bottom: 32px;
            }

            .sec08_head {
                font-size: 32px;
                line-height: 48px;
            }

            .sec08_subhead {
                font-size: 1.125rem;
                /* 18px */
                line-height: 1.75rem;
            }

            .sec08_testCont {

                margin-left: auto;
                margin-right: auto;
            }

            .sec08_testSlider {
                width: 100%;
                padding-right: 0;
                padding-left: 0;
            }

            .sec08_arrowRight {
                width: 10px;
                height: 16px;
            }
        }



        .swipeRightbtn {
            align-items: center;
            cursor: pointer;
            display: none;
            height: 40px;
            scroll-behavior: smooth;
            width: 40px;
            position: absolute;
            top: 74%;
            right: 160px;
            border-radius: 9999px;
            border-width: 1px;
            background-color: white;
            padding-top: 8px;
            padding-bottom: 8px;
            padding-right: 16px;
            padding-left: 16px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        .swipeLeftbtn {
            align-items: center;
            cursor: pointer;
            display: none;
            height: 40px;
            scroll-behavior: smooth;
            width: 40px;
            position: absolute;
            top: 74%;
            left: 160px;
            border-radius: 9999px;
            border-width: 1px;
            background-color: white;
            padding-top: 8px;
            padding-bottom: 8px;
            padding-right: 16px;
            padding-left: 16px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }


        .sec08_arrowRight {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            z-index: 1;
        }

        @media (min-width: 1280px) {

            .swipeLeftbtn,
            .swipeRightbtn {
                display: flex;
            }
        }
    </style>

    <div class="sec08">
        <div>
            <div>
                <div class="sec08_cont">
                    <h2 class="sec08_head text-center"> Students <span>❤️</span> Career Wave</h2>
                    <div class="sec08_subhead text-center">Hear from our students</div>
                </div>
            </div>
            <div class="sec08_testCont">
                <div class="position-relative">
                    <img src="{{ asset('assets/webBanner.png') }}" alt="webBanner" loading="lazy" width="0"
                        decoding="async" height="0" class="sec08_testImg">
                    <img src="{{ asset('assets/playbtn.webp') }}" alt="playCircle" loading="lazy" width="0"
                        decoding="async" height="0" class="sec08_testPlay">
                </div>
                <div class="position-relative">
                    <img src="{{ asset('assets/commaIcon.webp') }}" alt="commIcon" loading="lazy" width="0"
                        decoding="async" height="0"
                        style="width:40px;height:28px;margin-bottom:14px;background-repeat: no-repeat;background-size: cover; background-position: contain;">
                    <div class="sec08_testData">My name is Tathagat Awatar. I secured All India Rank 1 by scoring full
                        score in NEET UG 2024. I started my preparation with Physics Wallah in 12th grade by joining the
                        Lakshya NEET batch, then I took 2 drop by joining Yakeen NEET batch and I completed my full
                        preparation from online PW batch. PW teachers and their guidance helps me to acheive AIR1 and
                        motivated me during my drop year....</div>
                    <div class="sec08_testName">
                        <div style="font-size: 1rem;line-height: 1.5rem;color:#1b2124;margin-bottom:4px;font-weight:500;">
                            Multiple Rankers</div>
                        <div class="d-flex gap-2">
                            <div class=""
                                style="border-color: rgb(0 0 0);font-weight: 600;color:#5a4bda;font-size: 0.75rem;line-height: 1rem;">
                                AIR 1, AIR 86 and other</div>
                            {{-- <hr  style="height: 16px;border-width: 1px;"> --}} <span style="color: #eee;margin-top:-4px;">|</span>
                            <div style="color:#5a4bda;font-size: 0.75rem;line-height: 1rem;font-weight: 600;">NEET</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sec08_testSlide">
            <div class="postion-relative m-auto" style="max-width:72rem;">
                <div id="content" class="sec08_testSlider">
                    <div>
                        <div class="sec08_testCard">
                            <div>
                                <img src="{{ asset('assets/commaIcon.webp') }}" alt="commIcon" loading="lazy"
                                    width="0" decoding="async" height="0"
                                    style="width:40px;height:32px;margin-bottom:10px;background-repeat: no-repeat;background-size: cover; background-position: contain;">
                                <div class="sec08_testOtherData">
                                    I used to regularly follow the youtube videos, prelims booster videos and specially
                                    editorial discussion from where I made important pointers. I also watched some history
                                    videos like Buddhism, Jainism as the topics were explained very clearly… all these were
                                    very helpful during my preparation…Jainism as the topics were explained very clearly…
                                    all these were
                                    very helpful during my preparation…Jainism as the topics were explained very clearly…
                                    all these were
                                    very helpful during my preparation…
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <div style="padding:4px;border-color:#d9dce1;border-width: 2px;border-radius: 9999px;">
                                    <img src="{{ asset('assets/student.jpg') }}" alt="icon" loading="lazy"
                                        width="0" height="0" decoding="async"
                                        style="color:transparent;
                                height:36px;width:36px;background-repeat: no-repeat;background-size: cover; background-position: center;overflow:hidden;border-radius: 9999px;">
                                </div>
                                <div>
                                    <div style="font-weight:500;color:#1b2124;font-size: 1rem;line-height: 1.5rem;">
                                        Anmol Rathore
                                    </div>
                                    <div class="d-flex gap-2">
                                        <div class=""
                                            style="border-color: rgb(0 0 0);font-weight: 600;color:#5a4bda;font-size: 0.75rem;line-height: 1rem;">
                                            AIR 1, AIR 86 and other</div>
                                        {{-- <hr  style="height: 16px;border-width: 1px;"> --}} <span style="color: #eee;margin-top:-4px;">|</span>
                                        <div style="color:#5a4bda;font-size: 0.75rem;line-height: 1rem;font-weight: 600;">
                                            NEET</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="sec08_testCard">
                            <div>
                                <img src="{{ asset('assets/commaIcon.webp') }}" alt="commIcon" loading="lazy"
                                    width="0" decoding="async" height="0"
                                    style="width:40px;height:32px;margin-bottom:10px;background-repeat: no-repeat;background-size: cover; background-position: contain;">
                                <div class="sec08_testOtherData">
                                    I used to regularly follow the youtube videos, prelims booster videos and specially
                                    editorial discussion from where I made important pointers. I also watched some history
                                    videos like Buddhism, Jainism as the topics were explained very clearly… all these were
                                    very helpful during my preparation…
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <div style="padding:4px;border-color:#d9dce1;border-width: 2px;border-radius: 9999px;">
                                    <img src="{{ asset('assets/student.jpg') }}" alt="icon" loading="lazy"
                                        width="0" height="0" decoding="async"
                                        style="color:transparent;
                                height:36px;width:36px;background-repeat: no-repeat;background-size: cover; background-position: center;overflow:hidden;border-radius: 9999px;">
                                </div>
                                <div>
                                    <div style="font-weight:500;color:#1b2124;font-size: 1rem;line-height: 1.5rem;">
                                        Anmol Rathore
                                    </div>
                                    <div class="d-flex gap-2">
                                        <div class=""
                                            style="border-color: rgb(0 0 0);font-weight: 600;color:#5a4bda;font-size: 0.75rem;line-height: 1rem;">
                                            AIR 1, AIR 86 and other</div>
                                        {{-- <hr  style="height: 16px;border-width: 1px;"> --}} <span style="color: #eee;margin-top:-4px;">|</span>
                                        <div style="color:#5a4bda;font-size: 0.75rem;line-height: 1rem;font-weight: 600;">
                                            NEET</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="sec08_testCard">
                            <div>
                                <img src="{{ asset('assets/commaIcon.webp') }}" alt="commIcon" loading="lazy"
                                    width="0" decoding="async" height="0"
                                    style="width:40px;height:32px;margin-bottom:10px;background-repeat: no-repeat;background-size: cover; background-position: contain;">
                                <div class="sec08_testOtherData">
                                    I used to regularly follow the youtube videos, prelims booster videos and specially
                                    editorial discussion from where I made important pointers. I also watched some history
                                    videos like Buddhism, Jainism as the topics were explained very clearly… all these were
                                    very helpful during my preparation…
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <div style="padding:4px;border-color:#d9dce1;border-width: 2px;border-radius: 9999px;">
                                    <img src="{{ asset('assets/student.jpg') }}" alt="icon" loading="lazy"
                                        width="0" height="0" decoding="async"
                                        style="color:transparent;
                                height:36px;width:36px;background-repeat: no-repeat;background-size: cover; background-position: center;overflow:hidden;border-radius: 9999px;">
                                </div>
                                <div>
                                    <div style="font-weight:500;color:#1b2124;font-size: 1rem;line-height: 1.5rem;">
                                        Anmol Rathore
                                    </div>
                                    <div class="d-flex gap-2">
                                        <div class=""
                                            style="border-color: rgb(0 0 0);font-weight: 600;color:#5a4bda;font-size: 0.75rem;line-height: 1rem;">
                                            AIR 1, AIR 86 and other</div>
                                        {{-- <hr  style="height: 16px;border-width: 1px;"> --}} <span style="color: #eee;margin-top:-4px;">|</span>
                                        <div style="color:#5a4bda;font-size: 0.75rem;line-height: 1rem;font-weight: 600;">
                                            NEET</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="sec08_testCard">
                            <div>
                                <img src="{{ asset('assets/commaIcon.webp') }}" alt="commIcon" loading="lazy"
                                    width="0" decoding="async" height="0"
                                    style="width:40px;height:32px;margin-bottom:10px;background-repeat: no-repeat;background-size: cover; background-position: contain;">
                                <div class="sec08_testOtherData">
                                    I used to regularly follow the youtube videos, prelims booster videos and specially
                                    editorial discussion from where I made important pointers. I also watched some history
                                    videos like Buddhism, Jainism as the topics were explained very clearly… all these were
                                    very helpful during my preparation…
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <div style="padding:4px;border-color:#d9dce1;border-width: 2px;border-radius: 9999px;">
                                    <img src="{{ asset('assets/student.jpg') }}" alt="icon" loading="lazy"
                                        width="0" height="0" decoding="async"
                                        style="color:transparent;
                                height:36px;width:36px;background-repeat: no-repeat;background-size: cover; background-position: center;overflow:hidden;border-radius: 9999px;">
                                </div>
                                <div>
                                    <div style="font-weight:500;color:#1b2124;font-size: 1rem;line-height: 1.5rem;">
                                        Anmol Rathore
                                    </div>
                                    <div class="d-flex gap-2">
                                        <div class=""
                                            style="border-color: rgb(0 0 0);font-weight: 600;color:#5a4bda;font-size: 0.75rem;line-height: 1rem;">
                                            AIR 1, AIR 86 and other</div>
                                        {{-- <hr  style="height: 16px;border-width: 1px;"> --}} <span style="color: #eee;margin-top:-4px;">|</span>
                                        <div style="color:#5a4bda;font-size: 0.75rem;line-height: 1rem;font-weight: 600;">
                                            NEET</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="sec08_testCard">
                            <div>
                                <img src="{{ asset('assets/commaIcon.webp') }}" alt="commIcon" loading="lazy"
                                    width="0" decoding="async" height="0"
                                    style="width:40px;height:32px;margin-bottom:10px;background-repeat: no-repeat;background-size: cover; background-position: contain;">
                                <div class="sec08_testOtherData">
                                    I used to regularly follow the youtube videos, prelims booster videos and specially
                                    editorial discussion from where I made important pointers. I also watched some history
                                    videos like Buddhism, Jainism as the topics were explained very clearly… all these were
                                    very helpful during my preparation…
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <div style="padding:4px;border-color:#d9dce1;border-width: 2px;border-radius: 9999px;">
                                    <img src="{{ asset('assets/student.jpg') }}" alt="icon" loading="lazy"
                                        width="0" height="0" decoding="async"
                                        style="color:transparent;
                                height:36px;width:36px;background-repeat: no-repeat;background-size: cover; background-position: center;overflow:hidden;border-radius: 9999px;">
                                </div>
                                <div>
                                    <div style="font-weight:500;color:#1b2124;font-size: 1rem;line-height: 1.5rem;">
                                        Anmol Rathore
                                    </div>
                                    <div class="d-flex gap-2">
                                        <div class=""
                                            style="border-color: rgb(0 0 0);font-weight: 600;color:#5a4bda;font-size: 0.75rem;line-height: 1rem;">
                                            AIR 1, AIR 86 and other</div>
                                        {{-- <hr  style="height: 16px;border-width: 1px;"> --}} <span style="color: #eee;margin-top:-4px;">|</span>
                                        <div style="color:#5a4bda;font-size: 0.75rem;line-height: 1rem;font-weight: 600;">
                                            NEET</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swipeRightbtn" id="rightBtn">
                    <img src="{{ asset('assets/swipe_right_arrow.webp') }}" alt="right icon" class="sec08_arrowRight">
                </div>
                <div class="swipeLeftbtn" id="leftBtn">
                    <img src="{{ asset('assets/swipe-left-arrow.webp') }}" alt="left icon" class="sec08_arrowRight">
                </div>
            </div>
        </div>
    </div>
    <script>
        // Select elements
        const slider = document.getElementById('content');
        const rightBtn = document.getElementById('rightBtn');
        const leftBtn = document.getElementById('leftBtn');

        // Define the scroll distance (width of one card)
        const scrollAmount = 500; // Adjust this value as needed based on card width

        // Right button event listener
        rightBtn.addEventListener('click', () => {
            slider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });

        // Left button event listener
        leftBtn.addEventListener('click', () => {
            slider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
    </script>

    {{-- SECTION06 --}}
    <style>
        .resources {
            max-width: 72rem;
            /* Enable horizontal scrolling for cards */
            padding: 0 10px;
            /* Optional: Add padding to the sides */
        }

        .resources-cards {
            background-color: #F1FAFF;
            position: relative;
            overflow: hidden;
            transition: background-color 0.3s ease;
            min-width: 250px;
            /* Ensure a minimum width for each card */
            margin-right: 10px;
            /* Space between cards */
        }

        .resources-cards:hover {
            background-color: #77c8f3;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .resources-cards:hover .card-img {
            transform: scale(1.15);
        }

        .arrow {
            float: right;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .resources-cards:hover .arrow {
            opacity: 1;
        }

        .card-head {
            font-size: 24px;
            color: var(--secondary-color);
        }

        .card-desc {
            font-size: 14px;
            color: #757575;
        }

        .card-img {
            transition: transform 0.3s ease;
            width: 70%;
            height: 170px;
            object-fit: cover;
        }

        .resources-heading {
            text-align: center;
            position: relative;
            /* Keep the heading above the scrolling content */
            z-index: 1;
            /* Ensure heading stays above the cards */
            margin-bottom: 1rem;

        }


        /* Responsive adjustments */
        @media (max-width: 576px) {
            .resources-cards {
                margin-bottom: 1rem;
                padding: 0.5rem;
            }

            .card-head {
                font-size: 20px;
                /* Adjust font size for mobile */
            }

            .card-desc {
                font-size: 12px;
                /* Adjust font size for mobile */
            }
        }

        @media (min-width: 576px) and (max-width: 768px) {
            .resources .col-lg-3 {
                margin-bottom: 1.5rem;
            }
        }

        @media (min-width: 768px) {
            .resources-heading h2 {
                font-size: 2rem;
                font-weight: 700px;
            }
        }
    </style>

    <section>
        <div class="resources mx-auto">
            <div class="resources-heading">
                <h2 class="res_head">Study Resources</h2>
                <p class="res_subhead">A diverse array of learning materials to enhance your educational journey.</p>
            </div>

            <div class="d-flex gap-3" style="overflow-x: auto;">
                <div class="rounded resources-cards p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="card-head">Notes</span>
                        <i class="fa-solid fa-arrow-right arrow"></i>
                    </div>
                    <div class="card-desc py-2">
                        <p>Use Career Wave detailed study materials that simplify complex ideas into easily understandable
                            language</p>
                    </div>
                    <div class="d-flex justify-content-center align-item-center">
                        <img src="{{ asset('assets/a1.webp') }}" class="card-img" alt="">
                    </div>
                </div>

                <div class="rounded resources-cards p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="card-head">Reference Books</span>
                        <i class="fa-solid fa-arrow-right arrow"></i>
                    </div>
                    <div class="card-desc py-2">
                        <p>Our experts have created thorough study materials that break down complicated concepts into
                            easily understandable content</p>
                    </div>
                    <div class="d-flex justify-content-center align-item-center">
                        <img src="{{ asset('assets/a2.webp') }}" class="card-img" alt="">
                    </div>
                </div>

                <div class="rounded resources-cards p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="card-head">NCERT Solutions</span>
                        <i class="fa-solid fa-arrow-right arrow"></i>
                    </div>
                    <div class="card-desc py-2">
                        <p>Unlock academic excellence with Career Wave NCERT Solutions which provides you step-by-step
                            solutions</p>
                    </div>
                    <div class="d-flex justify-content-center align-item-center">
                        <img src="{{ asset('assets/a3.webp') }}" class="card-img" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION07 --}}

    <style>
        .sec07 {
            margin-top: 24px;
            margin-bottom: 24px;
            max-width: 72rem;
            margin: auto;
            margin-top: 80px;
            margin-bottom: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center
        }

        .sec07_head {
            color: #3d3d3d;
            font-size: 20px;
            line-height: 30px;
            font-weight: 700;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .sec07_subhead {
            color: #3D3d3D;
            font-size: 18px;
            line-height: 24px;
            font-weight: 500;

        }

        .sec07_btn {
            padding: 14px 28px;
            width: 240px;
            font-size: 1rem;
            /* 16px */
            line-height: 1.5rem;
            border-radius: 0.375rem;
            background-color: #5A4BDA;
            align-items: center;
            color: white;
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
            transition-duration: 200ms;
            border: none;
            margin-top: 10px;
        }

        .sec07_btn:hover {
            background-color: #4437B8;
        }

        @media (min-width:768px) {
            .sec07_head {
                font-size: 32px;
                line-height: 48px;
            }

            .sec07_subhead {
                font-size: 16px;
                line-height: 20px;
            }
        }


        /* Carousel Container */
        .sec07-carousel-container {
            max-width: 72rem;
            margin: 30px auto;
            overflow: hidden;
            position: relative;
        }

        /* Carousel slides wrapper */
        .sec07-carousel-slider {
            display: flex;
            animation: sec07-slide 15s infinite linear;
        }

        /* Individual slide */
        .sec07-carousel-slide {
            min-width: 360px;
            flex: 0 0 auto;
        }

        /* Responsive images */
        .sec07-carousel-slide img {
            width: 96%;
            height: 166px;
            display: block;
            border-radius: 0.375rem;
            object-fit: cover;
        }

        /* Pause on hover */
        .sec07-carousel-slider:hover {
            animation-play-state: paused;
        }

        /* Animation for continuous automatic sliding */
        @keyframes sec07-slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Media Queries for Mobile */
        @media (max-width: 768px) {
            .sec07 {
                margin-top: 20px;
                margin-bottom: 20px;
            }



            .sec07-carousel-container {
                max-width: 100%;
            }

            .sec07-carousel-slide {
                min-width: 240px;
                /* Adjust the slide width for mobile screens */
            }

            .sec07-carousel-slide img {
                width: 92%;
                height: auto;
            }
        }
    </style>
    <div class="sec07">
        <div class="sec07_head text-center ">
            Join India Most Loved Educational Platform Today</div>
        <div class="sec07_subhead text-center ">
            Explore our 72 YouTube Channels and subscribe to get access to quality education for free.</div>

        <div class="sec07-carousel-container">
            <div class="sec07-carousel-slider">
                <div class="sec07-carousel-slide">
                    <img src="{{ asset('assets/youtube.png') }}" alt="Slide 1">
                </div>
                <div class="sec07-carousel-slide">
                    <img src="{{ asset('assets/youtube.png') }}" alt="Slide 2">
                </div>

                <div class="sec07-carousel-slide">
                    <img src="{{ asset('assets/youtube.png') }}" alt="Slide 3">
                </div>
                <div class="sec07-carousel-slide">
                    <img src="{{ asset('assets/youtube.png') }}" alt="Slide 3">
                </div>
                <div class="sec07-carousel-slide">
                    <img src="{{ asset('assets/youtube.png') }}" alt="Slide 3">
                </div>
                <div class="sec07-carousel-slide">
                    <img src="{{ asset('assets/youtube.png') }}" alt="Slide 3">
                </div>
            </div>
        </div>

        <button class=" sec07_btn">Get
            Started</button>
    </div>
@endsection
