<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\TestWith;
use Tests\TestCase;

class EditorialThemeTest extends TestCase
{
    #[TestWith(['/admin/login'])]
    #[TestWith(['/app/login'])]
    public function test_panels_render_the_editorial_terminal_login(string $path): void
    {
        $this->get($path)
            ->assertOk()
            ->assertSee('login-terminal', escape: false)
            ->assertSee('login-theme-toggle', escape: false);
    }
}
