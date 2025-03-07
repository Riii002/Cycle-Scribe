
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            --color-primary: #1DB954; 
            --color-secondary: #191414; 
            --color-background: linear-gradient(135deg, #1DB954, #1ed760); 
            --color-white: #fff;
            --color-black: #000;
            --color-text-light: #f4f4f4;
            --color-text-dark: #191414;
            --color-grey: #121212ee; 
        }

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }

        .header {
            background: var(--color-background);
            padding: 0.8rem 2rem; 
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .header .logo {
            display: flex;
            justify-content: start;
            align-items: center;
            gap: 10px;
        }

        .header .logo img {
            width: 45px; 
            height: 45px;
            border-radius: 20%;
            transition: transform 0.3s ease;
        }

        .header .logo img:hover {
            transform: scale(1.1); 
        }

        .header h1 {
            color: var(--color-white);
            font-size: 1.2rem; 
            margin: 0;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            margin-left: auto;
            margin-right: 10px;
        }

        .nav-link {
            position: relative;
            color: var(--color-white);
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
            font-size: 0.9rem; 
        }

        .nav-link:hover {
            color: var(--color-grey );
            transform: translateY(-2px);
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: var(--color-text-light);
            border-radius: 5px;
            padding: 9px;
            top: 100%;
            left: 0;
            min-width: 100px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .nav-link:hover .dropdown {
            display: block;
        }

        .dropdown ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dropdown li {
            margin: 0;
            padding: 0.5rem 0;
        }

        .dropdown li a {
            text-decoration: none;
            color: var(--color-black);
            display: block;
            transition: background-color 0.3s ease;
            font-size: 0.9rem; 
        }

        .dropdown li a:hover {
            background-color: #e9e9e9;
            color: var(--color-primary);
        }

        .buttons {
            display: flex;
            gap: 1.5rem;
        }

        .button {
            background-color: var(--color-white);
            color: var(--color-secondary);
            padding: 6px 15px; 
            border-radius: 20px; 
            border: none;
            width: 150px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            font-size: 0.9rem; 
        }

        .button:hover {
            background-color: var(--color-grey);
            color: var(--color-white);
            transform: translateY(-3px);
            cursor: pointer;
        }

        
        @media screen and (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .logo {
                margin-bottom: 1rem;
            }

            .nav-links {
                flex-direction: column;
                gap: 1rem;
            }

            .buttons {
                margin-top: 1rem;
                width: 100%;
                justify-content: space-between;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
<header class="header">
  <div class="logo">
    <a href="index.php">
        <img src="FinalLogo.png" alt="The Cycle Scribe Logo">
    </a>
      <h1>Cycle Scribe</h1>
  </div>
  <nav class="nav-links">
      <div class="nav-link">Services
          <div class="dropdown">
              <ul>
                  <li><a href="Buybook.php">Buy</a></li>
                  <li><a href="recycleBook.php">Recycle</a></li>
                  <!-- <li><a href="recycle.php">Recycle</a></li> -->
              </ul>
          </div>
      </div>
      <div class="nav-link">Company
          <div class="dropdown">
              <ul>
                  <li><a href="aboutus.php">About Us</a></li>
                  <li><a href="contactus.php">Contact Us</a></li>
              </ul>
          </div>
      </div>
      <a href="news.php" class="nav-link">News</a>
      <a href="userProfile.php" class="nav-link">Profile</a>
  </nav>
  <div class="buttons">
    <form action="" method="post">
    <!-- Show log in option if user is not logged in otherwise show log out    -->
    <?php if(isset($_SESSION['UserName'])) { ?>    
        <button class="button" type="submit" name="btnLogOut">Log Out</button>
    <?php } else { ?>
        <button class="button" type="submit" name="btnLogIn">Log In</button>
    <?php } ?>
    </form>
<?php 
    // If User is not logged in redirect user to regitration page
    if(isset($_POST['btnLogIn']))
    {
        echo "<script>window.location='registration.php'</script>";
    }
    
    if(isset($_POST['btnLogOut']))
    {
        session_destroy();
        echo "<script>window.location='registration.php'</script>";
    }

?>
  </div>
</header>
</body>
</html>
