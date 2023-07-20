<?php
declare(strict_types=1);

namespace Nekohime\Html;

class HTML {

	/*
	* @param string $url RFC1738 compliant URL.
	* @param string $text Link text to be shown for the clickable URL.
	* @param array $attributes Any extra HTML attributes to add to the <a> tag.
	* @param array $options Any extra options to be handled at our discretion.
	*/
	public static function link($url, $text, $attributes = array(), $options = array()) {
		$url = htmlspecialchars($url);
		$text = htmlspecialchars($text);

		$output = '<a href="'.$url.'"';
		if ($attributes) {
			foreach ($attributes as $name => $value) {
				$name = htmlspecialchars($name);
				$value = htmlspecialchars($value);

				if (is_bool($value)) {
					if ($value) $output .= $name . ' ';
				} else {
					$output .= sprintf(' %s="%s"', $name, $value);
				}
			}
		}

		if (isset($options['external']) && $options['external'] === true) {
			$output .= sprintf(' rel="nofollow noopener noreferrer"');
		}

		$br = (isset($options['br']) && $options['br'] === true) ? "<br>": "";
		$nl = (isset($options['nl']) && $options['nl'] === true) ? "\n": "";

		$output .= '>'.$text.'</a>' . $br . $nl;
		echo $output;
	}

	// TODO: fix
	// This alt vs title shit is exhausting.
	// https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img
	public static function image($url, $alt, $attributes = array()) {
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$alt = htmlspecialchars($alt);

		$output = '<img src="'.$url.'" alt="'.$alt.'"';

		foreach ($attributes as $name => $value) {
			$name = htmlspecialchars($name);
			$value = htmlspecialchars($value);

			if (is_bool($value)) {
				if ($value) $output .= $name . ' ';
			} else {
				$output .= sprintf(' %s="%s"', $name, $value);
			}
		}

		$output .= '>';
		echo $output;

	}
}
