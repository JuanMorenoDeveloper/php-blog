<?php declare(strict_types=1);

namespace Tests\Feature;

use App\Examples\Email;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

final class EmailTest extends TestCase
{
    /**
     * @test
     */
    public function givenString_whenFromString_thenGetEmailInstance(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    /**
     * @test
     */
    public function CanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}
