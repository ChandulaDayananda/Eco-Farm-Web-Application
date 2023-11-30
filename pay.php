<?php require "config/config.php";?>
<?php require "libs/App.php";?>
<?php require "includes/header.php";?>

<?php
      if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to the landing page
        echo "<script>window.location.href='".APPURL."'</script>";
        exit;
    }
?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Pay with Paypal</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Pay</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Navigation Bar End -->

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- This is a sample sandbox Business account app client ID so don't add card details when marking the assignment-->
            <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>
            <script>
                paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: <?php echo $_SESSION['total_price']; ?> 
                                }
                            }]
                        });
                    },
                    // Finalize the transaction after payer approval
                    onApprove: (data, actions) => {
                        return actions.order.capture().then(function(orderData) {
                            window.location.href='deletecart.php';
                        });
                    }
                }).render('#paypal-button-container');
            </script>
        </div>
    </div>
</div>

<?php require "includes/footer.php";?>
