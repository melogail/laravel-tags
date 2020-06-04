[![contributions welcome](https://img.shields.io/badge/contribution-welcome-brightgreen)](https://github.com/melogail/laravel-tags/issues)  ![version 1.0.0](https://img.shields.io/badge/version-1.0.1-orange)

# laravel-tags
Laravel Tags package for Laravel framework applications, it is useful for adding tags to different models in the application, useful for Blogs, eCommerce...etc

# How to use
## Installation
* Install the package using `composer` in your project.
```
composer require melogail/laravel-tags
```
* Publish the package migration files, config file `config/laravel-tags`, and migration files.
```
php artisan vendor:publish --tag=tags_data
```
* Update your autoload files
```
composer dump-autoload -o
```
* Migrate your new migration files
```
php artisan migrate
```
* Add the `taggable` trait inside your desired models to have tags
```php
use Melogail\LaravelTags\Taggables;

class Articles extends Model {
    
    use Taggables;
    
    // model code follow...

}
```

## Usage
To get all the tags added for specific model, use a `foreach` loop:
```php
foreach ($article->tags as $tag) {
    $tag->name;
}
```
---
To save or update tags to your model resource you need to use `saveTags(MorphToMany $query, array $tags)` method
which accept two parameters:

The `$query` parameter which is instance of `Relationship/MorphToMany` class, and the `$tags` parameter which is an array of tags:
ex:
```php
    $article->saveTags($article->tags(), $tags)     // where `$tags` an array of tags 
```
