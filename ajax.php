<?php
include("config/connection.php");

$action = $_REQUEST['action'];

if ($action == "add_to_cart") {
    $product_id = $_REQUEST["product_id"];
    $quantity = $_REQUEST["quantity"];
    $output = '';
    if (!isset($_SESSION['id'])) {
        $output = "Not Login";
        echo $output;
        exit;
    } else {
        $user_id = $_SESSION['id'];
        $is_check_out = 0;
        $created_date = date('Y-m-d H:i:s');

        $query = "SELECT * FROM tbl_products WHERE id='$product_id'";
        $result = $db->prepare($query);
        $result->execute();
        $total = $result->rowcount();
        if ($total > 0) {
            $data = $result->fetch(PDO::FETCH_OBJ);

            $product_id = $data->id;
            $name = $data->name;
            $category_id = $data->category_id;
            $image = $data->image;
            $description = $data->description;
            $price = $quantity * $data->price;

            $sql = "INSERT INTO `tbl_cart`
               (
                  user_id,
                  product_id,
                  quantity,
                  price,
                  is_check_out,
                  created_date
               )
               VALUES
               (
                  ?,?,?,?,?,?
               )";
            $cart_result = $db->prepare($sql);
            $cart_result->execute(array(
                $user_id,
                $product_id,
                $quantity,
                $price,
                $is_check_out,
                $created_date
            ));
            if ($cart_result == true) {
                $output .= '<li class="header-cart-item flex-w flex-t m-b-12">';
                $output .= '<div class="header-cart-item-img">';
                $output .= '<img src="images/' . $image . '" alt="IMG">';
                $output .= '</div>';
                $output .= '<div class="header-cart-item-txt p-t-8">';
                $output .= '<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">';
                $output .= $name;
                $output .= '</a>';
                $output .= '<span class="header-cart-item-info">';
                $output .= $quantity . ' x ₹' . $price;
                $output .= '</span>';
                $output .= '</div>';
                $output .= '</li>';
                echo $output;
                exit;
            }
        } else {
            echo $output;
            exit;
        }
    }
}
?>