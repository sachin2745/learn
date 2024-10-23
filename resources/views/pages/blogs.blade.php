@php
    $data = DB::table('pages')->where('pageType', 4)->first();
@endphp
@extends('layout.mainLayout')
@section('title', $data->metaTitle)
@section('description', $data->metaDescriptioin)
@section('keywords', $data->metaKeywords)
@section('main')
    <style>
        @font-face {
            font-family: poppins;
            src: url(assets/fonts/poppins-regular-webfont.woff);
        }

        .body {
            background-color: #ffffff;
        }

        .pageHeading {
            /* padding: 100px 0; */
            text-align: center;
            /* height: 200px; */
        }

        .reaBtn {
            display: flex;
            justify-content: center;
        }

        .readMoreBtn {
            color: black;
            padding: 2px;
            font-weight: 900;
            background-color: #ffffff;
        }

        .dateStyle {
            color: rgb(98, 89, 89);
            font-size: 12px;
            margin-top: -14px;
        }

        .blog-header {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .heading {
            font-size: 36px;
            font-weight: 700;
            font-family: var(--acs-nir-b);
            margin-top: 20px;
        }

        .blogDescription {
            font-size: 16px;
            margin-top: 10px;
            font-family: var(--acs-nir-m);
            line-height: 1.4;
        }

        

        .card-body {
            font-family: var(--acs-nir-m);
        }

        .card-title {
            font-size: 1.2rem;
        }

        .card-text {
            font-size: 1rem;
        }

        .card-text * {
            margin-bottom: 0;
            color: var(--acs-yellow-40) !important;
        }

        .card-text-sm {
            font-size: .8rem;
        }

        .card-text-md {
            font-size: 12px;
        }

        @media (max-width: 768px) {
            .heading {
                font-size: 30px;
            }

            .blogDescription {
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .heading {
                font-size: 24px;
                padding: 0px;
                max-width: 100%;
                margin: 0 auto;
            }

            .blogDescription {
                font-size: 14px;
            }

            .blog-header {
                padding: 0px;
            }
        }
    </style>

    <div class="body">


        <div class="container-fluid px-2 px-md-5" >

            <div class="blog-header pt-4 pt-md-4 pb-md-2 ">
                <h1 class="text-center heading acs_hup_theme">Welcome to the <span class="theme-text">Career Wave Blog</span>
                    Page </h1>
                <p class="text-center blogDescription ">
                    Here you will find all the latest news, updates, and information about the Career Wave Blog. Stay tuned
                    for more updates.
                </p>
            </div>

            <div class="row py-1 py-md-4 m-0">
                @foreach ($blogs as $blog)
                    <div class="col-md-4 mt-3 body shadow">
                        <div class="card border-0" style="cursor: pointer;">
                            <img class="rounded mt-2" src="{{ $blog->blogImageSmall }}" height="220px" alt="{{ $blog->blogImgAlt }}"
                                style="object-fit: cover">
                            <div class="card-body p-1">
                                <h5 class="card-title text-center my-2 fw-bold" data-blog-id="{{ $blog->blogId }}" onclick="window.location.href = 'blogdetails/{{ $blog->blogSKU }}'">
                                   {{ $blog->blogTitle }}
                                </h5>
                                <div class="card-text text-center ">
                                    {!! Str::words($blog->blogDescription, 12) !!}
                                </div>
                                <p class="card-text-sm text-center  my-2">
                                    {{ date('d-F-Y', (int) $blog->blogPostDate) }}
                                </p>
                                <div class="reaBtn">
                                    <p class="border-bottom border-3 pb-2 readMoreBtn" data-blog-id="{{ $blog->blogId }}"
                                        onclick="window.location.href = 'blogdetails/{{ $blog->blogSKU }}'"
                                        style="cursor: pointer;">READ MORE
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
