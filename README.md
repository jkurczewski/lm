##### _LAS MIESZKANIAS v.0.1 (BETA EDITION)_

----

## Jak uruchomić Las Mieszkanias (LM) na lokalnym serwerze, w systemie operacyjnym Windows.

----
### Aplikacja została stworzona w oparciu o poniższą specyfikację.

- Windows 10 z najnowszymi aktualizacjami
- Composer 2.0.12
- XAMPP v.3.2.4
- npm@6.14.13
- PHP 8.0.1
- Laravel Framework 8.49.0



###### LM zostało przetestowane bazując na konkretnej specyfikacji. Zróżnicowania sprzętowe lub programowe, a także inne nieścisłości mogą powodować problemy w działaniu aplikacji.

---
### Proces uruchomienia LM na nowej maszynie z zainstalowanym system Windows
1. Upewnij się, że posiadasz pełną kopię plików aplikacji (włącznie z ukrytymi plikami, włącznie z .env)
2. Upewnij się, czy posiadasz wersje oprogramowania w wersjach przynajmniej tak wysokich, jak te wymienione w specyfikacji maszyny developerskiej.
3. Skopiuj pliki Lm do docelowej lokalizacji.
4. Uruchom Terminal/PowerShell jako Administrator i przejdź do lokalizacji aplikacji.
5. Wykonaj polecenie `composer install`
6. Wykonaj polecenie `php artisan key:generate`
7. Wykonaj polecenie `php artisan cache:clear`
8. Uruchom oprogramowanie XAMPP, a następnie uruchom moduły `Apache` oraz `MySQL`
9. Przejdź do lokalizacji `http://localhost/phpmyadmin`
10. Utwórz nową bazę danych o nazwie `las-mieszkanias`
11. Zaimportuj tabele do bazy danych z pliku `las-mieszkanias.sql`
11. Wykonaj polecenie `php artisan serve`
12. Aplikacja powinna być dostępna pod adresem `http://127.0.0.1:8000`

---
### Radzenie sobie z problemami i błędami
Z uwagi na to, że aplikacja nie opuściła fazy beta, nie można oczekiwać od niej pełnej niezawodoności. Specyfika core aplikacji, który bazuje na dynamicznie zbieranych danych z zewnętrznego serwisu generuje błędy trudne do przewidzenia i wymagające rozwagi podczas użytkowania. 

Pomimo tego, ML zawiera zakładane MVP, które pozwala na poprawne korzystanie z funkcji. Jeśli doświadczysz błędów w kompilacji, jeszcze przed poprawnym uruchomieniem aplikacji, prawdopodobnie posiadasz błędy w konfiguracji oprogramowania pomocnicznego. 

---
### Jak korzystać z aplikacji
Las Mieszkanias to crawler pozwalający na przyspieszone filtrowanie tysięcy mieszkać w ciągu zaledwie kilku minut.
Aplikacja została jednak oparta o dynamiczne pobieranie danych z zewnętrznego listingu mieszkań, co znacznie oddziału na prędkość działania aplikacji.
Poniżej kilka rad, które usprawniają korzystanie z systemu:
- Posiadanie konta w serwisie, pozwoli Ci na zapisanie do późniejszego użytku ulubionych mieszkać oraz predefiniowanych filtrów.
- Postaraj się maksymalnie dopasować filtry do swoich potrzeb.
- Wyszukiwarka potrzebuje czasem nawet do kilku minut, by znaleźć idealne oferty dla Ciebie. Nie odświeżaj w tym czasie strony.
- Jeśli w ciągu kilkunastu sekund po uruchomieniu wyszukiwarki otrzymasz 0 wyników - powtórz proces wyszukiwania.

