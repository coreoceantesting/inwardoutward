<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-bs-theme="dark" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">
    <script src="{{ asset('admin/js/layout.js') }}"></script>
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
       .auth-page-wrapper {
    background-image: url('{{ asset('admin/img/bg.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
}

.bg-overlay {
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.auth-page-content {
    z-index: 2;
}

.login-form-container {
    background: rgba(255, 255, 255, 0.8); /* White with 80% opacity */
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Optional: shadow for better visibility */
    padding: 2rem;
    border-radius: 8px;
    max-width: 350px; /* Adjust to make the container smaller */
    width: 100%; /* Ensures it is responsive */
}


.logo-img {
    max-width: 241px; /* Adjust size as needed */
    width: 100%;
    height: auto;
    margin-bottom: 1rem; /* Space between logo and form */
}

.form-control-sm {
    padding: 0.5rem 0.75rem; /* Smaller input padding */
    font-size: 0.875rem; /* Smaller font size */
}

/* Container for label and input field */
.form-group {
    display: flex;
    flex-direction: column; /* Aligns label and input field vertically */
    gap: 0.5rem; /* Spacing between label and input field */
}

/* Style for the label */
.form-label {
    color: #000; /* Label color */
    margin-bottom: 0; /* Remove bottom margin */
    font-size: 0.875rem; /* Adjust font size */
}

/* Style for the input field */
.form-control.form-control-sm {
    width: 225%;
    border-radius: 0.375rem; /* Match Bootstrap border radius */
    height: calc(2.25rem + 2px); /* Adjust height */
    padding: 0.5rem; /* Padding inside input */
    font-size: 0.875rem; /* Font size */
    box-sizing: border-box; /* Ensure padding and border are included in the width */
}

/* Ensures label floats correctly when input is filled or focused */
.form-floating {
    position: relative; /* Positioning context for label */
}

.form-floating > .form-label {
    position: absolute;
    top: 0.75rem;
    left: 0.75rem;
    transition: all 0.2s ease-in-out;
    pointer-events: none; /* Prevents label from capturing clicks */
}

.form-floating > .form-control:focus ~ .form-label,
.form-floating > .form-control:not(:placeholder-shown) ~ .form-label {
    top: -0.5rem;
    left: 0.75rem;
    font-size: 0.75rem;
    color: #000; /* Ensure label color remains consistent */
}


    </style>

</head>

<body>
        <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-end align-items-center min-vh-100">
            <div class="bg-overlay"></div>
            <div class="auth-page-content overflow-hidden pt-lg-5">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-5 col-md-8">
                            <div class="login-form-container text-center">
                                <img src="{{ asset('admin/img/logo.png') }}" alt="Logo" class="logo-img mb-4">
                                <form id="loginForm">
                                    @csrf
                                    <div class="container mt-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <div class="form-group d-flex align-items-start">
                                                        <label for="username" class="form-label">Username</label>
                                                        <div class="flex-grow-2">
                                                            <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Enter username">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <div class="form-group d-flex align-items-start">
                                                        <label class="form-label" for="password-input">Password</label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                                            <input type="password" class="form-control form-control-sm pe-5 password-input" placeholder="Enter password" id="password" name="password">
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100" type="submit" id="loginForm_submit">Sign In</button>
                                    </div>
                                </form>
                                {{-- <div class="mt-4 text-center">
                                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline">Signup</a></p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/plugins.js') }}"></script> --}}
    <script src="{{ asset('admin/js/pages/password-addon.init.js') }}"></script>
</body>

<script>
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        $("#loginForm_submit").prop('disabled', true);
        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('signin') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                if (!data.error && !data.error2) {
                    window.location.href = '{{ route('dashboard') }}';
                } else {
                    if (data.error2) {
                        swal("Error!", data.error2, "error");
                        $("#loginForm_submit").prop('disabled', false);
                    } else {
                        $("#loginForm_submit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(data.error);
                    }
                }
            },
            error: function(error) {
                $("#loginForm_submit").prop('disabled', false);
                swal("Error occured!", "Something went wrong please try again", "error");
            },
        });

        function resetErrors() {
            var form = document.getElementById('loginForm');
            var data = new FormData(form);
            for (var [key, value] of data) {
                console.log(key, value)
                $('.' + key + '_err').text('');
                $('#' + key).removeClass('is-invalid');
                $('#' + key).addClass('is-valid');
            }
        }

        function printErrMsg(msg) {
            $.each(msg, function(key, value) {
                console.log(key);
                $('.' + key + '_err').text(value);
                $('#' + key).addClass('is-invalid');
            });
        }

    });
</script>


</html>
