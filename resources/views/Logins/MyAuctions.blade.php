<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Auctions</title>
    <link rel="stylesheet" href="assets/css/Home.css">
    <link rel="stylesheet" href="assets/css/Homepage_Navbar.css">
    <link rel="icon" href="assets/images/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Custom CSS for modal styling */
        .modal-header {
            background-color: #f7f7f7;
        }

        .modal-footer {
            border-top: none;
        }

        .close {
            font-size: 1.5rem;
            color: #000;
        }

        .form-label {
            font-weight: 500;
        }

        .add-product-btn {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
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
                <ul class="navbar-nav ms-auto" style="display: flex; gap: 7px; align-items: baseline;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font" href="#" id="auctionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Auctions
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="auctionsDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
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
                            <img src="assets/images/icon.png" class="icon1" alt="icon">Language
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Spanish</a></li>
                            <li><a class="dropdown-item" href="#">French</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        @foreach($user as $user)
                        <a class="nav-link" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="storage/Profile_Pics/{{$user->profile_pic}}" class="icon" alt="icon" height="50px">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li>
                                <div class="info">
                                    <img src="storage/Profile_Pics/{{$user->profile_pic}}" class="icon" alt="icon" height="50px">
                                    <div class="text">
                                        <p class="name">{{$user->firstname}} {{$user->lastname}}</p>
                                        <p class="email">{{$user->email}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </li>
                            <li><a class="dropdown-item" href="UserProfile">View Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">My Bids</a></li>
                            <li><a class="dropdown-item" href="#">Credit Cards</a></li>
                            <li><a class="dropdown-item" href="MyAuctions">My Auctions</a></li>
                            <li><a class="dropdown-item" href="#">Invite Colleagues</a></li>
                            <li><a class="dropdown-item" href="#">Notifications</a></li>
                            <li><a class="dropdown-item" href="#">Community</a></li>
                            <li><a class="dropdown-item" href="#">Support</a></li>
                            <li><a class="dropdown-item" href="#">API</a></li>
                            <li><a class="dropdown-item" href="Logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Add Product Button -->
        <div class="add-product-btn">
            <button id="addProductBtn" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#productModal" style="margin-top:100px">Add Product</button>
        </div>
    </div>
    @if(Session::get('success'))
        <span class="text-safe">{{ Session::get('success') }}</span>
    @endif
        <!-- Products Section -->
        <div class="products">
            @foreach($products as $prod)
            <div class="product">
                <div class="prod_image">
                    <img src="storage/Products_Pics/{{$prod->photo}}" alt="prod">
                </div>
                <div class="description">
                    <div class="live">Live Auction</div>
                    <div class="prod_name">{{$prod->prod_name}}</div>
                    <div class="bid">
                        <div class="bidtext">Minimum Bid</div>
                        <div class="bidval">${{$prod->minbid}}</div>
                    </div>
                    <div class="bid">
                        <div class="bidtext">Current Bid</div>
                        <div class="bidval">${{$prod->curbid}}</div>
                    </div>
                        <div class="aucend">Ends at : {{$prod->enddate}}</div>
                </div>
                <button class="submit">Bid Now ></button>
            </div>
            @endforeach
        </div>
    

    <!-- Add Product Popup Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm" method="POST" action="/AddProduct" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="prod_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="photo" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="minBid" class="form-label">Minimum Bid ($)</label>
                            <input type="number" class="form-control" id="minBid" name="minbid" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="datetime-local" class="form-control" id="endDate" name="enddate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // You can handle form submissions here
        // document.getElementById('productForm').addEventListener('submit', function(event) {
        //     event.preventDefault();
        //     // Add your form submission logic here
        //     alert('Product added successfully!');
        //     // Hide the modal after submission
        //     var modal = bootstrap.Modal.getInstance(document.getElementById('productModal'));
        //     modal.hide();
        // });
    </script>
</body>

</html>
