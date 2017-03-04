<?php

namespace REBELinBLUE\Deployer\Tests\Unit\View\Presenters;

use Mockery as m;
use REBELinBLUE\Deployer\Tests\TestCase;
use REBELinBLUE\Deployer\Tests\Unit\stubs\Model;
use REBELinBLUE\Deployer\Tests\Unit\stubs\Presenter as StubPresenter;

/**
 * @coversDefaultClass \REBELinBLUE\Deployer\View\Presenters\Presenter
 */
class PresenterTest extends TestCase
{
    /**
     * @covers ::__get
     * @covers ::toCamelCase
     */
    public function testMagicGet()
    {
        $model = new Model();
        $model->a_property = 'value';

        $presenter = new StubPresenter();
        $presenter->setWrappedObject($model);

        $this->assertSame($presenter->foo_bar, $presenter->presentFooBar());
        $this->assertSame($presenter->snake_case, $presenter->snake_case());
        $this->assertSame($presenter->a_property, $model->a_property);
    }

    /**
     * @covers ::__isset
     * @covers ::toCamelCase
     */
    public function testMagicIsset()
    {
        $model = new Model();
        $model->a_property = 'value';

        $presenter = new StubPresenter();
        $presenter->setWrappedObject($model);

        $this->assertTrue(isset($presenter->foo_bar));
        $this->assertTrue(isset($presenter->snake_case));
        $this->assertTrue(isset($presenter->a_property));
        $this->assertFalse(isset($presenter->some_other_property));
    }
}
