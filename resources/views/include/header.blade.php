<style>
    @import url('https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap');

    body {
        font-family: "Reddit Sans", sans-serif;
    }

    .navbar {
        margin: auto;
        box-shadow: #00000029 0px 0px 10px;
    }

    .nav_Container {
        height: 80px;

    }



    .navbar-brand img {
        height: 55px;
        width: 52px;
    }

    @media (max-width: 992px) {


        .navbar-brand {
            margin-right: auto;
            /* Center the logo */
        }

        .navbar-collapse {
            order: 3;
            justify-content: center;
            width: 100%;
        }


        .navbar-toggler {
            border: none;
        }
    }

    @media (max-width: 768px) {

        .container {
            margin-top: -10px;
            margin-bottom: -10px;
        }

        .navbar-brand img {
            height: 41px;
            width: 42px;
        }
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: white;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 10px;
    }

    .sidenav .side_field {
        padding: 16px;
        text-decoration: none;
        font-size: 16px;
        color: #000;
        display: block;
        transition: 0.3s;
        font-weight: 600;
        /* border-bottom: 3px solid #ebebeb; */
    }

    .sidenav-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
    }



    .sidenav-logo {
        max-width: 50px;
        height: auto;
    }

    .closebtn {
        font-size: 30px;
        color: white;
        text-decoration: none;
        cursor: pointer;
    }



    .sidenav a {
        color: #000;
        border: none;
    }



    .sidenav .closebtn {

        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        border: none;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .forBorder {
        border-bottom: 3px solid #ebebeb;
    }

    .dropdown-toggle {
        border: 1px solid #5A4BDA;
        margin-right: 15px;
        border-radius: 6px;
        color: #5A4BDA;
        font-weight: 600;
    }

    .dropdown-toggle:hover {
        color: #5A4BDA;
    }

    .navbar-expand-lg .navbar-nav .nav-link {
        padding: 12px 24px;
    }

    .nav-item {
        padding: 0.5rem 0xp;
    }

    .dropdown-hover:hover>.dropdown-menu {
        display: inline-block;
        width: 55%;
        padding-top: 0px;
        padding-bottom: 0px;
    }

    .dropdown-hover>.dropdown-toggle:active {
        pointer-events: none;
    }

    .needEffect {
        border: 1px solid #ebebeb;
        transition: 0.3s;
    }

    .needEffect:hover {
        border: 1px solid #5A4BDA;
    }

    .exam-details a {
        text-decoration: none;
        color: #000;
        font-weight: 700;
    }

    .dropdown-toggle::after {
        content: none;
    }

    .exam-item:hover {
        cursor: pointer;
        background-color: #F8F8F8;
    }

    .navbar>.container {
        justify-content: center !important;
    }

    .navbar-collapse {
        flex-basis: 100%;
        flex-grow: 0;
        align-items: center;
    }

    .dropdown-toggle {
        border: none;
    }

    .accordion-flush>.accordion-item>.accordion-header .accordion-button, .accordion-flush>.accordion-item>.accordion-header .accordion-button.collapsed {
    border-radius: 0;
    border-bottom: 1px solid #757575;
}
</style>

@php
$courses = DB::table('course')
->leftJoin('examName', 'course.courseId', '=', 'examName.examCourseId')
->select(
'course.courseId', // Assuming you want the courseId
'course.courseName', // You can add more course columns explicitly if needed
DB::raw('JSON_ARRAYAGG(examName.examName) as examNames'),
DB::raw('JSON_ARRAYAGG(examName.examSlug) as examSlugs'),
)
->where('courseStatus', 0)
->groupBy('course.courseId', 'course.courseName') // Adjust the group by clause
->get();

@endphp
{{-- SIDENAVBAR --}}
<div id="mySidenav" class="sidenav">
    <div class="sidenav-header" id="sidenav_header">
        <img src="{{ asset('assets/logo-career.png') }}" alt="Logo" width="50" height="50" class="sidenav-logo">
        <a href="javascript:void(0)" class="closebtn p-1" onclick="closeNav()">&times;</a>
    </div>
    <div class="sidenav-header" id="sidenav_headerM" style="display:none;">
        <div>
            <a href="javascript:void(0)" style="margin-top:3px;" onclick="closeCourses()"> <i
                    class="fa-solid fa-chevron-left " style="padding:0rem 0.5rem;"></i></a>
            <img src="{{ asset('assets/logo-career.png') }}" alt="Logo" width="50" height="50" class="sidenav-logo">
        </div>
        <a href="javascript:void(0)" class="closebtn p-1" onclick="closeNav()">&times;</a>
    </div>
    <!-- Main Sidebar Content -->
    <div id="mainContent">
        <div class="d-flex justify-content-between align-items-center forBorder " style="cursor: pointer;"
            onclick="openCourses()">
            <a href="#" class="side_field">All Courses</a>
            <i class="fa-solid fa-chevron-right p-3"></i>
        </div>
        <div class="forBorder">
            <a href="{{ route('Blogs') }}" class="side_field">Blog</a>
        </div>
        <div class="forBorder">
            <a href="{{ route('AboutUs') }}" class="side_field">About Us</a>
        </div>
        <div class="forBorder">
            <a href="{{ route('ContactUs') }}" class="side_field">Contact Us</a>
        </div>
    </div>


    <!-- All Courses Sidebar  -->
    <div id="coursesContent" style="display:none;">
        @foreach ($courses as $course)
        <!-- Accordion -->
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item" data-course-id="{{ $course->courseId }}">
                <h2 class="accordion-header" id="flush-heading{{ $course->courseId }}">
                    <button class="accordion-button collapsed" id="dropdownMenu{{ $course->courseId }}" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $course->courseId }}"
                        aria-expanded="false" aria-controls="flush-collapse{{ $course->courseId }}">
                        {{ $course->courseName }}
                    </button>
                </h2>
                <div id="flush-collapse{{ $course->courseId }}" class="accordion-collapse collapse"
                    aria-labelledby="flush-heading{{ $course->courseId }}" data-bs-parent="#accordionFlushExample">
                    @php
                    $examNames = json_decode($course->examNames);
                    $examSlugs = json_decode($course->examSlugs);
                    @endphp
                    @if ($examNames)
                    @foreach ($examNames as $index => $examName)
                    <a href="/courses/{{ $examSlugs[$index] }}" class="accordion-body d-block"
                        style="padding: 12px 21px; margin: 0; border-bottom:1px solid #757575;font-size:14px;">
                        {{ $examName }}
                    </a>
                    @endforeach
                    @else
                    <span class="dropdown-item">No exams available</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

        <!-- Accordian -->

        <!-- <div class="dropdown">
            <div class="forBorder" data-course-id="{{ $course->courseId }}">
                <a href="#" class="side_field dropdown-toggle" id="dropdownMenu{{ $course->courseId }}"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $course->courseName }}
                </a>
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu{{ $course->courseId }}">
                @php
                $examNames = json_decode($course->examNames);
                $examSlugs = json_decode($course->examSlugs);
                @endphp
                @if ($examNames)
                @foreach ($examNames as $index => $examName)
                <a href="/courses/{{ $examSlugs[$index] }}" class="dropdown-item">
                    {{ $examName }}
                </a>
                @endforeach
                @else
                <span class="dropdown-item">No exams available</span>
                @endif
            </div>
        </div> -->

    </div>

</div>



<script>
    function openCourses() {
        document.getElementById('mainContent').style.display = 'none';
        document.getElementById('sidenav_header').style.display = 'none';
        document.getElementById('coursesContent').style.display = 'block';
        document.getElementById('sidenav_headerM').style.display = 'flex';
    }

    function closeCourses() {
        document.getElementById('mainContent').style.display = 'block';
        document.getElementById('sidenav_header').style.display = 'flex';

        document.getElementById('coursesContent').style.display = 'none';
        document.getElementById('sidenav_headerM').style.display = 'none';

    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>


<nav class="navbar navbar-expand-lg py-0 navbar-light bg-white sticky-top ">
    <div class="container nav_Container px-0 " style=" max-width: 72rem;">
        <button class="navbar-toggler  shadow-none" type="button" onclick="openNav()">
            <span class="navbar-toggler-icon "></span>
        </button>
        <a class="navbar-brand" href="https://learn.careerwave.org">
            <img src="{{ asset('assets/logo-career.png') }}" alt="Logo" class="d-inline-block align-text-top">
        </a>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav mb-2 mb-lg-0">

                <li class="nav-item dropdown dropdown-hover position-static">
                    <div class="nav-link dropdown-toggle " style="border:1px solid #5A4BDA;" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        All Courses <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="dropdown-menu ">
                        <div class="d-flex flex-row">
                            <!-- Left Side: Exam List -->
                            <div class="d-flex flex-column" id="examList">
                                <!-- Exam Item -->
                                @foreach ($courses as $course)
                                @php
                                $exams = json_decode($course->examNames, true);
                                @endphp
                                <div class="exam-item p-4 d-flex align-items-center rounded-md justify-content-between gap-3"
                                    data-course-id="{{ $course->courseId }}" style="width: 360px; cursor: pointer;">
                                    <div style="width: 90%">
                                        <div
                                            style="font-size: 16px; font-weight: 600; color: #1B2124; line-height: 24px;">
                                            {{ $course->courseName }}
                                        </div>
                                        <div
                                            style="font-weight: 500; font-size: 0.75rem; line-height: 1rem; color: #757575;">
                                            {{ implode(', ', $exams) }}
                                        </div>
                                    </div>
                                    <div>
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Add more items as needed -->
                            </div>

                            <!-- Right Side: Exam Details -->
                            <div class="d-flex flex-row flex-wrap align-items-start exam-details" id="examDetails"
                                style="width: 600px; height: auto; gap: 16px; padding: 16px;overflow-y:scroll; background-color:#F8F8F8;">
                                <!-- Details will be loaded here based on selection -->
                            </div>
                        </div>
                    </div>

                </li>


                <li class="nav-item">
                    <a class="nav-link ps-2" style="color: #000; font-weight:600;" href="{{ route('Blogs') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-2" style="color: #000; font-weight:600;" href="{{ route('AboutUs') }}">About
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ps-2" style="color: #000; font-weight:600;"
                        href="{{ route('ContactUs') }}">Contact Us</a>
                </li>
            </ul>
        </div>
        {{-- <a href="#" class="btn btn-custom">Login/Register</a> --}}
    </div>
</nav>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
        document.querySelector('.navbar').classList.remove('sticky-top');
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.querySelector('.navbar').classList.add('sticky-top');
    }
</script>


<script>
    $(document).ready(function () {
        $(document).on("mouseover", '.exam-item', function () {
            const $this = $(this);
            const examCourseId = $this.data("courseId");

            // Check if the AJAX call has already been made for this element
            if (!$this.data('ajaxCalled')) {
                $this.data('ajaxCalled', true); // Set flag to true

                $.ajax({
                    url: "{{ route('getExamByCourse') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    data: {
                        'courseId': examCourseId,
                    },
                    success: function (response) {
                        const {
                            data
                        } = response;
                        $("#examDetails").empty();

                        data.forEach(item => {
                            $("#examDetails").append(`
                        <a href="/courses/${item.examSlug}"
                            class="d-flex align-items-center gap-2 bg-white rounded shadow needEffect"
                            style="width: 272px; padding: 14px;">
                            <div class="bg-no-repeat"
                                style="background-image: url('{{ asset('${item.examIcon}') }}'); min-width: 33px; min-height: 33px; background-size: contain; background-position: center;">
                            </div>
                            <div class="">${item.examName}</div>
                        </a>
                    `);
                        });

                        // Reset the flag when the mouse leaves the element
                        $this.on('mouseleave', function () {
                            $this.data('ajaxCalled', false); // Reset flag to false
                        });
                    },
                });
            }
        });

    });
</script>
{{--
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all exam items
        const examItems = document.querySelectorAll(".exam-item2");

        // Get the container for displaying exam details
        const examDetails = document.getElementById("examDetails2");

        // Add hover event listener to each exam item
        examItems.forEach(item => {
            item.addEventListener("mouseover", function () {
                // Get the selected exam type from the data attribute
                const examType = this.getAttribute("data-exam");

                // Clear previous content
                examDetails.innerHTML = '';

                // Display content based on the selected exam type
                if (examType === "competitive-exams") {
                    examDetails2.innerHTML = `
                    <a href="#"
                        class="d-flex align-items-center gap-2 bg-white rounded shadow  needEffect"
                        style="width: 272px; padding: 14px;">
                        <div class="bg-no-repeat"
                            style="background-image: url('{{ asset('assets/exam.webp') }}'); min-width: 33px; min-height: 33px; background-position: center;">
</div>
<div class="text-[16px] font-[600] leading-[24px]">IIT JEE</div>
</a>

<!-- Add more course links as needed -->
`;
                } else if (examType === "only-ias") {
                    examDetails2.innerHTML = `
<a href=""
    class="d-flex align-items-center gap-2 bg-white rounded shadow needEffect"
    style="width: 272px; padding: 14px;">
    <div class="bg-no-repeat"
        style="background-image: url('https://example.com/ias-course-image.webp'); min-width: 33px; min-height: 33px; background-position: center;">
    </div>
    <div class="text-[16px] font-[600] leading-[24px]">UPSC</div>
</a>
<!-- Add more course links as needed -->
`;
                }

                // You can add more conditions for other exams
            });
        });
    });
</script> --}}