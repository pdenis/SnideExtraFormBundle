SnideExtraFormBundle
====================

Extra form types for symfony 2

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/pdenis/ExtraFormBundle/badges/quality-score.png?s=571f31ce1079abf2d200c2fffb4320b244be8533)](https://scrutinizer-ci.com/g/pdenis/ExtraFormBundle/)

## features
- Double list type based on jQuery multiselect2side plugin

## Installation

### Installation by Composer

If you use composer, add ExtraFormBundle bundle as a dependency to the composer.json of your application

```php
    "require": {
        ...
        "snide/extra-form-bundle": "dev-master"
        ...
    },

```

Add SnideExtraFormBundle to your application kernel.

```php
// app/AppKernel.php
<?php
    // ...
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Snide\Bundle\ExtraFormBundle\SnideExtraFormBundle(),
        );
    }
```

The bundle needs to copy the resources necessary to the web folder. You can use the command below:

```bash
    php app/console assets:install
```

## Include in template

This bundle comes with an extension for Twig. To init CSS scripts use
This makes it very easy to include the extra form Javascript and CSS into your pages only if needed. It will output the complete Javascript, including `<script>` tags and add stylesheets. Add it to the bottom of your page.

```twig
    {{ snide_extra_form_init() }}
```
## Base configuration

```yaml
    snide_extra_form:
        include_jquery: true
```

The option `include_jquery` allows you to load external jQuery library from the Google CDN. Set it to `true` if you haven't included jQuery on your page.
