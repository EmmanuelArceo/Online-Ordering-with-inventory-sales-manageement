
<?php
// SQL query to select total earnings and total orders
$sql = "SELECT sum(amount) as total_amount, count(userId) as total_orders FROM orders WHERE orderStatus  = '4'";
$result = mysqli_query($conn, $sql);

// Check if there are any orders
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $total_amount = $row["total_amount"];
        $total_orders = $row["total_orders"];
    }
} else {
    echo "0 results";
}

// SQL queries to select all unique years, months, and dates from orders
$sql_years = "SELECT DISTINCT YEAR(orderDate) as year FROM orders ORDER BY year DESC";
$result_years = mysqli_query($conn, $sql_years);

$years = [];
if (mysqli_num_rows($result_years) > 0) {
    while($row = mysqli_fetch_assoc($result_years)) {
        $years[] = $row['year'];
    }
}

$sql_months = "SELECT DISTINCT MONTH(orderDate) as month FROM orders ORDER BY month DESC";
$result_months = mysqli_query($conn, $sql_months);

$months = [];
if (mysqli_num_rows($result_months) > 0) {
    while($row = mysqli_fetch_assoc($result_months)) {
        $months[] = $row['month'];
    }
}

$sql_dates = "SELECT DISTINCT DAY(orderDate) as day FROM orders ORDER BY day DESC";
$result_dates = mysqli_query($conn, $sql_dates);

$dates = [];
if (mysqli_num_rows($result_dates) > 0) {
    while($row = mysqli_fetch_assoc($result_dates)) {
        $dates[] = $row['day'];
    }
}

// Handle form submission for specific date earnings
$selected_date_earnings = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_year'], $_POST['selected_month'], $_POST['selected_day'])) {
    $selected_year = $_POST['selected_year'];
    $selected_month = $_POST['selected_month'];
    $selected_day = $_POST['selected_day'];
    $selected_date = "$selected_year-$selected_month-$selected_day";
    $sql_specific_date = "SELECT SUM(amount) as earnings FROM orders WHERE DATE(orderDate) = '$selected_date' AND orderStatus = '4'";
    $result_specific_date = mysqli_query($conn, $sql_specific_date);
    if ($result_specific_date && mysqli_num_rows($result_specific_date) > 0) {
        $row = mysqli_fetch_assoc($result_specific_date);
        $selected_date_earnings = $row['earnings'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: start;
            margin-left: 10rem;
            margin-right: 6rem;
            margin-top: 5rem;
        }
        .top {
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .top h1 {
            padding: 0px;
            text-align: center;
            margin-bottom: 10px;
        }
        .middle {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-left: 20px;
            border: 1px solid black;
            border-radius: 2rem;
        }
        .dash {
            margin-left: 5rem;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            color: white;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            margin-top: 3%;
            margin-bottom: 3%;
        }
    </style>
</head>

<body>
    <div class="top"></div>
    <div class="dash"><h1>DASHBOARD</h1></div>

    <div class="middle">
        <div class="container">
            <h1>See Earning by Date</h1>
            <form method="POST">
                <select name="selected_year">
                    <?php foreach ($years as $year) { ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php } ?>
                </select>
                <select name="selected_month">
                    <?php foreach ($months as $month) { ?>
                        <option value="<?php echo str_pad($month, 2, '0', STR_PAD_LEFT); ?>"><?php echo $month; ?></option>
                    <?php } ?>
                </select> 
              <select name="selected_day">
                    
                    <?php 
                  
                    foreach ($dates as $day) { ?>

                       
                        <option value="<?php echo str_pad($day, 2, '0', STR_PAD_LEFT); ?>"><?php echo $day; ?></option>
                    <?php } ?>
                </select> 
                <button type="submit">View Earnings</button>
            </form>
            <?php if ($selected_date_earnings !== null) { ?>
                <h2>Earnings for <?php echo $selected_date; ?>: <br> ₱ <?php echo $selected_date_earnings; ?></h2>
            <?php } ?>
        </div>
        <div class="container"> <h1>Total Earnings</h1> <br>
   <h1>₱ <?php echo $total_amount ?></h1>

</div>
        <div class="container">
            <h1>Total Orders</h1> <br>
            <h1><?php echo $total_orders ?></h1>
        </div>
        <div class="container">
            <h1>Cancelled Orders</h1> <br>
            <h1><?php 
                $sql="select * from orders WHERE orderStatus = '6'";
                $result=mysqli_query($conn,$sql); 
                $rws=mysqli_num_rows($result);
                echo $rws;
            ?></h1>
        </div>
        <div class="container">
            <h1>Delivered Orders</h1> <br>
            <h1><?php 
                $sql="select * from orders WHERE orderStatus = '4'";
                $result=mysqli_query($conn,$sql); 
                $rws=mysqli_num_rows($result);
                echo $rws;
            ?></h1>
        </div>
        <div class="container">
            <h1>Ongoing Orders</h1> <br>
            <h1><?php 
                $sql="select * from orders WHERE orderStatus = '0'";
                $result=mysqli_query($conn,$sql); 
                $rws=mysqli_num_rows($result);
                echo $rws;
            ?></h1>
        </div>
        <div class="container">
            <h1>In Transit</h1> <br>
            <h1><?php 
                $sql="select * from orders WHERE orderStatus = '3'";
                $result=mysqli_query($conn,$sql); 
                $rws=mysqli_num_rows($result);
                echo $rws;
            ?></h1>
        </div>
    </div>
</body>
</html>





<!--<?php
// SQL query to select all orders
$sql = "SELECT sum(amount) as total_amount ,count(userId) as total_orders , orderStatus ,orderId FROM orders" ;
$result = mysqli_query($conn, $sql);


// Check if there are any orders
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $total_amount = $row["total_amount"];
        $total_orders = $row["total_orders"];
        
    
    }
} else {
    echo "0 results";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <style>

        body {
   
   display:flex;
   flex-direction: column;
   align-items: start;
   justify-content: start;
    margin-left: 10rem;
    margin-right: 6rem;
    margin-top: 5rem
        }
        .top{
            display:flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .top h1{
            padding: 0px;
            text-align: center;
            margin-bottom: 10px;
        }
        .middle{
            display:flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-left: 20px;
            border: 1px solid black;
            border-radius: 2rem;
        }
        .dash{
          margin-left: 5rem;
        }

        .container{
            width: 400px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            font-size: 20px;
            color: white;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            margin-top:3%;
            margin-bottom: 3%;
        }
    </style>
    
</head>

<body>
    <div class="top">
       
</div>
<div class="dash"><h1 >DASHBOARD</h1></div>

<div class="middle">
  

<div class="container"> <h1>Total Earnings</h1> <br>
   <h1>₱ <?php echo $total_amount ?></h1>

</div>
<div class="container"> <h1>Total Orders</h1> <br>
   <h1><?php echo $total_orders ?></h1>

</div>
<div class="container"> <h1>Cancelled Orders</h1> <br>
<h1><?php 
$sql="select * from orders WHERE orderStatus = '6'";
$result=mysqli_query($conn,$sql); 
$rws=mysqli_num_rows($result);
echo $rws;
?></h1>

</div>
<div class="container"> <h1>Delivered Orders</h1> <br>
<h1><?php 
$sql="select * from orders WHERE orderStatus = '4'";
$result=mysqli_query($conn,$sql); 
$rws=mysqli_num_rows($result);
echo $rws;
?></h1>

</div>
<div class="container"> <h1>Ongoing Orders</h1> <br>
<h1><?php 
$sql="select * from orders WHERE orderStatus = '0'";
$result=mysqli_query($conn,$sql); 
$rws=mysqli_num_rows($result);
echo $rws;
?></h1>

</div>
<div class="container"> <h1>In Transit</h1> <br>
<h1><?php 
$sql="select * from orders WHERE orderStatus = '3'";
$result=mysqli_query($conn,$sql); 
$rws=mysqli_num_rows($result);
echo $rws;
?></h1>

</div>

</div>

   
   

</body>
</html>