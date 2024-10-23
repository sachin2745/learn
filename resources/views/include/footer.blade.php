<style>
    :root {
        --primary-color: #FF0000;
        --secondary-color: #171717;
    }

    .footer-logo {
        display: inline-flex;
        align-items: center;
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
    }

    .footer-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-left: 16px;
    }

    .download-img {
        width: 120px;
        height: auto;
        margin-right: 20px;
    }

    ul {
        list-style-type: none;
        padding-left: 0;
    }

    .social-icons a {
        margin-right: 15px;
        font-size: 24px;
        color: var(--secondary-color);
    }

    .sub-heading {
        font-weight: bold;
        margin-bottom: 10px;
        color: var(--secondary-color);
    }

    .sub-heading2 {
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--secondary-color);
        font-size: 18px;
    }

    .footer-links ul li {
        margin-bottom: 8px;
    }

    .footer-bg {
        background-color: #F8F9FA;
    }

    .footer2-lists {
        font-size: 14px;
        color: #615f5f;
    }

    .footer_copy {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        row-gap: 0.5rem;
    }

    .footer_privacy {
        display: flex;
        justify-content: center;
        gap: 12px;
        align-items: center;
    }

    .footer_policy {
        font-size: 0.75rem;
        /* 12px */
        line-height: 1rem;
    }

    .footer_copyRight {
        font-size: 12px;
        color: #1b2124;
    }

    @media(min-width: 768px) {
        .footer_copy {
            flex-direction: row;
        }

        .footer_privacy {
            justify-content: start;
        }
    }

    @media(min-width: 1280px) {
        .footer_policy {
            color: #3d3d3d;
            font-size: 14px;
            line-height: 18px;
            font-weight: 500;
        }

        .footer_copyRight {
            font-size: 14px;
            line-height: 18px;
            font-weight: 500;
            color: #3d3d3d;
        }
    }

    .footer-logo img {
        max-width: 100%;
        height: auto;
    }

    .footer-links ul li a {
        color: #333;
        text-decoration: none;
    }

    .footer-links ul li a:hover {
        text-decoration: underline;
    }

    .footer-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .download-img {
        max-width: 150px;
    }

    .social-icons a {
        font-size: 1.5rem;
        color: #333;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: #007bff;
    }

    @media (max-width: 767px) {
        .footer-logo img {
            width: 40px;
        }

        .footer-title {
            font-size: 1.2rem;
        }
    }

    iframe{
        width: 100%;
        height: 100%;
    }
</style>
@php
    $popularExams = DB::table('examName')
        ->select('examName', 'examSlug')
        ->where('popularExam', 0)
        ->orderBy('popularExamCreatedTime', 'desc')
        ->limit(7)
        ->get();

    $popularBatches = DB::table('batch')
        ->select('batchName', 'batchSlug')
        ->where('popularBatch', 0)
        ->orderBy('popularBatchCreatedTime', 'desc')
        ->limit(7)
        ->get();

    $pages = DB::table('pages')->select('pageType')->where('pageStatus', 0)->get();

    foreach ($pages as $index => $page) {
        switch ($index) {
            case 0:
                $page->route = 'Home';
                break;
            case 1:
                $page->route = 'ContactUs';
                break;
            case 2:
                $page->route = 'AboutUs'; // change this to AboutUs
                break;
            case 3:
                $page->route = 'Blogs';
                break;
            case 4:
                $page->route = 'PrivacyPolicy';
                break;
            case 5:
                $page->route = 'TermsAndConditions';
                break;
            case 6:
                $page->route = 'RefundPolicy';
                break;
            default:
                $page->route = '404';
                break;
        }
    }

    $companyDetails = DB::table('setting')->first();

@endphp

<div class="footer-bg mt-5">

    <div class="footer container py-4 mx-auto" style="max-width: 72rem;">
        <div class="row">
            <!-- Left section with logo and description -->
            <div class="col-lg-6 col-12 mb-4">
                <div class="footer-logo d-flex align-items-center mb-3">
                    <img src="{{ asset($companyDetails->companyLogo) }}" alt="logo" class="img-fluid" width="60px">
                    <span class="footer-title ms-2"> {{$companyDetails->companyName}} </span>
                </div>
                <p class="text-muted">
                    {{$companyDetails->settingShortDescription}}
                </p>
                {{-- <div class="download-apk d-flex flex-wrap mb-3">
                    <img src="{{ asset('assets/google-play.webp') }}" class="img-fluid download-img me-2"
                        alt="Download on Play Store" style="width: 150px;">                   
                </div> --}}
                <div class="download-apk d-flex flex-wrap mb-3">
                    <!-- Google Play Store -->
                    <a href="{{$companyDetails->googleUrl}}" target="_blank">
                        <img src="{{ asset('assets/google-play.webp') }}" class="img-fluid download-img me-2"
                            alt="Download on Play Store" style="width: 120px;">
                    </a>

                    <!-- Intel Chip Download -->
                    <a href="{{$companyDetails->intelUrl}}" target="_blank">
                        <img src="{{ asset('assets/mac_with_intel.png') }}" class="img-fluid download-img me-2"
                            alt="Intel Chip Download Image" style="width: 120px;">
                    </a>

                    <!-- Apple App Download -->
                    <a href="{{$companyDetails->appleUrl}}" target="_blank">
                        <img src="{{ asset('assets/mac_with_apple.png') }}" class="img-fluid download-img me-2"
                            alt="Apple App Download Image " style="width: 120px;">
                    </a>

                    <!-- Windows Download -->
                    <a href="{{$companyDetails->windowsUrl}}" target="_blank">
                        <img src="{{ asset('assets/windows-button.png') }}" class="img-fluid download-img me-2"
                            alt="Windows Download Image" style="width: 120px;height:38.5px;margin-top:-1.5px;">
                    </a>
                </div>

                <div class="social-account">
                    <div class="sub-heading mb-2">
                        <span>Let’s get social :</span>
                    </div>
                    <div class="social-icons d-flex">
                        <a href="{{$companyDetails->facebookUrl}}" class="me-3"><i
                                class="fa-brands fa-facebook"></i></a>
                        <a href="{{$companyDetails->twitterUrl}}" class="me-3"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="{{$companyDetails->youtubeUrl}}" class="me-3"><i
                                class="fa-brands fa-youtube"></i></a>
                        <a href="{{$companyDetails->instagramUrl}}" class="me-3"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="{{$companyDetails->telegramUrl}}" class="me-3"><i class="fa-brands fa-telegram"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=+91{{$companyDetails->whatsappNumber}}&amp;text={{env('WHATSAPP_MESSAGE')}}"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Links Sections -->

            <div class="col-lg-2 col-md-4 col-sm-6 footer-links mb-4">
                <div class="sub-heading">Quick Links</div>
                <ul class="list-unstyled">
                    @foreach ($pages as $item)
                        <li><a href="{{ route($item->route) }}">{{ $item->pageType }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 footer-links mb-4">
                <div class="sub-heading">Popular Exams</div>
                <ul class="list-unstyled">

                    @foreach ($popularExams as $item)
                        <li><a href="{{ route('Courses', $item->examSlug ?? '') }}">{{ $item->examName }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 footer-links mb-4">
                <div class="sub-heading">Popular Batch</div>
                <ul class="list-unstyled">
                    @foreach ($popularBatches as $item)
                        <li><a href="{{ route('CourseDetail', $item->batchSlug ?? '') }}">{{ $item->batchName }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- <div class="col-lg-2 col-md-4 col-sm-6 footer-links mb-4">
                <div class="sub-heading">Company</div>
                <ul class="list-unstyled">
                
                </ul>
            </div> --}}
        </div>
    </div>

    <div style="background-color: #eee;" style="max-width:72rem;">
        <div class="container" style="max-width:72rem;">
            <hr>
        </div>

        <div class="mx-auto container pb-3 " style="max-width:72rem;">

            <style>
                .title {
                    font-weight: 600;
                    font-size: 1rem;
                    line-height: 1.5rem;
                    color: #3d3d3d;
                }

                .description {
                    font-size: 0.75rem;
                    line-height: 1rem;
                    color: #757575;
                }
            </style>
            <div class="d-flex flex-column text-left gap-3 py-3">
                <div class="d-flex flex-column gap-1">
                    {{-- <div class="title">
                        Know about Career Wave
                    </div>
                    <div class="description">
                        Career Wave is India's top online ed-tech platform that provides affordable and
                        comprehensive learning experience to students of classes 6 to 12 and those preparing for JEE
                        and NEET exams. We also provide extensive NCERT solutions, sample papers, NEET, JEE Mains,
                        BITSAT previous year papers, which makes us a one-stop solution for all resources. Career
                        Wave also caters to over 3.5 million registered students and over 78 lakh+ YouTube
                        subscribers with a 4.8 rating on its app.
                    </div> --}}

                    {!! $companyDetails->setttingLongDescription !!}
                </div>
            </div>
            <hr style="border-width: 1px;margin-bottom:18px;">
            <div class="footer_copy">
                <div class="footer_privacy">
                    <a href="{{ route('PrivacyPolicy') }}">
                        <div class="footer_policy">
                            Privacy Policy
                        </div>

                    </a>
                    <span style="margin-top:-4px;color:#000;">|</span>
                    <a href="{{ route('TermsAndConditions') }}">
                        <div class="footer_policy">
                            Terms of Use
                        </div>

                    </a>
                    <span style="margin-top:-4px;color:#000;">|</span>
                    <a href="{{ route('RefundPolicy') }}">
                        <div class="footer_policy">
                            Refunds & Cancellation Policy
                        </div>

                    </a>
                </div>
                <div class="text-center footer_copyRight">Copyright © 2024 Career Wave Pvt. Ltd. All rights reserved.
                </div>
            </div>
        </div>
    </div>

</div>

{{-- <script>
    // Example JavaScript to dynamically load footer links
    document.addEventListener("DOMContentLoaded", function() {
        const connectUsList = [
            'Mail Us',
            'Support Center',
            'FAQs'
        ];

        const quickLinksList = [
            'Terms of Service',
            'Privacy Policy',
            'Help Center'
        ];

        const productsList = [
            'IIT JEE',
            'NEET',
            'NDA',
            'UPSC'
        ];

        const additionalLinksList = [
            'Blog',
            'Careers',
            'Testimonials'
        ];

        function loadDynamicLinks(list, elementId) {
            const ul = document.getElementById(elementId);
            list.forEach(item => {
                const li = document.createElement('li');
                li.className = 'footer2-lists';
                li.textContent = item;
                ul.appendChild(li);
            });
        }

        loadDynamicLinks(connectUsList, 'dynamic-connect-us-list');
        loadDynamicLinks(quickLinksList, 'dynamic-quick-links-list');
        loadDynamicLinks(productsList, 'dynamic-products-list');
        loadDynamicLinks(additionalLinksList, 'dynamic-additional-links-list');
    });
</script> --}}
