<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
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
        
        $.ajax({
            type: "POST",
            url: 'checkDuplicate.php',
            data : {username},
            dataType: 'json',
            success: function(data) {
              isDuplicate = data['status'];
            }
        });
        alert('Validating');

        if(username==null || username=="") {
            alert("Enter your name! ");
            return false;
        }
        if(isDuplicate == 'yes') {
          alert("Username is duplicate! ");
          return false;
        }
        else if(password==null || password=="") {
            alert("Enter your password! ");
            return false;
        }
        else {
            if (email==null || email=="") {
                alert("Enter your email! ");
                return false;
            }
            else
              return ValidateEmail(email);
       }
    
    }   
    </script>

<body>
    <div> Our first form : </div>
      <form id="form" action="chosenDepartment.php" method="post" onsubmit="return validateForm()">
        <h3>*Username :</h3>
        <input type = "text" Name ="username" ID="username"  placeholder="Username" >
        <br />
        <h3>*Password :</h3>
        <input type = "password" Name ="password" ID="password" placeholder="Password" >
        <br />
        <h3>*Email :</h3>
        <input type = "text" Name ="email" ID="email" placeholder="Email" >
        <br />
        <br />
        <input type ="submit" value = "SIGN UP">
      </form>
  </body>

</body>
</html>