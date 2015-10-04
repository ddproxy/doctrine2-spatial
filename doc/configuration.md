# Configuration
Add the types and functions you need to your Symfony configuration file. The doctrine type names are not hardcoded.

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
