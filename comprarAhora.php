<!DOCTYPE html>
<!--<?php session_start();
if (isset($_SESSION['check'])) {
    $value = $_SESSION['check'];
} else {
    header("location: " . "userZone.php");
}

?>-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.paypal.com/sdk/js?client-id=ASaxjld6hnKh3G9ftdxz0bnut7qkkHdipJ7Ygx39Rww2qeW156UDtzf6kYFLpAEkJfxKU1IfDkSAhhie&components=buttons">

    </script>
    <title>Pagar</title>
</head>

<body>
    <script>
        let val;
        pay();
        function pay() {
            val = document.getElementById('total');
            val1 = val.textContent;
            val = val1.substring(0, val1.length - 1);
            console.log(val);
        }
    </script>
    <div id="paypal-button-container">
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: val.toString(),  // Can also reference a variable or function
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {
                        // Successful capture! For dev/demo purposes:
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                        const transaction = orderData.purchase_units[0].payments.captures[0];
                        alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                        // When ready to go live, remove the alert and show a success message within this page. For example:
                        // const element = document.getElementById('paypal-button-container');
                        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                        // Or go to another URL:  actions.redirect('thank_you.html');
                    });
                }
            }).render('#paypal-button-container');
        </script>
    </div>

</body>

</html>