<?php 

namespace Scaffolder\Scafold;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class ScafoldServiceProvider extends ServiceProvider {

	/*
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 *
	protected $defer = false;*/

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		// Get namespace
		$nameSpace = $this->app->getNamespace();

		// Set namespace alias for HomeController
		AliasLoader::getInstance()->alias('AppController', $nameSpace . 'Http\Controllers\Controller');

		// Routes
		$this->app->router->group(['namespace' => $nameSpace . 'Http\Controllers'], function()
		{
			require __DIR__.'/routes/web.php';
		});

        //loading the routes file
        //$this->loadRoutesFrom(__DIR__.'/routes/web.php');		
		//define the path for the view files
		$this->loadViewsFrom(__DIR__.'/views', 'scafold');
        //define the path for the migrations files
		$this->loadMigrationsFrom(__DIR__.'/database/migrations');				
		// Views
		$this->publishes([
			//define the path for the views files to publish
			__DIR__.'/../views' => base_path('resources/views'),
			__DIR__.'/../views/auth' => base_path('resources/views/auth'),
			__DIR__.'/../views/emails' => base_path('resources/views/emails'),
			__DIR__.'/../views/posts' => base_path('resources/views/posts'),
			//define the path for the model user files to publish
			__DIR__.'/Models/User.php' => base_path('app/User.php'),
			//define the path for the migrations files to publish
			__DIR__.'/database/migrations/2014_10_12_000000_create_users_table.php' => base_path('database/migrations/2014_10_12_000000_create_users_table.php'),
			__DIR__.'/database/migrations/2014_10_12_100000_create_password_resets_table.php' => base_path('database/migrations/2014_10_12_100000_create_password_resets_table.php'),
			__DIR__.'/database/migrations/2019_07_06_150548_create_posts_table.php' => base_path('database/migrations/2019_07_06_150548_create_posts_table.php'),
			//__DIR__.'/database/migrations/2019_11_06_074120_create_images_table.php' => base_path('database/migrations/2019_11_06_074120_create_images_table.php'),
			//define the path for the seeds files to publish
			__DIR__.'/database/seeds/DatabaseSeeder.php' => base_path('database/seeds/DatabaseSeeder.php'),
			__DIR__.'/database/seeds/PostTableSeeder.php' => base_path('database/seeds/PostTableSeeder.php'),
			__DIR__.'/database/seeds/UserTableSeeder.php' => base_path('database/seeds/UserTableSeeder.php'),
			//define the path for the middleware files to publish	// after published register this middleware in the app/Http/Kernel.php file eg('admin' => \App\Http\Middleware\Admin::class,)		
			__DIR__.'/Http/Middleware/Admin.php' => base_path('app/Http/Middleware/Admin.php'),// verify if in the project you don't have a middleware who have a same name when you publish
		]);
	}

	public function register() {}
}
