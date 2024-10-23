@extends('hcpanel.admin.layout.panel_layout')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
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

            .model-btn {
                display: flex;
            }

            /* Basic styles for the modal */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
                background-color: #ffffff;
                margin: 15% auto;
                padding: 10px;
                width: 30%;
            }

            .modal-header {
                color: black;
                font-weight: 700;
                padding: 10px 15px;
                background: #ffffff;
            }

            .modal-header h5 {
                margin: 0;
            }

            .modal-body {
                padding: 25px 15px;
                display: flex;
                flex-direction: column;
            }

            .modal-footer {
                padding: 0 15px;
                padding-top: 16px;
            }

            .close {
                color: #7b7373;
                float: right;
                font-size: 38px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
        <div id="notification" class="notification" style="display: none;">
            <span id="notification-message"></span>
            <button onclick="this.parentElement.style.display='none'">Close</button>
        </div>
        {{-- Tab navigation --}}
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-enquiryList-tab" data-toggle="pill" href="#enquiryList" role="tab"
                    aria-controls="enquiryList" aria-selected="true">Enquire List</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " id="pills-remarkList-tab" data-toggle="pill" href="#remarkList" role="tab"
                    aria-controls="remarkList" aria-selected="true">Enquire Remarks</a>
            </li>

        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- Enquiry List --}}
            <div class="tab-pane fade show active" id="enquiryList" role="tabpanel" aria-labelledby="pills-enquiryList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Enquire</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Remarks</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>

                                    @foreach ($enquiryList as $item)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td><?php echo $count++; ?></td>
                                            <td>{{ $item->leadId }}</td>
                                            <td>{{ $item->leadName }}</td>
                                            <td>{{ $item->leadNumber }}</td>
                                            <td>{{ $item->latest_remark }}</td>
                                            <td>{{ date('d-M-Y H:i A', (int) $item->createdAT) }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a class="btn btn-warning border btn-xs  openModal"><i
                                                        class="fa fa-comment"></i></a>

                                                <div id="myModal" class="modal">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style=" font-size: 2rem; line-height: 25px ">Add
                                                                Remarks
                                                            </h5>
                                                            <span class="close closeModal">&times;</span>
                                                        </div>
                                                        <form action="/admin/addLeadRemarks/{{ $item->leadId }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label for="lead_remark">Remark ( <span
                                                                        style="color: rgb(209, 101, 18)">{{ $item->leadName }}</span>
                                                                    )</label>
                                                                <textarea style="height: 60px;" class="form-control" name="lead_remark" id="lead_remark" value=""
                                                                    placeholder="Enter Your Remark" type="text"></textarea>
                                                            </div>

                                                            <div class="row modal-footer">
                                                                <div class="col-md-12"><button type="submit"
                                                                        class="btn btn-dark" style="width: 100%">Add
                                                                        Remark</button></div>
                                                            </div>
                                                        </form>

                                                    </div>
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


             {{-- Remark List --}}
            <div class="tab-pane fade " id="remarkList" role="tabpanel" aria-labelledby="pills-remarkList-tab">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Enquiry Remarks</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered dt-responsive nowrap"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Remarks</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1;
                                    $count1 = 1; ?>
                                    @foreach ($remarks as $item)
                                        @php
                                            $remarkTexts = json_decode($item->lead_remark);
                                        @endphp
                                        <tr class="collapseRemarkData">
                                            <td><?php echo $count++; ?></td>
                                            <td>{{ $item->lead_remark_remark_lid }}</td>
                                            <td>{{ $item->leadName }} </td>
                                            <td>{{ json_decode($item->lead_remark_date,true)[0] }}</td>
                                            <td>{{ json_decode($item->lead_remark,true)[0] }}</td>

                                            <td
                                                style="display: flex; align-items: center; justify-content: space-evenly; border-bottom: 0; border-left: 0;">
                                                <a class="btn btn-dark btn-xs edit-category-button toggleRemarkView  {{ count($remarkTexts) <= 1 ? 'disabled' : '' }}"
                                                    data-selector-id="{{ $item->lead_remark_remark_lid }}"><i
                                                        class="fa fa fa-eye"></i></a>
                                                <a class="btn btn-warning border btn-xs edit-category-button openModal"
                                                    id=""><i class="fa fa-comment"></i></a>

                                                <!-- Modal -->
                                                <div id="myModal" class="modal">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style=" font-size: 2rem; line-height: 25px ">Add
                                                                Remarks
                                                            </h5>
                                                            <span class="close closeModal">&times;</span>
                                                        </div>
                                                        <form
                                                            action="/admin/addLeadRemarks/{{ $item->lead_remark_remark_lid }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label for="lead_remark">Remark</label>
                                                                <textarea style="height: 60px; color: #000; background-color: #fff;" class="form-control" name="lead_remark"
                                                                    id="lead_remark" placeholder="Enter Remark" required></textarea>

                                                            </div>

                                                            <div class="row modal-footer">
                                                                <div class="col-md-12"><button type="submit"
                                                                        class="btn btn-dark" style="width: 100%">Add
                                                                        Remark</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                        @php

                                            $remarkTexts = json_decode($item->lead_remark,true);
                                            $remarkDate = json_decode($item->lead_remark_date,true);
                                            // $userName = json_decode($item->users_name);
                                        @endphp

                                        @if (is_array($remarkTexts) && count($remarkTexts) > 1)
                                            <tr id="collapseViewData{{ $item->lead_remark_remark_lid }}"
                                                style="display: none;">
                                                <td colspan="8">
                                                    <table id=""
                                                        class="table  table-bordered  nowrap" cellspacing="0"
                                                        width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No.</th>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Date</th>
                                                                <th>Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @for ($i = 0; $i < count($remarkTexts); $i++)
                                                                <tr>
                                                                    <td>{{ $count1++ }}</td>
                                                                    <td>{{ $item->lead_remark_remark_lid }}</td>
                                                                    <td>{{ $item->leadName }}
                                                                    </td>
                                                                    <td>{{ $remarkDate[$i] }}</td>

                                                                    <td>{{ $remarkTexts[$i] }}</td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>

        </div>
    </div>


    <script>
        $(document).on('click', '.openModal', function() {
            console.log('Open Modal button clicked');
            $(this).siblings('#myModal').css('display', 'block');
        });

        $(document).on('click', '.closeModal', function() {
            console.log('Close Modal button clicked');
            $(this).closest('#myModal').css('display', 'none');
        });
    </script>
    <script>
        $(document).on('click', '.toggleRemarkView', function() {
            let selectorId = $(this).data('selector-id');
            let parentElement = $(this).closest('.collapseRemarkData');

            // Log the sibling with id 'collapseViewData' of the parent element.

            parentElement.siblings(`#collapseViewData${selectorId}`).css('display', function(i, display) {
                return display === 'table-row' ? 'none' : 'table-row';
            });
        })
    </script>
@endsection
