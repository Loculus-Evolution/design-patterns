<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class BaseFeatureContext implements Context
{
    /**
     * @var string
     */
    protected $className;


    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @Given there is a :className class
     */
    public function thereIsAClass($className)
    {
        $this->className = $className;

        Assert::assertTrue(
            class_exists($className),
            sprintf('Class %s does not exists', $className)
        );
    }

    /**
     * @Given the method :methodName exists
     */
    public function theMethodExists($methodName)
    {
        Assert::assertTrue(
            method_exists($this->className, $methodName),
            sprintf('Method %s does not exists', $methodName)
        );
    }

    /**
     * Checks class method access type
     *
     * @param  string  $className
     * @param  string  $methodName
     * @param  string  $accessType
     */
    protected function checkClassMethodAccessType($className, $methodName, $accessType)
    {
        $mapping = [
            'public' => 'isPublic',
            'protected' => 'isProtected',
            'private' => 'isPrivate',
            'static' => 'isStatic',
        ];

        $reflection = new \ReflectionMethod($className, $methodName);

        Assert::assertArrayHasKey(
            $accessType,
            $mapping,
            sprintf('Detected unsupported access type for class method: %s', $accessType)
        );

        $mappedMethod = $mapping[$accessType];

        Assert::assertTrue(
            $reflection->$mappedMethod(),
            sprintf('Class method with name %s() is not %s', $methodName, $accessType)
        );
    }

    /**
     * @Given the method :methodName should have :accessType1 and :accessType2 access only
     */
    public function theMethodShouldHaveAndAccessOnly($methodName, $accessType1, $accessType2)
    {
        $accessTypes = [$accessType1, $accessType2];

        foreach ($accessTypes as $accessType) {
            $this->checkClassMethodAccessType($this->className, $methodName, $accessType);
        }
    }

    /**
     * @Given the method :methodName should return :desiredClassName instance
     */
    public function theMethodShouldReturnInstance($methodName, $desiredClassName)
    {
        $instance = forward_static_call([$this->className, $methodName]);

        Assert::assertInstanceOf(
            $desiredClassName,
            $instance,
            sprintf('Class instance is not an object of %s class', $desiredClassName)
        );
    }

    /**
     * @Given class uses :traitName trait
     */
    public function classUsesTrait($traitName)
    {
        Assert::assertTrue(
            in_array($traitName, class_uses($this->className)),
            sprintf('Class does not use trait: %s', $traitName)
        );
    }

    /**
     * @When class constructor is private
     */
    public function classConstructorIsPrivate()
    {
        $reflection  = new \ReflectionClass($this->className);
        $constructor = $reflection->getConstructor();

        Assert::assertTrue($constructor->isPrivate());
    }

    /**
     * @Then I cannot to call new operator
     */
    public function iCannotToCallNewOperator()
    {
        /**
         * we tests code like this one:
         *
         *   [code]
         *     $instance = new ClassName();
         *   [/code]
         *
         * , but
         * @fixme we cannot catch such behaviour in try-catch.
         */
    }

    /**
     * @When class clone method is private
     */
    public function classCloneMethodIsPrivate()
    {
        $this->checkClassMethodAccessType($this->className, '__clone', 'private');
    }

    /**
     * @Then I cannot to call clone operator
     */
    public function iCannotToCallCloneOperator()
    {
        /**
         * we tests code like this one:
         *
         *   [code]
         *     $instance = ClassName::getInstance();
         *
         *     $clone = clone $instance;
         *   [/code]
         *
         * , but
         * @fixme we cannot catch such behaviour in try-catch.
         */
    }

}