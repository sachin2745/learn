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


    <div class="container-fluid card px-4 pt-2">
        {{-- Tab navigation --}}
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-bannerList-tab" data-toggle="pill" href="#bannerList" role="tab"
                    aria-controls="bannerList" aria-selected="true">Banner List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addBanner-tab" data-toggle="pill" href="#addBanner" role="tab"
                    aria-controls="addBanner" aria-selected="false">Add Banner</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editBanner-tab" data-toggle="pill" href="#editBanner" role="tab"
                    aria-controls="editBanner" aria-selected="false">Edit Banner</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Course List --}}
            <div class="tab-pane fade show active" id="bannerList" role="tabpanel" aria-labelledby="pills-bannerList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Banner</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Id</th>
                                    <th>Image Small</th>
                                    <th>Image Large</th>
                                    <th>Alt</th>
                                    <th>Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($bannerList as $item)
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td>{{ $item->bannerId }}</td>
                                        <td style="text-align: center">
                                            <img src="{{ asset($item->bannerImgSmall) }}" alt="{{ $item->bannerImgAlt }}"
                                                width="30" height="30" />
                                        </td>
                                        <td style="text-align: center">
                                            <img src="{{ asset($item->bannerImgLarge) }}" alt="{{ $item->bannerImgAlt }}"
                                                width="30" height="30" />
                                        </td>
                                        <td>{{ $item->bannerImgAlt }}</td>
                                        <td>{{ $item->bannerStatus == 0 ? 'Active' : 'Inactive' }}</td>

                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#editBanner" data-banner-id="{{ $item->bannerId }}" role="tab"
                                                data-toggle="tab" class=" btn btn-info btn-xs editBannerBtn"
                                                aria-label="Edit Banner" style="height: 23px;">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <div class="d-flex ml-3" style="margin-top: -2px;">
                                                @if ($item->bannerStatus == 0)
                                                    <form action="/updateBannerStatus/{{ $item->bannerId }}"
                                                        method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-danger btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif($item->bannerStatus == 1)
                                                    <form action="/updateBannerStatus/{{ $item->bannerId }}"
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

            {{-- Add Banner --}}
            <div class="tab-pane fade" id="addBanner" role="tabpanel" aria-labelledby="pills-addBanner-tab">
                <form autocomplete="off" action="{{ route('admin.addBanner') }}" method="POST"
                    class="x_content new_x_content" enctype="multipart/form-data">
                    @csrf

                    <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-3 col-xs-12">Banner Image Small <span
                                class="required">*</span>(Size 474px x 210px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="bannerImgSmall" id="bannerImgSmall" type="file"
                                    required="required">
                            </div>
                            <div id="smallpreview" style="display: none;">
                                <img src="" id="img-smallpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#bannerImgSmall').on('change', function() {
                                    var file = this.files[0];
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#img-smallpreview').attr('src', e.target.result);
                                        $('#smallpreview').show();
                                    };
                                    reader.readAsDataURL(file);
                                });
                            });
                        </script>
                    </div>



                    <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-3 col-xs-12">Banner Image Large <span
                                class="required">*</span>(Size 1410px x 266px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="bannerImgLarge" id="bannerImgLarge" type="file"
                                    required="required">
                            </div>
                            <div id="largepreview" style="display: none;">
                                <img src="" id="img-largepreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#bannerImgLarge').on('change', function() {
                                    var file = this.files[0];
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#img-largepreview').attr('src', e.target.result);
                                        $('#largepreview').show();
                                    };
                                    reader.readAsDataURL(file);
                                });
                            });
                        </script>
                    </div>



                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bannerImageAltText">Banner Image
                            Alt Text<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="bannerImgAlt" id="bannerImgAlt"
                                placeholder="Enter Banner Alt Text" value="" required="required" type="text">
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


            {{-- Edit Banner --}}
            <div class="tab-pane fade " id="editBanner" role="tabpanel" aria-labelledby="pills-editBanner-tab">
                <form autocomplete="off" id="updateBannerForm" method="POST" class="x_content new_x_content" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @csrf

                    <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-3 col-xs-12">Banner Image Small <span
                                class="required">*</span>(Size 474px x 210px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="bannerImgSmall" id="edit_bannerImgSmall" type="file"
                                   >
                            </div>
                            <div id="edit_smallpreview" style="display: none;">
                                <img src="" id="edit_img-smallpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#edit_bannerImgSmall').on('change', function() {
                                    var file = this.files[0];
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#edit_img-smallpreview').attr('src', e.target.result);
                                        $('#edit_smallpreview').show();
                                    };
                                    reader.readAsDataURL(file);
                                });
                            });
                        </script>
                    </div>



                    <div class="item form-group">
                        <label class="control-label col-md-6 col-sm-3 col-xs-12">Banner Image Large <span
                                class="required">*</span>(Size 1410px x 266px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="bannerImgLarge" id="edit_bannerImgLarge" type="file"
                                    >
                            </div>
                            <div id="edit_largepreview" style="display: none;">
                                <img src="" id="edit_img-largepreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#edit_bannerImgLarge').on('change', function() {
                                    var file = this.files[0];
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#edit_img-largepreview').attr('src', e.target.result);
                                        $('#edit_largepreview').show();
                                    };
                                    reader.readAsDataURL(file);
                                });
                            });
                        </script>
                    </div>



                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bannerImageAltText">Banner Image
                            Alt Text<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="bannerImgAlt" id="edit_bannerImgAlt"
                                placeholder="Enter Banner Alt Text" value="" required="required" type="text">
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

          

            // Handling Banner edit click
            $('.editBannerBtn').on('click', function(e) {
                e.preventDefault();

                var bannerId = $(this).data('banner-id');

                $('.list').removeClass('active');
                $('.edit').show();

                var url = "{{ route('admin.fetchBannerContent', ':bannerId') }}";
                url = url.replace(':bannerId', bannerId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        const data = response.data;
                        console.log(data);

                       
                        $('#edit_bannerImgAlt').val(data.bannerImgAlt);


                        $('#edit_img-smallpreview').attr('src', location.origin + '/' + data
                            .bannerImgSmall);
                        $('#edit_smallpreview').show();

                        $('#edit_img-largepreview').attr('src', location.origin + '/' + data
                            .bannerImgLarge);
                        $('#edit_largepreview').show();


                        $('#updateBannerForm').attr('action',
                            "{{ route('admin.updateBanner', '') }}/" + data.bannerId);
                    },
                    error: function(xhr, status, error) {
                        console.log('Some error occurred:', error);
                    }
                });
            });
        });
    </script>
@endsection
