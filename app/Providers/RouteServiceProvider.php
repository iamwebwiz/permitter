<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(): void
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapApplicantRoutes();

        $this->mapReviewerRoutes();

        $this->mapProcessorRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "applicant" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapApplicantRoutes(): void
    {
        Route::middleware(['web', 'role:applicant'])
            ->prefix('applicant')
            ->namespace("$this->namespace\Applicant")
            ->name('applicant.')
            ->group(base_path('routes/applicant.php'));
    }

    /**
     * Define the "reviewer" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapReviewerRoutes(): void
    {
        Route::middleware(['web', 'role:reviewer'])
            ->prefix('reviewer')
            ->namespace("$this->namespace\Reviewer")
            ->name('reviewer.')
            ->group(base_path('routes/reviewer.php'));
    }

    /**
     * Define the "processor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapProcessorRoutes(): void
    {
        Route::middleware(['web', 'role:processor'])
            ->prefix('processor')
            ->namespace("$this->namespace\Processor")
            ->name('processor.')
            ->group(base_path('routes/processor.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
