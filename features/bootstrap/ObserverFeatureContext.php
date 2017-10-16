<?php

use Behat\Behat\Context\Context;

use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class ObserverFeatureContext
    extends BaseFeatureContext
    implements Context
{
    private $instances = [];
    private $classNames = [];

    /**
     * @Given there is an :alias type instance of :className class
     */
    public function thereIsAnTypeInstanceOfClass($alias, $className)
    {
        $this->classNames[$alias] = $className;
    }

    /**
     * @Given there is :alias type instance with name :name
     */
    public function thereIsTypeInstanceWithName($alias, $name)
    {
        Assert::assertArrayHasKey(
            $alias,
            $this->classNames,
            sprintf('Cannot find class name: %s', $alias)
        );

        $this->instances[$name] = new $this->classNames[$alias]($name);
    }

    /**
     * @Given there is :alias type instance with email :email and first name :firstName and last name :lastName
     */
    public function thereIsTypeInstanceWithEmailAndFirstNameAndLastName($alias, $email, $firstName, $lastName)
    {
        Assert::assertArrayHasKey(
            $alias,
            $this->classNames,
            sprintf('Cannot find class name: %s', $alias)
        );

        $this->instances[$email] = new $this->classNames[$alias]($email, $firstName, $lastName);
    }

    /**
     * @Given :observerAlias instance is attached to :subjectAlias instance
     */
    public function instanceIsAttachedToInstance($observerAlias, $subjectAlias)
    {
        Assert::assertArrayHasKey(
            $observerAlias,
            $this->instances,
            sprintf('Cannot find observer with alias: %s', $observerAlias)
        );

        Assert::assertArrayHasKey(
            $subjectAlias,
            $this->instances,
            sprintf('Cannot find subject with alias: %s', $subjectAlias)
        );

        $this->instances[$subjectAlias]->attach($this->instances[$observerAlias]);
    }

    /**
     * @Given :subjectAlias has attached :count observers
     */
    public function hasAttachedObservers($subjectAlias, $count)
    {
        Assert::assertCount(
            intval($count),
            $this->instances[$subjectAlias],
            'Invalid number of attached observers'
        );
    }

    /**
     * @Given :subjectAlias has not attached exactly :count observers
     */
    public function hasNotAttachedExactlyObservers($subjectAlias, $count)
    {
        Assert::assertNotCount(
            intval($count),
            $this->instances[$subjectAlias],
            'Invalid number of attached observers'
        );
    }

}