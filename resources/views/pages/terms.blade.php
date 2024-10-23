@php
    $terms = DB::table('pages')->where('pageType', 6)->first();
@endphp
@extends('layout.mainLayout')

@section('title', $terms->metaTitle)
@section('description', $terms->metaDescriptioin)
@section('keywords', $terms->metaKeywords)

@section('main')
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

        <ol class="breadcrumb">
            <!-- <li class="active">Active page</li> -->
        </ol>

        <section class="container mt-5" style="max-width: 72rem;">
            <!-- Col 1 -->

            <div>
                <h1 class="my-4 font-fam-bold text-capitalize">{{ $terms->pageTitle }}</h1>

              <div>
                {!! $terms->pageDescription !!}
              </div>

            </div>
        </section>
    </main>
@endsection
