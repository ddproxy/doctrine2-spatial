<?php
namespace DDProxy\Doctrine\DBAL\Types;

use DDProxy\Spatial\Exception\InvalidValueException;

/**
 * Reader for spatial WKB values
 */
class BinaryReader
{
    const WKB_XDR = 0;
    const WKB_NDR = 1;

    /**
     * @var int
     */
    private $byteOrder;

    /**
     * @var string
     */
    private $input;

    /**
     * @param string $input
     */
    public function __construct($input)
    {
        $this->setInput($input);
    }

    /**
     * @param string $format
     *
     * @return array
     */
    public function unpackInput($format)
    {
        if (version_compare(PHP_VERSION, '5.5.0-dev', '>=')) {
            $code = 'a';
        } else {
            $code = 'A';
        }

        $result      = unpack(sprintf('%sresult/%s*input', $format, $code), $this->input);
        $this->input = $result['input'];

        return $result['result'];
    }

    /**
     * @return int
     */
    public function long()
    {
        $this->checkByteOrder();

        if (self::WKB_NDR === $this->byteOrder) {
            return $this->unpackInput('V');
        }

        return $this->unpackInput('N');
    }

    /**
     * @return float
     */
    public function double()
    {
        $this->checkByteOrder();

        $double = $this->unpackInput('d');

        if (self::WKB_NDR === $this->byteOrder) {
            return $double;
        }

        $double = unpack('dvalue', strrev(pack('d', $double)));

        return $double['value'];
    }


    /**
     * @return int
     * @throws InvalidValueException
     */
    public function byteOrder()
    {
        $byteOrder = $this->unpackInput('C');

        if ($byteOrder !== self::WKB_XDR && $byteOrder !== self::WKB_NDR) {
            throw InvalidValueException::invalidByteOrder($byteOrder);
        }

        return $this->byteOrder = $byteOrder;
    }

    /**
     * @param string $input
     */
    private function setInput($input)
    {
        $this->input = Utils::toBinary($input);
    }

    private function checkByteOrder()
    {
        if ( ! isset($this->byteOrder)) {
            throw InvalidValueException::invalidByteOrder('unset');
        }
    }
}
