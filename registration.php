<!DOCTYPE HTML>  
<html>
<link rel="stylesheet" type="text/css" href="registration.css">
<body>  



<script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript">
  
    function ValidateEmail(inputText) {  
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
        if(inputText.match(mailformat))  {  
            return true;  
        }  
        else {  
            alert("You have entered an invalid email address!");  
            return false;  
        }  
    }

    function validateForm() {
        var username= document.getElementById("username").value;
        var password=document.getElementById("password").value;
        var email=document.getElementById("email").value;
        var isDuplicate = "";
        
        alert('Validating');

        if(username==null || username=="") {
            alert("Enter your name! ");
            return false;
        }
        
        else if(password==null || password=="") {
            alert("Enter your password! ");
            return false;
        }
        else if (email==null || email=="")
             {
                alert("Enter your email! ");
                return false;
            }
        else if (!ValidateEmail(email))
              return false;
       else {
			$.ajax({
				type: "POST",
				url: 'checkDuplicate.php',
				data : {username, password, email},
				dataType: 'json',
				async: false,
				success: function(data) {
					isDuplicate = data['status'];
				}
			});
			if(isDuplicate == 'yes') {
				alert("Username is duplicate! ");
				return false;
			}
	   }
    
    }   
    </script>
<script>
$(document).ready(function(){
    $("#reg").click(function(){
        $("#form1").toggle();
    });
});
</script>
</head>
<body>

<button class="button" id = reg> Show/Hide Registration</button>

<body>
      <form class="center1" id="form1" action="DepCheck.php" method="post" onsubmit="return validateForm()">
        <h3>*Username :</h3>
        <input class="input" type = "text" Name ="username" ID="username"  placeholder="Username" >
        <br />
        <h3>*Password :</h3>
        <input class="input" type = "password" Name ="password" ID="password" placeholder="Password" >
        <br />
        <h3>*Email :</h3>
        <input class="input" type = "text" Name ="email" ID="email" placeholder="Email" >
        <br />
        <br />
        <input class="button" type ="submit" value = "Register">
      </form>
  </body>


  <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript">
  
    function ValidateEmail(inputText) {  
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
        if(inputText.match(mailformat))  {  
            return true;  
        }  
        else {  
            alert("You have entered an invalid email address!");  
            return false;  
        }  
    }

    function validateForm2() {
        var username= document.getElementById("username2").value;
        var password=document.getElementById("password2").value;
        var isLoggedin = "";
        
        alert('Validating');

        if(username==null || username=="") {
            alert("Enter your name! ");
            return false;
        }
        else if(password==null || password=="") {
            alert("Enter your password! ");
            return false;
        }
		
		$.ajax({
            type: "POST",
            url: 'LoginCheck.php',
            data : {username, password},
            dataType: 'json',
			async: false,
            success: function(data) {
              isLoggedin = data['status'];
            }
        });
		if(isLoggedin == 'no') {
          alert("Username or password aren't found");
          return false;
        }
    
    }   
    </script>
<script>
$(document).ready(function(){
    $("#login").click(function(){
        $("#form2").toggle();
    });
});
</script>
<body>
<br />
<br />
<br />
<button class="button" id = login> Show/Hide Login</button>
<body>

  <body>
      <form class="center2" id="form2" action="DepCheck.php" method="post" onsubmit="return validateForm2()">
        <h3>*Username :</h3>
        <input class="input" type = "text" Name ="username" ID="username2"  placeholder="Username" >
        <br />
        <h3>*Password :</h3>
        <input class="input" type = "password" Name ="password" ID="password2" placeholder="Password" >
        <br />
		<br />
        <input class="button" type ="submit" value = "Login">
      </form>
  </body>

</body>
</html>