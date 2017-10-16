<?php

use Behat\Behat\Context\Context;

use PHPUnit\Framework\Assert;

use tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM;

/**
 * Defines application features from the specific context.
 */
class SingletonODMMFeatureContext
    extends BaseFeatureContext
    implements Context
{
    /**
     * @var ODMM
     */
    private $instance;


    public function __construct($className = ODMM::class, $methodName = 'getInstance')
    {
        $this->className = $className;

        $this->instance = forward_static_call([$this->className, $methodName]);
    }


    /**
     * @When I call connect method
     */
    public function iCallConnectMethod()
    {
        $this->instance->connect('dsn://localhost:12345/databaseName');
    }

    /**
     * @Then I should be connected
     */
    public function iShouldBeConnected()
    {
        Assert::assertTrue(
            $this->instance->isConnected(),
            'Connection to the server was not established'
        );
    }

    /**
     * @Then I will be able to disconnect from the server
     */
    public function iWillBeAbleToDisconnectFromTheServer()
    {
        Assert::assertTrue(
            $this->instance->disconnect(),
            'Cannot disconnect from the server'
        );
    }

    /**
     * @Then I will be not able to disconnect from the server twice
     */
    public function iWillBeNotAbleToDisconnectFromTheServerTwice()
    {
        try {
            $this->instance->disconnect();
        } catch (\RuntimeException $e) {
            Assert::assertEquals(
                $e->getMessage(),
                ODMM::MESSAGE_NOT_CONNECTED,
                'Invalid exception message'
            );
        } catch (\Exception $e) {
            Assert::assertEquals(
                '',
                ODMM::MESSAGE_NOT_CONNECTED,
                'Invalid exception message'
            );
        }
    }

    /**
     * @Then I should not be allowed to make query
     */
    public function iShouldNotBeAllowedToMakeQuery()
    {
        try {
            $this->instance->query('sample.query()');
        } catch (\RuntimeException $e) {
            Assert::assertEquals(
                $e->getMessage(),
                ODMM::MESSAGE_NOT_CONNECTED,
                'Invalid exception message'
            );
        } catch (\Exception $e) {
            Assert::assertEquals(
                '',
                ODMM::MESSAGE_NOT_CONNECTED,
                'Invalid exception message'
            );
        }
    }

    /**
     * @Then I should be able to make :query query
     */
    public function iShouldBeAbleToMakeQuery($query)
    {
        Assert::assertTrue(
            $this->instance->query($query),
            sprintf('Cannot make query: %s', $query)
        );
    }

    /**
     * @Then I should have :number executed query
     */
    public function iShouldHaveExecutedQuery($number)
    {
        Assert::assertInternalType(
            'int',
            intval($number),
            $this->instance->getNumberOfExecutedQueries()
        );
    }

    /**
     * @Then I should have :number executed queries
     */
    public function iShouldHaveExecutedQueries($number)
    {
        Assert::assertInternalType(
            'int',
            intval($number),
            $this->instance->getNumberOfExecutedQueries()
        );
    }

    /**
     * @Then I should have executed not exactly :number queries
     */
    public function iShouldHaveExecutedNotExactlyQueries($number)
    {
        Assert::assertInternalType(
            'int',
            intval($number),
            $this->instance->getNumberOfExecutedQueries()
        );
    }
}