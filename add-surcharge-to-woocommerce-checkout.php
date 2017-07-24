<?php

add_action( 'woocommerce_cart_calculate_fees', 'add_surcharge', 99, 1 );
function add_surcharge( $cart ) {
  global $woocommerce;
  $chosen_method = $woocommerce->session->chosen_payment_method;

  /**
  * If you want to get the list of the available payment methods and their ID's, use this code:
  * global $woocommerce;
  * $available_gateways = $woocommerce->payment_gateways->get_available_payment_gateways();
  * var_dump( $available_gateways );
  **/

  $your_method = 'cod';

  if( $chosen_method == $your_method ) {
    $fee = 0.042; // 4.2%
    $label = 'Credit Card Processing Fee'; // This is what will appear in the checkout table
    $surcharge = ( $woocommerce->cart->cart_contents_total + $woocommerce->cart->shipping_total ) * $fee;
    $woocommerce->cart->add_fee( $fee, $surcharge );
  }
}
