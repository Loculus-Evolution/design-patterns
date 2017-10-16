Feature: Singleton design pattern
  In order to make ORM/ODM/MQPM system e.g. ORM using PDO (PHP Data Objects), which came from PHP5
  As a developer
  I need to have single instance of the database management object to make connection and execute statements/queries

  Rules:
  - There is only one instance of the Manager object
  - RDMM - Relationship Database Mapping Manager (Mapper)
  - ODMM - Object Database Mapping Manager (Mapper)
  - MQPM - Message Queue Protocol Manager
  - We cannot make new instance of the Manager itself - we have special static method: getInstance()
  - We cannot clone Manager object according to Singleton design pattern principles


  Scenario: Detecting if we have getInstance() method for provided simple Singleton class
    Given there is a "LoculusEvolution\DesignPatterns\Singleton\Singleton" class
    And the method "getInstance" exists
    And the method "getInstance" should have "public" and "static" access only
    And the method "getInstance" should return "LoculusEvolution\DesignPatterns\Singleton\Singleton" instance

  Scenario: Detecting if we have getInstance() method for class RDMM extending AbstractSingleton
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\RDMM" class
    Then the method "getInstance" exists
    And the method "getInstance" should have "public" and "static" access only
    And the method "getInstance" should return "LoculusEvolution\DesignPatterns\Singleton\Singleton" instance

  Scenario: Detecting if we have getInstance() method for class ODMM using SingletonTrait
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" class
    And the method "getInstance" exists
    And the method "getInstance" should have "public" and "static" access only
    And class uses "LoculusEvolution\DesignPatterns\Singleton\SingletonTrait" trait
    And the method "getInstance" should return "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" instance

  Scenario: Detecting if we have getInstance() method for class MQPM using SingletonTrait
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\MQPM" class
    And the method "getInstance" exists
    And the method "getInstance" should have "public" and "static" access only
    And class uses "LoculusEvolution\DesignPatterns\Singleton\SingletonTrait" trait
    And the method "getInstance" should return "LoculusEvolution\DesignPatterns\Singleton\Singleton" instance

  Scenario: Detecting if we can create an instance by calling new operator
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\RDMM" class
    When class constructor is private
    Then I cannot to call new operator

  Scenario: Detecting if we can create an instance by calling clone operator
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\RDMM" class
    When class clone method is private
    Then I cannot to call clone operator
