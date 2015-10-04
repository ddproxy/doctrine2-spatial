# Installation

## Setup/Installation

Use these instructions if you're using Doctrine with Symfony2 , otherwise the OrmTest.php test class shows their use with Doctrine alone.

Require the `ddproxy/spatial2-doctrine` package in your composer.json and update
your dependencies.

    $ composer require ddproxy/spatial2-doctrine
    
## composer.json

    "require": {
    	...
        "ddproxy/doctrine2-spatial": "dev-master"
    
You will also have to change the version requirement of doctrine to at least 2.1:

        "doctrine/orm": ">=2.1",

## Configuration
Read [configuration]() to configure the extension for Symfony