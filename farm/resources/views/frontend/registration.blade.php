@extends('layouts.master_home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center p-5">Login/Registration Page</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-6">

            @if(session('warning_login'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('warning_login') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form method="POST" action="{{ route('customer.login') }}">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control" name="user_email" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="user_pass" placeholder="Your Password" required>

                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger btn-sm">Login</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('warn'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('warn') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="user_name" placeholder="Full Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="user_email" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" name="user_phone" onkeyup="validatePhoneNumber(this.value)" placeholder="Phone Number" required>
                    <b><span class="p-2" id="validate_phone"></span></b>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="txtPassword" onkeyup="CheckPasswordStrength(this.value)" name="user_pass" placeholder="Password" required>
                    <b><span class="p-2" id="password_strength"></span></b>
                </div>
                <div class="md-3">
                    <select name="user_location" class="form-select mt-2 mb-2" aria-label="Default select example" required>
                        <option selected readonly value="">Your Location</option>
                        <option value="ctg">CTG</option>
                        <option value="dhk">DHK</option>
                        <option value="kulna">Kulna</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button disabled id="btn_submit" type="submit" class="btn btn-danger btn-sm">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>


<script type="text/javascript">
    function CheckPasswordStrength(password) {

        var password_strength = document.getElementById("password_strength");
        var btn_submit = document.getElementById("btn_submit");

        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }


        if (password.length > 8) {
            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.

            var passed = 0;

            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test(password)) {
                    passed++;
                }
            }

            //Validate for length of Password.
            if (passed > 2 && password.length > 8) {
                passed++;
            }

            //Display status.
            var color = "";
            var strength = "";
            switch (passed) {
                case 0:
                case 1:
                    strength = "Weak";
                    color = "red";
                    break;
                case 2:
                    strength = "Good";
                    color = "darkorange";
                    break;
                case 3:
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
                case 5:
                    strength = "Very Strong";
                    color = "darkgreen";
                    break;
            }
            password_strength.innerHTML = strength;
            password_strength.style.color = color;

            function checkStrength() {
                if (strength == "Good" || strength == "Strong" || strength == "Very Strong") {
                    btn_submit.removeAttribute('disabled');
                }

                if (strength == "Weak") {
                    btn_submit.setAttribute('disabled', 'disabled');
                }
            }

            // call
            checkStrength()
        }


    }

    function validatePhoneNumber(input_str) {

        // var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
        var re = /^(?:\+88|88)?(01[3-9]\d{8})$/;

        // return re.test(input_str);
        var validate_phone = document.getElementById("validate_phone");

        if (!re.test(input_str)) {
            validate_phone.innerHTML = "Pls Put Only Number.";
        }

        if (re.test(input_str)) {
            validate_phone.innerHTML = "";
        }
    }
</script>



@endsection