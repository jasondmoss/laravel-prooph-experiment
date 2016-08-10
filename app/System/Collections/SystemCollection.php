<?php namespace App\System\Collections;

use App\System\Entities\System;
use App\System\ValueObjects\SystemId;

interface SystemCollection {

    /**
     * @param \App\System\Entities\System $system
     */
    public function add(System $system);

    /**
     *
     * @param \App\System\ValueObjects\SystemId $system_id
     *
     * @return \App\System\Entities\System
     */
    public function get(SystemId $system_id);

}