<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'admin_footer', 'awp_echo_usage_message', 50 );

if ( ! function_exists('ppc_editing_plugin') ) {
function ppc_editing_plugin() {
	// avoid lockout in case of erroneous plugin edit via wp-admin
	global $pagenow;
	
	if ( is_admin() && isset($pagenow) && ( 'plugin-editor.php' == $pagenow ) ) {
		if ( empty( $_REQUEST['action'] ) || ! in_array( $_REQUEST['action'], array( 'activate', 'deactivate' ) ) )
			return true;
	}
	
	return false;
}
}

if ( ! function_exists('d_echo') ) {
function d_echo($str) {
	if ( ! constant('PP_DEBUG') )
		return;

	echo($str);
}
}

if ( ! function_exists('pp_errlog') ) {
	function pp_errlog($msg, $line_break = true) {
		if ( ! constant('PP_DEBUG') )
			return;
			
		if( is_array($msg) || is_object($msg) )
			$msg = serialize( $msg );
			
		$append = ( $line_break ) ? "\r\n" : '';
		
		if ( defined('PP_DEBUG_LOGFILE') )
			error_log($msg . $append, 3, PP_DEBUG_LOGFILE);
		
		elseif ( defined('PPC_ABSPATH') && is_writable(PPC_ABSPATH) )
			error_log($msg . $append, 3, PPC_ABSPATH . '/php_debug.txt');
	}
}

if ( ! function_exists('ppc_errlog') ) {
	function ppc_errlog($msg, $line_break = true) {
		if ( ! constant('PP_DEBUG') )
			return;
			
		if( is_array($msg) || is_object($msg) )
			$msg = serialize( $msg );
			
		$append = ( $line_break ) ? "\r\n" : '';
		
		if ( defined('PPC_DEBUG_LOGFILE') )
			error_log($msg . $append, 3, PPC_DEBUG_LOGFILE);
		
		elseif ( defined('PPC_ABSPATH') && is_writable(PPC_ABSPATH) )
			error_log($msg . $append, 3, PPC_ABSPATH . '/php_debug.txt');
	}
}

if ( ! function_exists('agp_bt_die') ) {
function agp_bt_die( $die = true ) {
	if ( ! constant('PP_DEBUG') )
		return;

	dump(debug_backtrace(),false,false);
	
	if ( $die )
		die;
}
}


if ( ! function_exists('_pp_memory_new_usage') ) {
function _pp_memory_new_usage () {
	if ( ! constant('PP_DEBUG') || ! defined('PP_MEMORY_LOG') || ! PP_MEMORY_LOG )
		return;
	
	static $last_mem_usage;
	
	if ( ! isset($last_mem_usage) )
		$last_mem_usage = 0;
	
	$current_mem_usage = memory_get_usage(true);
	$new_mem_usage = $current_mem_usage - $last_mem_usage;
	$last_mem_usage = $current_mem_usage;
	
	return $new_mem_usage;
}
}

if ( ! function_exists('pp_log_mem_usage') ) {
function pp_log_mem_usage( $label, $display_total = true ) {
	if ( ! constant('PP_DEBUG') || ! defined('PP_MEMORY_LOG') || ! PP_MEMORY_LOG )
		return;
		
	$total = $display_total ? " (" . memory_get_usage(true) . ")" : '';
		
	pp_errlog($label);
	pp_errlog( _pp_memory_new_usage() . $total );
	pp_errlog( '' );
}
}


////////////////////////////////////////////////////////
// Function:         dump
// Inspired from:     PHP.net Contributions
// Description: Helps with php debugging
//
// Revision by Kevin Behrens - http://agapetry.com
//		* display_objects optional arg 
//		* htmlspecialchars filtering if variable is a string containing '<'
//
// highstrike at gmail dot com
// http://us2.php.net/manual/en/function.print-r.php#80289
if ( ! function_exists('dump') ) {
function dump(&$var, $info = FALSE, $display_objects = true)
{
	if ( ! constant('PP_DEBUG') )
		return;

    $scope = false;
    $prefix = 'unique';
    $suffix = 'value';
 
    if($scope) $vals = $scope;
    else $vals = $GLOBALS;

    $old = $var;
    $var = $new = $prefix.rand().$suffix; $vname = FALSE;
    foreach($vals as $key => $val) if($val === $new) $vname = $key;
    $var = $old;

    echo "<pre id='agp_debug' style='margin: 0px 0px 10px 0px; display: block; background: white; color: black; font-family: Verdana; border: 1px solid #cccccc; padding: 5px; font-size: 10px; line-height: 13px;'>";
    if($info != FALSE) echo "<b style='color: red;'>$info:</strong><br />";
    do_dump($var, $display_objects, '$'.$vname);
    echo "</pre>";
}
}

////////////////////////////////////////////////////////
// Function:         do_dump
// Inspired from:     PHP.net Contributions
// Description: Better GI than print_r or var_dump

if ( ! function_exists('do_dump') ) {
function do_dump(&$var, $display_objects = true, $var_name = NULL, $indent = NULL, $reference = NULL)
{
    $do_dump_indent = "<span style='color:#eeeeee;'>|</span> &nbsp;&nbsp; ";
    $reference = $reference.$var_name;
    $keyvar = 'the_do_dump_recursion_protection_scheme'; $keyname = 'referenced_object_name';

    if (is_array($var) && isset($var[$keyvar]))
    {
        $real_var = &$var[$keyvar];
        $real_name = &$var[$keyname];
        $type = ucfirst(gettype($real_var));
        echo "$indent$var_name <span style='color:#a2a2a2'>$type</span> = <span style='color:#e87800;'>&amp;$real_name</span><br />";
    }
    else
    {
        $var = array($keyvar => $var, $keyname => $reference);
        $avar = &$var[$keyvar];
   
        $type = ucfirst(gettype($avar));
        if($type == "String") $type_color = "<span style='color:green'>";
        elseif($type == "Integer") $type_color = "<span style='color:red'>";
        elseif($type == "Double"){ $type_color = "<span style='color:#0099c5'>"; $type = "Float"; }
        elseif($type == "Boolean") $type_color = "<span style='color:#92008d'>";
        elseif($type == "NULL") $type_color = "<span style='color:black'>";
   
        if(is_array($avar))
        {
            $count = count($avar);
            echo "$indent" . ($var_name ? "$var_name => ":"") . "<span style='color:#a2a2a2'>$type ($count)</span><br />$indent(<br />";
            $keys = array_keys($avar);
            foreach($keys as $name)
            {
                $value = &$avar[$name];
                do_dump($value, $display_objects, "['$name']", $indent.$do_dump_indent, $reference);
            }
            echo "$indent)<br />";
        }
        elseif(is_object($avar))
        {
            echo "$indent$var_name <span style='color:#a2a2a2'>$type</span><br />$indent(<br />";
            if ( $display_objects )
           		foreach($avar as $name=>$value) do_dump($value, $display_objects, "$name", $indent.$do_dump_indent, $reference);
            echo "$indent)<br />";
        }
        elseif(is_int($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $type_color$avar</span><br />";
        elseif(is_string($avar)) { 
        	if ( false !== strpos($avar, '<') )
        		echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar). ")</span> $type_color\"" . htmlspecialchars($avar) . "\"</span><br />";
        	else
        		echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $type_color\"$avar\"</span><br />";
       	}
        elseif(is_float($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $type_color$avar</span><br />";
        elseif(is_bool($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> $type_color".($avar == 1 ? "TRUE":"FALSE")."</span><br />";
        elseif(is_null($avar)) echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span> {$type_color}NULL</span><br />";
        else echo "$indent$var_name = <span style='color:#a2a2a2'>$type(".strlen($avar).")</span><xmp> $avar</xmp><br />";

        $var = $var[$keyvar];
    }
}
}

if ( ! function_exists('awp_usage_message') ) {
function awp_usage_message( $translate = true ) {
	if ( function_exists('memory_get_usage') ) {
		if ( $translate )
			return sprintf( __('%1$s queries in %2$s seconds. %3$s MB used.', 'pp'), get_num_queries(), timer_stop(0, 2), round( memory_get_usage() / (1024 * 1024), 3), 'pp' ) . ' ';
		else
			return get_num_queries() . ' queries in ' . timer_stop(0, 2) . ' seconds. ' . round( memory_get_usage() / (1024 * 1024), 3) . ' MB used. ';
	}
}
}

if ( ! function_exists('awp_echo_usage_message') ) {
function awp_echo_usage_message( $translate = true ) {
	if ( ! defined( 'RVY_VERSION' ) && ! defined( 'AGP_USAGE_MESSAGE_DONE' )  && ! defined( 'AGP_NO_USAGE_MSG' ) ) {  // Revisionary outputs its own message
		echo awp_usage_message( $translate );
		define( 'AGP_USAGE_MESSAGE_DONE', true );
	}
}
}

