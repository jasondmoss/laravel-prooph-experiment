<?php
/**
 * Created by PhpStorm.
 * User: marklj
 * Date: 8/8/16
 * Time: 11:16 PM
 */

namespace App\Http\Controllers;


use Prooph\Common\Messaging\Message;
use Prooph\ServiceBus\CommandBus;

trait DispatchTrait {

    public function dispatch(Message $command)
    {
        app(CommandBus::class)->dispatch($command);
    }
    
}