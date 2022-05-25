<?php
session_start();
require('stripe-php-master/config.php');
$pid = $_SESSION['pid'];
?>
<!DOCTYPE html>
<html>
<title>Payment Gateway</title>

<head>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #242d60;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto',
        'Helvetica Neue', 'Ubuntu', sans-serif;
      height: 100vh;
      margin: 0;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    section {
      background: #ffffff;
      display: flex;
      flex-direction: column;
      width: 400px;
      height: 112px;
      border-radius: 6px;
      justify-content: space-between;
    }

    .product {
      display: flex;
      padding: 24px;
    }

    .description {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    p {
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 20px;
      letter-spacing: -0.154px;
      color: #242d60;
      height: 100%;
      width: 100%;
      padding: 0 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-sizing: border-box;
    }

    h3,
    h5 {
      font-style: normal;
      font-weight: 500;
      font-size: 14px;
      line-height: 20px;
      letter-spacing: -0.154px;
      color: #242d60;
      margin: 0;
    }

    h5 {
      opacity: 0.5;
    }

    button {
      height: 36px;
      background: #556cd6;
      color: white;
      width: 100%;
      font-size: 14px;
      border: 0;
      font-weight: 500;
      cursor: pointer;
      letter-spacing: 0.6;
      border-radius: 0 0 6px 6px;
      transition: all 0.2s ease;
      box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
    }

    .cbutton {
      height: 36px;
      background: #556cd6;
      color: white;
      width: 100%;
      font-size: 14px;
      margin-top: 20px;
      border: 0;
      font-weight: 500;
      cursor: pointer;
      letter-spacing: 0.6;
      border-radius: 0 0 6px 6px;
      transition: all 0.2s ease;
      box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
    }

    button:hover {
      opacity: 1;
    }

    .detailsection {
      display: block;
    }

    .anim {
      width: 25%;
      margin: 0% 4%;
    }
  </style>

</head>
<div class="anim" id="anim"></div>
<section>
  <div class="product">
    <div class="description">
      <h3>The Amount to Be Pay By : <?php echo  $_SESSION['username']; ?></h3>
      <h5>₹<?php echo $_SESSION['amount']; ?></h5>
    </div>
  </div>
  <form action="thank_you.php" method="POST">
    <button type="submit" value="Pay with Card" data-key="<?php echo $publishableKey ?>" data-amount="<?php echo $_SESSION['amount'] * 100; ?>" data-currency="inr" data-name="Dairy System" data-description=" Dairy System Payment">Procced to Pay</button>
    <input type="button" id="delete" class="cbutton" name="cancelbutton" value="Cancel Payment" onclick="back();">


    <script src="https://checkout.stripe.com/v2/checkout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="js/delete.js"></script>
    <script>
      $(document).ready(function() {
        $(':submit').on('click', function(event) {
          event.preventDefault();

          var $button = $(this),
            $form = $button.parents('form');

          var opts = $.extend({}, $button.data(), {
            token: function(result) {
              $form.append($('<input>').attr({
                type: 'hidden',
                name: 'stripeToken',
                value: result.id
              })).submit();
            }
          });

          StripeCheckout.open(opts);
        });
      });

      function back() {
        window.location.href = "cart.php";
      }
    </script>
    <script src="./js/lottie.js"></script>
    <script src="js/app.js"></script>
  </form>
</section>

</body>

</html>