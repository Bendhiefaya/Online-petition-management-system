<?php
include("config.php");
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>editer petition</title>
     <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image: url(bannercreate.png);
    background-repeat: no-repeat;
    background-size: cover;
}
h3{
    text-align: center;
    font-size: 20px;
}
form{
    height:600px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    bottom: 50%;
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'italiana',sans-serif;
    color: black;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
    padding: 5px;
}

label{
    display: block;
    margin-top: 20px;
    font-size: 15px;
    font-weight: 600;
    font-family: 'italiana' , sans-serif;

}
input{
    display: block;
    height: 30px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.199);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 1px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: rgb(70, 69, 69);
}
button{
    margin-top: 40px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 12px 0;
    font-size: 15px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.button1 {
    margin-top: 30px;
}
.navbar {
    position: relative;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0, 0);
}
.navbar .logo {
    width: 200px;
    height: auto;
   
}

</style>
</head>
<body>
    <div class="banner">
        <nav class="navbar">
            <img class="logo" src="logosite.png">
        </nav>
        
    </div>
	<form method = "post" action ="creer1.php" >
        <h3>Create petition here</h3>
		<label for="title">Title</label>
        <input type="text" placeholder="" name="title">
        <label for="content">content of the petition</label>
        <input type="text" placeholder="" name="content">
        <label for="date">Date</label>
        <input type="Date" placeholder="" name="date">
        <label for="name"> Your Name</label>
        <input type="text" placeholder="" name="name">
        <label for="fname"> Your family name</label>
        <input type="text" placeholder="" name="fname">
        <button class="button1" name="button">send petition</button>
    </form>
</body>
</html>