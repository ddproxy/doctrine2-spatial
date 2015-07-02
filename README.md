# doctrine2-spatial

Doctrine2 multi-platform support for spatial types and functions. Currently MySQL and PostgreSQL with PostGIS are supported. Could potentially add support for other platforms if an interest is expressed.

This package is a refactor/continuation of djlamberts [doctrine2-spatial](https://github.com/djlambert/doctrine2-spatial) package.

# Symfony2 Install

## composer.json
    "require": {
    	...
        "ddproxy/doctrine2-spatial": "dev-master"

## Types
The following SQL/OpenGIS types have been implemented as PHP objects and accompanying Doctrine types:

### Geometry
* Point
* LineString
* Polygon
* MultiPoint
* MultiLineString
* MultiPolygon

### Geography
Similar to Geometry but SRID value is always used (SRID supported in PostGIS only), and accepts only valid "geographic" coordinates.

* Point
* LineString
* Polygon

### Planned

* GeometryCollection
* 3D/4D geometries ??
* Rasters ??????

There is support for both WKB/WKT and EWKB/EWKT return values. Currently only WKT/EWKT is used in statements.

## Functions
Currently the following SQL functions are supported in DQL (more coming):

### PostgreSQL
* ST_Area
* ST_AsBinary
* ST_AsGeoJson
* ST_AsText
* ST_Azimuth
* ST_Boundary
* ST_Buffer
* ST_Centroid
* ST_ClosestPoint
* ST_Contains
* ST_ContainsProperly
* ST_CoveredBy
* ST_Covers
* ST_Crosses
* ST_Disjoint
* ST_Distance
* ST_Envelope
* ST_Expand
* ST_Extent
* ST_GeomFromText
* ST_Intersection
* ST_Intersects
* ST_Length
* ST_LineCrossingDirection
* ST_LineInterpolatePoint
* ST_MakeBox2D
* ST_MakeEnvelope
* ST_MakeLine
* ST_Point
* ST_Scale
* ST_SetSRID
* ST_Simplify
* ST_StartPoint
* ST_Summary
* ST_Touches
* ST_Transform
* ST_Perimeter

### MySQL
* Area
* AsBinary
* AsText
* Buffer
* Contains
* Crosses
* Disjoint
* ST_Disjoint
* Envelope
* GeomFromText
* GLength
* Intersects
* LineStringFromWKB
* LineString
* MBRContains
* MBRDisjoint
* MBREqual
* MBRIntersects
* MBROverlaps
* MBRTouches
* MBRWithin
* Overlaps
* PointFromWKB
* Point
* STartPoint
* ST_Contains
* ST_Crosses
* ST_Disjoint
* ST_Equals
* ST_Intersects
* ST_Overlaps
* ST_Touches
* ST_Within
* Touches
* Within
* StartPoint
* geodist_pt //see [wiki](https://github.com/Slavenin/doctrine2-spatial/wiki/Mysql-Function)
* distance_from_multyline //see [wiki](https://github.com/Slavenin/doctrine2-spatial/wiki/Mysql-Function)

## Setup/Installation

If you're using Doctrine with Symfony2 take a look at INSTALL.md, otherwise the OrmTest.php test class shows their use with Doctrine alone.

## DQL AST Walker
A DQL AST walker is included which when used with the following DQL functions will return the appropriate Geometry type object from queries instead of strings:

* AsText
* ST_AsText
* AsBinary
* ST_AsBinary

EWKT/EWKB function support planned.

### Example:
        $query = $this->em->createQuery('SELECT AsText(StartPoint(l.lineString)) MyLineStringEntity l');

        $query->setHint(Query::HINT_CUSTOM_OUTPUT_WALKER, 'CrEOF\Spatial\ORM\Query\GeometryWalker');

        $result = $query->getResult();

```$result[n][1]``` will now be of type ```Point``` instead of the string ```'POINT(X Y)'```


