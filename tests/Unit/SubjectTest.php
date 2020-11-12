<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Examples\Observer;
use App\Examples\Subject;
use PHPUnit\Framework\TestCase;

final class SubjectTest extends TestCase
{
    public function testObserversAreUpdated(): void
    {
        // Create a mock for the Observer class,
        // only mock the update() method.
        $observer = $this->createMock(Observer::class);

        // Set up the expectation for the update() method
        // to be called only once and with the string 'something'
        // as its parameter.
        $observer->expects($this->once())
            ->method('update')
            ->with($this->equalTo('something'));

        // Create a Subject object and attach the mocked
        // Observer object to it.
        $subject = new Subject('My subject');
        $subject->attach($observer);

        // Call the doSomething() method on the $subject object
        // which we expect to call the mocked Observer object's
        // update() method with the string 'something'.
        $subject->doSomething();
    }
}
