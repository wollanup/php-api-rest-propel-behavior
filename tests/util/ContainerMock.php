<?php
namespace Eukles\Container {
    
    use Eukles\Entity\EntityFactoryInterface;
    use Eukles\Service\Pagination\RequestPaginationInterface;
    use Eukles\Service\QueryModifier\RequestQueryModifierInterface;
    use Eukles\Service\ResponseBuilder\ResponseBuilderInterface;
    use Eukles\Service\ResponseFormatter\ResponseFormatterInterface;
    use Eukles\Service\RoutesClasses\RoutesClassesInterface;
    use Eukles\Slim\Handlers\ActionErrorInterface;
    use Eukles\Slim\Handlers\EntityRequestErrorInterface;
    use Slim\Http\Request;
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
        public function getActionErrorHandler()
        {
            // TODO: Implement getActionErrorHandler() method.
        }
    
        /**
         * @return EntityFactoryInterface
         */
        public function getEntityFactory()
        {
            // TODO: Implement getEntityFactory() method.
        }
    
        /**
         * @return EntityRequestErrorInterface
         */
        public function getEntityRequestErrorHandler()
        {
            // TODO: Implement getEntityRequestErrorHandler() method.
        }
    
        /**
         * @return Request
         */
        public function getRequest()
        {
            // TODO: Implement getRequest() method.
        }
    
        /**
         * @return RequestPaginationInterface
         */
        public function getRequestPagination()
        {
            // TODO: Implement getRequestPagination() method.
        }
    
        /**
         * @return RequestQueryModifierInterface
         */
        public function getRequestQueryModifier()
        {
            // TODO: Implement getRequestQueryModifier() method.
        }
    
        /**
         * @return ResponseBuilderInterface
         */
        public function getResponseBuilder()
        {
            // TODO: Implement getResponseBuilder() method.
        }
    
        /**
         * @return ResponseFormatterInterface
         */
        public function getResponseFormatter()
        {
            // TODO: Implement getResponseFormatter() method.
        }
    
        /**
         * @return RouterInterface
         */
        public function getRouter()
        {
            // TODO: Implement getRouter() method.
        }
    
        /**
         * @return RoutesClassesInterface
         */
        public function getRoutesClasses()
        {
            // TODO: Implement getRoutesClasses() method.
        }
        
        /**
         * @inheritdoc
         */
        public function has($id) { }
    }
}
