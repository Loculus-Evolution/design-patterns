Feature: Singleton design pattern used to create Object Database Mapping-Manager/Mapper (ODM-M/ODM)
  In order to make ODM system
  As a developer
  I need to have single instance of the database management object to make connection and execute statements/queries

  Rules:
  - I can connect to the server using connect() method by providing DSN
  - I cannot connect to the server twice by default
  - I can reconnect to the server using connect() method by providing DSN and additional param set with true
  - I can make queries only if I am connected
  - I can disconnect from the server
  - I can count executed queries

  Scenario: Checking ODM's connecting capability
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" class
    When I call connect method
    Then I should be connected

  Scenario: Checking ODM's disconnecting capability
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" class
    When I call connect method
    Then I should be connected
    And I will be able to disconnect from the server

  Scenario: Checking ODM's disconnecting capability once more
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" class
    When I call connect method
    Then I should be connected
    And I will be able to disconnect from the server
    And I will be not able to disconnect from the server twice

  Scenario: Checking ODM's possibility to make query
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" class
    Then I should not be allowed to make query

  Scenario: Checking sending single querying
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" class
    When I call connect method
    Then I should be able to make "select(A)" query
    And I should have 1 executed query

  Scenario: Checking sending two queries
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" class
    When I call connect method
    Then I should be able to make "select(B)" query
    And I should be able to make "select(C)" query
    And I should have 2 executed queries

  Scenario: Checking counting of executed queries
    Given there is a "tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\ODMM" class
    When I call connect method
    Then I should be able to make "select(B)" query
    And I should be able to make "select(C)" query
    And I should be able to make "select(D)" query
    And I should have executed not exactly 2 queries