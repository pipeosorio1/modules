<?php

namespace Pipeosorio1\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the provided services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the provided services.
     */
    public function register()
    {
        $generators = [
            'command.make.module'            => \Pipeosorio1\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Pipeosorio1\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Pipeosorio1\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Pipeosorio1\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Pipeosorio1\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Pipeosorio1\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Pipeosorio1\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Pipeosorio1\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Pipeosorio1\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Pipeosorio1\Modules\Console\Generators\MakeTestCommand::class,
            'command.make.module.job'        => \Pipeosorio1\Modules\Console\Generators\MakeJobCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
