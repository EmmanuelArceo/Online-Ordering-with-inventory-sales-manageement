

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Home</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">

    <link href="style1.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


   
    <style>
body{

  height: 100% !important;
  display: flex;
  flex-direction: column !important;
 
  justify-content: space-between;


}
.row{
  display:flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-evenly;
  margin-top: 1vw;

}
.middle{
  
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-left: 0px;
            
            border-radius: 2rem;
            flex-direction:row;
}
.container {
            max-width: 300px;
            height:100%;
            max-height:470px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            color: white;
            background-color: #d3d3d3;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            margin-top: 3%;
            margin-bottom: 3%;
        }
@media screen and (max-width: 500px) {
  .middle{
      
}

       .container {

        
        max-width: 300px;
            height:100%;
            max-height:470px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            color: white;
            background-color: #d3d3d3;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            margin-top: 3%;
            margin-bottom: 3%;

        }
        .container img{
          min-width: 130px;
       
        }
}
.infous{
  display: flex;
  height: 80vh;
  width: 100%;
  overflow-x: hidden;
  align-items: center;
  justify-content: center;
}

/* From Uiverse.io by MuhammadHasann */ 
</style>
  </head>
<body>



  <?php include 'partials/_dbconnect.php';?>
  <?php require 'partials/_nav.php' ?>


<section id="infous" class="infous">
<div class="con  col-md-6 col-sm-10  " data-aos="zoom-out-up">
  <h1 data-aos="fade-up">Welcome to <br> Soul Tea and Sweet Treats</h1>
  <p data-aos="fade-left">We are a specialty in providing high-quality, fresh, and locally-sourced food. We strive to provide our customers with the best possible experience while also promoting local businesses and supporting our community.</p>
  <a href="#category" class="btn ">
</a>
 
</div>




</section>
  

 <section id="category">
  <div class="container-fluid bg-light" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black; ">     
      <h2 class="text-center">Menu Categories</h2>
    </div>
<div class="middle">
<?php 
        $sql = "SELECT * FROM `categories`"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['categorieId'];
          $cat = $row['categorieName'];
          $desc = $row['categorieDesc'];
          echo '<div class="container" data-aos="fade-right">
                    <img src="img/card-'.$id. '.jpg" class="card-img-top border rounded-circle" alt="image for this category" min-width="249px" height="270px">
                    <div class="card-body">
                      <h5 class="card-title"><a href="viewPL.php?catid=' . $id . '">' . $cat . '</a></h5>
                      <p class="card-text">' . substr($desc, 0, 30). '... </p>
                      <a href="viewPL.php?catid=' . $id . '" class="btn btn-primary">View All</a>
                   
                  </div>
                </div>';
        }
      ?>

</div>
</section>
<!--<div class="all_menus">
 
  <div class="" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black; ">     
    <h2 class="text-center">All Menu Items</h2>
  </div>
  <div class="middle">
<?php 
        $sql = "SELECT * FROM `pizza`"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['pizzaId'];
          $cat = $row['pizzaName'];
          $price = $row['pizzaPrice'];
          echo '<div class="container" data-aos="fade-right">
                    <img  src="img/pizza-'.$id. '.jpg" class="card-img-top border rounded-circle" alt="image for this category" min-width="249px" height="270px">
                    <div class="card-body" data-aos="fade-left">
                      <h5 class="card-title"><a href="viewPL.php?catid=' . $id . '">' . $cat . '</a></h5>
                      <p class="card-text">' . $price. '... </p>
                      <a href="viewPL.php?catid=' . $id . '" class="btn btn-primary">View All</a>
                   
                  </div>
                </div>';
        }
      ?>

</div>
      -->
    





  <!-- Category container starts here -->
  <!-- <div class="container my-3 mb-5 ">
    <div class="col-lg-2 text-center bg-light my-3 " style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black; ">     
      <h2 class="text-center">Menu Categories</h2>
    </div>
    <div class="row">
     
      <?php 
        $sql = "SELECT * FROM `categories`"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['categorieId'];
          $cat = $row['categorieName'];
          $desc = $row['categorieDesc'];
          echo '<div class="col-xs-3 col-sm-3 col-md-3 d-flex  bg-light flex-column align-items-center justify-content-center border rounded object-fit-cover">

                    <img src="img/card-'.$id. '.jpg" class="card-img-top border rounded-circle" alt="image for this category" width="249px" height="270px">
                    <div class="card-body">
                      <h5 class="card-title"><a href="viewPL.php?catid=' . $id . '">' . $cat . '</a></h5>
                      <p class="card-text">' . substr($desc, 0, 30). '... </p>
                      <a href="viewPL.php?catid=' . $id . '" class="btn btn-primary">View All</a>
                   
                  </div>
                </div>';
        }
      ?>
    </div>
  </div>-->


   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <script>
  function addToCart(itemId) {
    $.ajax({
      url: 'partials/_addToCart.php',
      type: 'POST',
      data: { itemId: itemId },
      success: function(response) {
        // Update the cart count or display a success message
        console.log(response);
      },
      error: function(xhr, status, error) {
        console.error(xhr, status, error);
      }
    });
  }
</script>


    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
</body>
<?php require 'partials/_footer.php' ?>
</html>