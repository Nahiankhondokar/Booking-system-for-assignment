<?php 

namespace Tests\Feature\App\Http\Controllers;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WelcomeTest extends TestCase 
{
    use RefreshDatabase; // newly migrate all the database

    // This method will call befor every method call.
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class); // Seed with a specific seeder
        // $this->artisan('db:seed'); // Alternatively, you can seed all the seeders
    }

    public function test_login_page_load()
    {
        // arrange 


        // act 
        $response = $this->get('/');

        // assert
        $response->assertOk();
        $response->assertSee(route('login'));
        $response->assertSee('Email');
    }

    public function test_dashboard_page_load()
    {
        // arrange 
        $user = User::query()->latest()->first();

        // act 
        $response = $this->actingAs($user)->get('/dashboard');

        // assert
        // $response->assertOk();
        $response->assertSee('Name');
        // $response->assertSee(route('event.store'));
    }
}

