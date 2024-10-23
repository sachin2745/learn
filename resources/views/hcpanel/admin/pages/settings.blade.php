@extends('hcpanel.admin.layout.panel_layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }} <!-- Update 'success' to 'message' -->
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }} <!-- Update 'success' to 'message' -->
        </div>
    @endif


    <div class="container-fluid card px-4 pt-2">
        <style>
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px;
                background-color: #4CAF50;
                /* Green */
                color: white;
                border-radius: 5px;
                z-index: 1000;
            }
        </style>
        <div id="notification" class="notification" style="display: none;">
            <span id="notification-message"></span>
            <button onclick="this.parentElement.style.display='none'">Close</button>
        </div>
        {{-- Tab navigation --}}
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-courseList-tab" data-toggle="pill" href="#courseList" role="tab"
                    aria-controls="courseList" aria-selected="true">General Details</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" id="pills-addCourse-tab" data-toggle="pill" href="#addCourse" role="tab"
                    aria-controls="addCourse" aria-selected="false">Add Course</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editCourse-tab" data-toggle="pill" href="#editCourse" role="tab"
                    aria-controls="editCourse" aria-selected="false">Edit Course</a>
            </li> --}}
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Course List --}}
            <div class="tab-pane fade show active" id="courseList" role="tabpanel" aria-labelledby="pills-courseList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title fw-bold">Manage Basic Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="row justify-content-center align-items-center p-md-4">
                        <div class="col-md-10">

                            <div class=" widget-user-2">

                                <div class="widget-user-header d-flex flex-sm-row flex-column">
                                    <div class="d-flex flex-column justify-content-center">

                                        <div class="mb-3">
                                            <img class=" elevation-2 object-fit-cover" height="200" width="200"
                                                src="{{ asset($companyDetails->companyLogo) }}" alt="User Avatar">
                                        </div>
                                    </div>
                                    <div class="ml-4 ml-md-5">
                                        <h3 class="widget-user-username m-0 mb-2">{{ $companyDetails->companyName }}</h3>
                                        <h5 class="widget-user-desc m-0 mb-2">
                                            {{ Str::words($companyDetails->settingShortDescription, 30) }}</h5>
                                        <p class="widget-user-desc m-0">{{ $companyDetails->officialAddress }}</p>
                                        <p class="widget-user-desc m-0">{{ $companyDetails->officialEmail }}</p>

                                        <div>
                                            <div class="py-3">
                                                <a class="mr-3" href="{{ $companyDetails->facebookUrl }}" target="_blank">
                                                    <i style="font-size: 24px" class="fa-brands fa-facebook"></i>
                                                </a>
                                                <a class="mr-3" href="{{ $companyDetails->twitterUrl }}" target="_blank">
                                                    <i style="font-size: 24px" class="fa-brands fa-twitter text-dark"></i>
                                                </a>
                                                <a class="mr-3" href="{{ $companyDetails->youtubeUrl }}" target="_blank">
                                                    <i style="font-size: 24px" class="fa-brands fa-youtube text-danger"></i>
                                                </a>
                                                <a class="mr-3" href="{{ $companyDetails->instagramUrl }}"
                                                    target="_blank">
                                                    <i style="font-size: 24px"
                                                        class="fa-brands fa-instagram text-danger"></i>
                                                </a>
                                                <a class="mr-3" href="{{ $companyDetails->telegramUrl }}"
                                                    target="_blank">
                                                    <i style="font-size: 24px" class="fa-brands fa-telegram"></i>
                                                </a>
                                                <a class="mr-3" href="tel: {{ $companyDetails->whatsappNumber }}"
                                                    target="_blank">
                                                    <i style="font-size: 24px"
                                                        class="fa-brands fa-whatsapp text-success"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h3 class="card-title fw-bold">Update Basic Details</h3>
                    </div>


                    <form action="{{ route('admin.updateDetails') }}" method="POST" class=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row p-0 py-1 align-items-center justify-content-center">
                            <ul class="nav flex-column col-md-10">
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Company Name : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="companyName" id="companyName"
                                            value="{{ $companyDetails->companyName }}" placeholder="Enter Company Name"
                                            type="text" onclick="this.readOnly=false" readonly
                                            onblur="this.readOnly=true">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Company Email : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="officialEmail" id="officialEmail"
                                            value="{{ $companyDetails->officialEmail }}"
                                            placeholder="Enter Email Address" type="text"
                                            onclick="this.readOnly=false" readonly onblur="this.readOnly=true">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Company Address : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="officialAddress" id="officialAddress"
                                            value="{{ $companyDetails->officialAddress }}"
                                            placeholder="Enter Company Address" type="text"
                                            onclick="this.readOnly=false" readonly onblur="this.readOnly=true">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Company Logo : </div>
                                    <span class="d-flex align-items-center badge col">
                                        <div id="preview" class="mb-3 text-center">
                                            <img id="img-preview" class=" elevation-2 object-fit-cover" height="100"
                                                width="100" src="{{ asset($companyDetails->companyLogo) }}"
                                                name="companyLogo" alt="User Avatar">
                                        </div>
                                        <div
                                            class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                            <i class="fa fa-paperclip"></i> Change
                                            <input class="form-control col-md-7 col-xs-12" name="companyLogo"
                                                id="image" type="file">
                                        </div>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Favicon :
                                    </div>
                                    <div class="col-9 d-flex flex-wrap">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div id="preview" class="mb-3 text-center">
                                                <img id="img-preview" class=" elevation-2 object-fit-cover"
                                                    height="100" width="100"
                                                    src="{{ asset($companyDetails->fav180) }}" name="fav180"
                                                    alt="User Avatar">
                                            </div>
                                            <div
                                                class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                                <i class="fa fa-paperclip"></i> Change (Fav 180)
                                                <input class="form-control col-md-7 col-xs-12" name="fav180"
                                                    id="image" type="file">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div id="preview" class="mb-3 text-center">
                                                <img id="img-preview" class=" elevation-2 object-fit-cover"
                                                    height="100" width="100"
                                                    src="{{ asset($companyDetails->fav32) }}" name="fav32"
                                                    alt="User Avatar">
                                            </div>
                                            <div
                                                class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                                <i class="fa fa-paperclip"></i> Change (Fav 32)
                                                <input class="form-control col-md-7 col-xs-12" name="fav32"
                                                    id="image" type="file">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div id="preview" class="mb-3 text-center">
                                                <img id="img-preview" class=" elevation-2 object-fit-cover"
                                                    height="100" width="100"
                                                    src="{{ asset($companyDetails->fav16) }}" name="fav16"
                                                    alt="User Avatar">
                                            </div>
                                            <div
                                                class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                                <i class="fa fa-paperclip"></i> Change (Fav 16)
                                                <input class="form-control col-md-7 col-xs-12" name="fav16"
                                                    id="image" type="file">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div id="preview" class="mb-3 text-center">
                                                <img id="img-preview" class=" elevation-2 object-fit-cover"
                                                    height="100" width="100"
                                                    src="{{ asset($companyDetails->favManifest) }}" name="favManifest"
                                                    alt="User Avatar">
                                            </div>
                                            <div
                                                class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                                <i class="fa fa-paperclip"></i> Change (Manifest)
                                                <input class="form-control col-md-7 col-xs-12" name="favManifest"
                                                    id="image" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Short Description : </div>
                                    <span class="float-right badge col">
                                        <textarea class="form-control" rows="3" name="settingShortDescription" id="settingShortDescription"
                                            placeholder="Enter Short Company Description" onclick="this.readOnly=false" readonly onblur="this.readOnly=true"
                                            readonly>{{ $companyDetails->settingShortDescription }}</textarea>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Long Description : </div>
                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                        <textarea class="form-control summernoteTextArea" rows="5" name="setttingLongDescription"
                                            id="setttingLongDescription" placeholder="Enter Short Company Description">{{ $companyDetails->setttingLongDescription }}</textarea>
                                    </div>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Address Embedded Map Url : </div>
                                    <span class="float-right badge col">
                                        <textarea class="form-control" rows="2" name="embedMapUrl" id="embedMapUrl"
                                            placeholder="Enter Embedded Map Url" onclick="this.readOnly=false" readonly onblur="this.readOnly=true" readonly>{{ $companyDetails->embedMapUrl }}</textarea>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Google Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="googleUrl" id="googleUrl"
                                            placeholder="Enter Google App Url" value="{{ $companyDetails->googleUrl }}"
                                            type="text" onclick="this.readOnly=false" readonly
                                            onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Twitter Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="intelUrl"
                                            value="{{ $companyDetails->intelUrl }}" id="intelUrl"
                                            placeholder="Enter Intel url" type="text" onclick="this.readOnly=false"
                                            readonly onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Apple Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="appleUrl"
                                            value="{{ $companyDetails->appleUrl }}" id="appleUrl"
                                            placeholder="Enter Apple Url" type="text" onclick="this.readOnly=false"
                                            readonly onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Windows Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="windowsUrl"
                                            value="{{ $companyDetails->windowsUrl }}" id="windowsUrl"
                                            placeholder="Enter Windows Url" type="text" onclick="this.readOnly=false"
                                            readonly onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Facebook Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="facebookUrl" id="facebookUrl"
                                            placeholder="Enter Facebook url" value="{{ $companyDetails->facebookUrl }}"
                                            onclick="this.readOnly=false" readonly onblur="this.readOnly=true" readonly
                                            type="text">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Twitter Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="twitterUrl"
                                            value="{{ $companyDetails->twitterUrl }}" id="twitterUrl"
                                            placeholder="Enter twitter url" type="text" onclick="this.readOnly=false"
                                            readonly onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Youtube Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="youtubeUrl"
                                            value="{{ $companyDetails->youtubeUrl }}" id="youtubeUrl"
                                            placeholder="Enter youtube url" type="text" onclick="this.readOnly=false"
                                            readonly onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Instagram Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="instagramUrl"
                                            value="{{ $companyDetails->instagramUrl }}" id="instagramUrl"
                                            placeholder="Enter instagram url" type="text"
                                            onclick="this.readOnly=false" readonly onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Telegram Url : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="telegramUrl"
                                            value="{{ $companyDetails->telegramUrl }}" id="telegramUrl"
                                            placeholder="Enter telegram url" type="text" onclick="this.readOnly=false"
                                            readonly onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Whatsapp Number : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="whatsappNumber"
                                            value="{{ $companyDetails->whatsappNumber ?? '' }}" id="whatsappNumber"
                                            placeholder="+91" type="text" onclick="this.readOnly=false" readonly
                                            onblur="this.readOnly=true" readonly>
                                    </span>
                                </li>
                                <button id="send" type="submit"
                                    class="btn btn-success align-self-end px-4">Update</button>
                            </ul>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $(document).on('change', '#image', function() {
                var file = this.files[0];
                var reader = new FileReader();
                console.log(file, reader);
                console.log("******", $(this).parent().siblings('#preview').find('#img-preview')[0]
                    .getAttribute('src'));
                let thisImage = $(this);
                reader.onload = function(e) {
                    thisImage.parent().siblings('#preview').find('#img-preview')[0].setAttribute('src',
                        e.target.result);
                    thisImage.parent().closest('#preview').show();
                };
                reader.readAsDataURL(file);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.summernoteTextArea').summernote({
                height: 200, // Set editor height
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // $('.summernoteTextArea').summernote('disable'); // Disable by default

            // // Toggle disabled state on click (target the `.note-editable` part)
            // $(document).on('click', '.note-editable', function handler() {
            //     console.log('------')
            //     var $summernote = $(this).closest('.note-editor').prev('.summernoteTextArea');
            //     $('.summernoteTextArea').summernote('code', "{!! addslashes($companyDetails->setttingLongDescription) !!}");


            //     // Enable Summernote to ensure it is editable
            //     $('.summernoteTextArea').summernote('enable');

            //     $(document).off('click', '.note-editable', handler);
            // });

            // // toggle disable property 
            // $(document).on('blur', '.note-editable', function() {
            //     var $summernote = $(this).closest('.note-editor').prev('.summernoteTextArea');
            //     $summernote.summernote('disable');

            // });

        })
    </script>
@endsection
