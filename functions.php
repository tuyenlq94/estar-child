<?php
function meta_scripts() {
	wp_enqueue_script( 'metabox-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'metabox-script', 'meta', array( 'ajaxURL' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'meta_scripts' );

if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
 
// Ajax load total price
add_action( 'wp_ajax_total', 'text_domain_load_total_ajax' );
add_action( 'wp_ajax_nopriv_total', 'text_domain_load_total_ajax' );
function text_domain_load_total_ajax() {
	$nguoi_lon = isset($_POST['nguoi_lon']) ? $_POST['nguoi_lon'] : '1';
	$nguoi_lon = intval($nguoi_lon);
	$tre_em = isset($_POST['tre_em']) ? $_POST['tre_em'] : '0';
	$tre_em = intval($tre_em);
	$set_do = isset($_POST['set_do_an']) ? $_POST['set_do_an'] : '100000';
	$set_do = intval($set_do);
	$phong = isset($_POST['phong']) ? $_POST['phong'] : '0';
	$phong = intval($phong);
	$total = ( $nguoi_lon * $set_do ) + ( $tre_em * $set_do /2 ) + $phong;
	$total = currency_format($total, ' VNĐ');
	wp_send_json( [ 'tong_tien' => $total ] );
	die();
}