SnideExtraFormBundle
====================

Extra form types for symfony 2

## features
- Double list type based on jQuery multiselect2side plugin

## Installation

### Installation by Composer

If you use composer, add ExtraFormBundle bundle as a dependency to the composer.json of your application

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
            new Snide\ExtraFormBundle\SnideExtraFormBundle(),
        );
    }
```

The bundle needs to copy the resources necessary to the web folder. You can use the command below:

```bash
    php app/console assets:install web/
```

## Include in template

This bundle comes with an extension for Twig. To init CSS scripts use

```twig
    {{ snide_extra_form_init() }}
```

This makes it very easy to include the extra form Javascript into your pages. It will output the complete Javascript, including `<script>` tags. Add it to the bottom of your page.
```twig
    {{ snide_extra_form_renderScript() }}
```
## Base configuration

```yaml
    snide_extra_form:
        include_jquery: true
```

The option `include_jquery` allows you to load external jQuery library from the Google CDN. Set it to `true` if you haven't included jQuery on your page.
