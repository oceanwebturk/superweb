# OceanWebTurk SuperWeb
Single package for web technologies such as Open Graph, PWA

# Supported

* PWA
* Open Graph
* Twitter Card

# Installation

```bash
composer require oceanwebturk/superweb
```

# Start

1. First, we will add the following code under this `namespace App\Providers`

```php
use SuperWeb;
```

2. Add the following code to the `boot` method
```php
SuperWeb::config([
   'default_title' => 'OceanWebTurk',
   'title_suffix' => ' - OceanWebTurk',
   'default_author' => 'OceanWebTurk'
]);
```

3. Run this command
```bash
php bin/console superweb:publish
```

4. You will add this code to the `head` tags of your layout

**Below are the structures according to which theme engine you will use**

```php
{{ \SuperWeb::generate() }} // OceanWebTurk Santos and Laravel Blade
```

5. Visit Web site and try
