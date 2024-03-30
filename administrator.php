<?php

include'config.php';
session_start(); 
?>
<html>
    <style>



* {
  box-sizing: border-box;
  outline: none;
}
body {
  margin: 0;
  font-family: 'italiana';
  overflow: hidden;
}
aside{
  height: 88vh;
  display: flex;
  width:20%;
  margin-top: 0;
  left: 0;
  position: fixed;
}
.left {
  height: 100%;
  display: flex;
  margin-top: 0;
}
.sidebar {
  width: 200px;
  height: 100%;
  background-image: linear-gradient(
    -225deg,
    #5271c4 0%,
    #b19fff 48%,
    #eca1fe 100%
  );
  display: flex;
}
.wrapper {
  padding: 0 10px;
  height: 100%;
  display: flex;
  justify-content: top: 0;;
  flex-direction: column;
  font-size:30px;
}

.items {
  padding: 0 25px;
  margin-top: 120px;
  justify-content: center;
  flex-direction: column;
 content:'   ';
}



header img{

  width: 200px;
  height: auto;
  padding: 10px 30px;
}
header{
  background-image: linear-gradient(
    -225deg,
    #5271c4 0%,
    #b19fff 48%,
    #eca1fe 100%
  );
  height: 12vh;
  width:100%;
}

.items a{     
 
    text-decoration: none;
    color: black; 
    font-size: 25px;
    text-shadow: #eca1fe;
    font-family: 'italiana'; 
    display:block;
    flex-direction: column;  
    justify-content: center;
    text-align: center;
    border-bottom:1px solid white ;
    padding: 20px;
}
main iframe{
  width:86%;
  height:88vh;
  background-color:none;
  float:right;
  margin-top: 0;
}
    </style>

<header>
  <title>admin dashboard</title>
<img src="logosite.png">
</header>
  <body>  
    <aside class="dashboard">
        <div class="left">
          
          <div class="sidebar">
     
              <div class="items">
               <a href="viewadmin.php" id="view" target="content">view petition</a>
               <a href="charte.php" id="statistics"target="content">view statistics</a>
               <a href="affichagepouredition.php" id="edit" target="content">manage petition</a>
              </div>
             
            </div>
          </div>
         </div>
    </aside>
<main>
  <iframe src="" name="content"frameborder="0"></iframe>
</main>


</body>




</html>