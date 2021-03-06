<?php

class Driver_Storage_Sae{
	protected static $handler=null;
	protected static $domain=null;
	public function __construct($domain='')
	{
		self::$handler=new SaeStorage();
		self::$domain=$domain?:STORAGE_DOMAIN;
		return self::$handler;
	}

	public function exist($file)
	{
		return self::$handler->fileExists (self::$domain, $file);
	}

	public function write($file,$content)
	{
		return self::$handler->write(self::$domain,$file,$content);
	}

	public function read($file)
	{
		return self::$handler->read(self::$domain,$file);
	}

	public function append($file, $content)
	{
		if ( self::$handler->fileExists (self::$domain, $file)){
			$content=self::$handler->read(self::$domain,$file).$content;
		}
		return self::$handler->write(self::$domain,$file,$content);
	}

	public function delete($file)
	{
		return self::$handler->delete(self::$domain,$file);
	}

	public function getUrl($file)
	{
		return self::$handler->getUrl(self::$domain,$file);
	}

	public function error()
	{
		return self::$handler->errmsg();
	}
}