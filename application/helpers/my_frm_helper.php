<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('my_frm_dropdown'))
{
	function my_frm_dropdown($collect = array(),$key,$val)
	{
		$options = array();
		foreach($collect as $g)
		{
			$options[$g[$key]]=$g[$val];
		}
		return form_dropdown($key, $options);
	}
}
/* End of file my_helper.php */
/* Location: ./application/helpers/my_helper.php */
