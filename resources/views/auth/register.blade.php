@extends('layouts.appAuth')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100 gx-0">

        <div class="col-12 col-md-5 col-lg-4">
            <div class="card card-shadow border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('NewRegister') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-6">
                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="fw-bold mb-2">Sign Up</h3>
                                </div>
                            </div>
                            <div class="col-12">
                                <img src="{{ asset('profile/profile.png') }}"
                                    id="preview" class="img-thumbnail">
                                <form method="post" id="image-form">
                                    <input type="file" name="profile" class="file" accept="image/*" hidden>


                                    <center><button type="button" class="browse btn btn-primary mt-3">Browse profile
                                            picture...</button> </center>
                                </form>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="signup-name" placeholder="Name"
                                        name="name" required>
                                    <label for="signup-name">Name</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                        required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="tel" placeholder="phone" name="tel"
                                        required>
                                    <label for="email">phone </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" required
                                        placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                            </div>

                            {{-- <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required placeholder="Password Confirma">
                                    <label for="password">Password</label>
                                </div>
                            </div> --}}

                            <div class="col-12">
                                <button class="btn btn-block btn-lg btn-primary w-100" type="submit">Create
                                    Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Text -->
            <div class="text-center mt-8">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>

        </div>

    </div> <!-- / .row -->
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).on("click", ".browse", function () {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

</script>
@endsection
