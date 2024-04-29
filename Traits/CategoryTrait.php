<?php

namespace Traits;

use PDO;

trait CategoryTrait
{
  public function getUniqueCategories($db)
  {
    return $db->query("SELECT DISTINCT category FROM posts")->fetchAll(PDO::FETCH_OBJ);
  }
}