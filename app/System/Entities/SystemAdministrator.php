<?php
namespace App\System\Entities;


use App\ValueObjects\EDIPNID;

final class SystemAdministrator {

    /**
     * @var \App\ValueObjects\EDIPNID
     */
    private $admin_edipnid;
    /**
     * @var
     */
    private $type;

    public function __construct(EDIPNID $admin_edipnid, $type)
    {
        $this->admin_edipnid = $admin_edipnid;
        $this->type = $type;
    }

    public function edipnid()
    {
        return $this->admin_edipnid;
    }

    public function adminType()
    {
        return $this->type;
    }

}