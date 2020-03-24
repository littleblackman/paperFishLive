<?php

class FlashMessage
{

    public function reset()
    {
      $_SESSION['flashMessage'] = null;
    }

    public function setMessage($message, $type = "default")
    {
          $flashMessage[$type][] = $message;
          $_SESSION['flashMessage'] = $flashMessage;
    }

    public function hasMessage() {
        if(!isset($_SESSION['flashMessage']) || $_SESSION['flashMessage'] == null) return false;
        return  true;
    }

    public function getMessages($type = null) {
      if(!$this->hasMessage()) return array();
      if ($type == null) {
          $messageArray = $_SESSION['flashMessage'];
          unset($_SESSION['flashMessage']);
          return $messageArray;
      }
      if(!isset($_SESSION['flashMessage'][$type])) return null;
      $messageArray = $_SESSION['flashMessage'][$type];
      unset($_SESSION['flashMessage'][$type]);
      return $messageArray;
    }

    public function getMessagesJson($type = null) {
        if($this->hasMessage()) return array();
        if(!$messages = $this->getMessages($type)) return null;
        return json_encode($messages);
    }

  }