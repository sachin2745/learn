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
                <a class="nav-link active" id="pills-reviewList-tab" data-toggle="pill" href="#reviewList" role="tab"
                    aria-controls="reviewList" aria-selected="true">Review List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addReview-tab" data-toggle="pill" href="#addReview" role="tab"
                    aria-controls="addReview" aria-selected="false">Add Review</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editReview-tab" data-toggle="pill" href="#editReview" role="tab"
                    aria-controls="editReview" aria-selected="false">Edit Review</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Review List --}}
            <div class="tab-pane fade show active" id="reviewList" role="tabpanel" aria-labelledby="pills-reviewList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Review</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>Exam</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($reviewList as $item)
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td>{{ $item->reviewId }}</td>
                                        {{-- <td style="text-align: center">
                                            <img src="{{ asset($item->reviewImg) }}"
                                                alt="{{ $item->reviewImgAlt }}" width="30" height="30" />
                                        </td> --}}
                                        <td style="text-align: center">
                                            <img src="{{ asset($item->reviewStudentImg) }}" alt="{{ $item->reviewImgAlt }}"
                                                width="30" height="30" />
                                        </td>
                                        <td>{{ $item->reviewStudentName }}</td>
                                        <td>{{ $item->reviewRank }}</td>
                                        <td>{{ $item->reviewExam }}</td>
                                        <td>{!! Str::words($item->reviewContent, 12) !!}</td>
                                        <td>{{ date('d-M-Y h:i A', (int) $item->createdAt) }}</td>
                                        <td>{{ $item->reviewStatus == 0 ? 'Active' : 'Inactive' }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#editReview" data-review-id="{{ $item->reviewId }}" role="tab"
                                                data-toggle="tab" class=" btn btn-info btn-xs editReviewBtn"
                                                aria-label="Edit Review" style="height: 23px;">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <div class="d-flex ml-3" style="margin-top: -2px;">
                                                @if ($item->reviewStatus == 0)
                                                    <form action="/updateReviewStatus/{{ $item->reviewId }}"
                                                        method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-danger btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif($item->reviewStatus == 1)
                                                    <form action="/updateReviewStatus/{{ $item->reviewId }}"
                                                        method="post">
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
            <div class="tab-pane fade" id="addReview" role="tabpanel" aria-labelledby="pills-addReview-tab">
                <form autocomplete="off" action="{{ route('admin.addReview') }}" method="POST"
                    class="x_content new_x_content" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Student Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="reviewStudentName" id="reviewStudentName"
                                placeholder="Enter Student Name" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Review Rank <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="reviewRank" id="reviewRank"
                                placeholder="Enter Review Rank" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Review Exam <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="reviewExam" id="reviewExam"
                                placeholder="Enter Review Exam" required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Review Content <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " rows="5" id="reviewContent" name="reviewContent"
                                placeholder="Enter Review Content"></textarea>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Review Image <span class="required">(Optional)</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="reviewImg" id="reviewImg"
                                    type="file">
                            </div>
                            <div id="preview" style="display: none;">
                                <img src="" id="img-preview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#reviewImg').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#img-preview').attr('src', e.target.result);
                                    $('#preview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script> --}}



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                             Image<span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="reviewStudentImg"
                                    id="reviewStudentImg" type="file" required="required">
                            </div>
                            <div id="studentpreview" style="display: none;">
                                <img src="" id="img-studentpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#reviewStudentImg').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#img-studentpreview').attr('src', e.target.result);
                                    $('#studentpreview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                             Image Alt Text <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="reviewImgAlt" id="reviewImgAlt"
                                placeholder="Enter Image Alt Text" type="text" required>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-6 ">
                            <a href="" class="btn btn-primary mb-2">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success mb-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>


            {{-- Edit Review --}}
            <div class="tab-pane fade " id="editReview" role="tabpanel" aria-labelledby="pills-editReview-tab">
                <form autocomplete="off" id="updateReview" method="POST" class="x_content new_x_content"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Student Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="reviewStudentName" id="edit_reviewStudentName"
                                placeholder="Enter Student Name" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Review Rank <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="reviewRank" id="edit_reviewRank"
                                placeholder="Enter Review Rank" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Review Exam <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="reviewExam" id="edit_reviewExam"
                                placeholder="Enter Review Exam" required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Review Content <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " rows="5" id="edit_reviewContent" name="reviewContent"
                                placeholder="Enter Review Content"></textarea>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Review Image <span class="required">(Optional)</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="reviewImg" id="edit_reviewImg"
                                    type="file" >
                            </div>
                            <div id="edit_preview" style="display: none;">
                                <img src="" id="edit_img-preview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#edit_reviewImg').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#edit_img-preview').attr('src', e.target.result);
                                    $('#edit_preview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script> --}}



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Student Image<span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="reviewStudentImg"
                                    id="edit_reviewStudentImg" type="file">
                            </div>
                            <div id="edit_studentpreview" style="display: none;">
                                <img src="" id="edit_img-studentpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#edit_reviewStudentImg').on('change', function() {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#edit_img-studentpreview').attr('src', e.target.result);
                                    $('#edit_studentpreview').show();
                                };
                                reader.readAsDataURL(file);
                            });
                        });
                    </script>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Review Image Alt Text <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="reviewImgAlt" id="edit_reviewImgAlt"
                                placeholder="Enter Review Image Alt Text" type="text">
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-6 ">
                            <a href="" class="btn btn-primary mb-2">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success mb-2">Update</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>



    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- Your custom script -->
    <script>
        $(document).ready(function() {

            $('.editReviewBtn').on('click', function() {
                var review_id = $(this).data('review-id');

                $('.list').removeClass('active');
                $('.edit').css('display', 'block');
                $('.edit').addClass('active');

                var url = "{{ route('admin.fetchReviewContent', ':reviewId') }}";
                url = url.replace(':reviewId', review_id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        const data = response.data;

                        $('#edit_reviewContent').val(data.reviewContent);
                        $('#edit_reviewStudentName').val(data.reviewStudentName);
                        $('#edit_reviewRank').val(data.reviewRank);
                        $('#edit_reviewExam').val(data.reviewExam);


                        $('#edit_img-preview').attr('src', location.origin + '/' + data
                            .reviewImg);
                        $('#edit_preview').show();

                        $('#edit_img-studentpreview').attr('src', location.origin + '/' + data
                            .reviewStudentImg);
                        $('#edit_studentpreview').show();

                        $('#edit_reviewImgAlt').val(data.reviewImgAlt);


                        $('#updateReview').attr('action',
                            "{{ route('admin.updateReview', '') }}/" + review_id);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error occurred:', xhr.responseText || error);
                    }
                });
            });
        });
    </script>
@endsection
