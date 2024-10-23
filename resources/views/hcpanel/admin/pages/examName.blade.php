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
                <a class="nav-link active" id="pills-examNameList-tab" data-toggle="pill" href="#examNameList"
                    role="tab" aria-controls="examNameList" aria-selected="true">Exam Name List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addExamName-tab" data-toggle="pill" href="#addExamName" role="tab"
                    aria-controls="addExamName" aria-selected="false">Add Exam Name</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editExamName-tab" data-toggle="pill" href="#editExamName" role="tab"
                    aria-controls="editExamName" aria-selected="false">Edit Exam Name</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Exam Name List --}}
            <div class="tab-pane fade show active" id="examNameList" role="tabpanel"
                aria-labelledby="pills-examNameList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Exam Name</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Id</th>
                                    <th>Course Id</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Long Description</th>
                                    <th>Popular</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($examList as $item)
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td>{{ $item->examId }}</td>
                                        <td>{{ $item->courseName }}</td>
                                        <td>{{ $item->examName }}</td>
                                        <td>{{ $item->examTitle }}</td>
                                        <td>{{ Str::words($item->examDescription, 12) }}</td>
                                        <td>{!! Str::words($item->examLongDescription, 12) !!}</td>
                                        <td>
                                            <div class="d-flex ml-3" style="margin-top: -2px;gap:5px;">
                                                {{ $item->popularExam == 0 ? 'Popular' : 'Not Popular' }}
                                                @if ($item->popularExam == 0)
                                                    <form action="/updatePopularExamStatus/{{ $item->examId }}" method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-secondary btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif($item->popularExam == 1)
                                                    <form action="/updatePopularExamStatus/{{ $item->examId }}" method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="0">
                                                        <button class="btn btn-primary btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-check"></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $item->examStatus == 0 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ date('d-M-Y h:i A', (int) $item->createdAt) }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#editExamName" data-exam-id="{{ $item->examId }}" role="tab"
                                                data-toggle="tab" class=" btn btn-info btn-xs editExamBtn"
                                                aria-label="Edit Exam Name" style="height: 23px;">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            

                                            <div class="d-flex ml-3" style="margin-top: -2px;">
                                                @if ($item->examStatus == 0)
                                                    <form action="/updateExamStatus/{{ $item->examId }}" method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-danger btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif($item->examStatus == 1)
                                                    <form action="/updateExamStatus/{{ $item->examId }}" method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="0">
                                                        <button class="btn btn-success btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-check"></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            {{-- Add Course --}}
            <div class="tab-pane fade" id="addExamName" role="tabpanel" aria-labelledby="pills-addExamName-tab">
                <form autocomplete="off" action="{{ route('admin.addExamName') }}" method="POST"
                    class="x_content new_x_content" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Course <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select class="form-control col-md-6 col-sm-6 col-xs-12" name="examCourseId" id="examCourseId"
                                required="required">
                                <option class="examCourseId" value="0" selected disabled>Select Course</option>
                                @foreach ($courseList as $item)
                                    <option class="examCourseId" value="{{ $item->courseId }}">
                                        {{ $item->courseName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Exam Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examName" id="examName" placeholder="Enter Exam Name"
                                required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examTitle" id="examTitle" placeholder="Enter Exam Title"
                                required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Description">
                            Exam Short Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="examDescription" id="examDescription"
                                placeholder="Enter Exam Short Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Exam Long Description <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12 " id="examLongDescription" name="examLongDescription"
                                placeholder="Enter Exam Long Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Meta Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examMetaTitle" id="examMetaTitle"
                                placeholder="Enter Meta Title" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Meta Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="examMetaDescription" id="examMetaDescription"
                                placeholder="Enter Meta Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Schema <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="examSchema" id="examSchema" placeholder="Enter Schema"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examKeywords" id="examKeywords"
                                placeholder="Enter Exam Keywords" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Slug <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examSlug" id="examSlug" placeholder="Enter Exam Slug"
                                required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Exam Icon <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="examIcon" id="examIcon"
                                    type="file" required="required">
                            </div>
                            <div id="preview" style="display: none;">
                                <img src="" id="img-preview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#examIcon').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#img-preview').attr('src', e.target.result);
                                    $('#preview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Exam Icon Alt <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examIconAlt" id="examIconAlt" placeholder="Enter Icon Alt"
                                required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Exam Result Banner Desktop <span class="required">(Optional)</span></span> <strong>(Size 1120px
                                x 388px)</strong>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="examResultBanner"
                                    id="examResultBanner" type="file">
                            </div>
                            <div id="bannerpreview" style="display: none;">
                                <img src="" id="img-bannerpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#examResultBanner').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#img-bannerpreview').attr('src', e.target.result);
                                    $('#bannerpreview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Exam Result Banner Mobile <span class="required">(Optional)</span></span> <strong>(Size 329px
                                x 451px)</strong>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="examResultBannerM"
                                    id="examResultBannerM" type="file">
                            </div>
                            <div id="bannersmallpreview" style="display: none;">
                                <img src="" id="img-bannersmallpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#examResultBannerM').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#img-bannersmallpreview').attr('src', e.target.result);
                                    $('#bannersmallpreview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Exam Banner Alt <span class="required">(Optional)
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examBannerAlt" id="examBannerAlt"
                                placeholder="Enter Banner Alt" type="text">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-6 ">
                            <a href="#" class="btn btn-primary mb-2">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success mb-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>


            {{-- Edit ExamName --}}
            <div class="tab-pane fade " id="editExamName" role="tabpanel" aria-labelledby="pills-editExamName-tab">
                <form autocomplete="off" id="updateExamName" method="POST" class="x_content new_x_content"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Course <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select class="form-control col-md-6 col-sm-6 col-xs-12" name="examCourseId"
                                id="edit_examCourseId" required="required">
                                <option class="examCourseId" value="0" selected disabled>Select Course</option>
                                @foreach ($courseList as $item)
                                    <option class="examCourseId" value="{{ $item->courseId }}">
                                        {{ $item->courseName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Exam Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examName" id="edit_examName" placeholder="Enter Exam Name"
                                required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examTitle" id="edit_examTitle"
                                placeholder="Enter Exam Title" required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Description">
                            Exam Short Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="examDescription" id="edit_examDescription"
                                placeholder="Enter Exam Short Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Exam Long Description <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12 " id="edit_examLongDescription" name="examLongDescription"
                                placeholder="Enter Exam Long Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Meta Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examMetaTitle" id="edit_examMetaTitle"
                                placeholder="Enter Meta Title" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Meta Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="examMetaDescription" id="edit_examMetaDescription"
                                placeholder="Enter Meta Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Schema <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="examSchema" id="edit_examSchema" placeholder="Enter Schema"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examKeywords" id="edit_examKeywords"
                                placeholder="Enter Exam Keywords" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Exam Slug <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examSlug" id="edit_examSlug" placeholder="Enter Exam Slug"
                                required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Exam Icon <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="examIcon" id="edit_examIcon"
                                    type="file">
                            </div>
                            <div id="edit_preview" style="display: none;">
                                <img src="" id="edit_img-preview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#edit_examIcon').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#edit_img-preview').attr('src', e.target.result);
                                    $('#edit_preview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Exam Icon Alt <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examIconAlt" id="edit_examIconAlt"
                                placeholder="Enter Icon Alt" required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Exam Result Banner <span class="required">(Optional)</span> <strong>(Size 1120px x
                                388px)</strong>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="examResultBanner"
                                    id="edit_examResultBanner" type="file">
                            </div>
                            <div id="edit_bannerpreview" style="display: none;">
                                <img src="" id="edit_img-bannerpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#edit_examResultBanner').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#edit_img-bannerpreview').attr('src', e.target.result);
                                    $('#edit_bannerpreview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Exam Result Banner Mobile <span class="required">(Optional)</span></span> <strong>(Size 329px
                                x 451px)</strong>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="examResultBannerM"
                                    id="edit_examResultBannerM" type="file">
                            </div>
                            <div id="edit_bannersmallpreview" style="display: none;">
                                <img src="" id="edit_img-bannersmallpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#edit_examResultBannerM').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#edit_img-bannersmallpreview').attr('src', e.target.result);
                                    $('#edit_bannersmallpreview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Exam Banner Alt <span class="required">(Optional)</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="examBannerAlt" id="edit_examBannerAlt"
                                placeholder="Enter Banner Alt" type="text">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-6 ">
                            <a href="#" class="btn btn-primary mb-2">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success mb-2">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote for the description
            $('#examLongDescription').summernote({
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

        });
    </script>

    <!-- Your custom script -->
    <script>
        $(document).ready(function() {
            $('#edit_examLongDescription').summernote({
                height: 200, // Set the height for the editor
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

            $('.editExamBtn').on('click', function() {
                var exam_id = $(this).data('exam-id');

                $('.list').removeClass('active');
                $('.edit').css('display', 'block');
                $('.edit').addClass('active');

                var url = "{{ route('admin.fetchExamNameContent', ':examId') }}";
                url = url.replace(':examId', exam_id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        const data = response.data;

                        $('#edit_examCourseId').val(data.examCourseId);
                        $('#edit_examName').val(data.examName);
                        $('#edit_examTitle').val(data.examTitle);
                        $('#edit_examDescription').val(data.examDescription);
                        $('#edit_examMetaTitle').val(data.examMetaTitle);
                        $('#edit_examMetaDescription').val(data.examMetaDescription);
                        $('#edit_examSchema').val(data.examSchema);
                        $('#edit_examKeywords').val(data.examKeywords);
                        $('#edit_examSlug').val(data.examSlug);

                        $('#edit_img-preview').attr('src', location.origin + '/' + data
                            .examIcon);
                        $('#edit_preview').show();


                        $('#edit_img-bannerpreview').attr('src', location.origin + '/' + data
                            .examResultBanner);
                        $('#edit_bannerpreview').show();

                        $('#edit_img-bannersmallpreview').attr('src', location.origin + '/' + data
                            .examResultBannerM);
                        $('#edit_bannersmallpreview').show();

                        $('#edit_examIconAlt').val(data.examIconAlt);
                        $('#edit_examBannerAlt').val(data.examBannerAlt);
                        $('#edit_examLongDescription').summernote('code', data
                            .examLongDescription);

                        $('#updateExamName').attr('action',
                            "{{ route('admin.updateExamName', '') }}/" + exam_id);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error occurred:', xhr.responseText || error);
                    }
                });
            });
        });
    </script>
@endsection
