<?php

$_POST = array_reverse( $_POST );

$plugin_file = trailingslashit( $new_plugin_folder) . 'otto-minimal-plugin-template.php';
$content = $wp_filesystem->get_contents( $plugin_file );

foreach ( $_POST AS $k => $v ) {
    $content = str_replace( $k, $v, $content );
}
$res = $wp_filesystem->put_contents( $plugin_file, $content );

