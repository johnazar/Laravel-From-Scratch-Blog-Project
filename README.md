# Laravel From Scratch Blog Demo Project
[![Laravel](https://github.com/johnazar/Laravel-From-Scratch-Blog-Project/actions/workflows/laravel.yml/badge.svg?branch=main)](https://github.com/johnazar/Laravel-From-Scratch-Blog-Project/actions/workflows/laravel.yml)

get familiar with laravel here http://laravelfromscratch.com


## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone git@github.com:JeffreyWay/Laravel-From-Scratch-Blog-Project.git blog
composer install
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database blog
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```

## Further Ideas solved

- [x] Add a `status` column to the posts table to allow for posts that are still in a "draft" state. Only when this status is changed to "published" should they show up in the blog feed. 
- [x] Update the "Edit Post" page in the admin section to allow for changing the author of a post.
- [x] Add an RSS feed that lists all posts in chronological order.
- [x] Record/Track and display the "views_count" for each post.
- [x] Allow registered users to "follow" certain authors. When they publish a new post, an email should be delivered to all followers.
- [x] Allow registered users to "bookmark" certain posts that they enjoyed. Then display their bookmarks in a corresponding settings page.
- [x] Add an account page to update your username and upload an avatar for your profile.
- [x] Seeder & Clear cache added to settings page
- [x] Start & Stop Queues at admin panel
