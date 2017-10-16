Feature: Observer design pattern
  In order to make classes according to Observer design pattern
  As a developer
  I need to have set of Observer design pattern interfaces and base classes

  Rules:
  - There is a class type called Subject, which state can change
  - The Subject class can be observer by special class type called Observer
  - Single Observer instance can observe only single Subject instance
  - Single Subject instance can be observed by many Observer instances
  - Subject instance notifies all Observer instances when it's state changes
  - [By default only] Subject instances can attach Observer instances
  - [Optionally] Observer instance can attach Subject instance


  Scenario: Detecting if we have Subject type class
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer\Account" class
    And the method "attach" exists
    And the method "attach" should have "public" access
    And the method "detach" exists
    And the method "detach" should have "public" access
    And the method "notify" exists
    And the method "notify" should have "public" access

  Scenario: Detecting if we have Observer type class
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer\Observer" class
    And the method "attach" exists
    And the method "attach" should have "public" access
    And the method "detach" exists
    And the method "detach" should have "public" access
    And the method "update" exists
    And the method "update" should have "public" access

  Scenario: Detecting if we have an Observer type instance attached to Subject type instance
    Given there is an "Observer" type instance of "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer\Observer" class
    And there is an "Subject" type instance of "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer\Account" class
    And there is "Observer" type instance with name "One-1"
    And there is "Subject" type instance with email "John.Smith@lpha.com" and first name "John" and last name "Smith"
    And "One-1" instance is attached to "John.Smith@lpha.com" instance

  Scenario: Detecting if we have two Observer type instances attached to single Subject type instance
    Given there is an "Observer" type instance of "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer\Observer" class
    And there is an "Subject" type instance of "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer\Account" class
    And there is "Observer" type instance with name "One-1"
    And there is "Observer" type instance with name "Two-2"
    And there is "Subject" type instance with email "John.Smith@alpha.com" and first name "John" and last name "Smith"
    And "One-1" instance is attached to "John.Smith@alpha.com" instance
    And "Two-2" instance is attached to "John.Smith@alpha.com" instance
    And "John.Smith@alpha.com" has attached 2 observers

  Scenario: Detecting if we have not two Observer type instances attached to single Subject type instance
    Given there is an "Observer" type instance of "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer\Observer" class
    And there is an "Subject" type instance of "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer\Account" class
    And there is "Observer" type instance with name "One-1"
    And there is "Observer" type instance with name "Two-2"
    And there is "Observer" type instance with name "Three-3"
    And there is "Subject" type instance with email "John.Smith@alpha.com" and first name "John" and last name "Smith"
    And "One-1" instance is attached to "John.Smith@alpha.com" instance
    And "Two-2" instance is attached to "John.Smith@alpha.com" instance
    And "Three-3" instance is attached to "John.Smith@alpha.com" instance
    And "John.Smith@alpha.com" has not attached exactly 2 observers
    And "John.Smith@alpha.com" has attached 3 observers
