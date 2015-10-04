# Spatial2-Doctrine

The **Spatial2-Doctrine** library allows you to use spatial methods on your
MySQL and PostGIS database.


## Installation

Require the `ddproxy/spatial2-doctrine` package in your composer.json and update
your dependencies.

    $ composer require ddproxy/spatial2-doctrine
    
You will also have to change the version requirement of doctrine to at least 2.1:

        "doctrine/orm": ">=2.1",

### Configuration
Add the types and functions you need to your Symfony configuration file. The doctrine type names are not hardcoded.

```yml
	doctrine:
	    dbal:
	        types:
	            geometry:   DDProxy\Spatial\DBAL\Types\GeometryType
	            point:      DDProxy\Spatial\DBAL\Types\Geometry\PointType
	            polygon:    DDProxy\Spatial\DBAL\Types\Geometry\PolygonType
	            linestring: DDProxy\Spatial\DBAL\Types\Geometry\LineStringType

	    orm:
	        dql:
	            numeric_functions:
	                numeric_functions:
					st_contains:     DDProxy\Spatial\ORM\Query\AST\Functions\MySql\STContains
					contains:     DDProxy\Spatial\ORM\Query\AST\Functions\MySql\Contains
					st_area:         DDProxy\Spatial\ORM\Query\AST\Functions\MySql\Area
					st_geomfromtext: DDProxy\Spatial\ORM\Query\AST\Functions\MySql\GeomFromText
					st_intersects:     DDProxy\Spatial\ORM\Query\AST\Functions\MySql\STIntersects
                	st_buffer:     DDProxy\Spatial\ORM\Query\AST\Functions\MySql\STBuffer
					point: DDProxy\Spatial\ORM\Query\AST\Functions\MySql\Point
					geodist_pt: DDProxy\Spatial\ORM\Query\AST\Functions\MySql\GeodistPt
                	distance_from_multyline: DDProxy\Spatial\ORM\Query\AST\Functions\MySql\DistanceFromMultyLine
```

## Usage


### DQL AST Walker
A DQL AST walker is included which when used with the following DQL functions will return the appropriate Geometry type object from queries instead of strings:

* AsText
* ST_AsText
* AsBinary
* ST_AsBinary

### Queries

Use method names in queries

```php
    $query = $this->em->createQuery('SELECT AsText(StartPoint(l.lineString)) MyLineStringEntity l');
    
    $query->setHint(Query::HINT_CUSTOM_OUTPUT_WALKER, 'CrEOF\Spatial\ORM\Query\GeometryWalker');
    
    $result = $query->getResult();
```

Or within an expression

```php
    $queryBuilder = $manager->createQueryBuilder();
    $queryBuilder
        ->select("id, ST_AsText(things.geometry) as geometry")
        ->from("geometryOfThings", "things")
        ->where(
            $queryBuilder->expr()->eq(
                sprintf("ST_Intersects(things.geometry, ST_SetSRID(ST_GeomFromGeoJSON('%s'), 4326))", $geoJsonPolygon),
                $queryBuilder->expr()->literal(true)
            )
        );
    $results = $queryBuilder->getQuery()->getResult();
```
