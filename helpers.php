<?php

define('BASE_URL', 'http://localhost:9000');

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */

function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}

/**
 * Load a view
 * @param string $name
 * @return void
 */