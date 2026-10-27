<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // User::class => App\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Super Administrator gates
        Gate::define('viewAdminPanel', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('manageUsers', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('manageDepartments', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('viewAnyUser', function (User $user) {
            return $user->isSuperAdmin() || $user->isDepartmentHead();
        });

        Gate::define('viewUser', function (User $user, User $target) {
            return $user->isSuperAdmin()
                || $user->id === $target->id
                || ($user->isDepartmentHead() && $user->department_id === $target->department_id);
        });

        // Department gates
        Gate::define('viewAnyDepartment', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('createDepartment', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('updateDepartment', function (User $user, Department $department) {
            return $user->isSuperAdmin();
        });

        Gate::define('deleteDepartment', function (User $user, Department $department) {
            return $user->isSuperAdmin();
        });

        // User gates
        Gate::define('createUser', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('updateUser', function (User $user, User $target) {
            return $user->isSuperAdmin()
                || $user->id === $target->id
                || ($user->isDepartmentHead() && $user->department_id === $target->department_id);
        });

        Gate::define('deleteUser', function (User $user, User $target) {
            return $user->isSuperAdmin();
        });

        // General system gates
        Gate::define('createTicket', function (User $user) {
            return $user->isActive;
        });

        Gate::define('viewTicket', function (User $user, $ticket) {
            return $user->isSuperAdmin()
                || $user->id === $ticket->requester_id
                || $user->id === $ticket->assigned_to_id
                || ($user->isDepartmentHead() && $user->department_id === $ticket->receiving_department_id);
        });
    }
}