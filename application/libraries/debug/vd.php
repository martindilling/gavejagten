<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * VD
 * usage : vd::dump($your_var);
 * usage : vd::dumpd($your_var); (dies after the dump)
 */
class vd {
	public function dump ($var, $name = '') {
		$style = "
					background-color: #eee; 
					padding: 20px 20px 20px 20px;
					margin: 15px auto;
					width: 960px;
					border: 1px solid #222; 
					text-align: left; 
					font-family: 
					monospace; 
					font-size: 100%;
					-webkit-border-radius: 7px;
					-moz-border-radius: 7px;
					border-radius: 7px;
					-webkit-box-shadow: 0px 0px 10px #888;
					-moz-box-shadow: 0px 0px 10px #888;
					box-shadow: 0px 0px 10px #888;
				";
		vd::_print($var, $name, $style);	
    }
	
	public function dumpd ($var, $name = '') {
        vd::dump($var, $name);
		die();
    }
	
	private function _print ($var, $name = '', $style) {
		echo "<pre style='$style'>" .
			($name != '' ? "$name : " : '') .
			vd::_get_info_var ($var, $name) .
			"</pre>";
	}
    
    private function _get_info_var ($var, $name = '', $indent = 0) {
        static $methods = array ();
        $indent > 0 or $methods = array ();

        $indent_chars = '    ';
        $spc = $indent > 0 ? str_repeat ($indent_chars, $indent ) : '';
        
        $out = '';
        if (is_array ($var)) {
            $out .= "<span style='color:#cc0000;'><b>array</b></span>(" . count ($var) . ") (\n";
            foreach (array_keys ($var) as $key) {
                $out .= "$spc    [<span style='color:#cc0000;'>$key</span>] <font color='#888a85'>=&gt;</font> ";
                if (($indent == 0) && ($name != '') && (! is_int ($key)) && ($name == $key)) {
                    $out .= "LOOP\n";
                } else {
                    $out .= vd::_get_info_var ($var[$key], '', $indent + 1);
                }
            }
            $out .= "$spc)";
        } else if (is_object ($var)) {
            $class = "<span style='color:#00aaaa;'>" . get_class ($var) . "</span>";
            $out .= "<span style='color:purple;'><b>object</b></span> $class";
            $parent = get_parent_class ($var);
            $out .= $parent != '' ? " <span style='color:purple;'>extends</span> <span style='color:#006688;'>" . $parent  . "</span>" : '';
            $out .= " (\n";
            $arr = get_object_vars ($var);
            while (list($prop, $val) = each($arr)) {
                $out .= "$spc  " . "<font color='#888a85'>-&gt;</font><span style='color:purple;'>$prop</span> = ";
                $out .= vd::_get_info_var ($val, $name != '' ? $prop : '', $indent + 1);
            }
            $arr = get_class_methods ($var);
            $out .= "$spc  " . "$class methods: " . count ($arr) . " ";
            if (in_array ($class, $methods)) {
                $out .= "<font color='#a8aaa5'><i>[already listed]</i></font>\n";
            } else {
                $out .= "(\n";
                $methods[] = $class;
                while (list($prop, $val) = each($arr)) {
                    if ($val != $class) {
                        $out .= $indent_chars . "$spc  " . "<font color='#888a85'>-&gt;</font><span style='color:blue;'>$val();</span>\n";
                    } else {
                        $out .= $indent_chars . "$spc  " . "<font color='#888a85'>-&gt;</font><span style='color:blue;'>$val();</span> <font color='#a8aaa5'><i>[<b>constructor</b>]</i></font>\n";
                    }
                }
                $out .= "$spc  " . ")\n";
            }
            $out .= "$spc)";
        } else if (is_resource ($var)) {
            $out .= "<small>resource</small> <span style='color:steelblue;'>" . $var . "</span> <font color='#a8aaa5'><i>(type=" . get_resource_type($var) . ")</i></font>";
        } else if (is_int ($var)) {
            $out .= "<small>int</small> <span style='color:blue;'>" . $var . "</span>";
        } else if (is_float ($var)) {
            $out .= "<small>float</small> <span style='color:blue;'>" . $var . "</span>";
        } else if (is_numeric ($var)) {
            $out .= "<small>numstring</small> '<span style='color:green;'>" . $var . "</span>'  <font color='#a8aaa5'><i>(length=" . strlen($var) . ")</i></font>";
        } else if (is_string ($var)) {
            $out .= "<small>string</small> '<span style='color:green;'>" . nl2br(htmlentities($var)) . "</span>' <font color='#a8aaa5'><i>(length=" . strlen($var) . ")</i></font>";
        } else if (is_bool ($var)) {
            $out .= "<small>bool</small> <span style='color:darkorange;'>" . ($var ? 'True' : 'False') . "</span>";
        } else if (! isset ($var)) {
            $out .= "<small>null</small>";
        } else {
            $out .= "<small>other</small> " . $var . "";
        }
        
        return $out . "\n";
    }
}

/* End of file vd.php */
/* Location: ./application/libraries/vd.php */