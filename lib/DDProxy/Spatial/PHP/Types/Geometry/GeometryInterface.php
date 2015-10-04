<?php
namespace DDProxy\Spatial\PHP\Types\Geometry;

/**
 * Geometry interface for Geometry objects
 */
interface GeometryInterface
{
    const GEOMETRY           = 'Geometry';
    const POINT              = 'Point';
    const LINESTRING         = 'LineString';
    const POLYGON            = 'Polygon';
    const MULTIPOINT         = 'MultiPoint';
    const MULTILINESTRING    = 'MultiLineString';
    const MULTIPOLYGON       = 'MultiPolygon';
    const GEOMETRYCOLLECTION = 'GeometryCollection';

    /**
     * @return string
     */
    public function getType();
}
