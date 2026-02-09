<?php
/**
 * Tests for Governance
 */

use PHPUnit\Framework\TestCase;
use Governance\Governance;

class GovernanceTest extends TestCase {
    private Governance $instance;

    protected function setUp(): void {
        $this->instance = new Governance(['verbose' => false]);
    }

    public function testCanCreateInstance(): void {
        $this->assertInstanceOf(Governance::class, $this->instance);
    }

    public function testExecuteReturnsSuccess(): void {
        $result = $this->instance->execute();
        $this->assertTrue($result['success']);
        $this->assertArrayHasKey('message', $result);
    }
}
