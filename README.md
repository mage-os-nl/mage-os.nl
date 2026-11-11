# Sources voor de Mage-OS Nederland website

## Meehelpen met de teksten?
Kijk naar de Markdown bestanden in de `content/pages/` folder en pas de teksten aan. Zodra je deze wijzigt via de GitHub tekst editor, dan maak je automatisch een Pull Request aan, waar wij naar kunnen kijken. Wanneer goed bevonden, mergen wij dit Pull Request en draaien wij een nieuwe build. Dan staat het live.

## Meehelpen met de sources?
Check de repository lokaal uit, draai `composer install`, draai een publieke webserver met als webroot `pub/` en PHP 8.1 support and voila, je hebt een site.

## CSS compileren
Dit project gebruikt Tailwind CSS. Na het aanpassen van templates moet je de CSS opnieuw compileren:

- Eenmalig bouwen: `npm run build`
- Automatisch hercompileren tijdens ontwikkeling: `npm run dev`

