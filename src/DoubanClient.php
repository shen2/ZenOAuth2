<?php
namespace ZenOAuth2;

class DoubanClient extends Client{
	/**
	 * Set up the API root URL.
	 *
	 * @ignore
	 */
	public $host = "https://api.douban.com/";
	
	protected function _additionalHeaders(){
		$headers = array();
		
		if ($this->access_token)
			$headers[] = "Authorization: Bearer ".$this->access_token;
		
		return $headers;
	}
}
