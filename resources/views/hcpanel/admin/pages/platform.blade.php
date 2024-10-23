@extends('hcpanel.admin.layout.panel_layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }} <!-- Update 'success' to 'message' -->
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }} <!-- Update 'success' to 'message' -->
        </div>
    @endif
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .dt-responsive {
            width: 100%;
            margin-bottom: 20px;
        }

        .dt-responsive th,
        .dt-responsive td {
            white-space: nowrap;
        }

        /* For desktop devices (min-width: 769px) */
        @media (min-width: 769px) {

            .dt-responsive th,
            .dt-responsive td {
                white-space: normal;
            }
        }

        /* For mobile devices (max-width: 768px) */
        @media (max-width: 768px) {

            .dt-responsive th,
            .dt-responsive td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>

    <div class="container-fluid card px-4 pt-2">
        {{-- Tab navigation --}}
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-platformList-tab" data-toggle="pill" href="#platformList" role="tab"
                    aria-controls="platformList" aria-selected="true">Platform List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addPlatform-tab" data-toggle="pill" href="#addPlatform" role="tab"
                    aria-controls="addPlatform" aria-selected="false">Add Platform</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editPlatform-tab" data-toggle="pill" href="#editPlatform" role="tab"
                    aria-controls="editPlatform" aria-selected="false">Edit Platform</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Course List --}}
            <div class="tab-pane fade show active" id="platformList" role="tabpanel"
                aria-labelledby="pills-platformList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Platform</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-resposive">
                            <table id="example1" class="table table-bordered table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Alt</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($platformList as $item)
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td>{{ $item->platformId }}</td>
                                            <td style="text-align: center">
                                                <img src="{{ asset($item->platformImg) }}" alt="{{ $item->platformAlt }}"
                                                    width="30" height="30" />
                                            </td>

                                            <td>{{ $item->platformAlt }}</td>
                                            <td>{{ $item->platformLink }}</td>
                                            <td>{{ $item->platformStatus == 0 ? 'Active' : 'Inactive' }}</td>

                                            <td class="d-flex justify-content-center align-items-center">
                                                <a href="#editPlatform" data-platform-id="{{ $item->platformId }}"
                                                    role="tab" data-toggle="tab"
                                                    class=" btn btn-info btn-xs editPlatformBtn" aria-label="Edit Platformr"
                                                    style="height: 23px;">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <div class="d-flex ml-3" style="margin-top: -2px;">
                                                    @if ($item->platformStatus == 0)
                                                        <form action="/updatePlatformStatus/{{ $item->platformId }}"
                                                            method="post">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="hidden" name="status" value="1">
                                                            <button class="btn btn-danger btn-xs edit-category-button"
                                                                style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                        </form>
                                                    @elseif($item->platformStatus == 1)
                                                        <form action="/updatePlatformStatus/{{ $item->platformId }}"
                                                            method="post">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
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
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            {{-- Add Platform --}}
            <div class="tab-pane fade" id="addPlatform" role="tabpanel" aria-labelledby="pills-addPlatform-tab">
                <form autocomplete="off" action="{{ route('admin.addPlatform') }}" method="POST"
                    class="x_content new_x_content" enctype="multipart/form-data">
                    @csrf

                    <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-3 col-xs-12">Platform Image <span
                                class="required">*</span>(Size 352px x 166px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="platformImg" id="platformImg" type="file"
                                    required="required">
                            </div>
                            <div id="preview" style="display: none;">
                                <img src="" id="img-preview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#platformImg').on('change', function() {
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
                    </div>


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="platformImageAltText">Platform Image
                            Alt Text<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="platformAlt" id="platformAlt"
                                placeholder="Enter Platform Alt Text" value="" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="platformImageAltText">Platform
                            Link <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="platformLink" id="platformLink"
                                placeholder="Enter Platform Link" value="" required="required" type="text">
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


            {{-- Edit Platform --}}
            <div class="tab-pane fade " id="editPlatform" role="tabpanel" aria-labelledby="pills-editPlatform-tab">
                <form autocomplete="off" id="updatePlatformForm" method="POST" class="x_content new_x_content"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @csrf

                    <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-3 col-xs-12">Platform Image <span
                                class="required">*</span>(Size 352px x 166px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="platformImg" id="edit_platformImg" type="file">
                            </div>
                            <div id="edit_preview" style="display: none;">
                                <img src="" id="edit_img-preview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#edit_platformImg').on('change', function() {
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
                    </div>


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="platformImageAltText">Platform Image
                            Alt Text<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="platformAlt" id="edit_platformAlt"
                                placeholder="Enter Platform Alt Text" value="" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="platformImageAltText">Platform
                            Link <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="platformLink" id="edit_platformLink"
                                placeholder="Enter Platform Link" value="" required="required" type="text">
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


    <script>
        $(document).ready(function() {



            // Handling Platform edit click
            $('.editPlatformBtn').on('click', function(e) {
                e.preventDefault();

                var platformId = $(this).data('platform-id');

                $('.list').removeClass('active');
                $('.edit').show();

                var url = "{{ route('admin.fetchPlatformContent', ':platformId') }}";
                url = url.replace(':platformId', platformId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        const data = response.data;
                        console.log(data);


                        $('#edit_platformAlt').val(data.platformAlt);
                        $('#edit_platformLink').val(data.platformLink);


                        $('#edit_img-preview').attr('src', location.origin + '/' + data
                            .platformImg);
                        $('#edit_preview').show();



                        $('#updatePlatformForm').attr('action',
                            "{{ route('admin.updatePlatform', '') }}/" + data.platformId);
                    },
                    error: function(xhr, status, error) {
                        console.log('Some error occurred:', error);
                    }
                });
            });
        });
    </script>
@endsection
