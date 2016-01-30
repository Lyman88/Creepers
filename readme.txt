Creepers - konferenční systém strašidelných příběhů.


Adresářová struktura:

app - adresář aplikace
|--- Controllers - adresář ovladačů
|--- Core - adresář jádra aplikace
		|--- Config.php - Config.php pro konfiguraci aplikace
|--- Helpers - adresář pomocných tříd frameworku
|--- Models - adresář modelů
|--- Modules - adresář modulů (není využit)
|--- Resource - adresář zdrojů (img, audio, video)
|--- templates - adresář šablon
		|--- default - jediná šablona
				|--- css - adresář pro css styly
				|--- js - adresář pro javascript
				|--- footer.php - zápatí 
				|--- header.php - záhlaví
|--- views - adresář pohledů
		|--- admin - adresář pohledů administrátora
		|--- auth - adresář pohledů autentifikace
		|--- error - adresář pohledů chyb
		|--- review - adresář pohledů recenzenta
		|--- users - adresář pohledů uživatelů
db - adresář pro úpravu a import databáze
|--- creepers.sql - sled MySQL příkazů pro vytvoření a naplnění aplikační databáze
|--- DBmodel.mwb - model MySQL workbench
|--- EER model - EER model aplikační databáze
vendor - adresář pro moduly třetích stran (obsahuje pouze modul pro autoload)
.htaccess - konfigurační soubor
composer.json - soubor popisující závislosti pro systém Composer (není potřeba, ve složce vendor je vše potřebné pro chod)
errorlog.html - vlastní log chyb
index.php - hlavní soubor webu
readme.txt - tento soubor


Pro funkčnost je potřeba importovat aplikační databázi - db\creepers.sql např. v PHPmyAdmin a upravit konfigurační soubor app\Core\Config.php.