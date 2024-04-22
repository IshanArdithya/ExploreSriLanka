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
            font-size: 1.9rem;
            color: #fffcfc;
            margin-bottom: 10px;
            text-align: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        h2 {
            font-size: 1.8rem;
            color: #58cbdd;
            margin-bottom: 10px;
            margin-top: 50px;
            text-align: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        h3 {
            font-size: 0.6rem;
            color: #c9bdbd;
            margin-bottom: 10px;
            margin-top: 10px;
            text-align: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        p {
            color: #dff3f6;
            font-size: 1.3rem;
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
            max-width: 600px;
            max-height: 350px;
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
            <img src="https://i.postimg.cc/4N1H2yQy/Travel1-1.png">
            <h1>Thanks for The Registration!<br>{{hotel_name}}</h1>
            <p>Congrats – you've just stepped into the Explore Sri Lanka travel community!<br> You will receive an email once your account is approved by our staff.</p>

            <a href="{{web_home}}" class="btn" style="color: #fff; text-align: center;">Get Started</a>
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
