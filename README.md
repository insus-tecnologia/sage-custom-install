# Sage Custom Install - WordPress Theme

## Features

* [Sass](https://sass-lang.com/) for stylesheets
* [Webpack](https://webpack.github.io/) for compiling assets, optimizing images, and concatenating and minifying files
* [Browsersync](http://www.browsersync.io/) for synchronized browser testing
* [Blade](https://laravel.com/docs/5.5/blade) as a templating engine
* [Controller](https://github.com/soberwp/controller) for passing data to Blade templates
* [Bootstrap 4](https://getbootstrap.com/) as CSS framework
* [Bootstrap 4 Navwalker](https://gist.github.com/smutek/cd95c8bc4f1db70ee1eda2740bfbf6fd) for creating the navigation with the correct bootstrap 4 tags
* [Font Awesome](https://fontawesome.com/v4.7.0/) for icons
* [Vanilla Lazyload](https://github.com/verlok/vanilla-lazyload) for lazy loading images and improved performance
* [Carbon Fields](https://carbonfields.net/docs/) for custom fields
* [Slick Carousel](https://kenwheeler.github.io/slick/) for carousels

## Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.0 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)

## Theme installation

Install using Composer from directory you have cloned this project:

```shell
# @ wp-content/themes/your-theme-name
$ composer install
```

## Theme structure

```shell
themes/your-theme-name/   # → Root of your Sage based theme
├── app/                  # → Theme PHP
│   ├── controllers/      # → Controller files
│   ├── admin.php         # → Theme customizer setup
│   ├── filters.php       # → Theme filters
│   ├── helpers.php       # → Helper functions
│   └── setup.php         # → Theme setup
├── composer.json         # → Autoloading for `app/` files
├── composer.lock         # → Composer lock file (never edit)
├── dist/                 # → Built theme assets (never edit)
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Node.js dependencies and scripts
├── resources/            # → Theme assets and templates
│   ├── assets/           # → Front-end assets
│   │   ├── config.json   # → Settings for compiled assets
│   │   ├── build/        # → Webpack and ESLint config
│   │   ├── fonts/        # → Theme fonts
│   │   ├── images/       # → Theme images
│   │   ├── scripts/      # → Theme JS
│   │   └── styles/       # → Theme stylesheets
│   ├── functions.php     # → Composer autoloader, theme includes
│   ├── index.php         # → Never manually edit
│   ├── screenshot.png    # → Theme screenshot for WP admin
│   ├── style.css         # → Theme meta information
│   └── views/            # → Theme templates
│       ├── layouts/      # → Base templates
│       └── partials/     # → Partial templates
└── vendor/               # → Composer packages (never edit)
```

## Theme setup

Edit `app/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, and sidebars.

## Theme development

* Run `yarn` from the theme directory to install dependencies
* Update `resources/assets/config.json` settings:
  * `devUrl` should reflect your local development hostname
  * `publicPath` should reflect your WordPress folder structure (`/wp-content/themes/sage` for non-[Bedrock](https://roots.io/bedrock/) installs)

### Build commands

* `yarn run start` — Compile assets when file changes are made, start Browsersync session
* `yarn run build` — Compile and optimize the files in your assets directory
* `yarn run build:production` — Compile assets for production

## Resources

### Lazy load
Load your images with lazy load following this examples:

```html
<img 
  alt="A lazy image" 
  class="lazy"
  data-src="lazy.jpg" 
/>
```

### Carousel
Carousels can be built with **Slick Carousel**.

Slick Carousel is loaded globally, so in order to create a carousel you only have to do this:

```js
$('.your-carousel-selector').slick(args);
```

#### Lazy load on carousels
On carousels, use Slick lazy load function instead of Vanilla Lazyload:

```html
<img data-lazy="img/lazyfonz1.png"/>

$('.lazy').slick({
  lazyLoad: 'ondemand',
  slidesToShow: 3,
  slidesToScroll: 1
});
```

### Theme Options / Custom Fields

In order to change theme options fields access the file `app/options.php` and change the fields in the array here:

```php
add_action( 'carbon_fields_register_fields', function () {
    Container::make( 'theme_options', __('Theme Options', 'sage') )
        ->add_fields( array(
            // CREATE HERE YOUR THEME OPTIONS FIELDS:
            Field::make( 'text', 'crb_facebook_url') ,
            Field::make( 'textarea', 'crb_footer_text' )
        ));
});
```

### Theme Home Page

When this theme is installed, it creates a home page and apply this template:
`resources/views/template-home.blade.php`

Edit this file to customize your home page.