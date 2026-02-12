# SP1-TASCA-8

IT ACADEMY - PHP - Tasca S1.08. Testing# SP1-TASCA-7

## Tasca S1.08. Testing

## NIVELL 1 --> completat

**exercici 1 -> NUMBERCHECKER :** Creació d'una classe de Testing utilitzant la llibreria de testing PHPUnit per a testejar l'arxiu numberChecker.php.
*edit* refactoritzat numberCheckerTest per testejar les dues funcions isEven i isOdd com a propietats independents i afegit casos conflictius a mes de declarar strict_types: 

- l'integre més gran
- l'integre més petit
- zero
- decimals (enganyant el sistema)

**exercici 2 -> CARSPEEDSENSOR :** Creació de test i classes amb phpUnit. Configuració de fitxers i d'arxius json i .gitignore


## NIVELL 2 --> completat

- Creació de DataProvider per els exercicis 1 i 2, nivell 1.

*test numberChecker : dataProvider

<img width="2565" height="1152" alt="test-NUMBERCHECKER" src="https://github.com/user-attachments/assets/c264440d-a4ac-4024-8896-1213fcb29f34" />


*test carSpeedChecker dataprovider

<img width="2504" height="1181" alt="test-CarSpeedSensor" src="https://github.com/user-attachments/assets/30e91d9b-29fa-44ed-b3a7-8a29eb103c7d" />


## NIVELL 3 --> completat

**exercici 1 -> LIBRARY :** Desenvolupar un petit software per a tractament d’informació en una biblioteca mitjançant TDD per tal de garantir que compleix totes les funcionalitats demanades per l’enunciat. 

**BookTest:**
 Instanciació: Verifica que un llibre es pugi instanciar correctament (títol, autor, ISBN, Enum de gènere i número de pàgines).

**LibraryTest:**
__CRUD__
- Afegir llibres: Comprova que la col·lecció creix correctament.
- Validació de Duplicats: Test que assegura que es llança una excepció si s'intenta afegir un ISBN ja existent.
- Esborrar llibres: Elimina un llibre cercant-lo pel seu ISBN únic.
- Modificar llibres: Edita el títol d'un llibre existent mitjançant el seu ISBN.

__Consultes i Filtres__
- Consulta per Títol: Retorna un llistat de llibres que coincideixen amb el nom.
- Consulta per Autor: Filtra tots els llibres d'un escriptor concret.
- Consulta per Gènere: Filtra fent servir l'objecte Genre (Enum).
- Consulta per ISBN: Retorna l'objecte Book específic o null.
- Filtre de Pàgines: Retorna exclusivament els llibres amb més de 500 pàgines.

<img width="2360" height="875" alt="library_all_tests" src="https://github.com/user-attachments/assets/7c2337db-0552-42b7-b5c5-4cc14a4986b2" />


### 🛠️ Tecnologies i Conceptes Aplicats

- PHP 8.2+
- PHPUnit 11
- Enums: per garantir que els gèneres dels llibres siguin estrictament els demanats per léxercici, evitant errors de dades.
- Mètode setUp(): per inicialitzar una instància de Library amb 5 llibres abans de cada test.
- Gestió d'Excepcions: El sistema protegeix la integritat de la biblioteca evitant la inserció d'ISBNs duplicats.
