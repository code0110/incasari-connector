<?php

Route::group([
    'namespace'  => 'Botble\IncasariConnector\Http\Controllers',
    'middleware' => ['web', 'core'],
], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::get('incasari-connector', [
            'as'         => 'incasari-connector',
            'uses'       => 'IncasariConnectorController@index',
            'permission' => 'settings.options',
        ]);
   
        Route::get('incasari-connector/emag', [
            'as'         => 'incasari-connector.emag',
            'uses'       => 'EmagController@index',
            'permission' => 'settings.options',
        ]);

        Route::get('incasari-connector/mapper', [
            'as'         => 'incasari-connector.mapper',
            'uses'       => 'IncasariConnectorController@mapper',
            'permission' => 'settings.options',
        ]); 

        Route::get('incasari-connector/export', [
            'as'         => 'incasari-connector.export',
            'uses'       => 'IncasariConnectorController@export',
            'permission' => 'settings.options',
        ]); 

        Route::get('incasari-connector/mapper-clear', [
            'as'         => 'incasari-connector.mapper-clear',
            'uses'       => 'IncasariConnectorController@destroy',
            'permission' => 'settings.options',
        ]);


        Route::post('incasari-connector/import-incasari', [
            'as'         => 'incasari-connector.import-emag',
            'uses'       => 'EmagController@import',
            'permission' => 'settings.options',
        ]);

        Route::get('incasari-connector/emag-clear', [
            'as'         => 'incasari-connector.emag-clear',
            'uses'       => 'EmagController@destroy',
            'permission' => 'settings.options',
        ]);

        Route::get('incasari-connector/neomanager', [
            'as'         => 'incasari-connector.neomanager',
            'uses'       => 'NeomanagerController@index',
            'permission' => 'settings.options',
        ]);

        Route::post('incasari-connector/import-incasari-neomanager', [
            'as'         => 'incasari-connector.import-neomanager',
            'uses'       => 'NeomanagerController@import',
            'permission' => 'settings.options',
        ]);

        Route::get('incasari-connector/neomanager-clear', [
            'as'         => 'incasari-connector.neomanager-clear',
            'uses'       => 'NeomanagerController@destroy',
            'permission' => 'settings.options',
        ]);
    });
});
