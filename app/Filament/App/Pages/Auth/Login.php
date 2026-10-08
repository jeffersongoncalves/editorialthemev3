<?php

namespace App\Filament\App\Pages\Auth;

use Illuminate\Contracts\Support\Htmlable;
use JeffersonGoncalves\Filament\User\Pages\Auth\Login as BaseLogin;

/**
 * filament-user's login (active-account check) with the Editorial Terminal login view.
 */
class Login extends BaseLogin
{
    protected static string $view = 'filament-editorial-theme::auth.login';

    public function getHeading(): string|Htmlable
    {
        return '';
    }

    public function getSubheading(): string|Htmlable|null
    {
        return null;
    }

    public function hasLogo(): bool
    {
        return false;
    }
}
