<?php

namespace App\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ShipReportCommandTest extends TestCase
{
    public function testExecuteWithArgument()
    {
        // Arrange
        $command = new ShipReportCommand();
        $commandTester = new CommandTester($command);
        
        // Act
        $commandTester->execute(['arg1' => 'testValue']);
        
        // Assert
        $output = $commandTester->getDisplay();
        
        // Sprawdzenie argumentu
        $this->assertStringContainsString('You passed an argument: testValue', $output);

        // Sprawdzenie końcowego komunikatu
        $this->assertStringContainsString(
            'You have a new command! Now make it your own! Pass --help to see your options.',
            preg_replace('/\s+/', ' ', $output) // Zamienia wiele białych znaków na pojedyncze
        );
        
        // Sprawdzenie kodu statusu
        $this->assertEquals(0, $commandTester->getStatusCode());
    }

    public function testExecuteWithoutArgument()
    {
        // Arrange
        $command = new ShipReportCommand();
        $commandTester = new CommandTester($command);
        
        // Act
        $commandTester->execute([]);
        
        // Assert
        $output = $commandTester->getDisplay();
        
        // Sprawdzenie, że argument nie został przekazany
        $this->assertStringNotContainsString('You passed an argument:', $output);

        // Sprawdzenie końcowego komunikatu
        $this->assertStringContainsString(
            'You have a new command! Now make it your own! Pass --help to see your options.',
            preg_replace('/\s+/', ' ', $output) // Zamienia wiele białych znaków na pojedyncze
        );
        
        // Sprawdzenie kodu statusu
        $this->assertEquals(0, $commandTester->getStatusCode());
    }

    public function testExecuteWithOption()
    {
        // Arrange
        $command = new ShipReportCommand();
        $commandTester = new CommandTester($command);
        
        // Act
        $commandTester->execute(['--option1' => true]);
        
        // Assert
        // Sprawdzamy, czy komenda została wykonana pomyślnie
        $this->assertEquals(0, $commandTester->getStatusCode());
    }
}
