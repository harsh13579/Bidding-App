<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="icon" href="assets/images/Logo.png" type="image/x-icon">
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
            <h1 class="nav-text">Genix Auctions</h1>
          </div>
            
        </div>
    </nav>
    <div class="success-container">
        <h2>Uncover Deals, Unleash Excitement:<span style="color:rgba(35, 91, 219, 1);"> Dive into Our Auctions Today!</span></h2>
        <img src="assets/images/SignUpSuccess.png" alt="Signup Successful" class="signupsuccessimg">
        <div class="success_login">
            <button class="form-group button submit-btn" id="login" style="width:200px;">Login now</button>
        </div>
    </div>
    <script>
        document.getElementById('login').addEventListener('click', function() {
            window.location.href ='{{route('UserLoginView')}}';
        });
    </script>
</body>
</html>