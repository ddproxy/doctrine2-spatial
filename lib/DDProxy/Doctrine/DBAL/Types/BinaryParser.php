<?php
namespace DDProxy\Doctrine\DBAL\Types;

use DDProxy\Spatial\Exception\InvalidValueException;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Parse spatial WKB values
 */
class BinaryParser
{
    const WKB_POINT              = 1;
    const WKB_LINESTRING         = 2;
    const WKB_POLYGON            = 3;
    const WKB_MULTIPOINT         = 4;
    const WKB_MULTILINESTRING    = 5;
    const WKB_MULTIPOLYGON       = 6;
    const WKB_GEOMETRYCOLLECTION = 7;

    const WKB_SRID               = 0x20000000;
    const WKB_M                  = 0x40000000;
    const WKB_Z                  = 0x80000000;

    /**
     * @var int
     */
    private $type;

    /**
     * @var int
     */
    private $srid;

    /**
     * @var BinaryReader
     */
    private $reader;

    /**
     * @param string $input
     */
    public function __construct($input)
    {
        $this->reader = new BinaryReader($input);
    }

    /**
     * @return array
     */
    public function parse()
    {
        $value         = $this->geometry();
        $value['srid'] = $this->srid;

        return $value;
    }

    /**
     * @return array
     */
    private function geometry()
    {
        $this->byteOrder();
        $this->type();

        if ($this->isExtended()) {
            $this->srid();
        }

        $typeName = $this->getTypeName();

        return array(
            'type'  => $typeName,
            'value' => $this->$typeName()
        );
    }

    /**
     * @return bool
     */
    private function isExtended()
    {
        return ($this->type & self::WKB_SRID) == self::WKB_SRID;
    }

    /**
     * @return string
     * @throws InvalidValueException
     */
    private function getTypeName()
    {
        if ($this->isExtended()) {
            $this->type = $this->type ^ self::WKB_SRID;
        }

        switch ($this->type) {
            case (self::WKB_POINT):
                $type = GeometryInterface::POINT;
                break;
            case (self::WKB_LINESTRING):
                $type = GeometryInterface::LINESTRING;
                break;
            case (self::WKB_POLYGON):
                $type = GeometryInterface::POLYGON;
                break;
            case (self::WKB_MULTIPOINT):
                $type = GeometryInterface::MULTIPOINT;
                break;
            case (self::WKB_MULTILINESTRING):
                $type = GeometryInterface::MULTILINESTRING;
                break;
            case (self::WKB_MULTIPOLYGON):
                $type = GeometryInterface::MULTIPOLYGON;
                break;
            case (self::WKB_GEOMETRYCOLLECTION):
                $type = GeometryInterface::GEOMETRYCOLLECTION;
                break;
            default:
                throw InvalidValueException::unsupportedWkbType($this->type);
                break;
        }

        return strtoupper($type);
    }

    /**
     * @throws InvalidValueException
     */
    private function byteOrder()
    {
        $this->reader->byteOrder();
    }

    private function type()
    {
        $this->type = $this->reader->long();
    }

    /**
     * @throws InvalidValueException
     */
    private function srid()
    {
        $srid = $this->reader->long();

        if ($srid < 0) {
            throw InvalidValueException::invalidSrid($srid);
        }

        $this->srid = $srid;
    }

    /**
     * @return float[]
     */
    private function point()
    {
        return array(
            $this->reader->double(),
            $this->reader->double()
        );
    }

    /**
     * @return array
     */
    private function lineString()
    {
        return $this->valueArray(GeometryInterface::POINT);
    }

    /**
     * @return array[]
     */
    private function polygon()
    {
        return $this->valueArray(GeometryInterface::LINESTRING);
    }

    /**
     * @return array[]
     */
    private function multiPoint()
    {
        return $this->valueArrayValues(GeometryInterface::GEOMETRY);
    }

    /**
     * @return array[]
     */
    private function multiLineString()
    {
        return $this->valueArrayValues(GeometryInterface::GEOMETRY);
    }

    /**
     * @return array[]
     */
    private function multiPolygon()
    {
        return $this->valueArrayValues(GeometryInterface::GEOMETRY);
    }

    /**
     * @return array[]
     */
    private function geometryCollection()
    {
        return $this->valueArray(GeometryInterface::GEOMETRY);
    }

    /**
     * @param string $type
     *
     * @return array[]
     */
    private function valueArray($type)
    {
        $count  = $this->reader->long();
        $values = array();

        for ($i = 0; $i < $count; $i++) {
            $values[] = $this->$type();
        }

        return $values;
    }

    /**
     * @param string $type
     *
     * @return array[]
     */
    private function valueArrayValues($type)
    {
        $values = $this->valueArray($type);

        array_walk($values, create_function('&$a', '$a = $a["value"];'));

        return $values;
    }
}
