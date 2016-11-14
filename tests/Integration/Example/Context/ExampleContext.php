<?php

namespace KataTest\Integration\Example\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Gherkin\Node\PyStringNode;

final class ExampleContext implements Context
{
    /**
     * @AfterScenario @file
     */
    public function cleanDir(AfterScenarioScope $scope)
    {
        chdir("../");
        exec("rm -rf test");
    }

    private $output;

    /**
     * @Given I am in a directory :dir
     */
    public function iAmInADirectory($dir)
    {
        if (!file_exists($dir))
        {
            mkdir($dir);
        }
        chdir($dir);
    }

    /**
     * @Given I have a file named :file
     */
    public function iHaveAFileNamed($file)
    {
        touch($file);
    }

    /**
     * @When I run :arg1
     */
    public function iRun($command)
    {
        exec($command, $output);
        $this->output = trim(implode("\n", $output));
    }

    /**
     * @Then I should get:
     */
    public function iShouldGet(PyStringNode $string)
    {
        if ((string) $string !== $this->output)
        {
            throw new \Exception(
                "Actual output is:\n" . $this->output
            );
        }
    }
}
