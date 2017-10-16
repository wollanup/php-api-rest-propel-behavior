<?php

namespace Eukles\Action;

use Eukles\Service\QueryModifier\QueryModifierInterface;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ActionMock implements ActionInterface
{
    
    /**
     * ActionInterface constructor.
     *
     * @param ContainerInterface $c
     */
    public function __construct(ContainerInterface $c) { }
    
    /**
     * Action factory
     *
     * @param ContainerInterface $c
     *
     * @return ActionInterface
     */
    public static function create(ContainerInterface $c): ActionInterface
    {
        // TODO: Implement create() method.
    }
    
    /**
     * @param QueryModifierInterface $qm
     *
     * @return ModelCriteria
     */
    public function createQuery(QueryModifierInterface $qm = null): ModelCriteria
    {
        // TODO: Implement createQuery() method.
    }
    
    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        // TODO: Implement getContainer() method.
    }
    
    /**
     * @return ServerRequestInterface
     */
    public function getRequest(): ServerRequestInterface
    {
        // TODO: Implement getRequest() method.
    }
    
    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        // TODO: Implement getResponse() method.
    }
    
    /**
     * @param ServerRequestInterface $serverRequest
     *
     * @return ActionInterface
     */
    public function setRequest(ServerRequestInterface $serverRequest): ActionInterface
    {
        // TODO: Implement setRequest() method.
    }
    
    /**
     * @param ResponseInterface $response
     *
     * @return ActionInterface
     */
    public function setResponse(ResponseInterface $response): ActionInterface
    {
        // TODO: Implement setResponse() method.
    }
}

