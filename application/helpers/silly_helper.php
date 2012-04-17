<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * A Silly Place "Silly" Helpers
 *
 * @category	Helpers
 * @author		Josh Thomas
 * 
 * Utility function(s) for A Silly Place
 *
 */
// ------------------------------------------------------------------------
/**
 * Returns a random string
 *
 * @access public
 * @param int $length_of_string
 * @return string
 */
if ( ! function_exists('rand_string' ) ) 
{
	function rand_string ($length_of_string = 6)
	{
		$arr = str_split('ABCDEFGHIJKLMNOP'); // get all the characters into an array
		shuffle($arr); // randomize the array
		$arr = array_slice($arr, 0, $length_of_string); // get the first six (random) characters out
		return implode('', $arr); // smush them back into a string
	}
}