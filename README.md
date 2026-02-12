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

*test nou:*
<img width="2338" height="514" alt="test_ex1" src="https://github.com/user-attachments/assets/c00320ea-c862-4c8e-be65-0f7d800da8bb" />

*test anterior*
<img width="2137" height="393" alt="Captura de pantalla 2025-12-23 080203" src="https://github.com/user-attachments/assets/7b70c39d-8b02-4c76-a74f-f5c098e1d0e6" />


**exercici 2 -> CARSPEEDSENSOR :** Creació de test i classes amb phpUnit. Configuració de fitxers i d'arxius json i .gitignore

*test nou:*
<img width="2769" height="468" alt="test1_exercici2" src="https://github.com/user-attachments/assets/b8643082-d393-42e7-a450-da7c68f20d73" />

*test anterior*
<img width="2242" height="834" alt="Tasca8-nivell1" src="https://github.com/user-attachments/assets/65357ace-efa9-44f2-b875-c5a3f453727b" />

## NIVELL 2 --> completat

- Creació de DataProvider per els exercicis 1 i 2, nivell 1.

*test numberChecker : dataProvider
<img width="2742" height="449" alt="test_ex1_provider" src="https://github.com/user-attachments/assets/44ba5417-bf19-4cc8-9753-300a7a79c414" />

*test numberChecker : carSpeedChecker
<img width="2715" height="443" alt="Test2_ex2_datarpovider" src="https://github.com/user-attachments/assets/85f35f3f-4a20-4483-894b-b04f0ef95b08" />



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

**__AFEGUIR SCREENSHOT__**

### 🛠️ Tecnologies i Conceptes Aplicats

- PHP 8.2+
- PHPUnit 11
- Enums: per garantir que els gèneres dels llibres siguin estrictament els demanats per léxercici, evitant errors de dades.
- Mètode setUp(): per inicialitzar una instància de Library amb 5 llibres abans de cada test.
- Gestió d'Excepcions: El sistema protegeix la integritat de la biblioteca evitant la inserció d'ISBNs duplicats.
