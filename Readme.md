# How to run this project

1. clone repo
2. start docker with `docker-compose up --build`
3. open `0.0.0.0/` URL
4. enjoy

- Framework: Symfony 6.2
- PHP version: 8.2
- Database: MySql

NOTE:
Database is already set up. Check .env file

Credetials for external DB:
- Host: sql11.freesqldatabase.com
- Database name: sql11675269
- Database user: sql11675269
- Database password: gTZIzPbi7G
- Port number: 3306

PhpMyAdmin:
https://www.phpmyadmin.co/

WARNING: 
<br><b> Freesqldatabase.com test account is no longer available!  Create new account or use alternative way to run mysql database. </b>

Application limitations: 
<br> You can't add people with the same name (by design) because person id on endpoint is now name and surname (look to assignment).
<br>
<br>

## Original test project assignment
### Aplikační logika
Aplikace bude fungovat jako jednoduchý adresář. V aplikaci bude možné vytvářet, mazat a editovat jednotlivé kontakty, které budou mít tyto položky:
- Jméno (povinná položka)
- Příjmení (povinná položka)
- Telefonní číslo
- Email (povinná položka)
- Dlouhá poznámka

Formulář pro správu kontaktů bude obsahovat backendovou validaci polí dle popisu výše. Do validátoru přidejte také kontrolu formátu zadaného emailu.
Aplikace nebude obsahovat žádné prověření ani práva, každý, kdo zná URL aplikace bude mít přístup ke všem funkcím aplikace.

### Prezentační vrstva
Pro aplikaci není připraven grafický návrh – budou použity základní HTML prvky bez CSS, pro zobrazování dat budou použity tabulky.
Aplikace bude SEO optimalizována. Na URL (/) bude seznam všech kontaktů, editace jednotlivých kontaktů bude na URL (/identifikator-kontaktu). Identifikátor bude obsahovat jméno kontaktu. Mazání kontaktu může probíhat na editaci kontaktu nebo může být dostupné přes jiný odkaz – ten nemusí být SEO optimalizován (stačí ID).

Seznam všech kontaktů bude stránkovaný s číselnou navigací stránek a tlačítky pro přechod na další a předchozí stránku. Stránkování může být jednoduché s reloadem stránky. Volitelně můžete stránkování implementovat pomocí AJAXu. I v tomto případě musí být ale zachována funkce historie prohlížeče. Tzn. při přechodu na další stránku AJAXem dojde ke změně v adresním řádku v prohlížeči. 

Poznámka kontaktu může být dlouhý text, který se nehodí přímo do přehledu kontaktů. Nicméně i na této stránce je nutné mít k poznámce přístup. V seznamu kontaktů bude tlačítko na zobrazení poznámky. Při kliknutí na toto tlačítko se zobrazí jednoduchý popup nebo modal okno s poznámkou kontaktu. Toto okno půjde zavřít klávesou ESC, klikem kamkoliv mimo popup a tlačítkem “Zavřít” uvnitř popupu.

### Poznámky
Při vytváření aplikace dbejte na základní pravidla programování a myslete zejména na bezpečnost, znovupoužitelnost a rozšiřitelnost. Aplikaci vytvářejte jako byste byli v týmu a bylo třeba aby na vašem kódu později pokračovali další kolegové.
- Aplikaci postavte na frameworku Symfony 5+ a PHP 7.4+. 
- Používat lze veškeré běžně dostupné knihovny pro PHP i frontend.
- Je nutné používat GIT pro verzování kódu.
- Do README.md uvěďte postup pro lokální instalaci aplikace tak, aby ji zadavatel mohl otestovat.
  
Pro zadavatele je důležité, jak je aplikace napsána, nikoliv kolik funkcí má navíc. Prosím tedy o minimalizaci času nad ní stráveného a sdělení kolik času bylo třeba, aby byla aplikace uvedena do stavu, který budete posílat.
