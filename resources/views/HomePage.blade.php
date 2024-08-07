<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="assets/css/Home.css">
    <link rel="stylesheet" href="assets/css/Homepage_Navbar.css">
    <link rel="icon" href="assets/images/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @php
        $user = session('user');
    @endphp
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid custom-container">
            <div class="nav-items">
                <img class="logo" src="assets/images/Logo.png" alt="logo">
                <h1 class="nav-text font">Genix Auctions</h1>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse custom-nav-items" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto" style="display: flex;gap: 7px;align-items: baseline;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font" href="#" id="auctionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Auctions
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="auctionsDropdown">
                            @if($user)
                                <li><a class="dropdown-item" href="Auctions">Auctions</a></li>
                            @else 
                                <li><a class="dropdown-item" href="LoginView">Auctions</a></li>
                            @endif
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font" href="#" id="biddingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Biddings
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="biddingsDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown font">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/images/icon.png" class="icon1" alt="icon"> Language
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Spanish</a></li>
                            <li><a class="dropdown-item" href="#">French</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        @if($user)
                            <a class="nav-link btn-outline-primary login-btn" href="Auctions" style="font-family: 'Manrope'; color:rgba(29, 78, 216, 1);" id="login">Login</a>
                        @else
                            <a class="nav-link btn-outline-primary login-btn" style="font-family: 'Manrope'; color:rgba(29, 78, 216, 1);" id="login">Login</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="btn-primary get-started-btn font" style="font-family: 'Manrope';" id="signup">Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="homepage_image">
        <img src="assets/images/HomePage_Image.png" alt="home page image" class="homepage_img">
    </div>
    <div class="products">
        <div class="heading_">
            <h2 class="font" style="font-weight:600;">Explore <span class="heading-color">Auctions</span></h2>
        </div>
        @foreach($products as $prod)
            <div class="product" id="product-{{ $prod->id }}">
                <div class="prod_image">
                    <img src="storage/Products_Pics/{{$prod->photo}}" alt="prod">
                </div>
                <div class="description">
                    <div class="live" id="status-{{ $prod->id }}">Live Auction</div>
                    <div class="prod_name">{{$prod->prod_name}}</div>
                    <div class="bid">
                        <div class="bidtext">Minimum Bid</div>
                        <div class="bidval">${{$prod->minbid}}</div>
                    </div>
                    <div class="bid">
                        <div class="bidtext">Current Bid</div>
                        <div class="bidval">${{$prod->curbid}}</div>
                    </div>
                    <div class="aucend">
                        Ends in: <span id="countdown-{{ $prod->id }}"></span>
                    </div>
                </div>
                @if($user)
                    <button class="submit" id="submit-{{ $prod->id }}" onclick="window.location.href='Auctions'">Bid Now ></button>
                @else
                    <button class="submit" id="submit-{{ $prod->id }}" onclick="window.location.href='LoginView'">Bid Now ></button>
                @endif
            </div>
        @endforeach
    </div>
    <script>
        @foreach($products as $prod)
        (function() {
            var endDate = new Date("{{ $prod->enddate }}").getTime();
            var countdownId = "countdown-{{ $prod->id }}";
            var statusId = "status-{{ $prod->id }}";
            var productId = "product-{{ $prod->id }}";
            var submitButtonId = "submit-{{ $prod->id }}";
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = endDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById(countdownId).innerHTML = days + "d " + hours + "h " + minutes + "m "+ seconds + "s";
                
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(countdownId).innerHTML = "EXPIRED";
                    var statusDiv = document.getElementById(statusId);
                    statusDiv.innerHTML = "Sold";
                    statusDiv.style.backgroundColor = "red";

                    var productElement = document.getElementById(productId);
                    var parent = productElement.parentNode;
                    productElement.style.background="#f2f2f0";
                    parent.removeChild(productElement);
                    parent.appendChild(productElement);

                    var submitButton = document.getElementById(submitButtonId);
                    submitButton.disabled = true;
                    submitButton.style.background = "gray";
                    submitButton.style.cursor = "not-allowed";
                }
            }, 1000);
        })();
        @endforeach
    </script>
    <script src="assets/js/signup_login.js"></script>
</body>
</html>