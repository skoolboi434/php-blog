<?php

namespace Framework;

use Framework\Session;

class Authorization
{
  /**
   * Check if current logged in user owns a resource
   * 
   * @param int $resourceId
   * @return bool
   */

  public static function isOwner($resourceId) {
    $sessionUser = Session::get('user');

    if($sessionUser !== null && isset($sessionUser['userId'])) {
      $sessionUserId = (int) $sessionUser['userId'];
      return $sessionUserId === $resourceId;
    }

    return false;
  }
}