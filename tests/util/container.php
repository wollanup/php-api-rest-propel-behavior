<?php
namespace Eukles\Container {
    
    use Psr\Container\ContainerInterface;
    
    class Container implements ContainerInterface
    {
        
        /**
         * @inheritdoc
         */
        public function get($id) { }
        
        /**
         * @inheritdoc
         */
        public function has($id) { }
    }
}
