<?php
require('stripe-php-master/init.php');
$publishableKey = "pk_test_51Kw1MXSGsQqm06RRsR43GJKWkITs3QPlABGjjLzpz005rHYADhJFXD8Mp5Fnl1DiwyQTSNdEqqxScH3zAUETJfzp00jSxUaLak";
$secretKey = "sk_test_51Kw1MXSGsQqm06RR8ewQbNey64otulkKXY9gaM0oYfMdq73Y0Ao36k30rGsG8LaTde6xObWueh9ZTWjjecJlqC7t008AgQ9XKc";
\Stripe\Stripe::setApiKey($secretKey);
