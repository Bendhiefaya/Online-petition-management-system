<?php 
	include 'config.php'; 
?>
<style>
body {

margin: 0;

padding: 0;

min-height: 100%;
background-size: cover;
display: flex;

align-items: center;

justify-content: center;  

font-family: 'italiana';

background-color: #f1f1f1; 

}

.container .card .icon {

position: absolute;

top: 0;

left: 0;

width: 100%;

height: 100%;

background-image: linear-gradient(
    -225deg,
    #5271c4 0%,
    #b19fff 48%,
    #eca1fe 100%
  );

}

.container .card .icon .fa {

position: absolute;

top: 50%;

left: 50%;

transform: translate(-50%, -50%);

font-size: 80px;

color: #fff;

}

.container .card .slide {

width: 300px;

height: 200px;

transition: 0.5s;

}

.container .card .slide.slide1 {

position: relative;

display: flex;

justify-content: center;

align-items: center;

z-index: 1;

transition: .7s;

transform: translateY(100px);

}

.container .card:hover .slide.slide1{

transform: translateY(0px);

}

.container .card .slide.slide2 {

position: relative;

display: flex;

justify-content: center;

align-items: center;

padding: 20px;

box-sizing: border-box;

transition: .8s;

transform: translateY(-100px);

box-shadow: 0 20px 40px rgba(0,0,0,0.4);

}

.container .card:hover .slide.slide2{

transform: translateY(0);

}

.container .card .slide.slide2::after{

content: "";

position: absolute;

width: 30px;

height: 4px;

bottom: 15px;

left: 50%;

transform: translateX(-50%);
background-image: linear-gradient(
    -225deg,
    #5271c4 0%,
    #b19fff 48%,
    #eca1fe 100%
  );;

}
.contenu{
justify-content: center;
  display: flex;
  flex-wrap: wrap;
  height: 150px;
  width: 897px
}
.contenu2{
    justify-content: center;
    display: flex;
  flex-wrap: wrap;
  height: 150px;
  width: 897px;
}
.container .card .slide.slide2 .content p {

margin: 0;

padding: 0;

text-align: center;

color: #414141;

}
h1{
    text-align: center;
    margin-top: 80px;
}
.container .card .slide.slide2 .content h3 {

margin: 0 0 10px 0;

padding: 0;

font-size: 24px;

text-align: center;

color: #414141;

} 




</style>
<html>
<head>

    <title>statistics</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />

</head>

<body>
<div class="contenu">
 <div class="container">

       

        <div class="card">
           <div class="slide slide1">

                <div class="content">

                    <div class="icon">
                        <h1 align="center" >Users statistics</h1>

                        <i class="fa fa-user-circle" aria-hidden="true"></i>

                    </div>

                </div>

            </div>

            <div class="slide slide2">

                <div class="content">
                <?php
                
                $query = "SELECT id FROM inscri ORDER BY id";  
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h3>

                Number of members 

                </h3>';
                echo '<h2>'.$row.'</h2>';
            ?>
                   

                   

                </div>

            </div>

        </div>

        

    </div>
 <div class="container">

       

<div class="card">
   <div class="slide slide1">

        <div class="content">

            <div class="icon">
                <h1 align="center" >Petition statistics</h1>

                <i class="fa fa-user-circle" aria-hidden="true"></i>

            </div>

        </div>

    </div>

    <div class="slide slide2">

        <div class="content">
        <?php
        
        $query = "SELECT id FROM petition ORDER BY id";  
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_num_rows($query_run);

        echo '<h3>

        total number of petitions 

        </h3>';
        echo '<h2>'.$row.'</h2>';
    ?>
           

           

        </div>

    </div>

</div>



</div>
<div class="container">

       

<div class="card">
   <div class="slide slide1">

        <div class="content">

            <div class="icon">
                <h1 align="center" >professors</h1>

                <i class="fa fa-user-circle" aria-hidden="true"></i>

            </div>

        </div>

    </div>

    <div class="slide slide2">

        <div class="content">
        <?php
        
        $query = "SELECT id FROM inscri WHERE role ='professor' ORDER BY id ";  
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_num_rows($query_run);
        $query1 = "SELECT id FROM inscri ORDER BY id ";  
        $query_run1 = mysqli_query($conn, $query1);
        $row1 = mysqli_num_rows($query_run1);
        $pourcentage=($row/$row1)*100;
        echo '<h3>

        percentage of Professors 

        </h3>';
        echo '<h2>'.$pourcentage. '%</h2>';
    ?>
           

           

        </div>

    </div>

</div>



</div>
</div>
<br>
<div class="contenu2">
<div class="container">

       

<div class="card">
   <div class="slide slide1">

        <div class="content">

            <div class="icon">
                <h1 align="center" >Students</h1>

                <i class="fa fa-user-circle" aria-hidden="true"></i>

            </div>

        </div>

    </div>

    <div class="slide slide2">

        <div class="content">
        <?php
        
        $query = "SELECT id FROM inscri where role='student' ORDER BY id ";  
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_num_rows($query_run);
        $query1 = "SELECT id FROM inscri ORDER BY id ";  
        $query_run1 = mysqli_query($conn, $query1);
        $row1 = mysqli_num_rows($query_run1);
        $pourcentage=($row/$row1)*100;

        echo '<h3>

        percentage of students 

        </h3>';
        echo '<h2>'.$pourcentage.' % </h2>';
    ?>
           

           

        </div>

    </div>

</div>



</div>

<div class="container">

       

<div class="card">
   <div class="slide slide1">

        <div class="content">

            <div class="icon">
                <h1 align="center" >administration agent</h1>

                <i class="fa fa-user-circle" aria-hidden="true"></i>

            </div>

        </div>

    </div>

    <div class="slide slide2">

        <div class="content">
        <?php
        
        $query = "SELECT id FROM inscri where role='administration agent' ORDER BY id ";  
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_num_rows($query_run);
        $query1 = "SELECT id FROM inscri ORDER BY id ";  
        $query_run1 = mysqli_query($conn, $query1);
        $row1 = mysqli_num_rows($query_run1);
        $pourcentage=($row/$row1)*100;

        echo '<h3>

        total Number of administration agents 

        </h3>';
        echo '<h2>'.$pourcentage.' % </h2>';
    ?>
           

           

        </div>

    </div>

</div>



</div>
</div>
</body>

</html>