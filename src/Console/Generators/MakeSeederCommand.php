<?php

namespace Pipeosorio1\Modules\Console\Generators;

use Pipeosorio1\Modules\Console\GeneratorCommand;

class MakeSeederCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:seeder
    	{slug : The slug of the module.}
    	{name : The name of the seeder class.}
    	{--location= : The modules location to create the module seeder class in}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module seeder class';

    /**
     * String to store the command type.
     *
     * @var string
     */
    protected $type = 'Module seeder';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/seeder.stub';
    }

    /**
     * Get the destination class path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getPath($name)
    {
        return module_path($this->argument('slug'), 'Database/Seeds/' . $name . '.php', $this->option('location'));
    }

    /**
     * Parse the name and format according to the root namespace.
     *
     * @param string $name
     *
     * @return string
     */
    protected function qualifyClass($name)
    {
        return $name;
    }

    /**
     * Replace namespace in seeder stub.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getNamespace($name)
    {
        return module_class($this->argument('slug'), 'Database\Seeds', $this->option('location'));
    }
}
