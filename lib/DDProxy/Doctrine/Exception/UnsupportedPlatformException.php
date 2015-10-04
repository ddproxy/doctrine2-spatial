<?php
namespace DDProxy\Doctrine\Exception;

use Exception;

/**
 * UnsupportedPlatformException class
 */
class UnsupportedPlatformException extends Exception
{
    static public function unsupportedPlatform($name)
    {
        return new self(sprintf('DBAL platform "%s" is not currently supported.', $name));
    }

}
