# Singleton Design Pattern

Lead..

### Other names

Polish name: Manufaktura, Matka, Ojciec, Rodzic, Fabryka egzemplarzy.
English name: Manufacture, Mother, Father, Parent, Instance Factory.

## Definition

Singleton Design Pattern (ang. Singleton) is..


## Use case / usage description

Classic use case of using Singleton by many years was an object delivering support for database operations. 

It was created only once, so there was only single instance of certain class.

It allowed, if it there was requirement to make few database operations, to make a connection to database only at the first time (during object construction), and all database SQL statements e.g. SQL np. SELECT, INSERT, UPDATE, DELETE, etc were executed next.
 
In case of low-level programming in PHP5 this design pattern was a foundation to build connection class using PDO, which repleced other types of connecting to databases in ORM systems and abandon using e.g. mysql_select().


## Sample code

## References

This document was written thanks to gained experience, and also printed and digital references.

### Bibliography (Literature)

Including citation to printed books and magazines.

### Links from Internet / Netography

Links to articles, blog pot, and other web pages.