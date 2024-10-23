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
                <a class="nav-link active" id="pills-faqList-tab" data-toggle="pill" href="#faqList" role="tab"
                    aria-controls="faqList" aria-selected="true">Batch Faq List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addFaq-tab" data-toggle="pill" href="#addFaq" role="tab"
                    aria-controls="addFaq" aria-selected="false">Add Batch Faq</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editFaq-tab" data-toggle="pill" href="#editFaq" role="tab"
                    aria-controls="editFaq" aria-selected="false">Edit Batch Faq</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Exam Name List --}}
            <div class="tab-pane fade show active" id="faqList" role="tabpanel"
                aria-labelledby="pills-faqList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Batch Faq's</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Id</th>
                                    <th>Batch</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($batchFaqList as $item)
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td>{{ $item->batchFaqId }}</td>
                                        <td>{{ $item->batchName }}</td>
                                        <td>{{ $item->faqQuestion }}</td>
                                        <td>{!! Str::words($item->faqAnswer, 30) !!}</td>
                                        <td>{{ $item->faqStatus == 0 ? 'Active' : 'Inactive' }}</td>

                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#editFaq" data-faq-id="{{ $item->batchFaqId }}" role="tab"
                                                data-toggle="tab" class=" btn btn-info btn-xs editFaqBtn"
                                                aria-label="Edit Faq" style="height: 23px;">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <div class="d-flex ml-3" style="margin-top: -2px;">
                                                @if ($item->faqStatus == 0)
                                                    <form action="/updateBatchFaqStatus/{{ $item->batchFaqId }}" method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-danger btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif($item->faqStatus == 1)
                                                    <form action="/updateBatchFaqStatus/{{ $item->batchFaqId }}" method="post">
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

            {{-- Add Faq --}}
            <div class="tab-pane fade" id="addFaq" role="tabpanel" aria-labelledby="pills-addFaq-tab">
                <form autocomplete="off" action="{{ route('admin.addBatchFaq') }}" method="POST"
                    class="x_content new_x_content" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Batch <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control " name="faqBatchId" id="faqBatchId"
                                required="required">
                                <option class="faqBatchId" value="0" selected disabled>Select Batch</option>
                                @foreach ($batchList as $item)
                                    <option class="faqBatchId" value="{{ $item->batchId }}">
                                        {{ $item->batchName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Faq Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="faqQuestion" id="faqQuestion" placeholder="Enter Faq Title"
                                required="required" type="text">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Faq Description <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12 " id="faqAnswer" name="faqAnswer"
                                placeholder="Enter Faq Description"></textarea>
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


            {{-- Edit Faq --}}
            <div class="tab-pane fade " id="editFaq" role="tabpanel" aria-labelledby="pills-editFaq-tab">
                <form autocomplete="off" id="updateBatchFaq" method="POST" class="x_content new_x_content"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Batch <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control " name="faqBatchId" id="edit_faqBatchId"
                                required="required">
                                <option class="faqBatchId" value="0" selected disabled>Select Batch</option>
                                @foreach ($batchList as $item)
                                    <option class="faqBatchId" value="{{ $item->batchId }}">
                                        {{ $item->batchName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Faq Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="faqQuestion" id="edit_faqQuestion" placeholder="Enter Faq Title"
                                required="required" type="text">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Faq Description <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12 " id="edit_faqAnswer" name="faqAnswer"
                                placeholder="Enter Faq Description"></textarea>
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
            $('#faqAnswer').summernote({
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
            $('#edit_faqAnswer').summernote({
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

            $('.editFaqBtn').on('click', function() {
                var faq_id = $(this).data('faq-id');

                $('.list').removeClass('active');
                $('.edit').css('display', 'block');
                $('.edit').addClass('active');

                var url = "{{ route('admin.fetchBatchFaqContent', ':batchFaqId') }}";
                url = url.replace(':batchFaqId', faq_id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        const data = response.data;
                        $('#edit_faqBatchId').val(data.faqBatchId);
                        $('#edit_faqQuestion').val(data.faqQuestion);  
                        $('#edit_faqAnswer').summernote('code', data
                            .faqAnswer);

                        $('#updateBatchFaq').attr('action',
                            "{{ route('admin.updateBatchFaq', '') }}/" + faq_id);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error occurred:', xhr.responseText || error);
                    }
                });
            });
        });
    </script>
@endsection
