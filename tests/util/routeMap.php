<?php
namespace Eukles\RouteMap {

    use Eukles\Service\Router\RouterInterface;
    use Psr\Container\ContainerInterface;

    class RouteMapAbstract implements RouteMapInterface
    {

        protected $container;

        public function __construct(ContainerInterface $container)
        {
            $this->container = $container;
        }

        public function current() { }

        public function getContainer() { }

        public function getPackage() { }

        public function key() { }

        public function next() { }

        public function registerRoutes(RouterInterface $router) { }

        public function rewind() { }

        public function valid() { }
    }
}
