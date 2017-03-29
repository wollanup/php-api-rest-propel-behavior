# Eukles API

Eukles API helps you to build REST APIs.

This project is based on:

* [Slim](https://github.com/slimphp/Slim) : Application Framework
* [Propel](https://github.com/propelorm/Propel2) : ORM 
* [Zend](https://github.com/zendframework/zend-permissions-acl) : ACL 

## Propel Behavior

[![Build Status](https://travis-ci.org/wollanup/php-api-rest-propel-behavior.svg?branch=master)](https://travis-ci.org/wollanup/php-api-rest-propel-behavior)
[![codecov](https://codecov.io/gh/wollanup/php-api-rest-propel-behavior/branch/master/graph/badge.svg)](https://codecov.io/gh/wollanup/php-api-rest-propel-behavior)


This Propel behavior adds 3 editable files to your entities :

### RouteMap

A class containing your entity's routes, with ACL.

### Request

A class to create/fetch/modify entity from Request parameters.
Also defines which properties of the entity are exposed in Response.

### Action

A class containing the methods called by a route.
