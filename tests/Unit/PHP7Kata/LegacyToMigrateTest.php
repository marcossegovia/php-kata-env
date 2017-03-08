<?php

namespace KataTest\Unit\BowlingKata;

use Kata\PHP7Kata\LegacyToMigrate;

class LegacyToMigrateTest extends \PHPUnit_Framework_TestCase
{
    /** @var LegacyToMigrate */
    private $legacy_to_migrate;

    public function setUp()
    {
        $this->legacy_to_migrate = new LegacyToMigrate();
    }

    /**
     * @test
     */
    public function shouldReturnStringOrNull()
    {
        $param  = 'jojojo';
        $result = $this->legacy_to_migrate->getStringOrNull($param);

        $this->assertEquals($param, $result);
        $this->assertInternalType('string', $result);

        $param  = null;
        $result = $this->legacy_to_migrate->getStringOrNull($param);

        $this->assertEquals($param, $result);
        $this->assertNull($result);
    }

    /**
     * @test
     */
    public function shouldSearchThings()
    {
        $result = $this->legacy_to_migrate->searchInText();

        $this->assertEquals('DANIEL:MADURELL:VISA:XXXXXXXXXXXXXXXXXXXXXXXXXXX', $result);
    }

    /**
     * @test
     */
    public function shouldConstantBeAConstant()
    {
        $result = LegacyToMigrate::ANIMALS;

        $this->assertInternalType('array', $result);

        $this->assertEquals('dog', $result[0]);
        $this->assertEquals('cat', $result[1]);
        $this->assertEquals('bird', $result[2]);
    }

    /**
     * @test
     */
    public function shouldScalarTypeDeclaration()
    {
        $result = $this->legacy_to_migrate->sumOfIntegers(2, '3', 4.1);

        $this->assertEquals(9, $result);
    }

    /**
     * @test
     */
    public function shouldDivideIntegers()
    {
        $result = $this->legacy_to_migrate->divideEnters(9, 3);

        $this->assertEquals(3, $result);
    }

    /**
     * @test
     */
    public function shouldReturnArraySolution()
    {
        $result = $this->legacy_to_migrate->arraysSum([1, 2, 3], [4, 5, 6], [7, 8, 9]);

        $this->assertInternalType('array', $result);
    }

    /**
     * @test
     */
    public function shouldDestructureAnArray()
    {
        $data = [
            [1, 'Tom'],
            [2, 'Fred'],
        ];

        $result = $this->legacy_to_migrate->getComposedName($data, 0);

        $all_results = $this->legacy_to_migrate->getAllComposedNames($data);

        $this->assertEquals('1_Tom', $result);
        $this->assertEquals('1_Tom|2_Fred|', $all_results);
    }

    /**
     * @test
     */
    public function shouldReturnUsernameOrNoBodyIfNotUser()
    {
        $result = $this->legacy_to_migrate->getUserName(['username' => 'luke']);
        $this->assertEquals('luke', $result);

        $result = $this->legacy_to_migrate->getUserName([]);
        $this->assertEquals('nobody', $result);
    }

    /**
     * @test
     */
    public function shouldSayTheSame()
    {
        $result = $this->legacy_to_migrate->saySomething();

        $this->assertEquals('Hey PHP7!', $result);
    }

    /**
     * @test
     */
    public function shouldCallClosure()
    {
        $this->setUp();

        $result = $this->legacy_to_migrate->callingClosures();

        $this->assertEquals(2, $result);
    }

    /**
     * @test
     */
    public function shouldReturnVoidInAnyCase()
    {
        $a = 1;
        $b = 2;

        $result = $this->legacy_to_migrate->nothingToReturn($a, $b);

        $this->assertNull($result);
    }

    /**
     * @test
     */
    public function shouldReturnFalseAnyCaseButNeedToPreventAboutExceptions()
    {
        $result = $this->legacy_to_migrate->tooMuchExceptionsMakeUglyCode();

        $this->assertNotTrue($result);
    }

    /**
     * @test
     */
    public function shouldGetTheLastCharOfAString()
    {
        $data = 'jojojo1';

        $result = $this->legacy_to_migrate->getLastCharOfAString($data);

        $this->assertEquals('1', $result);
    }

    /**
     * @test
     */
    public function shouldBeCosaFina()
    {
        $last_value = $this->legacy_to_migrate->printForEachValue();

        $this->assertEquals(1, $last_value);
    }
}
