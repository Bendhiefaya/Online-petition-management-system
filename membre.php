<?php
include("config.php");
session_start();
?>
<head>
 <link rel="stylesheet" type="text/css" href="member.css">
  </head>
  <body>
    <nav class="navbar">
        <a href="index.htm"><img class="logo" src="logosite.png" ></a>
    </nav>
    <input type="checkbox" id="active">
    <label for="active" class="menu-btn"><span></span></label>
    <label for="active" class="close"></label>
    <div class="wrapper">
      <ul>
        <li><a href="home.php">view profile</a></li>
        <li><a href="creer.php">create petitions</a></li>
        <li><a href="VIEWLIST.php">view list of petitions</a></li>
        </ul>
    </div>
<div class="content">
      <div class="title">
Welcome dear member</div>
<p>
to university petitions management</p>
</div>
</body>