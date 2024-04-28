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

function loadView($name)
{

  $viewPath = basePath("App/views/{$name}.view.php");

  if(file_exists($viewPath)){
    require $viewPath;
  } else {
    echo "View {$name} not found!";
  }
}

/**
 * Load a partial
 * @param string $name
 * @return void
 */

function loadPartial($name)
{
  $viewPartial = basePath("App/views/partials/{$name}.php");

  if(file_exists($viewPartial)){
    require $viewPartial;
  } else {
    echo "View {$name} not found!";
  }
}

/**
 * Inspect a value(s)
 * 
 * @param mixed $value
 * @return void
 */

function inspect($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
}

/**
 * Inspect a value(s) and die
 * 
 * @param mixed $value
 * @return void
 */

function inspectAndDie($value)
{
  echo "<pre>";
  die(var_dump($value));
}