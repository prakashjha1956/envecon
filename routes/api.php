<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('request_to_technicals', 'RequestToTechnicalsController', ['except' => ['create', 'edit']]);

});
