<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auctions</title>
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/Home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="user">

    </div>
    <div class="products">
        <div class="product">
            <div class="prod_image">
                <img src="storage/Products/Image.png" alt="prod">
            </div>
            <div class="description">
                <div class="live">Live Auction</div>
                <div class="prod_name">Sony Black Headphones</div>
                <div class="bid">
                    <div class="bidtext">Minimum Bid</div>
                    <div class="bidval">$100</div>
                </div>
                <div class="bid">
                    <div class="bidtext">Current Bid</div>
                    <div class="bidval">$100</div>
                </div>
                    <div class="aucend">Ends in : 12:10:00</div>
            </div>
            <button class="submit">Bid Now ></button>
        </div>
    </div>


    <script>
        fetch('/UserSession').then(response => response.text()).then(data => {
            document.querySelector('.user').innerHTML = '<span class="welcome">Welcome</span>, ' + data  + '!';
        });
    </script>
</body>
</html>