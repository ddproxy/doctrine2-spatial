# Doctrine2-Spatial

Doctrine2 multi-platform support for spatial types and functions. Currently MySQL and PostgreSQL with PostGIS are supported. Could potentially add support for other platforms if an interest is expressed.

Documentation can be found at [here](./doc/index.md)

## composer.json
```javascript
{
    "require": {
    	...
        "creof/doctrine2-spatial": "~1"
```

You will also have to change the version requirement of doctrine to at least 2.3:
```javascript

        "doctrine/orm": ">=2.3",
```
