<?php

Route::group(['middleware' => 'VerifyUserPermissions'], function(){
    // Admin
        Route::get('/', 'Admin\AdminController@index')->name('adm.index');

        // CreatedPermissions
        Route::get('/adm/permissoes-criadas/lista', 'Admin\CreatedPermissionController@list')->name('adm.created_permissions.list');
            
        Route::get('/adm/permissoes-criadas/nova', 'Admin\CreatedPermissionController@new')->name('adm.created_permissions.new');
        Route::post('/adm/permissoes-criadas/salvar', 'Admin\CreatedPermissionController@save')->name('adm.created_permissions.save');
        
        Route::get('/adm/permissoes-criadas/editar/{id}', 'Admin\CreatedPermissionController@edit')->name('adm.created_permissions.edit');
        Route::post('/adm/permissoes-criadas/atualizar', 'Admin\CreatedPermissionController@update')->name('adm.created_permissions.update');
        
        Route::get('/adm/permissoes-criadas/alerta/{id}', 'Admin\CreatedPermissionController@alert')->name('adm.created_permissions.alert');
        Route::post('/adm/permissoes-criadas/deletar', 'Admin\CreatedPermissionController@delete')->name('adm.created_permissions.delete');
        
        // Groups
        Route::get('/adm/grupos/lista', 'Admin\GroupController@list')->name('adm.groups.list');
        
        Route::get('/adm/grupos/novo', 'Admin\GroupController@new')->name('adm.groups.new');
        Route::post('/adm/grupos/salvar', 'Admin\GroupController@save')->name('adm.groups.save');
        
        Route::get('/adm/grupos/editar/{id}', 'Admin\GroupController@edit')->name('adm.groups.edit');
        Route::post('/adm/grupos/atualizar', 'Admin\GroupController@update')->name('adm.groups.update');
        
        Route::get('/adm/grupos/alerta/{id}', 'Admin\GroupController@alert')->name('adm.groups.alert');
        Route::post('/adm/grupos/deletar', 'Admin\GroupController@delete')->name('adm.groups.delete');
        
        // User
        Route::get('/adm/usuarios/lista', 'Admin\UserController@list')->name('adm.users.list');
        
        Route::get('/adm/usuarios/novo', 'Admin\UserController@new')->name('adm.users.new');
        Route::post('/adm/usuarios/salvar', 'Admin\UserController@save')->name('adm.users.save');
        
        Route::get('/adm/usuarios/editar/{id}', 'Admin\UserController@edit')->name('adm.users.edit');
        Route::post('/adm/usuarios/atualizar', 'Admin\UserController@update')->name('adm.users.update');
        
        Route::get('/adm/usuarios/alerta/{id}', 'Admin\UserController@alert')->name('adm.users.alert');
        Route::post('/adm/usuarios/deletar', 'Admin\UserController@delete')->name('adm.users.delete');
        
    });	/*Fecha grupo de verificação de permissões*/
    
    
Route::get('/adm/sem-permissao', 'Admin\AdminController@withoutPermission')->name('adm.withoutPermission');

Auth::routes();