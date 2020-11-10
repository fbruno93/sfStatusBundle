# Installation

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

## Applications that don't use Symfony Flex
### Step 1: Add repository

Open a command console, enter your project directory and execute the
following command to add the repo of this bundle:

```sh
$ composer config repositories.foo vcs https://github.com/fbruno93/sfStatusBundle
```

### Step 2: Download the Bundle
   
   Open a command console, enter your project directory and execute the
   following command to download the latest stable version of this bundle:
   
   ```sh
   $ composer require bfy/status-bundle
   ```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    StatusBundle\StatusBundle::class => ['all' => true],
];
```
