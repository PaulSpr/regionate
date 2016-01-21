# Regionate
Laravel helper class to help with region specific formatting and validation

## Installation

Add to composer.json
```
"require":{
  "paulspr/regionate": "^0.1"
}
"repositories": {
  {
    "type": "vcs",
    "url": "https://github.com/PaulSpr/regionate.git"
  }
],
```

and run 
```
composer update
```

Make sure that app.php contains the following (you can change nl to whatever suits the project):

```
'region' => 'nl',
'region_fallback' => 'nl',
```

Add the service provider in 'providers' to your app.php like this:
```
Paulspr\Regionate\RegionateServiceProvider::class,
```

and add an alias in 'aliases' for Regionate like this:
```
'Regionate' => Paulspr\Regionate\Regionate::class
```
