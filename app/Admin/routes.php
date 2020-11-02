<?php

use KodiCMS\Assets\Facades\Meta;

Route::get('', ['as' => 'admin.dashboard', function () {
    Meta::addJs( 'test', 'js/dashboard.js' );

    return AdminSection::view(view('dashboard'), 'Dashboard');
}]);
