<?php
namespace DDProxy\Doctrine\DBAL\Types;

/**
 * Utility functions
 */
class Utils
{
    /**
     * Convert hex string to binary
     *
     * @param $value string
     *
     * @return string
     */
    static public function toBinary($value)
    {
        switch (ord($value) < 31) {
            case true:
                return $value;
            default:
                $position = strpos($value, 'x');

                if (false !== $position) {
                    $value = substr($value, $position + 1);
                }

                return pack('H*', $value);
        }
    }
}
