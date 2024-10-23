<style>
    .modal-title {
        color: #000;
        font-size: 21px;
        font-weight: 700;
    }

    .form-control {
        border: 2px solid #000;
        border-radius: 4px !important;
    }

    .modal-content {
        border-radius: 10px;
        padding: 20px;
        background-color: #f8f9fa;
    }

    .modal-header {
        border-bottom: none;
    }

    .form-control {
        border-radius: 10px;
    }

    .modal-footer {
        border-top: none;
    }

    .submit-btn {
        border-radius: 2px;
        padding: 6px 12px;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="addEnquiryForm" autocomplete="off" method="POST" action="{{ route('addEnquiry') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="leadName" class="form-label">Name</label>
                        <input type="text" class="form-control shadow-none" id="leadName" name="leadName"
                            placeholder="Enter your name" required>
                        <span class="text-danger error-message" data-field="leadName"></span>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control shadow-none" id="leadNumber" name="leadNumber"
                            placeholder="Enter your phone number" oninput="this.value = this.value.slice(0, 10)"
                            required>
                        <span class="text-danger error-message" data-field="leadNumber"></span>
                    </div>
                    <div class="modal-footer px-0">
                        <button type="submit" class="btn btn-dark submit-btn">Submit</button>
                    </div>
                </form>

                <script>
                    $(document).ready(function() {
                        $('#addEnquiryForm').on('submit', function(event) {
                            event.preventDefault(); // Prevent default form submission

                            // Clear previous error messages
                            $('.error-message').text('');

                            $.ajax({
                                url: $(this).attr('action'),
                                type: 'POST',
                                data: $(this).serialize(),
                                success: function(response) {
                                    if (response.status === 'success') {
                                        // after success enquiry
                                        localStorage.setItem('enquiryCount', '1');
                                        // Show success message or redirect
                                        window.location.href =
                                            'https://learn.careerwave.org/';

                                    } else {
                                        // Handle validation errors
                                        if (response.errors) {
                                            $.each(response.errors, function(field, messages) {
                                                $(`.error-message[data-field="${field}"]`).text(
                                                    messages[0]);
                                            });
                                        }
                                    }
                                },
                                error: function(xhr) {
                                    console.error('Error occurred:', xhr);
                                }
                            });
                        });
                    });
                </script>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqEQDdLrP1RztJzEpJf7dRHBbG2zQ4f6vbLsihjB4ERlcpAB+1IwW/9U9gZ65" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- JavaScript to trigger modal after 30 seconds -->
<script>
    // Wait for 30 seconds (30000 milliseconds) before showing the modal
    function isVariableInLocalStorage(variableName) {
        return localStorage.getItem(variableName) !== null;
    }

    var myVariable = "enquiryCount";
    if (isVariableInLocalStorage(myVariable)) {
        // Do nothing
    } else {
        setTimeout(function() {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                keyboard: false
            });
            myModal.show();
        }, 30000); // 30 seconds delay // 30 seconds = 30000 milliseconds
    }
</script>
