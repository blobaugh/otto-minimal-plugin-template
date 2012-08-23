<?php

$_POST = array_reverse( $_POST );

$plugin_file = trailingslashit( $new_plugin_folder) . 'otto-minimal-plugin-template.php';
$content = $wp_filesystem->get_contents( $plugin_file );

foreach ( $_POST AS $k => $v ) {
    $content = str_replace( $k, $v, $content );
}
$res = $wp_filesystem->put_contents( $plugin_file, $content );

$orig_plugin_file = trailingslashit( $new_plugin_folder ) . 'otto-minimal-plugin-template.php';
$new_plugin_file = trailingslashit( $new_plugin_folder ) . $slug . '.php' ;
$res = $wp_filesystem->move( $orig_plugin_file, $new_plugin_file );

if( !$res ) {
  bl_debug( 'Unable to move plugin file', "From $orig_plugin_file<br/>To $new_plugin_file", 'error' );  
}

