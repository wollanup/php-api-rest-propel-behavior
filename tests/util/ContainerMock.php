<?php
namespace Eukles\Container {

    use Eukles\Config\ConfigInterface;
    use Eukles\Entity\EntityFactoryInterface;
    use Eukles\Service\QueryModifier\RequestQueryModifierInterface;
    use Eukles\Service\Request\Pagination\RequestPaginationInterface;
    use Eukles\Service\ResponseBuilder\ResponseBuilderInterface;
    use Eukles\Service\ResponseFormatter\ResponseFormatterInterface;
    use Eukles\Service\RoutesClasses\RoutesClassesInterface;
    use Eukles\Slim\Handlers\ActionErrorInterface;
    use Eukles\Slim\Handlers\EntityRequestErrorInterface;
    use Psr\Container\ContainerExceptionInterface;
    use Psr\Container\NotFoundExceptionInterface;
    use Psr\Http\Message\ResponseInterface;
    use Psr\Http\Message\ServerRequestInterface;

    class ContainerMock implements ContainerInterface
    {

        /**
         * @inheritdoc
         */
        public function has($id) { }

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
         * @return ResponseInterface
         */
        public function getResponse(): ResponseInterface
        {
            // TODO: Implement getResponse() method.
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
         * Result is populated in ActionStrategy and becomes available in middlewares post-app
         *
         * @return mixed
         */
        public function getResult()
        {
            // TODO: Implement getResult() method.
        }

        /**
         * @param $result
         *
         * @return void
         */
        public function setResult($result)
        {
            // TODO: Implement setResult() method.
        }

        /**
         * @return \Eukles\Service\Router\RouterInterface
         */
        public function getRouter(): \Eukles\Service\Router\RouterInterface
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
         * Finds an entry of the container by its identifier and returns it.
         *
         * @param string $id Identifier of the entry to look for.
         *
         * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
         * @throws ContainerExceptionInterface Error while retrieving the entry.
         *
         * @return mixed Entry.
         */
        public function get($id)
        {
            // TODO: Implement get() method.
        }
    }
}
