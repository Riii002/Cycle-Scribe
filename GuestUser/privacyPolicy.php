<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <style>
        :root 
        {
            --color-grey: #121212ee; 
            --color-green: #1aa84c; 
            --color-darkgreen: #0b5525; 
            --color-black: #000000;
            --color-white: #FFFFFF;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: var(--color-grey);
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            margin-top: 50px;
            width: 100%; 
        }
        .section {
            background-color: var(--color-black);
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            color: var(--color-white);
            width: 100%;
            text-align: left;
            transition: all 0.3s ease-in-out; 
        }

        .section:hover {
            transform: scale(1.05); 
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); 
        }

        .section h2 {
            color: var(--color-white);
            font-size: 24px;
            margin-bottom: 15px;
            transition: all 0.3s ease-in-out; 
        }

        .section h2:hover {
            transform: translateY(-5px); 
        }

        .section p {
            font-size: 16px;
            line-height: 1.6;
            color: var(--color-white);
            transition: all 0.3s ease-in-out; 
        }

        .section p:hover {
            transform: translateY(5px); 
        }

        .section ul {
            padding-left: 20px;
            transition: all 0.3s ease-in-out; 
        }

        .section ul:hover {
            transform: scale(1.03); 
        }

        .section ul li {
            margin-bottom: 10px;
            font-size: 16px;
            transition: all 0.3s ease-in-out; 
        }

        .section ul li:hover {
            transform: translateY(-5px); 
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="container">
        <!-- Introduction Section -->
        <div class="section">
            <h2>Introduction</h2>
            <p>Welcome to our Privacy Policy page. We value the privacy of our users and are committed to protecting their personal information. This policy outlines the types of data we collect, how we use it, and your rights concerning your information.</p>
        </div>

        <!-- Information Collection Section -->
        <div class="section">
            <h2>Information Collection</h2>
            <p>We may collect personal information such as name, address, contact details, and other relevant data when you use our services, interact with our mobile application, website, or contact our customer support team.</p>
            <ul>
                <li>Personal identification information (name, email address, phone number, etc.)</li>
                <li>Usage data including interaction with the website or app</li>
                <li>Geolocation and localization data</li>
                <li>Transaction and payment information</li>
            </ul>
        </div>

        <!-- Use of Information Section -->
        <div class="section">
            <h2>Use of Information</h2>
            <p>We use the personal information collected for the following purposes:</p>
            <ul>
                <li>To provide and improve our services</li>
                <li>To manage user accounts and respond to queries</li>
                <li>To process transactions</li>
                <li>To send notifications, updates, and promotional offers</li>
                <li>To enhance security and prevent fraud</li>
            </ul>
        </div>

        <!-- Sharing and Disclosure of Information Section -->
        <div class="section">
            <h2>Sharing and Disclosure of Information</h2>
            <p>We do not share or disclose your personal information except in the following situations:</p>
            <ul>
                <li>With trusted service providers for business operations (e.g., payment processors)</li>
                <li>To comply with legal obligations or protect against legal liability</li>
                <li>In case of business transfers such as mergers or acquisitions</li>
            </ul>
        </div>

        <!-- Security of Information Section -->
        <div class="section">
            <h2>Security of Information</h2>
            <p>We prioritize the security of your personal information and take necessary steps to protect it against unauthorized access, alteration, or disclosure. While we strive to use commercially acceptable means to protect your data, no method of transmission over the internet is 100% secure.</p>
        </div>

        <!-- User Rights Section -->
        <div class="section">
            <h2>Your Rights</h2>
            <p>You have the right to:</p>
            <ul>
                <li>Access, update, or delete your personal information</li>
                <li>Withdraw consent to data processing</li>
                <li>Request a copy of the data we hold on you</li>
                <li>File a complaint with the appropriate data protection authority</li>
            </ul>
        </div>

        <!-- Changes to the Policy Section -->
        <div class="section">
            <h2>Changes to this Privacy Policy</h2>
            <p>We may update this Privacy Policy from time to time. Any changes will be reflected on this page, and you are encouraged to review it periodically.</p>
        </div>

        <!-- Contact Us Section -->
        <div class="section">
            <h2>Contact Us</h2>
            <p>If you have any questions or concerns about this Privacy Policy or your personal data, please contact us at support@example.com.</p>
        </div>
    </div>


    <?php include "footer.php"; ?>

</body>
</html>
