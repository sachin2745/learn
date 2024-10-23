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
                    aria-controls="courseList" aria-selected="true">Mission Vision</a>
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
                        <h3 class="card-title">Manage Mission & Vision</h3>
                    </div>

                    <form action="{{ route('admin.updateMissionVision') }}" method="POST" class=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row p-0 py-1 align-items-center justify-content-center">
                            <ul class="nav flex-column col-md-10">
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Mission Heading : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="ourMissionHeading" id="ourMissionHeading"
                                            value="{{ $missionVision->ourMissionHeading }}" placeholder="Enter Company Name"
                                            type="text">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3"> Icon 1 : </div>
                                    <span class="d-flex align-items-center badge col">
                                        <div id="preview" class="mb-3 text-center">
                                            <img id="img-preview" class=" elevation-2 object-fit-cover" height="50"
                                                width="50" src="{{ asset($missionVision->ourMissionImg1) }}"
                                                name="ourMissionImg1" alt="User Avatar">
                                        </div>
                                        <div
                                            class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                            <i class="fa fa-paperclip"></i> Change Photo
                                            <input class="form-control col-md-7 col-xs-12" name="ourMissionImg1"
                                                id="image" type="file">
                                        </div>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Mission Content 1 : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="ourMissionContent1" id="ourMissionContent1"
                                            value="{{ $missionVision->ourMissionContent1 }}"
                                            placeholder="Enter Company Name" type="text">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3"> Icon 2 : </div>
                                    <span class="d-flex align-items-center badge col">
                                        <div id="preview" class="mb-3 text-center">
                                            <img id="img-preview" class=" elevation-2 object-fit-cover" height="50"
                                                width="50" src="{{ asset($missionVision->ourMissionImg2) }}"
                                                name="companyLogo" alt="User Avatar">
                                        </div>
                                        <div
                                            class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                            <i class="fa fa-paperclip"></i> Change Photo
                                            <input class="form-control col-md-7 col-xs-12" name="ourMissionImg2"
                                                id="image" type="file">
                                        </div>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Mission Content 2 : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="ourMissionContent2" id="ourMissionContent2"
                                            value="{{ $missionVision->ourMissionContent2 }}"
                                            placeholder="Enter Company Name" type="text">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Icon 3 : </div>
                                    <span class="d-flex align-items-center badge col">
                                        <div id="preview" class="mb-3 text-center">
                                            <img id="img-preview" class=" elevation-2 object-fit-cover" height="50"
                                                width="50" src="{{ asset($missionVision->ourMissionImg3) }}"
                                                name="companyLogo" alt="User Avatar">
                                        </div>
                                        <div
                                            class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                            <i class="fa fa-paperclip"></i> Change Photo
                                            <input class="form-control col-md-7 col-xs-12" name="ourMissionImg3"
                                                id="image" type="file">
                                        </div>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Mission Content 3 : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="ourMissionContent3" id="ourMissionContent3"
                                            value="{{ $missionVision->ourMissionContent3 }}"
                                            placeholder="Enter Company Name" type="text">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Vision Heading : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="ourVisionHeading" id="ourMissionHeading"
                                            value="{{ $missionVision->ourVisionHeading }}"
                                            placeholder="Enter Company Name" type="text">
                                    </span>
                                </li>

                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3"> Our Vision Image : </div>
                                    <span class="d-flex align-items-center badge col">
                                        <div id="preview" class="mb-3 text-center">
                                            <img id="img-preview" class=" elevation-2 object-fit-cover" height="50"
                                                width="50" src="{{ asset($missionVision->ourVisionImg) }}"
                                                name="companyLogo" alt="User Avatar">
                                        </div>
                                        <div
                                            class="btn btn-default btn-file ml-3 d-flex justify-content-center align-items-center">
                                            <i class="fa fa-paperclip"></i> Change Photo
                                            <input class="form-control col-md-7 col-xs-12" name="ourVisionImg"
                                                id="image" type="file">
                                        </div>
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Vision Content 1 : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="ourVisionContent1" id="ourVisionContent1"
                                            value="{{ $missionVision->ourVisionContent1 }}"
                                            placeholder="Enter Company Name" type="text">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Vision Content 2 : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="ourVisionContent2" id="ourVisionContent2"
                                            value="{{ $missionVision->ourVisionContent2 }}"
                                            placeholder="Enter Company Name" type="text">
                                    </span>
                                </li>
                                <li class="nav-item row align-items-center p-0 py-1">
                                    <div class="col-3">Vision Content 3 : </div>
                                    <span class="float-right badge col">
                                        <input class="form-control" name="ourVisionContent3" id="ourVisionContent3"
                                            value="{{ $missionVision->ourVisionContent3 }}"
                                            placeholder="Enter Company Name" type="text">
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
        })
    </script>
@endsection
