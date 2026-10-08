<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\TestWith;
use Tests\TestCase;

class EditorialThemeTest extends TestCase
{
    use RefreshDatabase;

    #[TestWith(['/admin/login'])]
    #[TestWith(['/app/login'])]
    public function test_panels_render_the_editorial_terminal_login(string $path): void
    {
        $this->get($path)
            ->assertOk()
            ->assertSee('login-terminal', escape: false)
            ->assertSee('login-theme-toggle', escape: false);
    }

    public function test_developer_logins_list_active_accounts_in_the_local_environment(): void
    {
        $this->app['env'] = 'local';
        Admin::factory()->create(['name' => 'Dev Admin', 'email' => 'dev-admin@example.com']);
        Admin::factory()->create(['name' => 'Disabled Admin', 'email' => 'disabled@example.com', 'status' => false]);
        User::factory()->create(['name' => 'Dev User', 'email' => 'dev-user@example.com']);

        $this->get('/admin/login')->assertOk()->assertSee('Dev Admin')->assertDontSee('Disabled Admin');
        $this->get('/app/login')->assertOk()->assertSee('Dev User');
    }
}
