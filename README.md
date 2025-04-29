# Info
Dit basis template bevat een aantal standaard bestanden om een Wordpress thema mee te beginnen.  
Het bevat verder het layout framework [Bootstrap](https://getbootstrap.com) en het iconenlettertype [FontAwesome](fontawesome.io/).  
Ook bevat het een basis voor [Advanced Custom Fields](https://www.advancedcustomfields.com).  

# Installatie
Om de code in de map `src` te compilen is [NodeJS](https://nodejs.org/en/) nodig.

Om vervolgens alle dependencies te installeren moeten het volgende commando worden uitgevoerd in een terminal / command prompt:  
- `npm install`  

# Compilen
In een terminal / command prompt:  
- `yarn watch` - Watcher aanzetten (automatisch compilen bij verandering van source bestanden)  
- `yarn build` - Eén keer compilen
  
# Thema naam aanpassen
De thema naam kan worden aangepast in `style.css`

# Wordpress instellen
## Thema instellen
Onder `Weergave` -> `Thema's` thema activeren met de naam die in `style.css` is ingevuld.

## Homepagina instellen
Onder `Pagina's` -> `Nieuwe pagina` een nieuwe pagina aanmaken en bijvoorbeeld `Home` noemen.  
Vervolgens onder `Instellingen` -> `Lezen` bij `Homepagina` de pagina selecteren met de naam die je hebt ingesteld.   
Eventueel kan je hetzelfde doen met de berichtpagina.

# Thema opzet
## Pagina templates
`front-page.php` - Template die gebruikt wordt voor de Homepagina die hierboven ingesteld is  
`blog.php` - Template die gebruikt wordt voor de berichtpagina als je die hebt ingesteld  
`page.php` - Template voor een gewone pagina  
`404.php` - Template die gebruikt wordt als een pagina niet bestaat  
`index.php` - Fallback als geen andere templates zijn gematcht    
  
Voor andere templates kan je dit diagram raadplegen:  
![alt text](https://developer.wordpress.org/files/2014/10/wp-hierarchy.png)  

Meer info over templates kan je [hier](https://developer.wordpress.org/themes/basics/template-hierarchy/) vinden.  

## Pagina deeltemplates
`header.php` - Wordt ingevoegd met de php functie `get_header()`. Wordt normaliter boven elke pagina getoond en bevat de `<head>` en het navigatiemenu  
`footer.php` - Wordt ingevoegd met de php functie `get_footer()`. Wordt normaliter onder elke pagina getoond en bevat de footer  

## Wordpress bestanden
`functions.php` - Hier staat allerlei algemene code in die elke keer door wordpress wordt uitgevoerd voor het tonen van een pagina  
`style.css` - Hier staat info in als de naam van het thema en de auteur  

# Advanced Custom Fields
Advanced Custom Fields (ACF) is een Wordpress plugin die het een stuk eenvoudiger maakt om extra velden in de backend van Wordpress toe te voegen.   
Om dit te kunnen gebruiken moet de plugin eerst geïnstalleerd worden in Wordpress. Ga naar `Plugins` -> `Nieuwe plugin`, zoek op `Advanced Custom Fields` en installeer en activeer hem.  
Als je de pro versie wilt installeren kan dit onder `Plugins` -> `Nieuwe plugin` -> `Plugin uploaden` en kies dan `advanced-custom-fields-pro.zip`.   

Meer informatie is op [de website](https://www.advancedcustomfields.com) te vinden.  