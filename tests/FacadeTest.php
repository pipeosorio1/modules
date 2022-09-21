<?php

namespace Pipeosorio1\Modules\Tests;

use Module;

class FacadeTest extends BaseTestCase
{
    /** @test */
    public function it_can_work_with_container()
    {
        $this->assertInstanceOf(\Pipeosorio1\Modules\RepositoryManager::class, $this->app['modules']);
    }

    /** @test */
    public function it_can_work_with_facade()
    {
        $this->assertSame('Pipeosorio1\Modules\Facades\Module', (new \ReflectionClass(Module::class))->getName());
    }
}
