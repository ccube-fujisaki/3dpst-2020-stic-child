<?php
class Stic_Url_Manager {

	public function __construct() {
		// add_action('template_redirect', array($this, 'debug'));
	}

	static function protocol() {
		return empty( $_SERVER['HTTPS'] ) ? 'http://' : 'https://';
	}

	static function domain() {
		return $_SERVER['HTTP_HOST'];
	}

	static function full() {
		return self::protocol() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	static function after_protocol() {
		return $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	static function after_domain() {
		return $_SERVER['REQUEST_URI'];
	}

	static function after_home_url( $str = '' ) {
		return str_replace( home_url( $str ), '', self::full() );
	}

	static function referer() {
		return $_SERVER['HTTP_REFERER'];
	}

	static function query() {
		return $_SERVER['QUERY_STRING'];
	}

	static function query_array() {
		$query_string = self::query();

		return wp_parse_args( $query_string );
	}

	static function excerpt_query( $url = '' ) {
		$url = $url ? $url : self::full();
		return strstr( $url, '?', true ) ? strstr( $url, '?', true ) : $url;
	}

	static function slug( $str = '' ) {
		$after_home = self::after_home_url( $str );

		return self::excerpt_query( $after_home );
	}

	static function debug() {
		predump( self::full() );
		predump( self::after_protocol() );
		predump( self::after_domain() );
		predump( self::after_home_url() );
		predump( self::query() );
		predump( self::excerpt_query( self::full() ) );
		predump( self::slug() );
		predump( self::referer() );
		predump( $_SERVER );
	}
}
