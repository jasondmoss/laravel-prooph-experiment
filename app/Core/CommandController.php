<?php
/**
 * Created by PhpStorm.
 * User: marklj
 * Date: 8/9/16
 * Time: 11:57 AM
 */

namespace App\Core;


use Illuminate\Http\Response;

interface CommandController {

    /**
     * @param \App\Core\ControllerPayload $payload
     *
     * @return Response
     */
    public function __invoke(ControllerPayload $payload);

}