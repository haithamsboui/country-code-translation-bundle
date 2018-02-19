# Translate Country Codes to names 

This bundles translate given country codes to name
```html+jinja
{{ "TN" |country }} #default locale
<-- OR -->
{{ "TN" |country("en") }} #given locale
```

## INSTALLATION via Composer

    composer require haitham/country-locale

## CONFIGURATION
Register the bundle:

```php

// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new haitham\countriesBundle\haithamcountriesBundle(),
    );
    // ...
}
```