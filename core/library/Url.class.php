<?php

namespace library;
class Url
{
	private static $data;
	
	public static function getSegmentsFromUrl()
	{
		$segments = explode('/', $_GET['url']);
		
		self::$data = array_merge($_GET, $_POST);
		
		if (empty($segments[count($segments) - 1])) {
			unset($segments[count($segments) - 1]);
		}
		
		$segments = array_map(function ($v) {
			return preg_replace('/[\'\\\*]/', '', $v);
		}, $segments);
		
		return $segments;
	}
	
	public static function getParam($paramName)
	{
		return addslashes($_GET[$paramName]);
	}
	
	public static function getSegment($n)
	{
		$segments = self::getSegmentsFromUrl();
		return isset($segments[$n]) ? $segments[$n] : '';
	}
	
	public static function getAllSegments()
	{
		return self::getSegmentsFromUrl();
	}
	
	public static function getRequest()
	{
		return self::$data;
	}
}