<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
global $con;
if (isset($_POST['register'])) {
    $ip = getIp();
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
 
    $c_contact = $_POST['c_contact'];


    $insert_c = "INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,customer_contact) VALUES ('$ip','$c_name','$c_email','$c_pass','$c_contact')";

    $run_c = mysqli_query($con, $insert_c);

    $sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart == 0) {
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Account has been created successfully. Thanks!')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    } else {
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Account has been created successfully. Thanks!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Happy Holidays : Register</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <style type="text/css">
        #fixm {
            font-size: 15px;
            padding: 4px;
            
        }

        #fixi {
            font-size: 14px;
           
        }

        #btn {
            
            font-size: 14px;
            background-color: yellow; /* Green */
            border: none;
            color: black;
            padding: 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            
            cursor: pointer;
            
            
        }

        #btn:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <!--Main container starts here-->
    <div class="main_wrapper">
        <!--Header starts here-->
        <?php include 'includes/header.php'; ?>
        <!--Header ends here-->
        <!--Navbar starts here-->
        <?php include 'includes/navbar.php'; ?>
        <!--Navbar ends here-->
        <!--Content starts here-->
        <div class="content_wrapper">
            <!--left-sidebar starts-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--left-sidebar ends-->
            <div id="content_area">
                <?php cart(); ?>
                <div id="shopping_cart">
                        <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Welcome Guest! <b
                                    style="color: yellow;">Shopping Cart-</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a
                                    href="cart.php" style="color: yellow;">Go to Cart</a></b></span>
                </div>
                <form action="customer_register.php" method="post" enctype="multipart/form-data">
                    <table align="center" width="750" style="margin-top: 20px;">
                        <tr align="center">
                            <td colspan="6">
                                <h2 style="margin-bottom: 15px;">Create an Account</h2>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Your Name:</td>
                            <td><input id="fixi" type="text" name="c_name" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Your Email:</td>
                            <td><input type="email" name="c_email" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Your Password:</td>
                            <td><input id="fixi" type="password" name="c_pass" required=""></td>
                        </tr>
                        
                        
                        
                       
                        <tr>
                            <td align="right" id="fixm">Your Contact:</td>
                            <td><input id="fixi" type="text" name="c_contact" required=""></td>
                        </tr>
                        
                        <tr align="center">
                            <td colspan="6"><input id="btn" type="submit" name="register" value="Create Account">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--Content ends here-->
        <!--footer starts-->
        <?php include "includes/footer.php"; ?>
        <!--footer ends-->
    </div>
    <!--Main container ends here-->
</body>
</html>
