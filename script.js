$(document).ready(function()
{
  $("#txtSignUpEmail").change(function()
  {
      ValidateEmail();
  });

  $("#txtUserName").change(function()
  {
      ValidateUserName();
  });

  $("#txtSignUpPassword").change(function()
  {
      ValidatePassword();
  });

  $("#txtConfirmPassword").change(function()
  {
      ValidateConfirmPassword();
  });

  $("#btnSignUp").click(function(event) 
  {
    SignUp()
    /*event.preventDefault();
    if (SignUp()) 
    {
        document.getElementById('SignUpForm').submit();
    }*/
  });
  
  $("#txtSignInEmail").change(function()
  {
    ValidateLogInEmail();
  });

  $("#txtSignInPassword").change(function()
  {
    ValidateLogInPassword();
  });

  $("#btnSignIn").click(function(event) 
  {
    LogIn()
    /*event.preventDefault();
    if (LogIn()) 
    {
        document.getElementById('LogInForm').submit();
    }*/
  });

  function ValidateEmail() 
  {
    var RegExpr = /^([a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+)$/;
    var SignUpEmail = $("#txtSignUpEmail").val();

    if (!SignUpEmail.match(RegExpr)) 
    {
      $("#SUEmailError").text('Enter a valid email');
      return false;
    }
    if (SignUpEmail.match(RegExpr)) 
    {
      $("#SUEmailError").empty();
      return true;
    }
  }

  function ValidateUserName()
  {
    var RegExpr = /^[A-Za-z0-9_]{3,15}$/;
    var UserName = $("#txtUserName").val();

    if(!UserName.match(RegExpr))
    {
      $("#UserNameError").text('Username should be at least 3 characters long or maximum 15 characters long.');
      return false;
    }
    else 
    {
      $("#UserNameError").empty();
      return true;
    }
  }

  function ValidatePassword()
  {
    var RegExpr = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*.()-+=]).{8,}$/;
    var SignUpPassword = $("#txtSignUpPassword").val();

    if(!SignUpPassword.match(RegExpr))
    {
      $("#SUPasswordError").text('Password must be of 8 character length, should contain once capital letter, small letter,number, and special character.');
      return false;
    }
    if(SignUpPassword.match(RegExpr))
    {
      $("#SUPasswordError").empty();
      return true;
    }
  }

  function ValidateConfirmPassword()
  {  
    var ConfirmPassword = $("#txtConfirmPassword").val();
    var Password = $("#txtSignUpPassword").val();
    // alert(ConfirmPassword,Password);
    if (Password != ConfirmPassword)
    {
      $("#ConfirmPasswordError").text("Password doesn't match.");
      return false;
    }
    else
    {
      $("#ConfirmPasswordError").empty();
      return true;
    }
  }

  function SignUp()
  {    
    var Password = $("#txtSignUpPassword").val();
    var Email = $("#txtSignUpEmail").val();
    var ConfirmPassword = $("#txtConfirmPassword").val();
    var UserName = $("#txtUserName").val();
    
    console.log(Password,Email,ConfirmPassword,UserName);
    
    if (Password == "" || Email == "" || ConfirmPassword == "" || UserName == "")
    {
      $("#SUError").text('Fill all Information to Sign up!!');
        return false;
    }
    else if (ValidateEmail() == false || ValidatePassword() == false || ValidateConfirmPassword() == false || ValidateUserName() == false)
    {
      $("#SUError").text("Fill Valid Details.");
        return false;
    }
    else
    {
      $("#SUError").empty();
      return true;
    }
  }

  
  function ValidateLogInPassword()
  {
    var RegExpr = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*.()-+=]).{7,}$/;
    var SignInPassword = $("#txtSignInPassword").val();
    
    if(!SignInPassword.match(RegExpr))
    {
      $("#SIPasswordError").text('Password must be of 8 character length, should contain once capital letter, small letter,number, and special character.');
      return false;
    }
    if(SignInPassword.match(RegExpr))
    {
      $("#SIPasswordError").empty();
      return true;
    }
  }
  
  function ValidateLogInEmail() 
  {
    var RegExpr = /^([a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+)$/;
    var SignInEmail = $("#txtSignInEmail").val();

    if(!SignInEmail.match(RegExpr))
    {
      $("#SIEmailError").text('Enter a valid email');
      return false;
    }
    if (SignInEmail.match(RegExpr)) 
    {
      $("#SIEmailError").empty();
      return true;
    }
  }

  function LogIn()
  {
    var Email = $("#txtSignInEmail").val();
    var Password = $("#txtSignInPassword").val();

    if (Password == "" || Email == "")
    {
      $("#SIError").text('Fill all Information to Log In!!');
        return false;
    }
    else if (ValidateLogInEmail() == false || ValidateLogInPassword() == false)
    {
      $("#SIError").text("Fill Valid Details.");
        return false;
    }
    else
    {
      $("#SIError").empty();
      return true;
    }
  }
}); 