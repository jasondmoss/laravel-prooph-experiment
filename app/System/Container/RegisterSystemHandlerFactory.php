<?php
namespace App\System\Container;


use App\System\Collections\SystemCollection;
use App\System\Commands\Handlers\RegisterSystemHandler;
use Interop\Container\ContainerInterface;

final class RegisterSystemHandlerFactory {

    public function __invoke(ContainerInterface $container)
    {
        return new RegisterSystemHandler($container->get(SystemCollection::class));

    }
    
}