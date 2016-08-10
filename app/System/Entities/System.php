<?php namespace App\System\Entities;


use App\System\Events\SystemAdministratorWasAdded;
use App\System\Events\SystemNameWasChanged;
use App\System\Events\SystemWasRegistered;
use App\System\Exceptions\AdministratorAlreadyExistsInSystem;
use App\System\ValueObjects\SystemAcronym;
use App\System\ValueObjects\SystemId;
use App\System\ValueObjects\SystemName;
use App\ValueObjects\EDIPNID;
use Prooph\EventSourcing\AggregateRoot;

class System extends AggregateRoot {

    /**
     * @var SystemId
     */
    private $system_id;
    private $acronym;
    private $name;

    private $admins = [];

    public static function registerWithAcronymAndName(SystemId $system_id, SystemAcronym $acronym, SystemName $name)
    {
        $self = new self;
        $self->recordThat(
            SystemWasRegistered::withAcronymAndName($system_id, $acronym, $name)
        );
        return $self;
    }
    
    protected function whenSystemWasRegistered(SystemWasRegistered $event)
    {
        $this->system_id = $event->systemId();
        $this->acronym = $event->acronym();
        $this->name = $event->name();
    }
    
    public function changeSystemName(SystemName $new_name)
    {
        if( ! $this->name->equals($new_name)) {
            $this->recordThat(
                SystemNameWasChanged::with($this->system_id, $this->name, $new_name)
            );
        }
    }

    protected function whenSystemNameWasChanged(SystemNameWasChanged $event)
    {
        $this->name = $event->newName();
    }

    public function addAdministrator(EDIPNID $admin_edipnid, $type)
    {
        if( ! $this->administratorAlreadyExistsinSystem($admin_edipnid)) {
            $this->recordThat(
                SystemAdministratorWasAdded::with($this->system_id, $admin_edipnid, $type)
            );
        }
    }

    protected function whenSystemAdministratorWasAdded(SystemAdministratorWasAdded $event)
    {
        $this->admins[] = new SystemAdministrator($event->adminEdipnid(), $event->adminType());
    }
    
    /**
     * @return string representation of the unique identifier of the aggregate root
     */
    protected function aggregateId() {
        return $this->system_id->toString();
    }

    /**
     * @param \App\ValueObjects\EDIPNID $admin_edipnid
     */
    protected function administratorAlreadyExistsinSystem(EDIPNID $admin_edipnid
    ) {
        return collect($this->admins)->contains(function (
            $_,
            SystemAdministrator $admin
        ) use ($admin_edipnid) {
            return $admin->edipnid()->equals($admin_edipnid);
        });
    }


}