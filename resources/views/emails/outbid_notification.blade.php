<!DOCTYPE html>
<html>
<head>
    <title>You have been outbid</title>
</head>
<body>
    <h1>Hello {{ $details['name'] }},</h1>
    <p>You have been outbid on the product {{ $details['product_name'] }}.</p>
    <p>New bid placed by: {{ $details['new_bidder'] }}</p>
    <p>New bid amount: {{ $details['new_bid'] }}</p>
    <p>Thank you for participating in the auction!</p>
</body>
</html>
