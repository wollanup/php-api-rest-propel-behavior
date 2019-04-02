<?php

namespace Eukles\Entity;

use Eukles\Action\ActionInterface;
use Eukles\Container\ContainerInterface;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Map\TableMap;
use Psr\Http\Message\RequestInterface;

abstract class EntityRequestMock implements EntityRequestInterface
{

    /**
     * ActiveRecordRequestTrait constructor.
     *
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
    }

    /**
     * Set state of the object after request data hydration
     *
     * @param ActiveRecordInterface $obj
     * @param RequestInterface $r
     */
    public function afterCreate(ActiveRecordInterface $obj, RequestInterface $r)
    {
        // TODO: Implement afterCreate() method.
    }

    /**
     * Set state of the object after request data hydration
     *
     * @param ActiveRecordInterface $obj
     * @param RequestInterface $r
     */
    public function afterFetch(ActiveRecordInterface $obj, RequestInterface $r)
    {
        // TODO: Implement afterFetch() method.
    }

    /**
     * Set state of the object before request data hydration
     *
     * @param ActiveRecordInterface $obj
     * @param RequestInterface $r
     */
    public function beforeCreate(ActiveRecordInterface $obj, RequestInterface $r)
    {
        // TODO: Implement beforeCreate() method.
    }

    /**
     * Set state of the object before request data hydration
     *
     * @param ModelCriteria $query
     *
     * @param RequestInterface $r
     * @return void
     */
    public function beforeFetch(ModelCriteria $query, RequestInterface $r)
    {
        // TODO: Implement beforeFetch() method.
    }

    /**
     *
     * @return string|ActionInterface
     */
    public function getActionClassName()
    {
        // TODO: Implement getActionClassName() method.
    }

    /**
     * List data usable from request, may vary according to HTTP verb
     *
     * @param array  $requestParams
     * @param string $httpMethod
     *
     * @return array
     */
    public function getAllowedDataFromRequest(
        array $requestParams,
        $httpMethod
    ) {
        // TODO: Implement getAllowedDataFromRequest() method.
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        // TODO: Implement getContainer() method.
    }

    /**
     * None, all or partial list of properties
     *
     * @return array List of exposed properties
     */
    public function getExposedProperties()
    {
        // TODO: Implement getExposedProperties() method.
    }

    /**
     * None, all or partial list of relations
     *
     * @return array List of exposed relations
     */
    public function getExposedRelations()
    {
        // TODO: Implement getExposedRelations() method.
    }

    /**
     * None, all or partial list of properties
     *
     * @return array List of modifiable properties
     */
    public function getModifiableProperties()
    {
        // TODO: Implement getModifiableProperties() method.
    }

    /**
     *
     * @param bool $plural
     *
     * @return string
     */
    public static function getNameOfParameterToAdd($plural = false)
    {
        // TODO: Implement getNameOfParameterToAdd() method.
    }

    /**
     * @return mixed
     */
    public function getPrimaryKey()
    {
        // TODO: Implement getPrimaryKey() method.
    }

    /**
     * Gets a RelationMap of the table by relation name
     * This method will build the relations if they are not built yet
     *
     * @param  string $relation The relation name
     *
     * @return \Propel\Runtime\Map\RelationMap                         The relation object
     * @throws \Propel\Runtime\Map\Exception\RelationNotFoundException When called on an inexistent relation
     */
    public function getRelation($relation)
    {
        // TODO: Implement getRelation() method.
    }

    /**
     * Gets the type of the relation (on to one, one to many ...)
     *
     * @param  string $relation The relation name
     *
     * @return string Type of the relation (on to one, one to many ...)
     *
     */
    public function getRelationType($relation)
    {
        // TODO: Implement getRelationType() method.
    }

    /**
     * @return \Propel\Runtime\Map\RelationMap[] array
     *
     */
    public function getRelations()
    {
        // TODO: Implement getRelations() method.
    }

    /**
     * Gets names of the relations in CAMELNAME format (e.g. "myRelation")
     *
     * @return array
     */
    public function getRelationsNames()
    {
        // TODO: Implement getRelationsNames() method.
    }

    /**
     * None, all or partial list of properties
     *
     * @return array List of writable properties
     */
    public function getRequiredWritableProperties()
    {
        // TODO: Implement getRequiredWritableProperties() method.
    }

    /**
     * @return TableMap
     */
    public function getTableMap()
    {
        // TODO: Implement getTableMap() method.
    }

    /**
     * None, all or partial list of properties
     *
     * @return array List of writable properties
     */
    public function getWritableProperties()
    {
        // TODO: Implement getWritableProperties() method.
    }

    /**
     * @return bool
     */
    public function hasRelations()
    {
        // TODO: Implement hasRelations() method.
    }

    /**
     * @return ActiveRecordInterface
     */
    public function instantiateActiveRecord()
    {
        // TODO: Implement instantiateActiveRecord() method.
    }

    /**
     * Does this relation is plural ?
     *
     * @param string $relation Name of the relation in CAMELNAME format (e.g. "myRelation")
     *
     * @return bool
     * @throws \Propel\Runtime\Map\Exception\RelationNotFoundException When called on an inexistent relation
     */
    public function isPluralRelation($relation)
    {
        // TODO: Implement isPluralRelation() method.
    }

    /**
     * Does this property is a relation ?
     *
     * @param string $relation Name of the relation in CAMELNAME format (e.g. "myRelation")
     *
     * @return bool
     */
    public function isRelation($relation)
    {
        // TODO: Implement isRelation() method.
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function isRelationManyToOne($name)
    {
        // TODO: Implement isRelationManyToOne() method.
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function isRelationOneToMany($name)
    {
        // TODO: Implement isRelationOneToMany() method.
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function isRelationOneToOne($name)
    {
        // TODO: Implement isRelationOneToOne() method.
    }

    /**
     * @param array|int $pk
     *
     * @return EntityRequestInterface
     */
    public function setPrimaryKey($pk)
    {
        // TODO: Implement setPrimaryKey() method.
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        // TODO: Implement getRequest() method.
    }

    /**
     * @param RequestInterface $request
     * @return EntityRequestAbstract
     */
    public function setRequest(RequestInterface $request): EntityRequestAbstract
    {
        // TODO: Implement setRequest() method.
    }

    /**
     * @param \Psr\Container\ContainerInterface|ContainerInterface $c
     *
     * @return mixed
     */
    public function setContainer(\Psr\Container\ContainerInterface $c)
    {
        // TODO: Implement setContainer() method.
    }

    /**
     * @return ActiveRecordInterface|string
     */
    public function getActiveRecordClassName()
    {
        // TODO: Implement getActiveRecordClassName() method.
    }
}

