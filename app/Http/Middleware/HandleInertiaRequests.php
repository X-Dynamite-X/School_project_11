<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        if ($request->user()) {
            return [
                ...parent::share($request),
                $user = $request->user(),
                'auth' => [
                    "user" =>  $user,
                    "user_role" => $user->getRoleNames(),
                ]
            ];
        }
        return [
            ...parent::share($request),
            $user = $request->user(),

            'auth' => [
                "user" =>  $user,
            ]
        ];
    }
}