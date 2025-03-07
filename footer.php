<!DOCTYPE html>
<html>
<head>
<style>
:root 
  {
      --color-grey: #121212ee; /* Dark background similar to Spotify */
      --color-green: #1aa84c; /* Spotify green 1DB954 */
      --color-darkgreen: #0b5525; /* dark green */
      --color-black: #000000;
      --color-white: #FFFFFF;
  }
      
#footerContainer {
  display: flex;
  justify-content: center;
  padding: 20px;
  margin: 0 auto;
  background-color: var(--color-grey) ;
}

#footerContainer .column {
  width: 200px;
  background-color: var(--color-grey);
  justify-content: left;
}

#footerContainer .column h2 {
  /* color: #333; */
  margin-bottom: 10px;
}
#footerContainer .column p 
{
    justify-content: left;
}

#footerContainer .column ul {
  list-style: none;
  padding: 0;
}

#footerContainer .column li {
  margin-bottom: 5px;
}

#footerContainer .column .logo {
  display: flex;
  align-items: center;
}

.social-icons {
  display: flex;
  align-items: center;
  margin-left: 10px;
}

.social-icons a {
  margin-right: 10px;
}

.social-icons::before {
  content: "";
  border-left: 1px solid #fff;
  height: 40px;
  margin-right: 10px;
}

#footerContainer .column .footer {
  text-align: center;
  padding: 10px;
}
.cycleScribe {
  display: flex;
  align-items: center;
  width: 400px;
  justify-content: left;
}

.cycleScribe img {
  margin-right: 10px;
}

.cycleScribe h4 {
  margin: 0;
  width: fit-content;
}

.social-icons {
  display: flex;
  align-items: center;
}

.social-icons a {
  margin-right: 10px;
}

.social-icons::before {
  content: "";
  border-left: 1px solid #fff;
  height: 40px;
  margin-right: 10px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container" id="footerContainer" style="max-width: 100%;">
 
  <div class="column text-white">
    <h2>Company</h2>
    <ul>
      <li>About Us</li>
      <li>Careers</li>
      <li>Franchise</li>
    </ul>
  </div>
  <div class="column text-white">
    <h2>Help</h2>
    <ul>
      <li>Contact Us</li>
      <li>Privacy Policy</li>
      <li>Terms & Conditions</li>
    </ul>
  </div>
<div class="column text-white">
    <div class="footer" style="font-size: small;">
    <div class="cycleScribe">
        <!-- <img src="./ProfilePics/FinalLogo.png" width="50px" height="50px" alt="The Kabadiwala Logo">  -->
        <h2>Cycle Scribe</h2>
        <div class="logo">
          <div class="social-icons">
              <a href="https://www.instagram.com/riya_l_002/"><i class="bi bi-instagram text-white"></i></a>
              <a href="https://www.facebook.com/login/"><i class="bi bi-facebook text-white"></i></a>
              <a href="https://x.com/i/flow/login"><i class="bi bi-twitter text-white"></i></a>
              <a href="https://www.linkedin.com/in/riya-lineswala2005/"><i class="bi bi-linkedin text-white"></i></a>
            </div>
        </div>
    </div>
    <p style="text-align: left;">+91-90997 39439 <br>
    infocyclescribe@gmail.com <br>
    Athwa Gate, Surat, Gujarat, 395001</p>
</div>
</div>
</div>
</body>
</html>