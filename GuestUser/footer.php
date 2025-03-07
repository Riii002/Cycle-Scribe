<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .footer {
            text-align: center;
            padding: 20px;
            /* background-color: var(--color-grey) !important; */
            color: #fff;
        }

        .container {
            display: flex;
            justify-content: center; 
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
            background-color: var(--color-grey) !important;
        }

        .column {
            display: flex;
            flex-direction: column;
            margin: 10px;
            flex: 1 1 150px; 
            text-align: center; 
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .link {
            color: #fff;
            text-decoration: none;
            margin-bottom: 5px;
        }

        .logo {
            display: flex;
            justify-content: center; 
            margin-top: 10px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
        }

        .social-media {
            display: flex;
            justify-content: center; 
            margin-top: 10px;
        }

        .social-media-icon {
            margin-left: 10px;
        }

    </style>
</head>
<body>
    <footer class="footer" id="page-footer">
        <div class="container">
            <div class="column">
                <div class="title">Company</div>
                <a href="aboutus.php" class="link">About Us</a>
                <a href="news.php" class="link">News</a>
                
            </div>
            <div class="column">
                <div class="title">Help</div>
                <a href="contactus.php" class="link">Contact Us</a>
                <a href="privacyPolicy.php" class="link">Privacy Policy</a>
            </div>
            <div class="logo">
                <div class="logo-text">Cycle Scribe</div>
            </div>
            <div class="social-media">
                <a href="https://www.instagram.com/riya_l_002/" class="social-media-icon">
                    <i class="bi bi-instagram text-white"></i>    
                </a>
                <a href="https://www.facebook.com/login" class="social-media-icon">
                    <i class="bi bi-facebook text-white"></i>    
                </a>
                <a href="https://x.com/i/flow/login" class="social-media-icon">
                    <i class="bi bi-twitter-x text-white"></i>    
                </a>
                <a href="LinkedIn" class="social-media-icon">
                    <i class="bi bi-linkedin text-white"></i>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
