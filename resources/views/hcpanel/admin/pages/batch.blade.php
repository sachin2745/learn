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
                <a class="nav-link active" id="pills-batchList-tab" data-toggle="pill" href="#batchList" role="tab"
                    aria-controls="batchList" aria-selected="true">Batch List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addBatch-tab" data-toggle="pill" href="#addBatch" role="tab"
                    aria-controls="addBatch" aria-selected="false">Add Batch</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editBatch-tab" data-toggle="pill" href="#editBatch" role="tab"
                    aria-controls="editBatch" aria-selected="false">Edit Batch</a>
            </li>

        </ul>
        <style>
            @media (max-width: 767px) {
                .table-responsive {
                    overflow-x: auto;
                }
            }
        </style>
        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Course List --}}
            <div class="tab-pane fade show active" id="batchList" role="tabpanel" aria-labelledby="pills-batchList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Batch</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Batch </th>
                                        <th>Name</th>
                                        <th>Original Amt.</th>
                                        <th>Discount Amt.</th>
                                        <th>Discount Percent</th>
                                        {{-- <th>Batch Date</th> --}}
                                        {{-- <th>Details</th> --}}
                                        <th>URL</th>
                                        <th>Date</th>
                                        <th style="text-align: center">Popular</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($list as $batch)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $batch->batchId }}</td>
                                            <td style="text-align: center">
                                                <img src="{{ asset($batch->batchThumbnail) }}"
                                                    alt="{{ $batch->batchThumbnailAlt }}"
                                                    style="max-width: 30px; height: auto;" />
                                            </td>
                                            <td>{{ $batch->examName }}</td>
                                            {{-- <td>{{ $batch->batchThumbnailAlt }}</td> --}}
                                            <td>{{ $batch->batchName }}</td>
                                            <td>{{ $batch->originalPrice }}</td>
                                            <td>{{ $batch->discountPrice }}</td>
                                            <td>{{ $batch->discountPercentage }}%</td>
                                            {{-- <td>{{ $batch->batchStartDate }} - {{ $batch->batchEndDate }}</td> --}}
                                            {{-- <td>{!! Str::words($batch->batchDetails, 20) !!}</td> --}}
                                            <td>{{ $batch->batchBuyNowURL }}</td>
                                            {{-- <td>{{ $batch->batchSlug }}</td> --}}
                                            {{-- <td>{{ $batch->batchMetaTitle }}</td>
                                        <td>{{ $batch->batchMetaDescription }}</td>
                                        <td>{{ $batch->batchSchema }}</td>
                                        <td>{{ $batch->batchKeywords }}</td> --}}
                                            <td>{{ date('d-M-Y h:i A', $batch->createdAt) }}</td>
                                            <td style="text-align: center">
                                                <div class="d-flex ml-3" style="margin-top: -2px;gap:5px;">
                                                    {{ $batch->popularBatch == '0' ? 'Popular' : 'Not Popular' }}

                                                    @if ($batch->popularBatch == 0)
                                                        <form action="/updatePopularStatus/{{ $batch->batchId }}"
                                                            method="post">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="hidden" name="status" value="1">
                                                            <button class="btn btn-secondary btn-xs edit-category-button "
                                                                style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                        </form>
                                                    @elseif($batch->popularBatch == 1)
                                                        <form action="/updatePopularStatus/{{ $batch->batchId }}"
                                                            method="post">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="hidden" name="status" value="0">
                                                            <button class="btn btn-primary btn-xs edit-category-button "
                                                                style="height: 23px;"><i class="fa fa-check"></i></button>
                                                        </form>
                                                    @endif
                                                </div>


                                              
                                            </td>
                                            <td style="text-align: center">
                                                {{ $batch->batchStatus == '0' ? 'Active' : 'Inactive' }}
                                            </td>
                                            <td class="d-flex justify-content-between align-items-center">
                                                <a href="#editBatch" data-batch-id="{{ $batch->batchId }}" role="tab"
                                                    data-toggle="tab" aria-expanded="false"
                                                    class="btn btn-info btn-xs edit-batch-btn" style="height: 23px;">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>



                                                <div class="d-flex ml-3" style="margin-top: -2px;">
                                                    @if ($batch->batchStatus == 0)
                                                        <form action="/updateBatchStatus/{{ $batch->batchId }}"
                                                            method="post">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="hidden" name="status" value="1">
                                                            <button class="btn btn-danger btn-xs edit-category-button"
                                                                style="height: 23px;"><i class="fa fa-ban"></i></button>
                                                        </form>
                                                    @elseif($batch->batchStatus == 1)
                                                        <form action="/updateBatchStatus/{{ $batch->batchId }}"
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

            {{-- Add Batch --}}
            <div class="tab-pane fade" id="addBatch" role="tabpanel" aria-labelledby="pills-addBatch-tab">
                <form id="addBatchForm" autocomplete="off" method="POST" action="{{ route('admin.addBatch') }}"
                    class="x_content new_x_content" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Meta
                            Title <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchMetaTitle" id="batchMetaTitle" value=""
                                placeholder="Enter Meta Title" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Meta
                            Description <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="batchMetaDescription" id="batchMetaDescription"
                                placeholder="Enter Meta Description"></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Meta
                            Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchKeywords" id="batchKeywords"
                                placeholder="Enter Meta Keywords" value="" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Schema
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="batchSchema" id="batchSchema" placeholder="Enter Schema"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Exam
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <select class="form-control " name="batchExamId" id="batchExamId" required="required">
                                <option class="batchExamId" value="0" selected disabled>Select Exam</option>
                                @foreach ($examList as $item)
                                    <option class="batchExamId" value="{{ $item->examId }}">
                                        {{ $item->examName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchName" id="batchName" value=""
                                placeholder="Enter  Title" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Original Price
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="originalPrice" id="originalPrice" value=""
                                placeholder="Enter  Original Price" required="required" type="number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Discount Price
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="discountPrice" id="discountPrice" value=""
                                placeholder="Enter Discount Price" required="required" type="number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Discount Percentage
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="discountPercentage" id="discountPercentage"
                                value="" placeholder="Enter Discount Percentage" required="required"
                                type="number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Start Date
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#reservationdatetime" id="batchStartDate" name="batchStartDate">
                                <div class="input-group-append" data-target="#reservationdatetime"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch End Date
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="input-group date" id="reservationdatetime2" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#reservationdatetime2" id="batchEndDate" name="batchEndDate">
                                <div class="input-group-append" data-target="#reservationdatetime2"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Slug
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchSlug" id="batchSlug" value=""
                                placeholder="Enter Batch Slug" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch
                            Detail <span class="required">*</span>
                        </label>

                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control  " id="batchDetails" name="batchDetails" placeholder="Enter Batch Detail"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Buy Now URL
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchBuyNowURL" id="batchBuyNowURL"
                                placeholder="Enter Buy Now URL" value="" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Button Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchButtonName" id="batchButtonName" value=""
                                placeholder="Enter Button Name" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Batch Image <span
                                class="required">*</span>(Size 360px x 180px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="batchThumbnail" id="batchThumbnail" type="file"
                                    required="required">
                            </div>
                            <div id="preview" style="display: none;">
                                <img src="" id="img-preview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#batchThumbnail').on('change', function() {
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


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Image Alt
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchThumbnailAlt" id="batchThumbnailAlt"
                                placeholder="Enter Batch Image Alt Text" value="" required="required"
                                type="text">
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="" class="btn btn-primary">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Edit Batch --}}
            <div class="tab-pane fade " id="editBatch" role="tabpanel" aria-labelledby="pills-editBatch-tab">
                <form id="updateBatchForm" autocomplete="off" method="POST" class="x_content new_x_content"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Meta
                            Title <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchMetaTitle" id="edit_batchMetaTitle" value=""
                                placeholder="Enter Meta Title" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Meta
                            Description <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="batchMetaDescription" id="edit_batchMetaDescription"
                                placeholder="Enter Meta Description"></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Meta
                            Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchKeywords" id="edit_batchKeywords"
                                placeholder="Enter Meta Keywords" value="" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Schema
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="batchSchema" id="edit_batchSchema" placeholder="Enter Schema"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Exam
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <select class="form-control " name="batchExamId" id="edit_batchExamId" required="required">
                                <option class="batchExamId" value="0" selected disabled>Select Exam</option>
                                @foreach ($examList as $item)
                                    <option class="batchExamId" value="{{ $item->examId }}">
                                        {{ $item->examName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchName" id="edit_batchName" value=""
                                placeholder="Enter  Title" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Original Price
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="originalPrice" id="edit_originalPrice" value=""
                                placeholder="Enter  Original Price" required="required" type="number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Discount Price
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="discountPrice" id="edit_discountPrice" value=""
                                placeholder="Enter Discount Price" required="required" type="number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Discount Percentage
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="discountPercentage" id="edit_discountPercentage"
                                value="" placeholder="Enter Discount Percentage" required="required"
                                type="number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Start Date
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="input-group date" id="edit_reservationdatetime" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#edit_reservationdatetime" id="edit_batchStartDate"
                                    name="batchStartDate">
                                <div class="input-group-append" data-target="#edit_reservationdatetime"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch End Date
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="input-group date" id="edit_reservationdatetime2" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                    data-target="#edit_reservationdatetime2" id="edit_batchEndDate" name="batchEndDate">
                                <div class="input-group-append" data-target="#edit_reservationdatetime2"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Slug
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchSlug" id="edit_batchSlug" value=""
                                placeholder="Enter Batch Slug" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch
                            Detail <span class="required">*</span>
                        </label>

                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control" id="edit_batchDetails" name="batchDetails" placeholder="Enter Batch Detail"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Buy Now URL
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchBuyNowURL" id="edit_batchBuyNowURL"
                                placeholder="Enter Buy Now URL" value="" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Button Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchButtonName" id="edit_batchButtonName" value=""
                                placeholder="Enter Button Name" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Batch Image <span
                                class="required">*</span>(Size 360px x 180px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="batchThumbnail" id="edit_batchThumbnail"
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
                            $('#edit_batchThumbnail').on('change', function() {
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


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Batch Image Alt Text
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="batchThumbnailAlt" id="edit_batchThumbnailAlt"
                                placeholder="Enter Batch Image Alt Text" value="" required="required"
                                type="text">
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="" class="btn btn-primary">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success">Update</button>
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
            $('#batchDetails').summernote({
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

    <script>
        $(document).ready(function() {

            $('#edit_batchDetails').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']], // fontsize in toolbar
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36', '48', '64', '82',
                    '150'
                ], // define font sizes
                fontSizeUnits: ['px', 'pt'], // define font size units
            });


            // Handling Batch edit click
            $('.edit-batch-btn').on('click', function(e) {
                e.preventDefault();

                var batchId = $(this).data('batch-id');

                $('.list').removeClass('active');
                $('.edit').show();

                var url = "{{ route('admin.fetchBatchContent', ':batchId') }}";
                url = url.replace(':batchId', batchId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        const data = response.data;
                        console.log(data);

                        $('#edit_batchExamId').val(data.batchExamId);
                        $('#edit_batchThumbnailAlt').val(data.batchThumbnailAlt);
                        $('#edit_batchName').val(data.batchName);
                        $('#edit_originalPrice').val(data.originalPrice);
                        $('#edit_discountPrice').val(data.discountPrice);
                        $('#edit_discountPercentage').val(data.discountPercentage);
                        $('#edit_batchStartDate').val(data.batchStartDate);
                        $('#edit_batchEndDate').val(data.batchEndDate);
                        // $('#edit_batchDetails').val(data.batchDetails);
                        $('#edit_batchBuyNowURL').val(data.batchBuyNowURL);
                        $('#edit_batchButtonName').val(data.batchButtonName);
                        $('#edit_batchSlug').val(data.batchSlug);
                        $('#edit_batchMetaTitle').val(data.batchMetaTitle);
                        $('#edit_batchMetaDescription').val(data.batchMetaDescription);
                        $('#edit_batchSchema').val(data.batchSchema);
                        $('#edit_batchKeywords').val(data.batchKeywords);


                        $('#edit_img-preview').attr('src', location.origin + '/' + data
                            .batchThumbnail);
                        $('#edit_preview').show();

                        // Populate Summernote with existing content
                        $('#edit_batchDetails').summernote('code', data.batchDetails);


                        $('#updateBatchForm').attr('action',
                            "{{ route('admin.updateBatch', '') }}/" + data.batchId);
                    },
                    error: function(xhr, status, error) {
                        console.log('Some error occurred:', error);
                    }
                });
            });
        });
    </script>



    {{-- <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/codemirror/theme/monokai.css') }}">
    <!-- Summernote CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <!-- CodeMirror CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/monokai.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote editors
            $('#batchDetails').summernote();
          

            // Initialize CodeMirror on the textarea with id "codeMirrorDemo"
            var codeMirrorTextArea = document.getElementById("codeMirrorDemo");
            if (codeMirrorTextArea) {
                CodeMirror.fromTextArea(codeMirrorTextArea, {
                    mode: "htmlmixed",
                    theme: "monokai",
                    lineNumbers: true, // Enable line numbers
                    matchBrackets: true // Match closing and opening brackets
                });
            } else {
                console.error('Textarea with id "codeMirrorDemo" not found.');
            }
        });
    </script> --}}

    <script>
        $(function() {
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'DD-MM-YYYY hh:mm A' // Custom format
            });
        });

        $(function() {
            $('#reservationdatetime2').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'DD-MM-YYYY hh:mm A' // Custom format
            });
        });
        $(function() {
            $('#edit_reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'DD-MM-YYYY hh:mm A' // Custom format
            });
        });

        $(function() {
            $('#edit_reservationdatetime2').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'DD-MM-YYYY hh:mm A' // Custom format
            });
        });
    </script>
@endsection
