<?php
namespace Eukles\Container {
    
    use Eukles\Config\ConfigInterface;
    use Eukles\Entity\EntityFactoryInterface;
    use Eukles\Service\Pagination\RequestPaginationInterface;
    use Eukles\Service\QueryModifier\RequestQueryModifierInterface;
    use Eukles\Service\ResponseBuilder\ResponseBuilderInterface;
    use Eukles\Service\ResponseFormatter\ResponseFormatterInterface;
    use Eukles\Service\RoutesClasses\RoutesClassesInterface;
    use Eukles\Slim\Handlers\ActionErrorInterface;
    use Eukles\Slim\Handlers\EntityRequestErrorInterface;
    use Psr\Http\Message\ServerRequestInterface;
    use Slim\Interfaces\RouterInterface;
    
    class ContainerMock implements ContainerInterface
    {
        
        /**
         * @inheritdoc
         */
        public function get($id) { }
    
        /**
         * @return ActionErrorInterface
         */
        public function getActionErrorHandler(): ActionErrorInterface
        {
            // TODO: Implement getActionErrorHandler() method.
        }
    
        /**
         * @return ConfigInterface
         */
        public function getConfig(): ConfigInterface
        {
            // TODO: Implement getConfig() method.
        }
    
        /**
         * @return EntityFactoryInterface
         */
        public function getEntityFactory(): EntityFactoryInterface
        {
            // TODO: Implement getEntityFactory() method.
        }
    
        /**
         * @return EntityRequestErrorInterface
         */
        public function getEntityRequestErrorHandler(): EntityRequestErrorInterface
        {
            // TODO: Implement getEntityRequestErrorHandler() method.
        }
    
        /**
         * @return ServerRequestInterface
         */
        public function getRequest(): ServerRequestInterface
        {
            // TODO: Implement getRequest() method.
        }
    
        /**
         * @return RequestPaginationInterface
         */
        public function getRequestPagination(): RequestPaginationInterface
        {
            // TODO: Implement getRequestPagination() method.
        }
    
        /**
         * @return RequestQueryModifierInterface
         */
        public function getRequestQueryModifier(): RequestQueryModifierInterface
        {
            // TODO: Implement getRequestQueryModifier() method.
        }
    
        /**
         * @return ResponseBuilderInterface
         */
        public function getResponseBuilder(): ResponseBuilderInterface
        {
            // TODO: Implement getResponseBuilder() method.
        }
    
        /**
         * @return ResponseFormatterInterface
         */
        public function getResponseFormatter(): ResponseFormatterInterface
        {
            // TODO: Implement getResponseFormatter() method.
        }
    
        /**
         * @return RouterInterface
         */
        public function getRouter(): RouterInterface
        {
            // TODO: Implement getRouter() method.
        }
    
        /**
         * @return RoutesClassesInterface
         */
        public function getRoutesClasses(): RoutesClassesInterface
        {
            // TODO: Implement getRoutesClasses() method.
        }
    
        /**
         * @inheritdoc
         */
        public function has($id) { }
    }
}
