<?php

namespace Pipeosorio1\Modules\Console\Generators;

use Pipeosorio1\Modules\Console\GeneratorCommand;

class MakeProviderCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:provider
    	{slug : The slug of the module.}
    	{name : The name of the service provider class.}
    	{--location= : The modules location to create the module provider class in}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module service provider class';

    /**
     * String to store the command type.
     *
     * @var string
     */
    protected $type = 'Module service provider';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/provider.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return module_class($this->argument('slug'), 'Providers', $this->option('location'));
    }
}
