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
                <a class="nav-link active" id="pills-founderList-tab" data-toggle="pill" href="#founderList" role="tab"
                    aria-controls="founderList" aria-selected="true">Founder List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addFounder-tab" data-toggle="pill" href="#addFounder" role="tab"
                    aria-controls="addFounder" aria-selected="false">Add Founder</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editFounder-tab" data-toggle="pill" href="#editFounder" role="tab"
                    aria-controls="editFounder" aria-selected="false">Edit Founder</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Founder List --}}
            <div class="tab-pane fade show active" id="founderList" role="tabpanel" aria-labelledby="pills-founderList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Founder</h3>
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
                                    <th>Desgination</th>
                                    <th>Message</th>
                                    <th>Detail</th>                                   
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($founderList as $item)
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td>{{ $item->founderId }}</td>

                                        <td style="text-align: center">
                                            <img src="{{ asset($item->founderImg) }}" alt="{{ $item->founderImgAlt }}"
                                                style="max-width: 30px; height: auto;" />
                                        </td>
                                        <td>{{ $item->founderName }}</td>
                                        <td>{{ $item->founderDsg }}</td>
                                        <td>{{ $item->founderMsg }}</td>
                                        <td>{{ Str::words($item->founderDetail, 20) }}</td>

                                        <td>{{ $item->founderStatus == 0 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ date('d-M-Y h:i A', (int) $item->createdAt) }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="#editFounder" data-founder-id="{{ $item->founderId }}" role="tab"
                                                data-toggle="tab" class=" btn btn-info btn-xs editFounderBtn"
                                                aria-label="Edit Founder " style="height: 23px;">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>



                                            <div class="d-flex ml-3" style="margin-top: -2px;">
                                                @if ($item->founderStatus == 0)
                                                    <form action="/updateFounderStatus/{{ $item->founderId }}"
                                                        method="post">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-danger btn-xs edit-category-button"
                                                            style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif($item->founderStatus == 1)
                                                    <form action="/updateFounderStatus/{{ $item->founderId }}"
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
            <div class="tab-pane fade" id="addFounder" role="tabpanel" aria-labelledby="pills-addFounder-tab">
                <form autocomplete="off" action="{{ route('admin.addFounder') }}" method="POST"
                    class="x_content new_x_content" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="founderName" id="founderName"
                                placeholder="Enter Founder Name" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="founderDsg" id="founderDsg"
                                placeholder="Enter Founder Designation" required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Description">
                            Message <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="founderMsg" id="founderMsg" placeholder="Enter Founder Message"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Detail <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " rows="5" id="founderDetail" name="founderDetail"
                                placeholder="Enter Founder Detail"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Image <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="founderImg" id="founderImg"
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
                            $('#founderImg').on('change', function() {
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
                            Image Alt Text <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="founderImgAlt" id="founderImgAlt"
                                placeholder="Enter   Image Alt Text" required="required" type="text">
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


            {{-- Edit Founder --}}
            <div class="tab-pane fade " id="editFounder" role="tabpanel" aria-labelledby="pills-editFounder-tab">
                <form autocomplete="off" id="updateFounder" method="POST" class="x_content new_x_content"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Name">
                            Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="founderName" id="edit_founderName"
                                placeholder="Enter Founder Name" required="required" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Title">
                            Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="founderDsg" id="edit_founderDsg"
                                placeholder="Enter Founder Designation" required="required" type="text">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="Description">
                            Message <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="founderMsg" id="edit_founderMsg" placeholder="Enter Founder Message"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Detail <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control " rows="5" id="edit_founderDetail" name="founderDetail"
                                placeholder="Enter Founder Detail"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ICon">
                            Image <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control col-md-7 col-xs-12" name="founderImg" id="edit_founderImg"
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
                            $('#edit_founderImg').on('change', function() {
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
                            Image Alt Text <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control" name="founderImgAlt" id="edit_founderImgAlt"
                                placeholder="Enter   Image Alt Text" required="required" type="text">
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
           
            $('.editFounderBtn').on('click', function() {
                var founder_id = $(this).data('founder-id');

                $('.list').removeClass('active');
                $('.edit').css('display', 'block');
                $('.edit').addClass('active');

                var url = "{{ route('admin.fetchFounderContent', ':founderId') }}";
                url = url.replace(':founderId', founder_id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        const data = response.data;

                        $('#edit_founderName').val(data.founderName);
                        $('#edit_founderImgAlt').val(data.founderImgAlt);
                        $('#edit_founderDsg').val(data.founderDsg);
                        $('#edit_founderMsg').val(data.founderMsg);
                        $('#edit_founderDetail').val(data.founderDetail);
                       

                        $('#edit_img-preview').attr('src', location.origin + '/' + data
                            .founderImg);
                        $('#edit_preview').show();


                        
                        $('#updateFounder').attr('action',
                            "{{ route('admin.updateFounder', '') }}/" + founder_id);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error occurred:', xhr.responseText || error);
                    }
                });
            });
        });
    </script>
@endsection
