<?php
# AUTOLOAD = ON
#------------------------------------------------------------
# Lorem ips
#------------------------------------------------------------
#
# Lorem ips
#

class Singleton
{
    protected static $instance = null;

    /**
     * @return Singleton
     */
    final public static function getInstance()
    {
        if (null === static::$instance)
        {
            static::$instance = new static();
        }

    	return static::$instance;
    }
        
    final private function __clone() {}

    final private function __construct() {}
}