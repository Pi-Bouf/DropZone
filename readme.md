# DropZone
Ça va chier des bulles.

## Installation
1. Dans le répertoire d'installation de Laravel, ouvrir le bash ou cmd et tapez les commandes suivantes:
Dans le répertoire d'installation de Laravel, ouvrir le bash ou cmd et tapez les commandes suivantes:
```
git init
git remote add origin git@github.com:Pitt05/DropZone.git
git clean -dn
git clean -df
git pull origin master
git config --global core.excludesfile ~/.gitignore_global
```
2. Dans le fichier **_./config/app.php_**, changez les lignes suivantes:
```
'name' => 'DropZone' // Mettez le même
'debug' => env('APP_DEBUG', true) // Mettez sur true
'url' => env('APP_URL', 'http://dropzones') // Mettez le bon url
'timezone' => 'Europe/Paris' // Vous avez compris...
'locale' => 'fr' // Salut c'est moi !
```
