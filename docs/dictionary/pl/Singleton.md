# Wzorzec projektowy Singleton

Wprowadzenie..

### Inne nazwy wzorca

Polska nazwa: Manufaktura, Matka, Ojciec, Rodzic, Fabryka egzemplarzy.
Agielska nazwa: Manufacture, Mother, Father, Parent, Instance Factory.

## Definicja / Opis wzorca

Wzorzec projektowy Singleton (ang. Singleton) to..


## Opis przypadku użycia / zastosowania

Klasycznym przykładem użycia wzorca projektowego Singleton był przez wiele lat obiekt zapewniający dostęp do bazy danych.

Tworzony był tylko raz, więc istniała tylko jedna jego instancja.

Dzięki temu, jeśli w danej akcji obsługiwanej przez kod należało wykonać np. kilka operacji na bazie danych.. to połączenie było nawiązywane raz (podczas tworzenia obiektu), a następnie były wysyłane już tylko zapytania SQL np. SELECT, INSERT, UPDATE, DELETE, etc.
 
W przypadku niskopoziomewego programowania w PHP5 na bazie tego wzorca budowano klasę opakowującą połączenia z PDO, która zastąpiła inne rodzaje połączenia z bazami danych (np. mysql_select() i ich porzucenie z czasem), dzięki czemu powstały systemy typu ORM. 


## Przykład kodu

## Materiały źródłowe

Nieniejszy dokument powstał na bazie zdobytego doświaczenia, a także materiałów drukowanych i cyfrowych.

### Bibliografia (Literatura)

Opisy w literaturze.

### Odnośniki w Internecie (Sieciografia)

Opisy w Internecie.