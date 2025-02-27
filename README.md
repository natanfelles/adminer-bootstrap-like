# Adminer Bootstrap-Like Design

[Adminer](https://www.adminer.org) interface inspired by the [Bootstrap Framework](https://getbootstrap.com/docs/3.3) with [Font-Awesome icons](http://fontawesome.io).

## Installation

```
composer create-project natanfelles/adminer-bootstrap-like
```

or:

```
git clone git@github.com:natanfelles/adminer-bootstrap-like.git
cd adminer-bootstrap-like
composer install
```

Optionally, it is possible to configure [plugins](https://www.adminer.org/plugins) in the _index.php_ file.

## Update Adminer

Go to the installation directory and run:

```
composer update
```

## Minify Assets

```
cd public/assets/
yui-compressor scripts.js -o scripts.min.js
yui-compressor styles.css -o styles.min.css
```

## Print Screen and Video

[![Adminer Bootstrap-Like Design](https://i.imgur.com/Hu9ANYR.png)](https://www.youtube.com/watch?v=fMFCuaJphVk "Adminer Sidebar Toggle")
