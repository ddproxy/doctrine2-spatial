# Doctrine-Spatial-Extension

Doctrine2 multi-platform support for spatial types and functions. Currently MySQL and PostgreSQL with PostGIS are
supported.

This package is a major fork of djlamberts [doctrine2-spatial](https://github.com/djlambert/doctrine2-spatial) and is
incompatible with his library. I intend on separating this library into two distinct libraries - spatial object
library and doctrine-spatial-extension that would require the spatial library.

These can be found at

 * [doctrine-spatial-extension](https://github.com/ddproxy/doctrine-spatial-extension)
 * [spatial](https://github.com/ddproxy/spatial)
 
To use in place of other doctrine2-spatial libraries and particularly
djlamberts [doctrine2-spatial](https://github.com/djlambert/doctrine2-spatial),
find-replace all instances of CrEOF/Spatial to DDProxy/Spatial and Spatial/DBAL or Spatial/ORM to Doctrine/DBAL or
Doctrine/ORM respectively.

Documentation can be found at [in this repository](https://github.com/ddproxy/doctrine2-spatial/blob/doc/index.md)