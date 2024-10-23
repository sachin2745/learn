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
                <a class="nav-link active" id="pills-blogList-tab" data-toggle="pill" href="#blogList" role="tab"
                    aria-controls="blogList" aria-selected="true">Blog List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-addBlog-tab" data-toggle="pill" href="#addBlog" role="tab"
                    aria-controls="addBlog" aria-selected="false">Add Blog</a>
            </li>
            <li class="nav-item edit" style="display: none;">
                <a class="nav-link " id="pills-editBlog-tab" data-toggle="pill" href="#editBlog" role="tab"
                    aria-controls="editBlog" aria-selected="false">Edit Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-blogComments-tab" data-toggle="pill" href="#blogComments" role="tab"
                    aria-controls="blogComments" aria-selected="false">Blog Comments</a>
            </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Course List --}}
            <div class="tab-pane fade show active" id="blogList" role="tabpanel" aria-labelledby="pills-blogList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Keywords</th>
                                    <th>Date</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($list as $blog)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td style="text-align: center">
                                            <img src="{{ asset($blog->blogImageLarge) }}" alt="{{  $blog->blogImgAlt }}" width="30"
                                                height="30" />
                                        </td>
                                        <td>{{ $blog->blogTitle }}</td>
                                        <td>{{ $blog->blogCategory }}</td>
                                        <td>{{ $blog->blogKeywords }}</td>
                                        <td>{{ date('d-m-Y h:i:s A', $blog->blogCreatedTime) }}</td>
                                        <td style="text-align: center">
                                            {{ $blog->blogStatus == '0' ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td class="d-flex justify-content-between align-items-center">
                                            <a href="#editBlog" data-blog-id="{{ $blog->blogId }}" role="tab"
                                                data-toggle="tab" aria-expanded="false"
                                                class="btn btn-info btn-xs edit-blog-btn" style="height: 23px;">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>

                                            <div class="d-flex ml-3" style="margin-top: -2px;">
                                                <button data-status="1" data-blog-id="{{ $blog->blogId }}"
                                                    class="btn btn-danger btn-xs edit-status-button block-button"
                                                    style="display: {{ $blog->blogStatus == 0 ? 'block' : 'none' }}; height: 23px;">
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                                <button data-status="0" data-blog-id="{{ $blog->blogId }}"
                                                    class="btn btn-success btn-xs edit-status-button active-button"
                                                    style="display: {{ $blog->blogStatus == 1 ? 'block' : 'none' }}; height: 23px;">
                                                    <i class="fa fa-check"></i>
                                                </button>
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

            {{-- Add Blog --}}
            <div class="tab-pane fade" id="addBlog" role="tabpanel" aria-labelledby="pills-addBlog-tab">
                <form id="addBlogForm" method="POST" action="{{ route('hcpanel.addBlog') }}"
                    class="x_content new_x_content" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Meta
                            Title <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogMetaTitle" id="blogMetaTitle"
                                value="" placeholder="Enter Meta Title" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Meta
                            Description <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="blogMetaDescription" id="blogMetaDescription" value=""
                                placeholder="Enter Meta Description" type="text"></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Meta
                            Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogMetaKeywords" id="blogMetaKeywords"
                                placeholder="Enter Meta Keywords" value="" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Title
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogTitle" id="blogTitle"
                                value="" placeholder="Enter Blog Title" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog SKU
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogSKU" id="blogSKU" value=""
                                placeholder="Enter Blog Sku" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Description <span class="required">*</span>
                        </label>

                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control  " id="summernoteDescription" name="blogDescription"
                                placeholder="Enter Blog Description"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Content <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control  " id="summernoteContent" name="blogContent"
                                placeholder="Enter Blog Content"></textarea>

                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Category <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogCategory" id="blogCategory"
                                value="" placeholder="Select Category" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogKeywords" id="blogKeywords"
                                placeholder="Enter Blog Keywords" value="" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Schema <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogSchema" id="blogSchema"
                                placeholder="Enter Schema" value="" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Force
                            Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogForceKeywords"
                                id="blogForceKeywords" placeholder="Enter Force Keywords" value=""
                                required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blog Image Small <span
                                class="required">*</span>(Size 455px x 220px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="blogImageSmall" id="blogImageSmall"
                                    type="file" required="required">
                            </div>
                            <div id="smallpreview" style="display: none;">
                                <img src="" id="img-smallpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#blogImageSmall').on('change', function() {
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


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blog Image Large <span
                                class="required">*</span>(Size 900px x 450px)
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="blogImageLarge" id="blogImageLarge"
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
                            $('#blogImageLarge').on('change', function() {
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Image
                            Alt text <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogImgAlt" id="blogImgAlt"
                                placeholder="Enter Blog Alt Text" value="" required="required" type="text">
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

            {{-- Edit Blog --}}
            <div class="tab-pane fade " id="editBlog" role="tabpanel" aria-labelledby="pills-editBlog-tab">
                <form id="updateBlogForm" method="POST" class="x_content new_x_content" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Meta
                            Title <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogMetaTitle" id="edit_blogMetaTitle"
                                value="" placeholder="Enter Meta Title" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Meta
                            Description <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control " name="blogMetaDescription" id="edit_blogMetaDescription"
                                value="" placeholder="Enter Meta Description" rows="3" cols="3" type="text"></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Meta
                            Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogMetaKeywords"
                                id="edit_blogMetaKeywords" placeholder="Enter Meta Keywords" value=""
                                required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Title
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogTitle" id="edit_blogTitle"
                                value="" placeholder="Enter Blog Title" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog SKU
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogSKU" id="edit_blogSKU"
                                value="" placeholder="Enter Blog Sku" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Description <span class="required">*</span>
                        </label>

                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control  " name="blogDescription" id="edit_summernoteDescription"
                                placeholder="Enter Blog Description" type="text"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Content <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <textarea class="form-control  " name="blogContent" id="edit_summernoteContent"
                                placeholder="Enter Blog Content" type="text"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Category <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogCategory" id="edit_blogCategory"
                                value="" placeholder="Select Category" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogKeywords" id="edit_blogKeywords"
                                placeholder="Enter Blog Keywords" value="" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog
                            Schema <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogSchema" id="edit_blogSchema"
                                placeholder="Enter Schema" value="" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Force
                            Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogForceKeywords"
                                id="edit_blogForceKeywords" placeholder="Enter Force Keywords" value=""
                                required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blog Image Small
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="blogImageSmall" id="edit_blogImageSmall"
                                    type="file">
                            </div>
                            <div id="edit_smallpreview" style="display: none;">
                                <img src="" id="edit_img-smallpreview" alt="Uploaded Image"
                                    style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#edit_blogImageSmall').on('change', function() {
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
                    

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blog Image Large
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Upload
                                <input class="form-control " name="blogImageLarge" id="edit_blogImageLarge"
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
                            $('#edit_blogImageLarge').on('change', function() {
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Blog Image
                            Alt text <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input class="form-control " name="blogImgAlt" id="edit_blogImgAlt"
                                placeholder="Enter Blog Alt Text" value="" required="required" type="text">
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

            {{-- Blog Comment --}}
            <div class="tab-pane fade" id="blogComments" role="tabpanel" aria-labelledby="pills-blogComment-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Added By</th>
                                    <th>Email</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $list = DB::table('blogComments')
                                        ->leftJoin('blogs', 'blogComments.commentBlogId', '=', 'blogs.blogId')
                                        ->select('blogComments.*', 'blogs.blogTitle')
                                        ->get();
                                @endphp
                                <?php $count = 1; ?>
                                @foreach ($list as $bComments)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $bComments->blogCommentId }}</td>
                                        <td>{{ $bComments->blogTitle }}</td>
                                        <td>{{ $bComments->commentAddedByName }}
                                        </td>
                                        <td>{{ $bComments->commentAddedByEmail }}</td>
                                        <td>{{ $bComments->commentText }}</td>
                                        <td>
                                            {{ date('d-m-Y h:i A', $bComments->commentAddedDate) }}
                                        </td>
                                        <td>
                                            @if ($bComments->commentStatus == 0)
                                                Visible
                                            @elseif ($bComments->commentStatus == 1)
                                                Hidden
                                            @elseif ($bComments->commentStatus == 2)
                                                Not Verified
                                            @endif
                                        </td>
                                        <td
                                            style="display: flex; align-items: center; justify-content: center; border-bottom: 0; border-left: 0;">
                                            <a class="btnshhh">
                                                @if ($bComments->commentStatus == 2)
                                                    <!-- Display "Not Verified" button -->
                                                    <form
                                                        action="{{ route('admin.updateBlogCommentStatus', $bComments->blogCommentId) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="0">
                                                        <!-- Set to visible upon verification -->
                                                        <button class="btn btn-warning btn-xs edit-category-button"><i
                                                                class="fa fa-exclamation-circle"></i></button>
                                                    </form>
                                                @elseif ($bComments->commentStatus == 0)
                                                    <!-- Display button to hide the comment -->
                                                    <form
                                                        action="{{ route('admin.updateBlogCommentStatus', $bComments->blogCommentId) }}"
                                                        method="post" style="margin-right: 5px;">
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-danger btn-xs edit-category-button"><i
                                                                class="fa fa-ban"></i></button>
                                                    </form>
                                                @elseif ($bComments->commentStatus == 1)
                                                    <!-- Display button to make the comment visible -->
                                                    <form
                                                        action="{{ route('admin.updateBlogCommentStatus', $bComments->blogCommentId) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="0">
                                                        <button class="btn btn-success btn-xs edit-category-button"><i
                                                                class="fa fa-check"></i></button>
                                                    </form>
                                                @endif
                                            </a>
                                        </td>



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Summernote for the description
            $('#summernoteDescription').summernote({
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

            // Initialize Summernote for the content
            $('#summernoteContent').summernote({
                height: 300, // Set editor height
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

            $('#edit_summernoteDescription').summernote({
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
            $('#edit_summernoteContent').summernote({
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

            // Handling blog edit click
            $('.edit-blog-btn').on('click', function(e) {
                e.preventDefault();

                var blogId = $(this).data('blog-id');
                $('.list').removeClass('active');
                $('.blogcomment').removeClass('active');
                $('.edit').show();

                var url = "{{ route('admin.fetchBlogInfo', ':blogId') }}";
                url = url.replace(':blogId', blogId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        const editData = response.data;
                        console.log(editData);
                        $('#edit_blogId').val(editData.blogId);
                        $('#edit_blogTitle').val(editData.blogTitle);
                        $('#edit_blogSKU').val(editData.blogSKU);
                        $('#edit_blogMetaTitle').val(editData.blogMetaTitle);
                        $('#edit_blogCategory').val(editData.blogCategory);
                        $('#edit_blogKeywords').val(editData.blogKeywords);
                        $('#edit_blogForceKeywords').val(editData.blogForceKeywords);
                        $('#edit_blogMetaKeywords').val(editData.blogMetaKeywords);
                        $('#edit_blogMetaDescription').val(editData.blogMetaDescription);
                        $('#edit_blogImgAlt').val(editData.blogImgAlt);
                        $('#edit_blogSchema').val(editData.blogSchema);

                        $('#edit_img-smallpreview').attr('src', location.origin + '/' + editData
                            .blogImageSmall);
                        $('#edit_smallpreview').show();

                        $('#edit_img-preview').attr('src', location.origin + '/' + editData
                            .blogImageLarge);
                        $('#edit_preview').show();

                        // Populate Summernote with existing content
                        $('#edit_summernoteDescription').summernote('code', editData
                            .blogMetaDescription);
                        $('#edit_summernoteContent').summernote('code', editData.blogContent);

                        $('#updateBlogForm').attr('action',
                            "{{ route('hcpanel.updateBlog', '') }}/" + editData.blogId);
                    },
                    error: function(xhr, status, error) {
                        console.log('Some error occurred:', error);
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.edit-status-button').on('click', function(e) {
                e.preventDefault();

                var blogId = $(this).data('blog-id');
                var currentButton = $(this);

                var url = "{{ route('admin.pages.updateBlogStatus', ':blogId') }}";
                url = url.replace(':blogId', blogId);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        status: $(this).data('status')
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);

                        if (response.status == 200) {

                            if (response.blogStatus == 0) {
                                // Show block button (inactive) and hide active button
                                currentButton.closest('.btnshhh').find('.block-button').show();
                                currentButton.closest('.btnshhh').find('.active-button').hide();
                            } else if (response.blogStatus == 1) {
                                // Show active button and hide block button
                                currentButton.closest('.btnshhh').find('.active-button').show();
                                currentButton.closest('.btnshhh').find('.block-button').hide();
                            }
                            location.reload();
                        }

                    },
                    error: function(xhr, status, error) {
                        console.log('Some error occurred:', error);
                    }
                });
            });
        });
    </script>
    <!-- CodeMirror -->
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
            $('#summernoteDescription').summernote();
            $('#summernoteContent').summernote();

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
    </script>
@endsection
