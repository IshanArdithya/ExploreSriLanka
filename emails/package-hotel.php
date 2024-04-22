<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #232525;
            border-radius: 10px;
            border: 1px solid #b9c9e5;
            overflow: hidden;
        }
        h1, h2, h3, h4, h5 {
            text-align: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            color: #fafafa;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        h1 {
            font-size: 1rem;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 1rem;
            color: #58cbdd;
            margin-top: 50px;
        }
        h3 {
            font-size: 0.8rem;
        }
        h4 {
            font-size: 0.6rem;
            color: #fafafa;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        h5 {
            font-size: 0.8rem;
            color: #a8ddf0;
            margin-top: 10px;
            margin-bottom: 10px;
            background: #353535;
            border: 1px solid #075a6c;
            padding: 10px;
            text-align: center;
            margin: 0 auto;
            max-width: 80%;
            border-radius: 5px;
        }
        p {
            color: #666;
            font-size: 1.3rem;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: center;
        }
        .pic1 img {
            max-width: 60%;
            height: auto;
            padding: 10px;
            margin: 0 auto;
            display: block;
            border-radius: 20px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
        }
        .footer .pic1 img {
            width: 30%;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="pic1">
            <img src="https://i.postimg.cc/xdcXcXvn/logo-no-background-Copy.png">
            <h1>Hello {{hotel_name}},<br>You've received a new room booking from a package!</h1>
            <h2>Booking Details:</h2>
            <h5><br>- Reservation ID: {{reservation_id}}<br>
                <br>- Check-in Date: {{checkin_date}}<br>
				<br>- Check-out Date: {{checkout_date}}<br>
                <br>- Room Number: {{room_number}}<br>
                <br></h5>
            <h3>Please check the account dashboard for more information.
			
			<br><br><br>Regards,<br>The Explore SriLanka Team</h3>

        </div>
        <div class="footer">
            <div class="pic1">
                <img src="https://i.postimg.cc/ZRW5KXhR/logo.png">
                <h4>Please do not reply directly to this email. This was sent from an address that cannot accept responses. For questions or assistance, visit our Help Centre.<br><br>© 2024 ExploreSriLanka. All rights reserved.</h4>
            </div>
        </div>
    </div>
</body>
</html>
