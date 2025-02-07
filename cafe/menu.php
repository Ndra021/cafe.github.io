<?php 
require "koneksi.php" ;
$rr = mysqli_query($koneksi,"SELECT * FROM roti") ; 
$roti = [] ;
while($rot = mysqli_fetch_assoc($rr)){
       $roti[] = $rot ;
}


?>

<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- tea font family  -->
       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">

                       <!-- welcome part font family  -->
                       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

<!-- font  -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

<!-- social icon  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


       <title>Roti'O</title>
       <!-- end  -->
       <!-- custom css  -->

       <link rel="stylesheet" href="style.css">

       <!-- responsive css  -->
     <link rel="stylesheet" href="responsive.css">
</head>
<body>
       <!-- header start  -->
       <div class="menu">

              <!-- logo part  -->
              <div class="menu-left">
                     <img src="img/logo-rotio.jpg" style="width: 60px; height: 60px; margin-right: 10px; border-radius:50px;">
                     <p style="font-family: font-family: 'Pirata One', cursive; font-size:40px; font-weight:bold;color:whitesmoke; ">Roti'O</p>      
              </div>
              <!-- log part end  -->

               <!-- nav part start  -->
              <div class="menu-right">
                     <nav>
                               <ul>
                                   <li> <a href="index.php" >Home</a></li>
       
                                   <li>  <a href="menu.php" class="active">Menu</a> </li>
       
                                   <li><a href="contact.php">Contact</a> </li>
                            </ul>
                     </nav>
              </div>
              </div>
              <!-- nav part end  -->

              
  
       <!-- header end  -->

       <!-- first section section start  -->

               <div class="section">
                  <div class="light">
                     <img src="img/light.png" alt="">
                     <img src="img/light.png" alt="">
                     <img src="img/light.png" alt="">

              </div>
              
              <div class="welcome">
                     <h3>__Welcome to__ </h3>
                     <p id="p1">Roti'O</p>
                     <p id="p2">Selamat datang di rumah Roti'O.<br> 
                            Di sini kami menawarkan menu yang berbeda.<br>
                            Anda dapat memeriksanya di menu detail dibawah ini nikmati di sini dengan nyaman.</p>
                     <a href="index.php" target="#myHome">Details</a>
              </div>
                    <div class="table-set">
                        <img src="img/table-set.png" alt="">
                    </div>
               </div>

       <!-- first section end  -->

       <!-- second section start  -->
              <div class="sub-section"  id="myHome" >
                     <div class="sub-section-first">
                            <h2 style="color: rgb(170, 108, 26); font-style: italic; font-family: 'Lobster', cursive;
                            font-size: 30px;">
                                   The Best Cake and Coffe</h2>
                            <h1 style="font-family: monospace; font-weight: lighter;">Roti'O</h1>
                           <a href="#">order Now</a>
             </div>
                     <div class="sub-section-two">
                            <img src="img/1-.jpg"  style="border:10px solid whitesmoke; border-radius: 100px; width: 70px height: 70px;;" alt="">
                     </div>
              </div>
          <!-- second section end       -->


          <!-- menu portion start  -->

                            <div class="menu-caption">
                                      <h3>Our Menus</h3>
                                            <hr>
                            </div>



                      <!-- menu portion item list  -->

                            <div class="menu-list">

                                   <?php foreach($roti as $r) : ?>                                                            
                                   <div class="menu-list-des">
                                          <div class="menu-list-des-right">
                                                 <div class="list-img">
                                                        <img src="img/<?= $r['gambar'] ;?>" width="100">
                                                 </div>
                                                 <div class="list-des">
                                                        <h2><?= $r['nama'] ;?></h2>
                                                        <p><?= $r['deskripsi'] ;?></p>
                                                 </div>
                                                 <div class="price">
                                                        <a href="penjualan.php?id=<?= $r['id'] ; ?>"><?= $r['harga'] ;?></a>
                                                 </div>
                                          </div>
                                   <?php endforeach ; ?>
             
                                   </div>
                            </div>
</body>
</html>