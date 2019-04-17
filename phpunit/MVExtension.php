<?php
require_once 'fastloader.php';

trait MVExtension {

    protected static function getMethod(string $class, string $method) {
        $class = new ReflectionClass($class);
        $method = $class->getMethod($method);
        $method->setAccessible(true);

        return $method;
    }
}