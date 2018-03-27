<?php

namespace Kata\Behat\Integration\Example\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamFile;

final class ExampleContext implements Context
{
    /** @var vfsStreamDirectory */
    private $root;

    /** @var vfsStreamDirectory */
    private $directory;

    /** @var vfsStreamFile */
    private $file;

    private $output;

    /**
     * @BeforeScenario @file
     */
    public function setUp(BeforeScenarioScope $scope)
    {
        $this->root = vfsStream::setup('test_base');
    }

    /**
     * @AfterScenario @file
     */
    public function cleanDir(AfterScenarioScope $scope)
    {
        $this->root = vfsStream::setup('test_base');
    }

    /**
     * @Given I am in a directory :dir
     */
    public function iAmInADirectory($dir)
    {
        $this->directory = vfsStream::newDirectory($dir);
        $this->root->addChild($this->directory);
    }

    /**
     * @Given I have a file named :file
     */
    public function iHaveAFileNamed($file)
    {
        $this->file = vfsStream::newFile($file);
        $this->file->at($this->directory);
    }

    /**
     * @When I list the current directory
     */
    public function iListTheCurrentDirectory()
    {
        $files = $this->directory->getChildren();
        $output = [];
        foreach($files as $file)
        {
            $output[] = $file->getName();
        }
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
