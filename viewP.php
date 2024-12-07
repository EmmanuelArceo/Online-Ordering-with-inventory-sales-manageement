<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id=title></title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <style>
    #cont {
        min-height : 578px;
    }
    body{
        background-color: #ffebe7 !important;
  height: 100vh !important;
  display: flex;
  flex-direction: column !important;

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
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>
    <?php include 'animation.php';?>


    <div class="container--fluid my-4" id="cont" data-aos="fade-left">
        <div class="row jumbotron align-items-center justify-content-center" >
        <?php
       
      
            $pizzaId = $_GET['pizzaid'];
            $sql = "SELECT * FROM `pizza` WHERE pizzaId = $pizzaId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $pizzaName = $row['pizzaName'];
            $pizzaPrice = $row['pizzaPrice'];
            $pizzaDesc = $row['pizzaDesc'];
            $pizzaCategorieId = $row['pizzaCategorieId'];

            $totalPrice = $pizzaPrice ;
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $pizzaName; ?>"; </script> 
        <?php
       echo  '<div class="col-md-4 d-flex align-item-center justify-content-center">
       <img src="img/pizza-'.$pizzaId. '.jpg" width="249px" height="262px">
   </div>
   <div class="col-md-8 my-4">
       <h3>' . $pizzaName . '</h3>
       <h5 style="color: #ff0000">₱ <span id="totalPrice">' . $totalPrice . '</span></h5>
       <p class="mb-0">' .$pizzaDesc .'</p>';

// Fetch addons from the database
$addonSql = "SELECT * FROM addonns where addcategoryid = $pizzaCategorieId";
$addonResult = mysqli_query($conn, $addonSql);

echo '<div class="mt-3">
       <h5>Addons:</h5>
       <form id="addonForm">';

while ($addon = mysqli_fetch_assoc($addonResult)) {
   echo '
   
   <br>
   <div class="form-check">
           <input class="form-check-input addon-checkbox justify-self-center" type="checkbox" value="' . $addon['addid'] . '" addid="addon' . $addon['addid'] . '" data-price="' . $addon['addprice'] . '">
           <label class="form-check-label" for="addon' . $addon['addid'] . '">
               ' . $addon['addname'] . ' (₱' . $addon['addprice'] . ')
           </label>
           <input type="number" class="form-control addon-quantity" min="1" value="1" style="width: 60px; display: inline-block; margin-left: 10px;" disabled>
         </div>';
}

echo '</form>
   </div>';

if($loggedin){
   $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
   $quaresult = mysqli_query($conn, $quaSql);
   $quaExistRows = mysqli_num_rows($quaresult);
   if($quaExistRows == 0) {
       echo '<form action="partials/_manageCart.php" method="POST">
             <input type="hidden" name="itemId" value="'.$pizzaId. '">
             <input type="hidden" name="addons" id="selectedAddons">
             <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>';
   }else {
       echo '<a href="viewCart.php"><button class="btn btn-primary my-2">Go to Cart</button></a>';
   }
}
else{
   echo '<button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
}


                
                
                '</form>
                <h6 class="my-1"> View </h6>
                <div class="mx-4">
                    <a href="viewPL.php?catid=' . $pizzaCategorieId . '" class="active text-dark">
                   
                       
                    </a>
               

                 


                <div class="mx-4">
                    <a href="index.php" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Category</span>
                    </a>
                </div>
            </div>'
        ?>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addonCheckboxes = document.querySelectorAll('.addon-checkbox');
    const addonQuantities = document.querySelectorAll('.addon-quantity');
    const totalPriceElement = document.getElementById('totalPrice');
    const addonForm = document.getElementById('addonForm');
    const selectedAddonsInput = document.getElementById('selectedAddons');

    let basePrice = <?php echo $totalPrice; ?>;

    function updateTotalPrice() {
        let total = basePrice;
        const selectedAddons = [];

        addonCheckboxes.forEach((checkbox, index) => {
            if (checkbox.checked) {
                const quantity = parseInt(addonQuantities[index].value);
                const price = parseFloat(checkbox.dataset.price);
                total += price * quantity;
                selectedAddons.push(`${checkbox.value}:${quantity}`);
            }
        });

        totalPriceElement.textContent = total.toFixed(2);
        selectedAddonsInput.value = selectedAddons.join(',');
    }

    addonCheckboxes.forEach((checkbox, index) => {
        checkbox.addEventListener('change', function() {
            addonQuantities[index].disabled = !this.checked;
            updateTotalPrice();
        });
    });

    addonQuantities.forEach(quantity => {
        quantity.addEventListener('change', updateTotalPrice);
    });

    addonForm.addEventListener('submit', function(e) {
        e.preventDefault();
        updateTotalPrice();
    });
});


</script>

</body>
</html>