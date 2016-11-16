<?php

 /**
 * Plugin Name: PesaPi Payments Dashboard
 * Plugin URI: http://github.com/bomb1e/wp-plugin-pesapi-dashboard
 * Description: A dashboard showing all the payments made to a pesapi database
 * Version: 0.1
 * Author: Eric Githinji
 * Author URI: http://github.com/bomb1e
 * License: MIT
 */

  function payment_dashboard_menu() {
    add_menu_page(
      'Payments Dashboard',
      'Payments',
      'manage_options',
      'payment_dashboard/payment_dashboard_index.php',
      '',
      'dashicons-money'
    );
  }
  
  add_action('admin_menu', 'payment_dashboard_menu');

?>
