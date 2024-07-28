<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description</title>
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Homepage_Navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product_description.css') }}">
    <link rel="icon" href="{{ asset('assets/images/Logo.png') }}" type="image/x-icon">
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
                <img class="logo" src="{{ asset('assets/images/Logo.png') }}" alt="logo">
                <h1 class="nav-text font">Genix Auctions</h1>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse custom-nav-items" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto" style="display: flex; gap: 7px; align-items: baseline;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font" href="#" id="auctionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Auctions
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="auctionsDropdown">
                            <li><a class="dropdown-item" href="{{ route('Auctions') }}">Auctions</a></li>
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
                            <img src="{{ asset('assets/images/icon.png') }}" class="icon1" alt="icon">Language
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Spanish</a></li>
                            <li><a class="dropdown-item" href="#">French</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('storage/Profile_Pics/' . $user->profile_pic) }}" class="icon" alt="icon" height="50px">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li>
                                <div class="info">
                                    <img src="{{ asset('storage/Profile_Pics/' . $user->profile_pic) }}" class="icon" alt="icon" height="50px">
                                    <div class="text">
                                        <p class="name">{{ $user->firstname }} {{ $user->lastname }}</p>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('UserProfile') }}">View Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">My Bids</a></li>
                            <li><a class="dropdown-item" href="#">Credit Cards</a></li>
                            <li><a class="dropdown-item" href="{{ route('MyAuctions') }}">My Auctions</a></li>
                            <li><a class="dropdown-item" href="#">Invite Colleagues</a></li>
                            <li><a class="dropdown-item" href="#">Notifications</a></li>
                            <li><a class="dropdown-item" href="#">Community</a></li>
                            <li><a class="dropdown-item" href="#">Support</a></li>
                            <li><a class="dropdown-item" href="#">API</a></li>
                            <li><a class="dropdown-item" href="{{ route('Logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-container">
        @foreach($product as $prod)
            <div class="product">
                <div class="prod_image">
                    <img src="{{ asset('storage/Products_Pics/' . $prod->photo) }}" alt="prod">
                </div>
                <div class="description">
                    <div class="live" id="status-{{ $prod->id }}">Live Auction</div>
                    <a>{{ $prod->prod_name }}</a>
                    <div class="bid">
                        <div class="bidtext">Minimum Bid</div>
                        <div class="bidval">${{ $prod->minbid }}</div>
                    </div>
                    <div class="bid">
                        <div class="bidtext">Current Bid</div>
                        <div class="bidval">${{ $prod->curbid }}</div>
                    </div>
                    <div class="aucend">
                        Ends in: <span id="countdown-{{ $prod->id }}"></span>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="review">
            <div class="prod_description">
                <h4 class="font font1">Description</h4>
                {{ $prod->description }}
            </div>
            <div class="prod_reviews">
                <h4 class="font font1">Reviews</h4>
                <div class="cus-btn">
                    <button type="button" class="btn btn-primary font font1 cus-btn" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        Add Review
                    </button>
                </div>
                

                <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reviewModalLabel">Add Review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="/AddReview" id="review">
                                    @csrf
                                    <input class="inputs" type="hidden" name="productId" id="fname" value="{{$prod->id}}">
                                    @if(Session::get('success'))
                                        <span class="text-safe">{{ Session::get('success') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label class="labels" for="review" class="font">Your Review</label>
                                        <input class="inputs" type="text" name="review" id="fname" placeholder="Enter Review" required>
                                        @if($errors->has('review'))
                                            <span class="text-danger">{{ $errors->first('review') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="labels" for="stars" class="font">Review Rating</label>
                                        <div class="star-rating">
                                            <input type="hidden" name="rating" id="rating" required>
                                            <span class="star" data-value="1">&#9733;</span>
                                            <span class="star" data-value="2">&#9733;</span>
                                            <span class="star" data-value="3">&#9733;</span>
                                            <span class="star" data-value="4">&#9733;</span>
                                            <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                        @if($errors->has('rating'))
                                            <span class="text-danger">{{ $errors->first('rating') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group button">
                                        <input class="submit-btn" type="submit" id="submit" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($reviewTable as $review)
                    <div class="review-section">
                        <div class="profile_pic">
                            <img src="{{ asset('storage/Profile_Pics/' . $review->profile_pic) }}" class="icon" alt="icon" height="50px">
                        </div>
                        <div class="review-main">
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->stars)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="review-text">
                                <p class="font font1">{{$review->review}}</p>
                            </div>
                            <div class="user-det">
                                <p class="font font1">{{$review->name}}<span class="date-of-review"><br>
                                {{ \Carbon\Carbon::parse($review->date)->format('F j, Y') }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bids scrollable">
            <h4 class="font font1">Bids</h4>
            @foreach ($bidTable as $bid)
                <div class="bid font font1">
                    •{{$bid->name}} bids ${{$bid->amount}}
                </div>
            @endforeach
        </div>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;
            updateStars(value);
        });

        star.addEventListener('mouseover', function () {
            const value = this.getAttribute('data-value');
            updateStars(value, true);
        });

        star.addEventListener('mouseout', function () {
            updateStars(ratingInput.value);
        });
    });

    function updateStars(value, hover = false) {
        stars.forEach(star => {
            const starValue = star.getAttribute('data-value');
            if (hover) {
                if (starValue <= value) {
                    star.classList.add('hovered');
                } else {
                    star.classList.remove('hovered');
                }
            } else {
                star.classList.remove('hovered');
                if (starValue <= value) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            }
        });
    }
    });
</script>
<script>
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
    </script>


</body>
</html>
