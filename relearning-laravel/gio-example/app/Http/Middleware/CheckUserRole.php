<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Basic check for user authorization in your app.
class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $userRole): Response
    {
        dump('Checking user role: ' . $userRole);

        $user = ['id' => 123, 'name' => 'Gio', 'role' => 'admin'];

        if ($user['role'] === 'admin') {
            return $next($request);
        }

        // ! This way is uglier than the NotFoundException approach, because it doesn't use laravel's exception handler to render the 404 page.
        // return response(status: 404); // this is better than saying '403', because then we don't give the user the info that the page that he was blocked from exists (we only say: 'this page does not exist', which is a lie, but is fine)

        abort(404, 'This page does not exist.'); // * this is essentially the same as a throw new NotFoundHttpException(404, 'This page does not exist.')
    }
}
