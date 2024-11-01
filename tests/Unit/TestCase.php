<?php
namespace Xefi\Faker\Files\Tests\Unit;

use Xefi\Faker\Container\Container;
use Xefi\Faker\Files\FakerFilesServiceProvider;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $faker;

    protected function setUp(): void
    {
        Container::packageManifestPath('/tmp/packages.php');

        (new FakerFilesServiceProvider)->boot();

        $this->faker = new Container(false);
    }
}
