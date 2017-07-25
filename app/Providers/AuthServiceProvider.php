<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Requirements
        Gate::define('requirement_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Time work types
        Gate::define('time_work_type_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_work_type_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_work_type_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_work_type_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_work_type_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Time projects
        Gate::define('time_project_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_project_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_project_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_project_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_project_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Time entries
        Gate::define('time_entry_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_entry_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_entry_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_entry_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('time_entry_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Time reports
        Gate::define('time_report_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Request to technical
        Gate::define('request_to_technical_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('request_to_technical_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('request_to_technical_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('request_to_technical_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('request_to_technical_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Status
        Gate::define('status_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('status_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('status_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('status_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('status_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
