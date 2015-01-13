<?php
class Helper_Validate
{
    protected $_message;

    public function notEmpty($text, $error)
    {
        if ($text == null) {
            $this->_message[] = $error;

            return false;
        }

        return true;
    }

    public function notMatches($text1,$text2, $error)
    {
        if ($text1 != $text2) {
            $this->_message[] = $error;

            return fasle;
        }

        return true;
    }

    public function isValid() {
        if (!empty($this->_message)) {
            return false;
        } else {
            return true;
        }
    }

    public function getMessage()
    {
        return $this->_message;
    }
}