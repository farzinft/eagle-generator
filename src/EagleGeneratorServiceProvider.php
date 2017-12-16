<?php

namespace Eagle\Generator;

use Illuminate\Support\ServiceProvider;
use Eagle\Generator\Commands\API\APIControllerGeneratorCommand;
use Eagle\Generator\Commands\API\APIGeneratorCommand;
use Eagle\Generator\Commands\API\APIRequestsGeneratorCommand;
use Eagle\Generator\Commands\API\TestsGeneratorCommand;
use Eagle\Generator\Commands\APIScaffoldGeneratorCommand;
use Eagle\Generator\Commands\Common\MigrationGeneratorCommand;
use Eagle\Generator\Commands\Common\ModelGeneratorCommand;
use Eagle\Generator\Commands\Common\RepositoryGeneratorCommand;
use Eagle\Generator\Commands\Publish\GeneratorPublishCommand;
use Eagle\Generator\Commands\Publish\LayoutPublishCommand;
use Eagle\Generator\Commands\Publish\PublishTemplateCommand;
use Eagle\Generator\Commands\Publish\VueJsLayoutPublishCommand;
use Eagle\Generator\Commands\RollbackGeneratorCommand;
use Eagle\Generator\Commands\Scaffold\ControllerGeneratorCommand;
use Eagle\Generator\Commands\Scaffold\RequestsGeneratorCommand;
use Eagle\Generator\Commands\Scaffold\ScaffoldGeneratorCommand;
use Eagle\Generator\Commands\Scaffold\ViewsGeneratorCommand;
use Eagle\Generator\Commands\VueJs\VueJsGeneratorCommand;

class EagleGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/eagle_generator.php';

        $this->publishes([
            $configPath => config_path('eagle/eagle_generator.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('eagle.publish', function ($app) {
            return new GeneratorPublishCommand();
        });

        $this->app->singleton('eagle.api', function ($app) {
            return new APIGeneratorCommand();
        });

        $this->app->singleton('eagle.scaffold', function ($app) {
            return new ScaffoldGeneratorCommand();
        });

        $this->app->singleton('eagle.publish.layout', function ($app) {
            return new LayoutPublishCommand();
        });

        $this->app->singleton('eagle.publish.templates', function ($app) {
            return new PublishTemplateCommand();
        });

        $this->app->singleton('eagle.api_scaffold', function ($app) {
            return new APIScaffoldGeneratorCommand();
        });

        $this->app->singleton('eagle.migration', function ($app) {
            return new MigrationGeneratorCommand();
        });

        $this->app->singleton('eagle.model', function ($app) {
            return new ModelGeneratorCommand();
        });

        $this->app->singleton('eagle.repository', function ($app) {
            return new RepositoryGeneratorCommand();
        });

        $this->app->singleton('eagle.api.controller', function ($app) {
            return new APIControllerGeneratorCommand();
        });

        $this->app->singleton('eagle.api.requests', function ($app) {
            return new APIRequestsGeneratorCommand();
        });

        $this->app->singleton('eagle.api.tests', function ($app) {
            return new TestsGeneratorCommand();
        });

        $this->app->singleton('eagle.scaffold.controller', function ($app) {
            return new ControllerGeneratorCommand();
        });

        $this->app->singleton('eagle.scaffold.requests', function ($app) {
            return new RequestsGeneratorCommand();
        });

        $this->app->singleton('eagle.scaffold.views', function ($app) {
            return new ViewsGeneratorCommand();
        });

        $this->app->singleton('eagle.rollback', function ($app) {
            return new RollbackGeneratorCommand();
        });

        $this->app->singleton('eagle.vuejs', function ($app) {
            return new VueJsGeneratorCommand();
        });
        $this->app->singleton('eagle.publish.vuejs', function ($app) {
            return new VueJsLayoutPublishCommand();
        });

        $this->commands([
            'eagle.publish',
            'eagle.api',
            'eagle.scaffold',
            'eagle.api_scaffold',
            'eagle.publish.layout',
            'eagle.publish.templates',
            'eagle.migration',
            'eagle.model',
            'eagle.repository',
            'eagle.api.controller',
            'eagle.api.requests',
            'eagle.api.tests',
            'eagle.scaffold.controller',
            'eagle.scaffold.requests',
            'eagle.scaffold.views',
            'eagle.rollback',
            'eagle.vuejs',
            'eagle.publish.vuejs',
        ]);
    }
}
