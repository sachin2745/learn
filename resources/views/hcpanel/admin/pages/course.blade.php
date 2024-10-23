@extends('hcpanel.admin.layout.panel_layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }} <!-- Update 'success' to 'message' -->
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
                    aria-controls="courseList" aria-selected="true">Course List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addCourse-tab" data-toggle="pill" href="#addCourse" role="tab"
                    aria-controls="addCourse" aria-selected="false">Add Course</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editCourse-tab" data-toggle="pill" href="#editCourse" role="tab"
                    aria-controls="editCourse" aria-selected="false">Edit Course</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Course List --}}
            <div class="tab-pane fade show active" id="courseList" role="tabpanel" aria-labelledby="pills-courseList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Course</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table  table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($courseList as $item)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td><?php echo $count++; ?></td>
                                        <td>{{ $item->courseId }}</td>
                                        <td>{{ $item->courseName }}</td>
                                        <td>{{ $item->courseStatus == 0 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ date('d-M-Y h:i A', (int) $item->createdAt) }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#editCourse" data-course-id="{{ $item->courseId }}" role="tab"
                                                data-toggle="tab" aria-expanded="false"
                                                class="btn btn-info btn-xs editCourseBtn" style="height: 23px;">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            <div class="d-flex ml-3" style="margin-top: -2px;">
                                                @if ($item->courseStatus == 0)
                                                    <form action="/updateCourseStatus/{{ $item->courseId }}" method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-danger btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif($item->courseStatus == 1)
                                                    <form action="/updateCourseStatus/{{ $item->courseId }}" method="post">
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
            <div class="tab-pane fade" id="addCourse" role="tabpanel" aria-labelledby="pills-addCourse-tab">
                <form autocomplete="off" action="{{ route('admin.addCourse') }}" method="POST"
                    class="x_content new_x_content">
                    @csrf

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="courseName">
                            Course Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="courseName" id="courseName" placeholder="Enter Course Name"
                                required="required" type="text">
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


            {{-- Edit Course --}}
            <div class="tab-pane fade " id="editCourse" role="tabpanel" aria-labelledby="pills-editCourse-tab">
                <form autocomplete="off"id="updatecourse" method="POST" class="x_content new_x_content">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @csrf

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="courseName">
                            Course Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="courseName" id="editCourseName"
                                placeholder="Enter Course Name" required="required" type="text">
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

    <!-- Your custom script -->
    <script>
        $(document).ready(function() {
            $('.editCourseBtn').on('click', function() {
                var course_id = $(this).data('course-id');
                console.log('Course ID:', course_id);

                $('.list').removeClass('active');
                $('.edit').css('display', 'block');
                $('.edit').addClass('active');

                var url = "{{ route('admin.fetchCourseContent', ':courseId') }}";
                url = url.replace(':courseId', course_id);

                $.ajax({
                    url: url,
                    type: 'GET', // or POST if needed
                    success: function(response) {
                        const data = response.data;
                        console.log(response);

                        $('#editCourseName').val(data.courseName);

                        $('#editCourse form').attr('action',
                            "{{ route('admin.updateCourse', '') }}/" + course_id);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error occurred:', xhr.responseText || error);
                    }
                });
            });
        });
    </script>
@endsection
