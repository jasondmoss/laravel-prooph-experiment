<?php

Route::get('testing', function () {
    /** @var Prooph\ServiceBus\CommandBus $bus */
    $bus = app(Prooph\ServiceBus\CommandBus::class);

    for($i=0;$i<1000000;$i++) {
        $command = \App\System\Commands\EditSystem::name(
            \App\System\ValueObjects\SystemId::fromString('75b9d28c-5693-4412-a96b-335595e45462'),
            \App\System\ValueObjects\SystemName::fromString(str_random('10'))
        );
        $bus->dispatch($command);
    }
});

Route::get('systems', function () {
    $systems = \App\System\Projection\SystemFinder::all();
    return view('system.system_list', compact('systems'));
});

Route::get('systems/create', function () {
    return view('system.system_create');
});

Route::get('systems/{system_uuid}/edit', function ($system_uuid) {
    return view('system.system_edit')->with('system', \App\System\Projection\SystemFinder::find($system_uuid));
});

Route::get('systems/{system_uuid}', function ($system_uuid) {
    $system = \App\System\Projection\SystemFinder::with('admins')->findOrFail($system_uuid);
    return view('system.system_detail', compact('system'));
});

Route::get('systems/{system_uuid}/admins/add', function ($system_uuid) {
    $system = \App\System\Projection\SystemFinder::findOrFail($system_uuid);
    return view('system.admin_add', compact('system'));
});

Route::get('systems/{system_uuid}/roles/add', function ($system_uuid) {
    $system = \App\System\Projection\SystemFinder::findOrFail($system_uuid);
    return view('role.role_create', compact('system'));
})->name('role:create');