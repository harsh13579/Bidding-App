<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/login_signup.css"> 
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid custom-navbar">
          <div class="nav-items">
            <img class="logo" src="assets/images/Logo.png" alt="logo">
            <h1>Genix Auctions</h1>
          </div>
            
        </div>
    </nav>
    <div class="login-container">
        <div class="form-container">
            <h3 class="heading font">Sign up</h3>
            <p class="headerparagraph">New bidders, as soon as you have submitted your information you will be eligible to bid in the auction.</p>
            <form method="post" action="/signup" id="signup">
                @csrf
                <div class="form-group">
                    <label for="rollno" class="labels font">First Name</label>
                    <input class="inputs" type="text" name="rollno" id="rollno" placeholder="Enter First Name" required>
                    @if($errors->has('rollno'))
                        <span class="text-danger">{{ $errors->first('rollno') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name" class="labels font">Last Name</label>
                    <input class="inputs" type="text" name="name" id="name" placeholder="Enter Last Name" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group" >
                    <label for="email" class="labels font">Email Address</label>
                    <input class="inputs" type="text" name="email" id="email" placeholder="Enter Email Address" required>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group password-container">
                    <label for="password" class="labels font">Password</label>
                    <input class="inputs" type="password" id="password" name="password" placeholder="Enter Password" required>
                    <span class="password-toggle-icon"><i class="fas fa-eye"style="padding-top: 30px"></i></span>
                    @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <label class="checkbox-container">Receive outbid emails
                    <input type="checkbox" id="outbid-checkbox">
                    <span class="checkmark"></span>
                </label>
                <div class="form-group button">
                    <input class="submit-btn" type="submit" id="submit" value="Submit">
                </div>
            </form>
        </div>
        <div class="image-container">
            <img src="assets/images/Signup.png" alt="Sign Up Image" class="image" height="600px" width="800px">
        </div>
    </div>
    <script>
        const passwordField = document.getElementById("password");
        const togglePassword = document.querySelector(".password-toggle-icon i");

        togglePassword.addEventListener("click", function () {
        if (passwordField.type === "password") {
            passwordField.type = "text";
            togglePassword.classList.remove("fa-eye");
            togglePassword.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            togglePassword.classList.remove("fa-eye-slash");
            togglePassword.classList.add("fa-eye");
        }
        });
    </script>
</body>
</html>