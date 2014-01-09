<?php
class Time {
	/**
	* Returns a nicely formatted date string for given Datetime string.
	*
	* @param string $dateString Datetime string
	* @param int $format Format of returned date
	* @return string Formatted date string
	*/
	public static function nice($dateString = null, $format = 'D, M jS Y, H:i') {

		$date = ($dateString == null) ? time() : strtotime($dateString);
		return date($format, $date);
	}
	
	/**
	* Returns a formatted descriptive date string for given datetime string.
	*
	* If the given date is today, the returned string could be "Today, 6:54 pm".
	* If the given date was yesterday, the returned string could be "Yesterday, 6:54 pm".
	* If $dateString's year is the current year, the returned string does not
	* include mention of the year.
	*
	* @param string $dateString Datetime string or Unix timestamp
	* @return string Described, relative date string
	*/
	public static function niceShort($dateString = null) {
		$date = ($dateString == null) ? time() : strtotime($dateString);
		
		$y = (self::isThisYear($date)) ? '' : ' Y';

		if (self::isToday($date)) {
			$ret = sprintf('Today, %s', date("g:i a", $date));
		} elseif (self::wasYesterday($date)) {
			$ret = sprintf('Yesterday, %s', date("g:i a", $date));
		} else {
			$ret = date("M jS{$y}, H:i", $date);
		}

		return $ret;
	}
	
	/**
	* Returns true if given date is today.
	*
	* @param string $date Unix timestamp
	* @return boolean True if date is today
	*/
	public static function isToday($date) {
		return date('Y-m-d', $date) == date('Y-m-d', time());
	}
	
	/**
	* Returns true if given date was yesterday
	*
	* @param string $date Unix timestamp
	* @return boolean True if date was yesterday
	*/
	public static function wasYesterday($date) {
		return date('Y-m-d', $date) == date('Y-m-d', strtotime('yesterday'));
	}
	
	/**
	* Returns true if given date is in this year
	*
	* @param string $date Unix timestamp
	* @return boolean True if date is in this year
	*/
	public static function isThisYear($date) {
		return date('Y', $date) == date('Y', time());
	}
	
	/**
	* Returns true if given date is in this week
	*
	* @param string $date Unix timestamp
	* @return boolean True if date is in this week
	*/
	public static function isThisWeek($date) {
		return date('W Y', $date) == date('W Y', time());
	}
	
	/**
	* Returns true if given date is in this month
	*
	* @param string $date Unix timestamp
	* @return boolean True if date is in this month
	*/
	public static function isThisMonth($date) {
		return date('m Y',$date) == date('m Y', time());
	}
	
	/**
	* Returns either a relative date or a formatted date depending
	* on the difference between the current time and given datetime.
	* $datetime should be in a <i>strtotime</i>-parsable format, like MySQL's datetime datatype.
	*
	* Options:
	*  'format' => a fall back format if the relative time is longer than the duration specified by end
	*  'end' =>  The end of relative time telling
	*
	* Relative dates look something like this:
	*	3 weeks, 4 days ago
	*	15 seconds ago
	* Formatted dates look like this:
	*	on 02/18/2004
	*
	* The returned string includes 'ago' or 'on' and assumes you'll properly add a word
	* like 'Posted ' before the function output.
	*
	* @param string $dateString Datetime string
	* @param array $options Default format if timestamp is used in $dateString
	* @return string Relative time string.
	*/
	function timeAgoInWords($dateTime, $options = array()) {
		$now = time();

		$inSeconds = strtotime($dateTime);
		$backwards = ($inSeconds > $now);

		$format = 'j/n/y';
		$end = '+1 month';

		if (is_array($options)) {
			if (isset($options['format'])) {
				$format = $options['format'];
				unset($options['format']);
			}
			if (isset($options['end'])) {
				$end = $options['end'];
				unset($options['end']);
			}
		} else {
			$format = $options;
		}

		if ($backwards) {
			$futureTime = $inSeconds;
			$pastTime = $now;
		} else {
			$futureTime = $now;
			$pastTime = $inSeconds;
		}
		$diff = $futureTime - $pastTime;

		// If more than a week, then take into account the length of months
		if ($diff >= 604800) {
			$current = array();
			$date = array();

			list($future['H'], $future['i'], $future['s'], $future['d'], $future['m'], $future['Y']) = explode('/', date('H/i/s/d/m/Y', $futureTime));

			list($past['H'], $past['i'], $past['s'], $past['d'], $past['m'], $past['Y']) = explode('/', date('H/i/s/d/m/Y', $pastTime));
			$years = $months = $weeks = $days = $hours = $minutes = $seconds = 0;

			if ($future['Y'] == $past['Y'] && $future['m'] == $past['m']) {
				$months = 0;
				$years = 0;
			} else {
				if ($future['Y'] == $past['Y']) {
					$months = $future['m'] - $past['m'];
				} else {
					$years = $future['Y'] - $past['Y'];
					$months = $future['m'] + ((12 * $years) - $past['m']);

					if ($months >= 12) {
						$years = floor($months / 12);
						$months = $months - ($years * 12);
					}

					if ($future['m'] < $past['m'] && $future['Y'] - $past['Y'] == 1) {
						$years --;
					}
				}
			}

			if ($future['d'] >= $past['d']) {
				$days = $future['d'] - $past['d'];
			} else {
				$daysInPastMonth = date('t', $pastTime);
				$daysInFutureMonth = date('t', mktime(0, 0, 0, $future['m'] - 1, 1, $future['Y']));

				if (!$backwards) {
					$days = ($daysInPastMonth - $past['d']) + $future['d'];
				} else {
					$days = ($daysInFutureMonth - $past['d']) + $future['d'];
				}

				if ($future['m'] != $past['m']) {
					$months --;
				}
			}

			if ($months == 0 && $years >= 1 && $diff < ($years * 31536000)) {
				$months = 11;
				$years --;
			}

			if ($months >= 12) {
				$years = $years + 1;
				$months = $months - 12;
			}

			if ($days >= 7) {
				$weeks = floor($days / 7);
				$days = $days - ($weeks * 7);
			}
		} else {
			$years = $months = $weeks = 0;
			$days = floor($diff / 86400);

			$diff = $diff - ($days * 86400);

			$hours = floor($diff / 3600);
			$diff = $diff - ($hours * 3600);

			$minutes = floor($diff / 60);
			$diff = $diff - ($minutes * 60);
			$seconds = $diff;
		}
		$relativeDate = '';
		$diff = $futureTime - $pastTime;

		if ($diff > abs($now - strtotime($end))) {
			$relativeDate = sprintf('on %s', date($format, $inSeconds));
		} else {
			if ($years > 0) {
				// years and months and days
				$relativeDate .= ($relativeDate ? ', ' : '') . $years . ' ' . ($years==1 ? 'year':'years');
				$relativeDate .= $months > 0 ? ($relativeDate ? ', ' : '') . $months . ' ' . ($months==1 ? 'month':'months') : '';
				$relativeDate .= $weeks > 0 ? ($relativeDate ? ', ' : '') . $weeks . ' ' . ($weeks==1 ? 'week':'weeks') : '';
				$relativeDate .= $days > 0 ? ($relativeDate ? ', ' : '') . $days . ' ' . ($days==1 ? 'day':'days') : '';
			} elseif (abs($months) > 0) {
				// months, weeks and days
				$relativeDate .= ($relativeDate ? ', ' : '') . $months . ' ' . ($months==1 ? 'month':'months');
				$relativeDate .= $weeks > 0 ? ($relativeDate ? ', ' : '') . $weeks . ' ' . ($weeks==1 ? 'week':'weeks') : '';
				$relativeDate .= $days > 0 ? ($relativeDate ? ', ' : '') . $days . ' ' . ($days==1 ? 'day':'days') : '';
			} elseif (abs($weeks) > 0) {
				// weeks and days
				$relativeDate .= ($relativeDate ? ', ' : '') . $weeks . ' ' . ($weeks==1 ? 'week':'weeks');
				$relativeDate .= $days > 0 ? ($relativeDate ? ', ' : '') . $days . ' ' . ($days==1 ? 'day':'days') : '';
			} elseif (abs($days) > 0) {
				// days and hours
				$relativeDate .= ($relativeDate ? ', ' : '') . $days . ' ' . ($days==1 ? 'day':'days');
				$relativeDate .= $hours > 0 ? ($relativeDate ? ', ' : '') . $hours . ' ' . ($hours==1 ? 'hour':'hours') : '';
			} elseif (abs($hours) > 0) {
				// hours and minutes
				$relativeDate .= ($relativeDate ? ', ' : '') . $hours . ' ' . ($hours==1 ? 'hour':'hours');
				$relativeDate .= $minutes > 0 ? ($relativeDate ? ', ' : '') . $minutes . ' ' . ($minutes==1 ? 'minute':'minutes') : '';
			} elseif (abs($minutes) > 0) {
				// minutes only
				$relativeDate .= ($relativeDate ? ', ' : '') . $minutes . ' ' . ($minutes==1 ? 'minute':'minutes');
			} else {
				// seconds only
				$relativeDate .= ($relativeDate ? ', ' : '') . $seconds . ' ' . ($seconds==1 ? 'second':'seconds');
			}

			if (!$backwards) {
				$relativeDate = sprintf('%s ago', $relativeDate);
			}
		}
		return $relativeDate;
	}
}