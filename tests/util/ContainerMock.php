<?php
namespace Eukles\Container {
    
    use Eukles\Entity\EntityFactoryInterface;
    use Eukles\Service\Pagination\RequestPaginationInterface;
    use Eukles\Service\QueryModifier\RequestQueryModifierInterface;
    use Eukles\Service\ResponseBuilder\ResponseBuilderInterface;
    use Eukles\Service\ResponseFormatter\ResponseFormatterInterface;
    use Eukles\Service\RoutesClasses\RoutesClassesInterface;
    use Eukles\Service\XssCleaner\XssCleanerInterface;
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
        }
    
        /**
         * @return EntityFactoryInterface
         */
        public function getEntityFactory()
        {
        }
    
        /**
         * @return EntityRequestErrorInterface
         */
        public function getEntityRequestErrorHandler()
        {
        }
    
        /**
         * @return Request
         */
        public function getRequest()
        {
        }
    
        /**
         * @return RequestPaginationInterface
         */
        public function getRequestPagination()
        {
        }
    
        /**
         * @return RequestQueryModifierInterface
         */
        public function getRequestQueryModifier()
        {
        }
    
        /**
         * @return ResponseBuilderInterface
         */
        public function getResponseBuilder()
        {
        }
    
        /**
         * @return ResponseFormatterInterface
         */
        public function getResponseFormatter()
        {
        }
    
        /**
         * @return RouterInterface
         */
        public function getRouter()
        {
        }
    
        /**
         * @return RoutesClassesInterface
         */
        public function getRoutesClasses()
        {
        }
    
        /**
         * @return XssCleanerInterface
         */
        public function getXssCleaner()
        {
        }
    
        /**
         * @inheritdoc
         */
        public function has($id) { }
    }
}
