<?php
include "connection.php";
if(isset($_GET['oid'])){
  $oid=$_GET['oid'];
  $result=$mysql_booking->query("SELECT * FROM `orders` WHERE `oid` = $oid ");
  $obj=$result->fetch_object();

	$ctoken=$obj->client_token;
  $currncy=$obj->currecies;
  $mysql_booking->close();
}
else{
	echo "order id missing  abort mission";
}
$fly_from=$_GET['ofrom'];
$fly_to=$_GET['oto'];
$fly_date=$_GET['fdate'];
$fly_back_from=$_GET['rfrom'];
$fly_back_to=$_GET['rto'];
$fly_rdate=$_GET['rdate'];
$cost=$_GET['cost'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>
      Duffel Components - example usage of CardPayment in non-React checkout
      page
    </title>
    <link
      rel="stylesheet"
      href="https://unpkg.com/@duffel/components@latest/dist/CardPayment.min.css"
    />
  </head>
  <body class="container">
    <p>flight info:</p>
    <table>
      <tr>origin</tr>
      <tr><td>from :<?php echo $fly_from; ?> </td><td>  to:<?php echo $fly_to; ?> </td><td>  date: <?php echo $fly_date;?></td></tr>
      <tr><td>from :<?php echo $fly_back_from; ?> </td><td>   to:<?php echo $fly_back_to; ?> </td><td>  date: <?php echo $fly_rdate;?></td></tr>
      <tr><td>cost: <?php echo $cost; echo " ".$currncy; ?></td></tr>
    </table>
    


    <p>payment status:</p>
    <h1 id='asaf'> pending</h1>

    <div id="target"></div>
    <script
      type="text/javascript"
      src="https://unpkg.com/@duffel/components@latest/dist/CardPayment.umd.min.js"
    ></script>
    <script>

const errorPaymentHandlerFn = (error) => {
  // Show error page
  document.getElementById("asaf").innerHTML = JSON.stringify(error);

  alert(JSON.stringify(error));
  
}

      DuffelComponents.renderCardPaymentComponent('target', {
        duffelPaymentIntentClientToken: '<?php echo $ctoken; ?>',
        successfulPaymentHandler: handleSuccess, // Show 'successful payment' page and confirm Duffel PaymentIntent
        errorPaymentHandler: errorPaymentHandlerFn // Show error page
      })
      
      function handleSuccess(res) {
        document.getElementById("asaf").innerHTML = "payment was successful";

        alert("success"+JSON.stringify(res));
      return res;
  }

  function handleError(error) {
    alert("error"+JSON.stringify(error));
      return function () {
          return { success: false, message: error };
      };
  }



    </script>
  </body>
</html>


