<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {

	public function setGateAndPolicyAccess()
	{
		$this->defineGateCategory();
		$this->defineGateProduct();
		$this->defineGateProvider();
		$this->defineGateSlide();
		$this->defineGateContact();
		$this->defineGateUser();
		$this->defineGateRole();
		$this->defineGatePermission();
	}

	public function defineGateCategory()
	{
		Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
	}

	public function defineGateProduct()
	{
		Gate::define('product-list', 'App\Policies\ProductPolicy@view');
        Gate::define('product-add', 'App\Policies\ProductPolicy@create');
        Gate::define('product-edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product-delete', 'App\Policies\ProductPolicy@delete');
	}

	public function defineGateProvider()
	{
		Gate::define('provider-list', 'App\Policies\ProviderPolicy@view');
        Gate::define('provider-add', 'App\Policies\ProviderPolicy@create');
        Gate::define('provider-edit', 'App\Policies\ProviderPolicy@update');
        Gate::define('provider-delete', 'App\Policies\ProviderPolicy@delete');
	}

	public function defineGateSlide()
	{
		Gate::define('slide-list', 'App\Policies\SlidePolicy@view');
        Gate::define('slide-add', 'App\Policies\SlidePolicy@create');
        Gate::define('slide-edit', 'App\Policies\SlidePolicy@update');
        Gate::define('slide-delete', 'App\Policies\SlidePolicy@delete');
	}

	public function defineGateContact()
	{
		Gate::define('contact-list', 'App\Policies\ContactPolicy@view');
        Gate::define('contact-add', 'App\Policies\ContactPolicy@create');
        Gate::define('contact-edit', 'App\Policies\ContactPolicy@update');
        Gate::define('contact-delete', 'App\Policies\ContactPolicy@delete');
	}

	public function defineGateUser()
	{
		Gate::define('user-list', 'App\Policies\UserPolicy@view');
        Gate::define('user-add', 'App\Policies\UserPolicy@create');
        Gate::define('user-edit', 'App\Policies\UserPolicy@update');
        Gate::define('user-delete', 'App\Policies\UserPolicy@delete');
	}

	public function defineGateRole()
	{
		Gate::define('role-list', 'App\Policies\RolePolicy@view');
        Gate::define('role-add', 'App\Policies\RolePolicy@create');
        Gate::define('role-edit', 'App\Policies\RolePolicy@update');
        Gate::define('role-delete', 'App\Policies\RolePolicy@delete');
	}

	public function defineGatePermission()
	{
		Gate::define('permission-list', 'App\Policies\PermissionPolicy@view');
        Gate::define('permission-add', 'App\Policies\PermissionPolicy@create');
        Gate::define('permission-edit', 'App\Policies\PermissionPolicy@update');
        Gate::define('permission-delete', 'App\Policies\PermissionPolicy@delete');
	}
}