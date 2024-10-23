@php
    $data = DB::table('pages')->where('pageType', 2)->first();
    $companyDetails = DB::table('setting')->first();
@endphp
@extends('layout.mainLayout')
@section('title', $data->metaTitle)
@section('description', $data->metaDescriptioin)
@section('keywords', $data->metaKeywords)
@section('main')
    {{-- CONATCT01 --}}
    <style>
        .direction-button {
            background: transparent padding-box;
            color: #5A4BDA;
            height: 50px;
            border-radius: 10px;
            border-color: #5A4BDA;
        }

        .font-fam-bold {
            font-weight: 700;
        }

        font-fam-med,
        .font-fam-medium {
            font-weight: 400;
        }

        a {
            text-decoration: none;
        }
    </style>
    <div class="container mt-5" style="max-width: 72rem;">
        <div class="row">
            <h1 class="my-4 font-fam-bold heading-1" style="text-transform:none ;">{{ $data->pageTitle }}</h1>
            <div class="mb-5">
                {!! $data->pageDescription !!}
                <hr>
                </hr>
            </div>
            <div class="col-md-5">


                <div class="font-fam-bold mb-3">
                    <h2 class="heading-1 " style="text-transform:uppercase;">{{$companyDetails->companyName}} </h2>
                </div>
                <div class="font-20 font-fam-bold mb-3">
                    {{-- <div>
                        <h3>B, 1/40, Sector- F Rd,</h3>
                    </div> --}}
                    <span class="font-18 font-fam-medium mb-3">
                        {{-- <div>Sector F, Aliganj, Lucknow,</div>
                        <div>Uttar Pradesh 226024</div> --}}
                        <p>
                            {{$companyDetails->officialAddress}}
                        </p>
                        <a href="https://api.whatsapp.com/send?phone=+91{{$companyDetails->whatsappNumber}}&amp;text={{env('WHATSAPP_MESSAGE')}}">
                           +91 {{$companyDetails->whatsappNumber}}
                        </a>
                    </span>
                </div>
                <div class="font-18 mb-3">
                    <a href="{{$companyDetails->officialEmail}}"> {{$companyDetails->officialEmail}} </a>
                </div>


                <button type="button" class="btn btn-outline-primary direction-button border-10 mb-5" style="width:200px;"
                    onclick="getLocation()"><i class="fa fa-location-arrow" aria-hidden="true"
                        style="margin-right: 10px;"></i>Get Directions</button>


            </div>
            <div class="col-md-7" style="height:480px; border:1px solid #CCCCCC;  ">

                {!! $companyDetails->embedMapUrl !!}
            </div>
        </div>
    </div>


    <script>
        function getLocation() {

            var centerLocation = 'Career Wave';

            var options = {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            };

            function success(pos) {
                var crd = pos.coords;

                window.open("https://maps.google.com/maps?saddr=" + crd.latitude + ",+" + crd.longitude + "&daddr=" +
                    centerLocation, "_blank");

            }

            function error(err) {
                console.warn(`ERROR(${err.code}): ${err.message}`);
            }

            navigator.geolocation.getCurrentPosition(success, error, options);
        }
    </script>

    <hr class="mt-5">
    </hr>


    {{-- FAQ --}}
    <style>
        .box-class {
            background: no-repeat padding-box #fff;
            box-shadow: 0 3px 20px #0000001a;
            border-radius: 20px;
            min-height: 255px;
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

        @media (max-width: 768px) {
            .accordion-button {
                font-size: 14px;
                flex-wrap: initial;
            }

            .faq_answer {
                font-size: 16px;
            }

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
        <div class="container" style="max-width: 72rem">

            @include('include.faq')
            {{-- <div class="row">
                <div class="faqcontainer box-class col-12 col-md-12 col-lg-12">
                    <h3 class="font-fam-bold book-h3 mb-3">FAQ's</h3>

                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa-brands fa-quora" ></i> <span>.</span> Which is the best online
                                    coaching for IIT JEE?
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body font-fam-medium faq_answer">
                                    The best Online Coaching for IIT JEE is CW. Students enrolled in CW Online
                                    Coaching have
                                    achieved remarkable success in the IIT JEE exams.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa-brands fa-quora"></i> <span>.</span> Can I get into IIT by
                                    online
                                    coaching?
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body font-fam-medium">
                                    Many students nowadays study for JEE online from the comfort of their homes with
                                    the
                                    help of online coaching platforms. As a result, they can achieve success in
                                    getting
                                    admission to IIT.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa-brands fa-quora"></i> <span>.</span> Is Career Wave free of
                                    cost?
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body font-fam-medium">
                                    Yes, the CW app is available for download on the Google Play Store, and it is
                                    free for
                                    everyone.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fa-brands fa-quora"></i> <span>.</span> Is Career Wave
                                    sufficient for
                                    IIT?
                                </button>
                            </h4>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body font-fam-medium">
                                    Career Wave is considered sufficient for IIT preparation because it ranks first
                                    among
                                    coaching institutes. This institute has a dedicated team of professionals who
                                    provide
                                    individual attention to each student, helping them excel in all subjects.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="fa-brands fa-quora"></i> <span>.</span> Which coaching is best
                                    for an
                                    IIT with low fees?
                                </button>
                            </h4>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body font-fam-medium">
                                    CW is the most affordable and effective online coaching for IIT JEE, ensuring
                                    better
                                    preparation for the exam.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
