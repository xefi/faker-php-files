<?php
namespace Xefi\Faker\Files\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\Files\Extensions\FilesExtension;

final class FilesExtensionTest extends TestCase
{
    protected array $mimeTypes;

    protected function setUp(): void
    {
        parent::setUp();

        $loremExtension = new FilesExtension(new Randomizer());
        $this->mimeTypes = (new ReflectionClass($loremExtension))->getProperty('mimeTypes')->getValue($loremExtension);
    }

    public function testMimeType(): void
    {
        $results = [];

        for ($i = 0; $i < count(array_keys($this->mimeTypes)); $i++) {
            $results[] = $this->faker->unique()->mimeType();
        }

        foreach ($results as $result) {
            $this->assertContains($result, array_keys($this->mimeTypes));
        }
    }

    public function testFileExtension(): void
    {
        $results = [];

        for ($i = 0; $i < count($this->mimeTypes); $i++) {
            $results[] = $this->faker->unique()->fileExtension();
        }

        $this->assertEqualsCanonicalizing(array_values($this->mimeTypes), $results);
    }
}
