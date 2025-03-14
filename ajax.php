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
} else if ($action == "order") {
    $user_id = $_SESSION['id'];
    $product_id = $_REQUEST["product_id"];
    $product_price = $_REQUEST["product_price"];
    $product_quantity = $_REQUEST["product_quantity"];
    $total_price = $_REQUEST["total_price"];
    $is_delete = 0;
    $created_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `tbl_order`
               (
                  user_id,
                  product_id,
                  price,
                  quantity,
                  is_delete,
                  created_date
               )
               VALUES
               (
                  ?,?,?,?,?,?
               )";
    $order_result = $db->prepare($sql);
    $order_result->execute(array(
        $user_id,
        $product_id,
        $product_price,
        $product_quantity,
        $is_delete,
        $created_date
    ));
    if ($order_result == true) {
        $sql = "UPDATE tbl_cart SET is_check_out = 1 WHERE user_id = " . $user_id;
        $statement = $db->prepare($sql);
        $statement->execute();
        echo "Order Success";
        header("Location: index.php");
        exit;
    }
} else if ($action == "delete_cart") {
    $user_id = $_SESSION['id'];
    $product_id = $_REQUEST["product_id"];
    $sql = "DELETE FROM tbl_cart WHERE user_id = " . $user_id . " AND product_id = " . $product_id;
    $statement = $db->prepare($sql);
    $statement->execute();
    echo "Delete Success";
    exit;
} else if ($action == "update_cart") {
    $user_id = $_SESSION['id'];
    $product_id = $_REQUEST["product_id"];
    $quantity = $_REQUEST["quantity"];
    $price = $_REQUEST["price"];
    $total_price = $quantity * $price;
    $sql = "UPDATE tbl_cart SET quantity = " . $quantity . ", price = " . $total_price . " WHERE user_id = " . $user_id . " AND product_id = " . $product_id;
    $statement = $db->prepare($sql);
    $statement->execute();
    echo "Update Success";
    exit;
} else if ($action == "login") {
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $sql = "SELECT * FROM tbl_users WHERE email = '" . $email . "' AND password = '" . $password . "'";
    $statement = $db->prepare($sql);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $data = $statement->fetch(PDO::FETCH_OBJ);
        $_SESSION['id'] = $data->id;
        $_SESSION['name'] = $data->name;
        $_SESSION['email'] = $data->email;
        echo "Login Success";
        exit;
    } else {
        echo "Login Failed";
        exit;
    }
} else if ($action == "logout") {
    session_destroy();
    echo "Logout Success";
    exit;
} else if ($action == "register") {
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $sql = "INSERT INTO `tbl_users` (name, email, password) VALUES (?,?,?)";
    $statement = $db->prepare($sql);
    $statement->execute(array($name, $email, $password));
    if ($statement == true) {
        echo "Register Success";
        exit;
    } else {
        echo "Register Failed";
        exit;
    }
} else if ($action == "check_login") {
    if (isset($_SESSION['id'])) {
        echo "Login";
        exit;
    } else {
        echo "Not Login";
        exit;
    }
} else if ($action == "get_cart") {
    $user_id = $_SESSION['id'];
    $sql = "SELECT tbl_products.*, tbl_cart.quantity, tbl_cart.price as cart_price FROM tbl_products ";
    $sql .= "INNER JOIN tbl_cart ON tbl_cart.product_id = tbl_products.id ";
    $sql .= "WHERE tbl_cart.is_check_out = 0 ";
    $sql .= "AND tbl_cart.user_id = " . $user_id . " ";
    $sql .= "ORDER BY id DESC";
    $statement = $db->prepare($sql);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $output = '';
        while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
            $output .= '<tr class="table_row">';
            $output .= '<td class="column-1">';
            $output .= '<div class="how-itemcart1">';
            $output .= '<img src="images/' . $data->image . '" alt="IMG">';
            $output .= '</div>';
            $output .= '</td>';
            $output .= '<td class="column-2">';
            $output .= '<input type="hidden" name="product_id" value="' . $data->id . '">';
            $output .= '<input type="hidden" name="product_price" value="' . $data->price . '">';
            $output .= '<input type="hidden" name="product_quantity" value="' . $data->quantity . '">';
            $output .= $data->name;
            $output .= '</td>';
            $output .= '<td class="column-3 p-l-10">' . '₹' . $data->price . '</td>';
            $output .= '<td class="column-4">';
            $output .= '<div class="wrap-num-product flex-w m-l-auto m-r-0">';
            $output .= '<div class="btn-num-product-down cl8 hov-btn btn-minus" data-product_id="' . $data->id . '">';
            $output .= '<i class="fs-16 zmdi zmdi-minus"></i>';
            $output .= '</div>';
            $output .= '<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="' . $data->quantity . '">';
            $output .= '<div class="btn-num-product-up cl8 hov-btn btn-plus" data-product_id="' . $data->id . '">';
            $output .= '<i class="fs-16 zmdi zmdi-plus"></i>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</td>';
            $output .= '<td class="column-5">₹ ' . $data->cart_price . '</td>';
            $output .= '<td class="column-6">';
            $output .= '<button class="btn btn-danger btn-sm btn-delete" data-product_id="' . $data->id . '">Delete</button>';
            $output .= '</td>';
            $output .= '</tr>';
        }
        echo $output;
        exit;
    } else {
        echo "Cart is empty";
        exit;
    }
} else if ($action == "get_order") {
    $user_id = $_SESSION['id'];
    $sql = "SELECT tbl_products.*, tbl_order.product_price, tbl_order.product_quantity, tbl_order.total_price, tbl_order.created_date FROM tbl_products ";
    $sql .= "INNER JOIN tbl_order ON tbl_order.product_id = tbl_products.id ";
    $sql .= "WHERE tbl_order.is_delete = 0 ";
    $sql .= "AND tbl_order.user_id = " . $user_id . " ";
    $sql .= "ORDER BY id DESC";
    $statement = $db->prepare($sql);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $output = '';
        while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
            $output .= '<tr class="table_row">';
            $output .= '<td class="column-1">';
            $output .= '<div class="how-itemcart1">';
            $output .= '<img src="images/' . $data->image . '" alt="IMG">';
            $output .= '</div>';
            $output .= '</td>';
            $output .= '<td class="column-2">';
            $output .= $data->name;
            $output .= '</td>';
            $output .= '<td class="column-3 p-l-10">' . '₹' . $data->product_price . '</td>';
            $output .= '<td class="column-4">';
            $output .= $data->product_quantity;
            $output .= '</td>';
            $output .= '<td class="column-5">₹ ' . $data->total_price . '</td>';
            $output .= '<td class="column-6">';
            $output .= $data->created_date;
            $output .= '</td>';
            $output .= '</tr>';
        }
        echo $output;
        exit;
    } else {
        echo "Order is empty";
        exit;
    }
} else if ($action == "get_total_cart") {
    $user_id = $_SESSION['id'];
    $sql = "SELECT SUM(price) as total_price FROM tbl_cart WHERE user_id = " . $user_id . " AND is_check_out = 0";
    $statement = $db->prepare($sql);
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_OBJ);
    echo $data->total_price;
    exit;
} else if ($action == "get_total_order") {
    $user_id = $_SESSION['id'];
    $sql = "SELECT SUM(total_price) as total_price FROM tbl_order WHERE user_id = " . $user_id . " AND is_delete = 0";
    $statement = $db->prepare($sql);
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_OBJ);
    echo $data->total_price;
    exit;
} else {
    echo "Invalid Action";
    header("Location: index.php");
    exit;
}

?>