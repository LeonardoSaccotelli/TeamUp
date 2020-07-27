## TEAMUP - By Epsilon.json
Progetto di Ingegneria del Software aa. 2019/2020

TeamUp vuole andare incontro a tutte le persone che hanno dovuto rinunciare o hanno riscontrato difficoltà nel realizzare le proprie idee, cercando di riunire persone con lo stesso obiettivo in modo tale da potersi aiutare a vicenda.

### Live Demo

Una demo del prodotto è disponibile al seguente indirizzo: https://epsilonjsonteamup.altervista.org . I dati di testing sono visualizzabili verso la fine della documentazione.

### Requisiti

* PHP 5.6 o superiore (https://www.php.net/releases/5_6_0.php)
* MySql 5.6(https://dev.mysql.com/downloads/mysql/5.6.html)
* Hosting a pagamento o gratuito
* Client FTP

### Installazione

Per prima cosa per installare l'applicativo è necessario avere un dominio su una determinata piattaforma di hosting.
Inizialmente bisogna collegarsi al pannello di gestione della propria piattaforma di hosting, e accedere alla sezione relativa al DBMS di riferimento, in modo da poter creare un Database vuoto dandogli un nome iniziale.

Selezionato il Database appena creato bisogna recarsi nella sezione ```"Import"``` e caricare il file ```"epsilon.sql"``` , posizionato all'interno della directory  ```"/TeamUp/Database/"```, ed infine cliccare su ```"Esegui"```; in questo modo verranno caricate all'interno del nostro Database tutte le tabelle presenti nel sito che vogliamo importare.

Una volta che il file ```Epsilon.sql``` è stato importato, bisogna selezionare la tabella ```"wp-options"``` e andare ad modificare i campi ```"option-value" ```dei record 1 e 2 ```("siteurl" e "home")``` andando ad inserire l'URL del proprio dominio.

Una volta completato il passaggio precedente, bisogna recarsi all'interno della directory ```"/TeamUp/TeamupWordpress/"``` ed andare a aprire il file ```"wp-config.php"``` utilizzando un qualsiasi editor di testo. All'interno del file dobbiamo andare a modificare i seguenti campi andando a reperire le informazioni necessarie direttamente dalle impostazioni dell' Hosting, in particolare:

```
define( 'DB_NAME', 'nomedb' );
```
andando ad inserire al posto di "nomedb" il nome del nuovo database.

```
define( 'DB_USER', 'user' );
```
andando ad inserire al posto di "user" il nome dell'utente a cui associare il nuovo database.

```
define( 'DB_PASSWORD', 'psw' );
```
andando ad inserire al posto di "psw" la password attuale del nuovo database.

```
define( 'DB_HOST', 'localhost' );
```
andando ad inserire al posto di "localhost" il nome dell'Hostname MySql.

Successivamente bisogna recarsi nella sezione relativa al proprio Client FTP e caricare tutti i file presente nella directory "/TeamUp/TeamupWordpress/".
Al termine del trasferimento , se ogni operazione è stata eseguita correttamente , il nuovo sito risulterà operativo fin da subito.

### Dati Default

### Admin

* admin: Prova123

### User

* davidegiordano94 : Prova123
* leosaccotelli96 : Prova123
* andreamanisi : Prova123
* vitocarulli96 : Prova123

## Licenza

MIT License Free Software, Hell Yeah!