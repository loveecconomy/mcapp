<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
if ( ! function_exists('asset_url()'))
{
  function asset_url()
  {
     return base_url().'assets/';
  }
}

if ( ! function_exists('short_date'))
{
	/**
	 * Timespan
	 *
	 * Returns a span of seconds in this format:
	 *	10 days 14 hours 36 minutes 47 seconds
	 *
	 * @param	int	a number of seconds
	 * @param	int	Unix timestamp
	 * @param	int	a number of display units
	 * @return	string
	 */
	function short_date($date = '')
	{
		$CI =& get_instance();
		$CI->lang->load('date');
    	$seconds = 1;
		is_numeric($seconds) OR $seconds = 1;
		is_numeric($date) OR $date = time();
		$current = time();
		$time = $current - $date;
		$seconds = ($time <= $seconds) ? 1 : $time - $seconds;

		$str = array();
		$years = floor($seconds / 31557600);

		if ($years > 0)
		{
			return $years.'yr';
		}

		$seconds -= $years * 31557600;
		$months = floor($seconds / 2629743);

		if ($months > 0)
		{
			return $months.'mon';
		}

		$seconds -= $months * 2629743;
		$weeks = floor($seconds / 604800);

		
		if ($weeks > 0)
		{
			return $weeks.'wk';
		}
		$seconds -= $weeks * 604800;
		$days = floor($seconds / 86400);

		if ($days > 0)
		{
			$str[] = $days.'d';
		}
		$seconds -= $days * 86400;
		$hours = floor($seconds / 3600);

		if ($hours > 0)
		{
			return $hours.'hr';
		}

		$seconds -= $hours * 3600;
		$minutes = floor($seconds / 60);

		if ($minutes > 0)
		{
			return $minutes.'min';
		}
		$seconds -= $minutes * 60;

		if (count($str) === 0)
		{
			return $seconds.'sec ';
		}
	}
}



// ------------------------------------------------------------------------

if ( ! function_exists('mysql_to_unix'))
{
	/**
	 * Converts a MySQL Timestamp to Unix
	 *
	 * @param	int	MySQL timestamp YYYY-MM-DD HH:MM:SS
	 * @return	int	Unix timstamp
	 */
	function mysql_to_unix($time = '')
	{
		// We'll remove certain characters for backward compatibility
		// since the formatting changed with MySQL 4.1
		// YYYY-MM-DD HH:MM:SS

		$time = str_replace(array('-', ':', ' '), '', $time);

		// YYYYMMDDHHMMSS
		return mktime(
			substr($time, 8, 2),
			substr($time, 10, 2),
			substr($time, 12, 2),
			substr($time, 4, 2),
			substr($time, 6, 2),
			substr($time, 0, 4)
		);
	}
}