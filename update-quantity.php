<?php
    //Start session
    session_start();
    
    require_once('auth.php');
    
    //Include database connection details
    require_once('connection/config.php');
    
    //Connect to mysql server
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Failed to connect to server: ' . mysqli_error($link()));
    }
    
    //Select database
    $db = mysqli_select_db($link,DB_DATABASE);
    if(!$db) {
        die("Unable to select database");
    }
    
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        $str = @trim($str);
        $opcion=false;
        if($opcion==false) {
            $str = stripslashes($str);
        }
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        return mysqli_real_escape_string($link,$str);
    }
    
    if(isset($_POST['quantity']) && isset($_POST['item']))
        {
            //get quantity_id
            $quantity_id = clean($_POST['quantity']);
                
            //get member_id from session
            $member_id = $_SESSION['SESS_MEMBER_ID'];
            
            //get cart_id
            $cart_id = clean($_POST['item']);
            //$cart_id = 5;
            
            //get the quantity value based on quantity_id
            $qry_select=mysqli_query($link,"SELECT * FROM quantities WHERE quantity_id='$quantity_id'")
            or die("El sistema está experimentando problemas técnicos. Por favor, inténtelo de nuevo después de unos minutos.");
            
            //storing the quantity_value into a variable
            $row=mysqli_fetch_array($qry_select);
            $quantity_value=$row['quantity_value'];
            
            //get the price of a food based on cart_details and food_details tables
            $result=mysqli_query($link,"SELECT * FROM food_details,cart_details WHERE cart_details.member_id='$member_id' AND cart_details.flag='$flag_0' AND cart_details.food_id=food_details.food_id AND cart_details.cart_id='$cart_id'") or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
            
            //storing the value of food price into a variable
            $row=mysqli_fetch_array($result);
            $food_price=$row['food_price'];
            
            //perform a simple calculation to get a total value of a food based on quantity_value and food_price
            $total = $quantity_value * $food_price;
            
            //Create UPDATE query (updates total and quantity_id in the cart based on cart_id and member_id)
            $qry_update = "UPDATE cart_details SET quantity_id='$quantity_id', total='$total' WHERE cart_id='$cart_id' AND member_id='$member_id'";
            mysqli_query($link,$qry_update);
            
            if($qry_update){
                header("location: cart.php");
            }
            else{
                //Do nothing
            }
            
        }else {
            die("Algo ha salido mal. Nuestro equipo técnico está trabajando para resolver el problema. Por favor, inténtelo de nuevo después de unos minutos.");
        }
?>