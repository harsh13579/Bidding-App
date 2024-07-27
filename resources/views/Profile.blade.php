<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="assets/images/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">     
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/Homepage_Navbar.css">
</head>
<body>
@foreach($users as $user)
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
                            <li><a class="dropdown-item" href="Auctions">Auctions</a></li>
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
   
    <div class="profile-container">
        <div class="details">
            <h1 class="heading font">YOUR DETAILS</h1>
            
            <table class="table table-striped-columns table-bordered">
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td>{{$user->firstname}}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{{$user->lastname}}</td>
                    </tr>
                    <tr>
                        <td>E-Mail Address</td>
                        <td>{{$user->email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="forms">
            <div class="form-text">
                <h1 class="heading font">UPDATE YOUR PROFILE</h1>
                @if(Session::get('success'))
                    <span class="text-safe">{{ Session::get('success') }}</span>
                @endif
            </div>
            <div class="form-container">
                <form method="post" action="/change-profile_pic" id="signup" enctype="multipart/form-data">
                    @csrf
                    <div class="profile">
                        <div class="circle">
                            <img class="profile-pic upload-button" src="storage/Profile_Pics/{{$user->profile_pic}}">
                        </div>
                        <div class="p-image">
                            <input class="file-upload" type="file" name="profile_pic" accept="image/*"/>
                        </div>
                    </div>
                    <div class="form-group button">
                        <input class="submit-btn" type="submit" id="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="form-container">
                <h3 class="font font1">Password</h3>
                <form method="post" action="change-password" id="signup">
                    @csrf
                    <div class="form-group">
                        <label class="labels" for="currpass" class="font">Current Password</label>
                        <input class="inputs" type="text" name="curr_pass" id="currpass" placeholder="Enter Current Password" required>
                        @if($errors->has('curr_pass'))
                            <span class="text-danger">{{ $errors->first('curr_pass') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="labels" for="newpass" class="font">New Password</label>
                        <input class="inputs" type="password" name="new_pass" id="newpass" placeholder="Enter New Password" required>
                        @if($errors->has('new_pass'))
                            <span class="text-danger">{{ $errors->first('new_pass') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="labels" for="password" class="font">Confirm Password</label>
                        <input class="inputs" type="password" id="password" name="confirmpass" placeholder="Enter Password Again" required>
                        @if($errors->has('confirmpass'))
                            <span class="text-danger">{{ $errors->first('confirmpass') }}</span>
                        @endif
                    </div>
                    <div class="form-group button">
                        <input class="submit-btn" type="submit" id="submit" value="Submit">
                    </div>
                </form>
            </div>


            <div class="form-container">
                <h3 class="font font1">Name</h3>
                <form method="post" action="change-roomno" id="signup">
                    @csrf
                    <div class="form-group">
                        <label class="labels" for="firstname" class="font">First Name</label>
                        <input class="inputs" type="text" name="new_firstname" id="fname" placeholder="Enter First Name" required>
                        @if($errors->has('new_roomno'))
                            <span class="text-danger">{{ $errors->first('new_roomno') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="labels" for="lastname" class="font">Last Name</label>
                        <input class="inputs" type="text" name="new_lastname" id="lname" placeholder="Enter Last Name" required>
                        @if($errors->has('new_roomno'))
                            <span class="text-danger">{{ $errors->first('new_roomno') }}</span>
                        @endif
                    </div>
                    <div class="form-group button">
                        <input class="submit-btn" type="submit" id="submit" value="Submit">
                    </div>
                </form>
            </div>

        </div>
    </div>
    @endforeach
    <div id="confirmationPopup" class="popup">
        <p>Are you sure you want to update the changes?</p>
        <button class="yes-button" id="confirmYes">Yes</button>
        <button class="no-button" id="confirmNo">No</button>
    </div>

    <script src="assets/js/change_profilepic.js"></script>

    <script>
        document.getElementById('logout').addEventListener('click', function() {
        // Make an AJAX Request to trigger the Logout function
        fetch('/StudentLogout', { method: 'GET' })
        .then(response => {
                if (response.ok) {
                    // If logout Successful, redirect to home page
                    window.location.reload();
                    window.location.href = '/';
                } else {
                    // If logout failed, handle error
                    console.error('Logout Failed');
                }
            })
        .catch(error => {
                console.error('Error during logout', error);
            });
        });
    </script>
</body>
</html>
