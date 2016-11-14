@file
Feature: List directory
  In order to see the directory structure
  As a user
  I need to be able to list the current directory's content

Scenario: List 2 files in a directory
  Given I am in a directory "test"
  And I have a file named "bar"
  And I have a file named "foo"
  When I list the current directory
  Then I should get:
    """
    bar
    foo
    """
