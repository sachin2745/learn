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
                <a class="nav-link active" id="pills-page-tab" data-toggle="pill" href="#pageList" role="tab"
                    aria-controls="pageList" aria-selected="true">Page List</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editPage-tab" data-toggle="pill" href="#editPage" role="tab"
                    aria-controls="editPage" aria-selected="false">Edit Page</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Course List --}}
            <div class="tab-pane fade show active" id="pageList" role="tabpanel" aria-labelledby="pills-page-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Course</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Id</th>
                                    <th>Page Name</th>
                                    <th>Page Title</th>
                                    <th>Page Description</th>
                                    <th>Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($pageList as $item)
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td>{{ $item->pageId }}</td>
                                        <td>{{ $item->pageType }}</td>
                                        <td>{{ $item->pageTitle }}</td>
                                        <td>{!! Str::words($item->pageDescription, 25) !!}</td>
                                        <td>
                                            @if ($item->pageStatus == 0)
                                                <span class="text-success">Active</span>
                                            @elseif($item->pageStatus == 1)
                                                <span class="text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        {{-- <td>{{ date('d-M-Y h:i', (int) $item->createdAt) }}</td> --}}
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#editPage" data-page-id="{{ $item->pageId }}" role="tab"
                                                data-toggle="tab" aria-expanded="false"
                                                class="btn btn-info btn-xs editPageBtn" style="height: 23px;">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            <div class="d-flex ml-3" style="margin-top: -2px;">
                                                @if ($item->pageStatus == 0)
                                                    <form
                                                        action="{{ route('admin.updatePageStatus', $item->pageId ?? '') }}"
                                                        method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-danger btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif($item->pageStatus == 1)
                                                    <form
                                                        action="{{ route('admin.updatePageStatus', $item->pageId ?? '') }}"
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


            {{-- Edit Course --}}
            <div class="tab-pane fade " id="editPage" role="tabpanel" aria-labelledby="pills-editPage-tab">
                <form autocomplete="off"id="updatecourse" method="POST" class="x_content new_x_content">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @csrf

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="pageType">
                            Page Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="pageType" id="pageType" placeholder="" required="required"
                                type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="pageTitle">
                            Page Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="pageTitle" id="pageTitle" placeholder="Enter Page Title"
                                required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="pageDescription">
                            Page Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" id="pageDescription" name="pageDescription"
                                placeholder="Enter Page Description"></textarea>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="metaTitle">
                            Page Meta Title
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="metaTitle" id="metaTitle"
                                placeholder="Enter Page Meta Title" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="metaKeywords">
                            Page Meta Keywords
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="metaKeywords" id="metaKeywords"
                                placeholder="Enter Page Meta Keywords" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="metaDescriptioin">
                            Page Meta Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="metaDescriptioin" id="metaDescriptioin"></textarea>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="metaSchema">
                            Page Meta Schema
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="metaSchema" id="metaSchema"></textarea>
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
        </div>
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <!-- Your custom script -->
    <script>
        $(document).ready(function() {
            $('#pageDescription').summernote({
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
            $('#metaDescriptioin').summernote({
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
            
            $('.editPageBtn').on('click', function() {
                var pageId = $(this).data('pageId');
                console.log('page ID:', pageId);

                $('.list').removeClass('active');
                $('.edit').css('display', 'block');
                $('.edit').addClass('active');

                var url = "{{ route('admin.fetchPageContent', ':pageId') }}";
                url = url.replace(':pageId', pageId);

                $.ajax({
                    url: url,
                    type: 'POST', // or POST if needed
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        const data = response.data;
                        console.log(response);

                        $('#pageType').val(data.pageType);
                        $('#pageTitle').val(data.pageTitle);

                        $('#pageDescription').summernote('code', data.pageDescription);
                        
                        
                        $('#metaTitle').val(data.metaTitle);
                        $('#metaSchema').val(data.metaSchema);
                        $('#metaKeywords').val(data.metaKeywords);

                        $('#metaDescriptioin').summernote('code', data.metaDescriptioin);
                        
                        $('#editPage form').attr('action',
                            "{{ route('admin.updatePageContent', '') }}/" + pageId);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error occurred:', xhr.responseText || error);
                    }
                });
            });
        });
    </script>
@endsection
