<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/admin/categories/add-photo',
        '/admin/categories/remove-photo',
        '/admin/products/remove-photo',
        '/admin/products/add-photo',
    ];
}
