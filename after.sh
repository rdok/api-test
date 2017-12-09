#!/bin/sh

echo 'alias pt="~/code/vendor/bin/phpunit"' | sudo tee --append ~/.bash_aliases
echo 'alias pa="php ~/code/artisan"' | sudo tee --append ~/.bash_aliases

echo 'export VISUAL=vim' | sudo tee --append ~/.bashrc
echo 'export EDITOR="$VISUAL"' | sudo tee --append ~/.bashrc
echo 'cd ~/code' | sudo tee --append ~/.bashrc

> ~/code/database/database.sqlite
php ~/code/artisan migrate
php ~/code/artisan db:seed --class=RecipesTableSeeder
