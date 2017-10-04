Feature: Singleton design pattern
  In order to make ORM/ODM/MQPM system e.g. ORM using PDO (PHP Data Objects), which came from PHP5
  As a developer
  I need to create single instance of the object to make database connection and execute statements/queries

  Rules:
  - There is only one instance of the Manager object
  - RMMO - Relationship Mapping Manager Overlord
  - OMMO - Relationship Mapping Manager Overlord
  - MQPMO - Message Queue Protocol Manager Overlord
  - We cannot make new instance of the overlord itself - we have special static method: getInstance()
  - We cannot clone Overlord objects according to Singleton design pattern principles
  - Overlord can oversee and manage many other managers, e.g. like a Wing Leader

  Scenario: Detecting if we have getInstance() method
    Given there is a "RMMO", which has static getInstance() method
    When I check if the method "getInstance()" exists
    Then I should have true in return
    And the method should have be public and static access only

#  Scenario: Buying a single product over £10
#    Given there is a "Sith Lord Lightsaber", which costs £15
#    When I add the "Sith Lord Lightsaber" to the basket
#    Then I should have 1 product in the basket
#    And the overall basket price should be £20
#
#  Scenario: Buying two products over £10
#    Given there is a "Sith Lord Lightsaber", which costs £10
#    And there is a "Jedi Lightsaber", which costs £5
#    When I add the "Sith Lord Lightsaber" to the basket
#    And I add the "Jedi Lightsaber" to the basket
#    Then I should have 2 products in the basket
#    And the overall basket price should be £20