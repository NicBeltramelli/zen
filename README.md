# Zen theme
[![Packagist](https://img.shields.io/packagist/v/nicbeltramelli/zen.svg?style=for-the-badge)](https://packagist.org/packages/nicbeltramelli/zen)
[![Codacy Badge](https://img.shields.io/codacy/grade/b6b22681b33c46c0bef7cd8d25bf21d1?style=for-the-badge)](https://app.codacy.com/manual/NicBeltramelli/zen)
[![Build Status](https://img.shields.io/travis/NicBeltramelli/zen.svg?style=for-the-badge)](https://travis-ci.org/NicBeltramelli/zen)

Zen is a child theme for the Genesis Framework with a modern development workflow. [Live Demo](https://beltramelli.app/zen/)

Tested up to WordPress 5.3.2 and Genesis 3.3.0.


## Features

* Consume packages from npm registry
* Modern JavaScript
* SASS/SCSS for stylesheets
* Autoprefixer to make your CSS work with needed vendor prefixes
* Minify and bundle code with [Webpack](https://webpack.github.io/)
* Split large files and enqueue the generated parts
* Synch browser testing with Browsersync](http://www.browsersync.io/)


## Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 5.0
* [Genesis Framework](https://my.studiopress.com/themes/genesis/) >= 3.0.0
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.1
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 10.0.0
* [Yarn](https://yarnpkg.com/en/docs/install)


## Theme installation

Install Zen using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
# initialize the theme
$ composer create-project nicbeltramelli/zen your-theme-name

# install dependencies
$ yarn

# bootstrap project
$ yarn bootstrap

```


## Theme setup

1. Edit `style.css` to define your theme meta information (name, URI, description, version, author)  
2. Edit `wpackio.server.js` that handles the development server:
* `proxy` should reflect your local development URL, e.g. `http://your-address.local`
* `distPublicPath` should reflect the absolute URL path of your dist folder, e.g. `/wp-content/themes/your-theme-name/dist/`  
**You must add a forward slash at the end otherwise it will not work.**


## Theme development

```shell
# start development server
$ yarn start

# create production build
$ yarn build

# create distribution package
$ yarn archive

```

### WordPress coding standard

* `composer phpcs` — Runs WordPress coding standards checks
* `composer phpcbf` — Fix php sniff violations automatically


## Theme structure

```shell
themes/your-theme-name/  # → Root of your child theme
├── src/                 # → Front-end assets
│   ├── scripts/         # → Theme JS
│   └── styles/          # → Theme stylesheets
├── config/              # → Theme configuration data
├── dist/                # → Built theme assets (never edit)
├── lib/                 # → Theme PHP library
│   ├── blocks/          # → Add support for Gutenberg blocks
│   ├── structure/       # → Theme structure
│   ├── woocommerce/     # → WooCommerce PHP library
│   ├── admin.php        # → Adds the admin dashboard setting
│   ├── assets.php  	 # → Enqueue assets
│   ├── body-classes.php # → Adds consistent classes to the body tag
│   ├── customize.php    # → Adds the Customizer addition
│   ├── defaults.php     # → Configures the default theme settings
│   ├── errors.php       # → Displays error messages
│   ├── extras.php       # → Custom functions
│   ├── helpers.php      # → Adds the required helper functions
│   ├── output.php       # → Adds the required CSS to the front-end
│   └── setup.php        # → Defines theme constants and features
├── node_modules/        # → Node.js packages (never edit)
├── page-templates/      # → Custom page templates
├── vendor/              # → Composer packages (never edit)
├── composer.json        # → Composer dependencies and scripts
├── composer.lock        # → Composer lock file (never edit)
├── front-page.php       # → Front page template
├── function.php         # → Includes the theme PHP library
├── package.json         # → Node.js dependencies and scripts
├── search.php           # → Search template
├── style.css            # → Theme meta informations
├── wpackio.project.js   # → Project configuration
├── wpackio.server.js    # → Dev server configuration
└── yarn.lock            # → Yarn lock file (never edit)
```


## Dev dependencies
* [wpack.io](https://github.com/swashata/wp-webpack-script)


## Front-end dependencies

* [Animate.css](https://github.com/daneden/animate.css)
* [Headroom.js](https://github.com/WickyNilliams/headroom.js)
* [normalize-scss](https://github.com/JohnAlbin/normalize-scss)
* [sass-mq](https://github.com/sass-mq/sass-mq)
