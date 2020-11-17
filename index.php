<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Validation</title>
	 <style>
	
	 .card {
  margin-top: 50px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
  width:200px;
  height:200px;
  background-color:lightgreen;
}
	 </style>
 </head>
 <body style=background-color:yellow>
     <h2><center>Sl3 Assignment 4- PHP validations<center></h2>
	 <center><div class="card container">
	 <form method="POST" action="test.php" style=text-align:center;margin-top:30px>
        <input type="text" name="url" placeholder="Enter URL to validate" style="height: 30px;width: 180px;"><br>
        <input type="text" name="email" placeholder="Enter email to validate " style="height: 30px;width: 180px;margin-top: 15px;"><br>
        <input type="submit" style="height: 30px;width: 100px;margin-top: 15px;" name="submit">    
    </form>
	 </div></center>
     
    <br>
    <?php
        
        if(isset($_POST['submit'])){
            $url=$_POST['url'];
            $email=$_POST['email'];

            if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
                echo("<center><p style=color:green>$url is a <b>valid URL</b></p></center>"."<br>");
              } else {
                echo("<center><p style=color:red>$url is not a valid URL</p><center>"."<br>");
              }

              if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo("<center><p style=color:green>$email is a <b>valid</b> email address</p></center>"."<br>");
              } else {
                echo("<center><p style=color:red>$email is not a valid email address</p><center>"."<br>");
              }

        }
    ?>
 </body>
 </html>