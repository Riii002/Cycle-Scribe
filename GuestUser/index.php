<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Cycle Scribe</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root 
        {
            --color-grey: #121212ee; 
            --color-green: #1aa84c; 
            --color-darkgreen: #0b5525; 
            --color-black: #000000;
            --color-white: #FFFFFF;
        }
        body 
        {
            /* background-color: var(--color-grey) !important; */
            margin: 0;
            min-height: 100vh;
            color: var(--color-white);
            font-family: 'Montserrat' !important; /*Lato*/
        }
        .container
        {
            /* background-color: var(--color-grey) !important; */

        }
        .service
        {
            height: 400px;
            padding: auto;
            text-align: justify;
            background-color: var(--color-black);
        }

        p
        {
            text-align: center;
            padding: 10px;
        }

        .animated-img 
        {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .animated-img:hover 
        {
            transform: scale(1.05); 
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.8); 
        }

        
        .animated-text 
        {
            opacity: 0;
            transform: translateY(20px); 
            animation: fadeInUp 1.5s ease-in-out forwards;
            animation-delay: 0.5s; 
        }

        @keyframes fadeInUp 
        {
            0% {
                opacity: 0;
                transform: translateY(20px); 
            }
            100% {
                opacity: 1;
                transform: translateY(0); 
            }
        }

        .animated-text:hover h2 
        {
            color: var(--color-green); 
            transition: color 0.3s ease;
        }

        .animated-text:hover p 
        {
            color: var(--color-white); 
            transition: color 0.3s ease;
        }
        .btn
        {
            background-color: var(--color-green);
        }
        .btn:hover 
        {
            background-color: #169141; 
        }
    </style>
</head>
<body>    
    <?php include "header.php"; ?>
    
    <div class="main-content" style="background-color: var(--color-grey);">
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between image-section text-center mb-4 mt-4">
                <img src="image/sus.jpg" width="450px" alt="Main Image" class="img-fluid animated-img">
            </div>
            <div class="text-section text-center mb-4 animated-text w-50">
                <h2 class="text-white">Sustainability & Circular Economy</h2>
                <p class="text-white-50">The Cycle Scribe, with its acute understanding of waste, has developed sustainable strategies and techniques to manage waste efficiently and cost-effectively. We contribute to closing the loop of the product lifecycle and attaining a circular economy while infusing sustainability into lives.</p>
            </div>
        </div>


        <section class="services" style="background-color: var(--color-grey);">
        <div class="row justify-content-center">
            <div class="col-4">
                <h1 class="text-white">Our Services</h1>
            </div>
        </div>
        <!-- <div class="row justify-content-center">
            <div class="col-3">
                <button class="btn btn-success w-100">All services</button>
            </div>
            <div class="col-3">
                <button class="btn btn-secondary w-100">For Individuals</button>
            </div>
            <div class="col-3">
                <button class="btn btn-secondary w-100">For Organisations</button>
            </div>
        </div> -->
        
        <div class="row">
            <div class="col-4">
                <div class="service text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-mobile-alt fa-3x text-success"></i>
                    </div>
                    <h2 class="text-white">Sustainability Consulting</h2>
                    <p class="text-white-50">We provide expert guidance to help organizations identify sustainable practices tailored to their needs. Our consultants assess current operations and recommend strategies that minimize environmental impact while enhancing efficiency.</p>
                </div>
            </div>
            <div class="col-4">
                <div class="service text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-building fa-3x text-success"></i>
                    </div>
                    <h2 class="text-white">Eco-Friendly Product Development</h2>
                    <p class="text-white-50">Our team collaborates with clients to create innovative, eco-friendly products. From concept to execution, we ensure that every stage aligns with sustainability goals, using materials and processes that are kind to the planet.</p>
                </div>
            </div>
            <div class="col-4">
                <div class="service text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-trash-alt fa-3x text-success"></i>
                    </div>
                    <h2 class="text-white">Green Certification Assistance</h2>
                    <p class="text-white-50">Navigating the certification process can be complex. We simplify it by offering step-by-step support for obtaining green certifications, helping businesses showcase their commitment to sustainability.</p>
                </div>
            </div>
            <div class="col-4">
                <div class="service text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-users fa-3x text-success"></i>
                    </div>
                    <h2 class="text-white">Training and Workshops</h2>
                    <p class="text-white-50">We conduct engaging training sessions and workshops that empower teams to embrace sustainable practices. Our hands-on approach ensures participants gain practical skills and knowledge to implement sustainable solutions effectively.</p>
                </div>
            </div>
            <div class="col-4">
                <div class="service text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-people-arrows fa-3x text-success"></i>
                    </div>
                    <h2 class="text-white">Sustainable Supply Chain Management</h2>
                    <p class="text-white-50">We work with businesses to optimize their supply chains, ensuring that sustainability is woven into every step. Our services include vendor assessments, sourcing sustainable materials, and implementing ethical practices.</p>
                </div>
            </div>
            <div class="col-4">
                <div class="service text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-comments fa-3x text-success"></i>
                    </div>
                    <h2 class="text-white">Community Engagement Programs</h2>
                    <p class="text-white-50">We help organizations build strong relationships with their communities through sustainability initiatives. Our programs foster collaboration and promote environmental stewardship, enhancing brand reputation.</p>
                </div>
            </div>
        </div>
        </section>
    </div>

    <?php include "footer.php"; ?>  
</body>
</html>
