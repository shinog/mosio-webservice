<?php
/**
 * Example: Simple Purchase
 * 
 * This example shows the simplest method of accepting a payment with PayPal.
 */

require_once( 'http://shinog.heteml.jp/liveself.me/paypal-examples/functions.php' );

$paypal = create_example_purchase();

?>



	<div class="container">
		<h2>PayPal Simple Purchase Demo</h2>
		<p><b>Description:</b> <?php echo $paypal->get_description(); ?></p>
		<p><b>Purchase price:</b> <?php echo $paypal->get_purchase_price(); ?></p>
		<?php $paypal->print_buy_button(); ?>
	</div>

