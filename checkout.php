<?php
$title = "Checkout";
require_once("./includes/header.php");
?>

<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Checkout Page</h2>
                        <ul>
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            <div class="row">

            </div>
            <div class="row " style="justify-content:center;">
                <div class="col-lg-6 col-12 ">
                    <div class="col-12">
                        <div class="coupon-accordion">

                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">

                                    <p class="checkout-coupon">
                                        <input placeholder="Coupon code" type="text" id="coupon_code">
                                        <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                    </p>
                                    <span class="expired" style="font-size:12px;"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="checkout_handler.php" method="POST">
                        <input type="text" value="<?= $user; ?>" name="user" hidden>
                        <?php
                        $query = "SELECT * FROM add_user WHERE user_id='$user'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        $email = $row["email"];
                        if ($email == "") {


                        ?>
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input placeholder="Enter First Name" name="firstname" type="text" required>
                                        </div>

                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input placeholder="Enter Last Name" type="text" name="lastname" required>
                                        </div>

                                        <div class="checkout-form-list">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input placeholder="Enter Email" type="email" name="email" required>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12">
                                <div class="coupon-accordion">

                                    <h3>Do you wish to change your email, for receiving products? <span id="showemail">Click
                                            here to change your email</span></h3>
                                    <div id="checkout_email" class="coupon-checkout-content">


                                        <div class="checkbox-form">

                                            <div class="row">


                                                <div class="col-md-12">


                                                    <div class="checkout-form-list">
                                                        <label>Old Email </label>
                                                        <input placeholder="Enter Old Email" type="email" name="oldEmail">
                                                    </div>

                                                    <div class="checkout-form-list">
                                                        <label>New Email </label>
                                                        <input placeholder="Enter New Email" type="email" name="newEmail">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout-body">

                                        <?php
                                        $amount = 0;
                                        $query = "SELECT * FROM add_cart WHERE user_id='$user'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $amount += $row['item_amount'];
                                        ?>
                                                <tr class="cart_item" data-id="<?= $row['cart_id']; ?>">
                                                    <td class="cart-product-name"><?= $row['item_name']; ?></td>
                                                    <td class="cart-product-total">$<span class="amount"><?= $row['item_amount']; ?></span></td>
                                                </tr>
                                        <?php

                                            }
                                        }
                                        $producerAmount = 0;
                                        $query1 = "SELECT * FROM add_cart WHERE user_id='$user' AND ";
                                        $result1 = mysqli_query($conn, $query);
                                        ?>


                                    </tbody>
                                    <tfoot class="checkout-total">
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td>$<span class="amount"><?= number_format($amount, 2); ?></span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong>$<span class="amount"><?= number_format($amount, 2); ?></span></strong>
                                            </td>

                                        </tr>
                                        <input type="text" class="amount-input" hidden name="amount" value="<?= $amount; ?>">
                                        <!-- Having two amount input, one stores amount for producer items, the other stores for song writer -->


                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h5 class="panel-title">
                                                    <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                        Direct Bank Transfer.
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your
                                                        Order
                                                        ID as the payment
                                                        reference. Your order won’t be shipped until the funds have
                                                        cleared
                                                        in
                                                        our account.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h5 class="panel-title">
                                                    <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#paymentGateway" aria-expanded="true">
                                                        Choose Payment Gateway
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="paymentGateway" class="collapse " data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <input type="radio" name="paymentgateway[]" checked value="payStack" id=""><span style="margin-left:20px;">Pay Stack</span><br>
                                                    <!-- <input type="radio" name="paymentgateway[]" value="payPal" id=""><span style="margin-left:20px;">Pay Pal</span> -->
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="order-button-payment">
                                        <input value="Purchase Items" type="submit" name="place_order" id="place_order">
                                        <p id="order-text" class="text-center my-3 text-danger"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->

<?php
require_once("./includes/footer.php");
?>

<script>
    var windows = $(window);
    $('#showemail').on('click', function() {
        $('#checkout_email').slideToggle(900);

    })
</script>