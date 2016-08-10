<?php
namespace App\System\Container;


use App\System\Collections\SystemCollection;
use App\System\Commands\Handlers\EditSystemHandler;
use App\System\Commands\Handlers\RegisterSystemHandler;
use Interop\Container\ContainerInterface;

final class EditSystemHandlerFactory {

    public function __invoke(ContainerInterface $container)
    {
        return new EditSystemHandler($container->get(SystemCollection::class));

    }

}