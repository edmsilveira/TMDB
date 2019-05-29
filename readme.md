<p align="center">TMDB Upcoming List Beta Version</p>

## About the app

This is a MVP of a TMDB app developed with PHP 7 + Composer + Laravel(5.7) + VueJS frameworks, using node.js(8.11.3) as task runner and axios as XMLHttpRequest api.

## Features

Listing the upcoming movies with pagination using a simple lazy load and a masonry grid layout plugin(beta version). It displays infos on hover.

Show movie details on modal when clicked.

Search for movie by some keyword with pagination

Breakpoint for mobile at 768px resolution

## Bugs

Some grid bugs may happen with masonry plugin in some breakpoints.
Modal system is 75% done. May occur some scroll on feed while modal movie is open.
On movie feed list, genres showing their ids only.


## Install

Assuming that you already have installed node.js and php 7, then open your terminal on your project folder and follow the instructions below:

Step 1: Install Composer on your system if you haven't installed yet.
<a href="https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos" target="_blank" > Follow this instructions</a>

Then type "composer install"

Step 2: Set the project variables.

Open your project diretory and create a .env file and just copy the content of .env.exemple on it.

Then type "php artisan key:generate"

Step 3: Install Node Modules 

Just type "npm install"

Step 4: Build the project

Type "npm run dev"

Step 5: Run local server composer

Type "php artisan serve"

Done!

