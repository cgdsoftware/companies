<?php

Route::namespace('LaravelEnso\Companies\app\Http\Controllers')
    ->middleware(['web', 'auth', 'core'])
    ->prefix('api/administration')
    ->as('administration.')
    ->group(function () {
        Route::prefix('companies')->as('companies.')
            ->group(function () {
                Route::get('initTable', 'CompanyTableController@init')
                    ->name('initTable');
                Route::get('tableData', 'CompanyTableController@data')
                    ->name('tableData');
                Route::get('exportExcel', 'CompanyTableController@excel')
                    ->name('exportExcel');

                Route::get('options', 'CompanySelectController@options')
                    ->name('options');

                Route::prefix('{company}/contacts')->as('contacts.')
                    ->group(function () {
                        Route::get('', 'ContactController@index')
                            ->name('index');

                        Route::get('create', 'ContactController@create')
                            ->name('create');
                    });

                Route::get('contacts/options', 'ContactSelectController@options')
                            ->name('contacts.options');

                Route::resource('contacts', 'ContactController', [
                    'except' => ['show', 'index', 'create'],
                ]);
            });

        Route::resource('companies', 'CompanyController', ['except' => ['index', 'show']]);
    });
