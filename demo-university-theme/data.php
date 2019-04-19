<?php

global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}options WHERE option_id = 1", OBJECT );



?>