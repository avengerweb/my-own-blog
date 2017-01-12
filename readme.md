## My own homepage-blog-portfolio based on Laravel 5.3 framework

### Basic requirements you can found here:
https://laravel.com/docs/5.3#server-requirements

**Important!** This project require PHP 7.0

Demo: http://avenger-web.com

### Install
```
git clone https://github.com/avengerweb/my-own-blog.git blog
cd blog
composer install
```

Use ```.env``` file for configure database settings

```
php artisan migrate
php artisan db:seed
```

Default admin url: /admin
Default admin credentials: ````admin@admin.ru````:```admin```

### Automatic version generation
This tool needs basically for reset user cache after each commit.

Two ways:
 * Generate version by using command: ```php artisan git:version```
 * Use git hooks, and it will automatic update:
   * Copy ```post-commit``` and ```post-merge``` files from ```/project/contrib/git``` to ```/project/.git/hooks```
   
That is really not very nice method to do this, but it`s work.