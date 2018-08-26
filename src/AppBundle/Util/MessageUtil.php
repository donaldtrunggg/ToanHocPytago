<?php

namespace AppBundle\Util;

class MessageUtil
{
  const SUCCESS_KEY = 'success';
  const ERROR_KEY = 'error';
  const SUCCESS = 200;
  const FAIL = 400;

  const SUCCESS_CREATE_STRING = 'Create successfully!';
  const SUCCESS_UPDATE_STRING = 'Update successfully!';

  const ACTIVE = 1;
  const INACTIVE = 0;

  public static function formatMessage($code, $message, $data = null)
  {
    $output = array('code' => $code, 'message' => $message);

    if (!empty($data)) {
      $output['data'] = $data;
    }

    return $output;
  }
}