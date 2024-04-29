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
        h1 {
            font-size: 1.3rem;
            color: #58cbdd;
            margin-bottom: 10px;
            text-align: center;
        }

        h2 {
            font-size: 1.3rem;
            color: #fffcfc;
            margin-bottom: 10px;
            margin-top: 50px;
            text-align: center;
        }

        h3 {
            font-size: 0.6rem;
            color: #c9bdbd;
            margin-bottom: 10px;
            margin-top: 10px;
            text-align: center;
        }

        p {
            color: #dff3f6;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            width: 120px;
            padding: 15px 20px;
            background-color: #5995fd;
            border: none;
            outline: none;
            height: 20px;
            border-radius: 49px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px auto;
            cursor: pointer;
            transition: 0.5s;
            text-decoration: none;
            display: block; 
        }

        .btn:hover {
            background-color: #083076;
        }

        .pic1 img {
            max-width: 300px;
            max-height: 100px;
            margin-left: 152px;
            margin-right: 150px;
            padding: 5px;
            overflow: hidden;
            border-radius: 20px;
        }

        .pic2 img {
            max-width: 150px;
            max-height: 350px;
            overflow: hidden;
            border-radius: 20px;
        }
        
        .footer {
            margin-top: 50px;
            text-align: center;
        }

        .footer .pic1 img {
            width: 50%; 
            height: 50%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="pic1">
            <img src="https://i.postimg.cc/ZRW5KXhR/logo.png">
            <h1> Dear {{hotel_name}}</h1>
            <h2>Congratulations! Your hotel has been approved by ExploreSriLanka! 🎉</br></h2>
            <p>You are now part of our vibrant travel community, connecting with eager adventurers seeking the best experiences in Sri Lanka.<br>
            </br>Feel free to request tours packages or customer bookings through your dashboard.<br></p>

            <h1>Welcome aboard,<br>ExploreSriLanka Team</h1>
                
        </div>

        <div class="footer">
            <div class="pic2">
                <img src="https://i.postimg.cc/ZRW5KXhR/logo.png">
                <h3>Please do not reply directly to this email. This was sent from an address that cannot accept responses. For questions or assistance, visit our Help Centre.<br>
                    <br>
                    © 2024 ExploreSriLanka. All rights reserved.</h2>
            </div>
        </div>
    </div>
</body>
</html>
