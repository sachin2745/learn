@extends('layout.mainLayout')
@section('title', $blogdetails->blogMetaTitle)
@section('description', $blogdetails->blogMetaDescription)
@section('keywords', $blogdetails->blogMetaKeywords)
@section('main')
    <style>
        .blogTitle {
            font-weight: 700;

        }

        .mainContainer {
            display: flex;
            justify-content: space-between;
        }

        .text-color {
            color: #383535;
        }

        .keywordInput {
            background-color: #EBE9E6;
            border-radius: 10px;
        }

        hr {
            width: 20%;
            color: #b30606;
        }

        .anchor {
            text-decoration: none;
            color: #0D324D;
        }

        .IconBorder {
            font-size: 32px;
            padding-left: 0px;
        }

        .alignment:nth-child(even) {
            width: 65%;
            margin-left: auto;
        }

        a {
            text-decoration: none;

        }

        a:hover {
            text-decoration: none;
        }

        .longDescription *:not(h2 span, h3 span, h4 span, h5 span, h6 span) {
            color: #6D747D !important;
        }

        .longDescription p span strong {
            color: #333 !important;
        }

        @media only screen and (max-width: 500px) {
            .responsive-image {
                width: 600px;
                height: auto;
            }

            .responsive-font h2 {
                font-size: 16px;
            }

            .responsive-font h3 {
                font-size: 14px;
            }

            .responsive-font p,
            .textKeyword,
            h5 {
                font-size: 12px;
            }

            .alignment:nth-child(even) {
                width: 100%;
            }

            .userLetter {
                padding-top: 12px !important;
                font-size: 25px !important;
            }

            .socialIcons {
                justify-content: center;
            }

            .shareSection {
                padding: 15px 2px !important;
            }

            .dateCal {
                margin-top: -12px !important;
                text-align: center !important;
                font-size: 8px;
            }

            .blogTitle {
                text-align: center;
            }

            .recentTitle {
                font-size: 12px !important;
                font-weight: 600 !important;
            }

            .recentDescription {
                font-size: 10px !important;
            }

            .commentCircle {
                width: 50px !important;
                height: 50px !important;
                border-radius: 50% !important;
                background-color: #0D324D;
            }
        }

        .recentDescription {
            font-size: 12px;
        }

        .shareIcons {
            padding: 0px 2px;
            line-height: 2px;
        }

        .dateCal {
            margin-top: -12px !important;
            font-size: 13px;
        }

        .recent-blog-date {
            font-size: 10px !important;
            margin-top: -15px !important;
        }

        .searchCatg {
            font-size: 10px !important;
            margin-top: -10px !important;
            ;
        }
    </style>

    <div class="m-2 m-md-5 mt-4 responsive-font">
        <div class="d-flex justify-content-between gap-5 flex-wrap">
            <div class="col-sm-12 col-xl-8 responsive-left">

                <div class="img">
                    <img src="{{ asset($blogdetails->blogImageLarge) }}" width="900" height="450"
                        alt="{{ $blogdetails->blogImgAlt }}" class="rounded responsive-image " style="max-width: 100%">
                </div>
                <center>
                    <div class="title pt-3">
                        <h2 class="blogTitle">{{ $blogdetails->blogTitle }}</h2>
                    </div>

                    <div class="date py-1">
                        <div class="calender dateCal">
                            <span class="text-secondary ">
                                {{ date('d-M-Y h:i A', $blogdetails->blogCreatedTime) }}
                            </span>
                        </div>
                    </div>
                </center>

                <div class="shortDescription py-2 py-md-3">
                    <div class="text-secondary" style="text-align: justify">{!! $blogdetails->blogDescription !!}</div>
                </div>

                <div class="longDescription  py-2 py-md-3">
                    <div style="text-align: justify">{!! $blogdetails->blogContent !!}</div>
                </div>


                <div class="tags py-2 py-md-3 d-flex flex-column flex-md-row">
                    <div class="col-12 col-md-9 d-flex gap-2 m-0 p-0">
                        <h5><b>Tags:</b> </h5> <span class="textKeyword keywo" style="text-align: justify">
                            {{ $blogdetails->blogKeywords }} </span>
                    </div>
                    <div class="col-0 col-md-3 d-flex gap-2 m-0 p-0 shareSection">
                        <h5><b> Share:</b> </h5>
                        <div class="shareIcons">
                            <a class="anchor fs-5 "
                                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>

                            <a class="anchor fs-5 "
                                href="https://twitter.com/intent/tweet?text=Check%20out%20this%20page%20{{ url()->current() }}"
                                target="_blank">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                            <a class="anchor fs-5"
                                href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}" target="_blank">
                                <i class="fa-brands fa-pinterest"></i>
                            </a>
                            <a class="anchor fs-5"
                                href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}"
                                target="_blank">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="commentSection py-2 py-md-3">
                    @foreach ($blogsComments as $index => $comment)
                        <div class="alignment d-flex my-3 p-3 border border-2 border-light shadow-sm rounded">

                            <div class="d-flex justify-content-center py-2">
                                <div style="width:70px; height:70px; border-radius:50%; background-color:#0D324D;"
                                    class="commentCircle">
                                    <h2 class="text-center text-light comment-author userLetter" style="padding-top:15px;">
                                        {{ $comment->commentAddedByName }}
                                    </h2>
                                </div>
                            </div>

                            <div class="py-2 ps-3 w-100">
                                <div class="commentName">
                                    <h5 style="font-size: 16px; font-weight: 700">{{ $comment->commentAddedByName }}
                                    </h5>
                                </div>
                                <div class="commentDate">
                                    <h5 style="font-size: 12px; color:#938E71; margin-top: -5px;">
                                        {{ date('d-m-Y', (int) $comment->commentAddedDate) }}
                                    </h5>
                                </div>
                                <div class="text-secondary" style="font-size: 12px; ">
                                    <p class="m-0">{{ $comment->commentText }}</p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>


                <div class="commentForm py-2 py-md-3">
                    <h4 class="py-2">Leave a Comment</h4>
                    <form action="{{ route('addBlogComment') }}" method="POST">
                        @csrf

                        <input type="hidden" name="commentBlogId" value="{{ $blogdetails->blogId }}">

                        <div class="d-flex py-2 justify-content-between gap-2">
                            <input class="col p-2 form-control  " type="text" placeholder="Name"
                                name="commentAddedByName" id="commentAddedByName" required>
                            <input class="col p-2 form-control" type="text" placeholder="Email"
                                name="commentAddedByEmail" id="commentAddedByEmail" required>
                        </div>

                        <div class="py-2">
                            <textarea style="width: 100%" class="p-2 form-control" name="commentText" id="commentText" placeholder="Message"
                                required></textarea>
                        </div>

                        <div class="submitBtn py-2">
                            <button type="submit" style="color:aliceblue; background-color: #0D324D"
                                class="px-4 py-2 rounded">Comment</button>
                        </div>

                    </form>
                </div>

            </div>

            <div class="col">
                <div class="rightBox">
                    <div class="keywordInput input-group py-4 px-4 position-relative">
                        <input type="text" class="form-control" placeholder="Search Blog Details" name="blogSearch"
                            id="blogSearch">
                        {{-- <span class="input-group-text bg-white border-0"> --}}
                        {{-- <i class="fa-solid fa-magnifying-glass"></i> --}}
                        {{-- </span> --}}
                        <!-- Dropdown to show search results -->
                        <ul class="dropdown-menu w-100" id="searchResults"
                            style="display: none; max-height: 200px; overflow-y: auto;"></ul>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#blogSearch').on('input', function() {
                                let searchText = $(this).val();
                                if (searchText.length > 0) {
                                    $.ajax({
                                        url: "{{ route('BlogSearchData') }}",
                                        method: "GET",
                                        data: {
                                            blogSearch: searchText
                                        },
                                        success: function(data) {
                                            let dropdown = $('#searchResults');
                                            dropdown.empty();

                                            if (data.length > 0) {
                                                $.each(data, function(index, blog) {
                                                    dropdown.append(`
                                                <li>
                                                    <a href="/blogdetails/${blog.blogId}" class="dropdown-item">
                                                        <strong style="font-size:12px;" >${blog.blogTitle}</strong><br>
                                                        <small class="searchCatg">Category: ${blog.blogCategory}  
                                                            <span style="font-size:9px;">[ ${blog.blogPostDate} ]</span>
                                                        </small>
                                                    </a>
                                                </li>
                                            `);
                                                });
                                                dropdown.show();
                                            } else {
                                                dropdown.hide();
                                            }
                                        }
                                    });
                                } else {
                                    $('#searchResults').hide();
                                }
                            });
                        });
                    </script>

                    <div class="keywordInput categoryList py-4 px-4 mt-5">
                        <div>
                            <h5><b>Category list</b></h5>
                        </div>
                        <div>
                            <hr size="30">
                        </div>
                        <div>
                            @foreach ($categories as $category)
                                <div class="py-1">
                                    <a class="anchor text-color recentDescription" href="#">
                                        {{ $category->blogCategory }} </a><br />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="keywordInput categoryList py-4 px-3 px-md-4 mt-5">
                        <div>
                            <h5> <b> Recent Blogs </b></h5>
                        </div>
                        <div>
                            <hr size="30">
                        </div>
                        <div>
                            @foreach ($recentBlogs as $recent)
                                <div class="bg-secodary py-2">
                                    <a class="anchor text-color" href="{{ route('BlogDetails', $recent->blogSKU) }}">
                                        <div class="row gap-2 gap-md-1">
                                            <div class="col-2">
                                                <img src="{{ asset($recent->blogImageSmall) }}"
                                                    alt="{{ $recent->blogImgAlt }}" width="55" height="55"
                                                    class="rounded shadow">
                                            </div>
                                            <div class="col">
                                                <h6 class="m-0 p-0 text-dark recentTitle" style="font-size: 14px;">
                                                    {{ Str::words($recent->blogTitle, 5) }}</h6>
                                                <span class="recent-blog-date m-0 p-0 text-secondary">
                                                    {{ date('d-M-Y h:i A', (int) $recent->blogPostDate) }} </span>
                                                <div class=" text-secondary recentDescription"
                                                    style="text-align: justify;">{!! Str::words($recent->blogDescription, 16) !!}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- <a class="anchor text-color" href="#"> {{ $recent->blogTitle }} </a><br /> --}}
                            @endforeach
                        </div>
                    </div>

                    <div class="keywordInput categoryList py-4 px-4 mt-5">
                        <div>
                            <h5>Follow Us</h5>
                        </div>
                        <div>
                            <hr size="30">
                        </div>
                        <div class="d-flex socialIcons">
                            <div class=" p-2 bg-gray">
                                <a class="IconBorder anchor text-color" href="https://www.instagram.com/careerwave.atc/"> <span><i
                                            class="fa-brands fa-instagram"></i></span> </a><br />
                            </div>
                            <div class=" p-2 bg-gray">
                                <a class="IconBorder anchor text-color" href="https://www.facebook.com/careerwave.atc">
                                    <span><i class="fa-brands fa-facebook"></i></span> </a><br />
                            </div>
                            <div class=" p-2 bg-gray">
                                <a class="IconBorder anchor text-color" href="https://www.youtube.com/c/careerwave"> <span><i
                                            class="fa-brands fa-youtube"></i></span> </a><br />
                            </div>
                            
                            <div class=" p-2 bg-gray">
                                <a  class="IconBorder anchor text-color " href="https://x.com/careerwaveatc">
                                    <span><i class="fa-brands fa-x-twitter"></i></span> </a><br />
                            </div>
                            <div class="p-2 bg-gray">
                                <a class="IconBorder anchor text-color" href="https://t.me/aai_atc">
                                    <span><i class="fa-brands fa-telegram"></i></span>
                                </a><br />
                            </div>
                            <div class="p-2 bg-gray">
                                <a class="IconBorder anchor text-color" href="https://wa.me/9026674746">
                                    <span><i class="fa-brands fa-whatsapp"></i></span>
                                </a><br />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.comment-author').each(function() {
                var fullName = $(this).text();
                var firstChar = fullName.trim().toUpperCase().charAt(0); // Corrected toUpperCase()
                $(this).text(firstChar); // Set the first character as the text
            });
        });
    </script>
@endsection
