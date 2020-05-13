# Laravel Superheros

A very simple little package that talks to the Superheros API (https://superheroapi.com/), created as part of my learning to create packages for Laravel.

## Installation

Run composer require aschmelyun/quickmetrics-laravel from your Laravel application root. Once that's finished, you'll need to open up your .env file and add the following to the bottom:

SUPERHERO_API_KEY={your-api-key}
Optionally: You can publish the config file from the package by running:

php artisan vendor:publish --provider="Danstuchbury\Superheros\SuperheroServiceProvider"

## Usage

This packages exposes a `superheros()` method.

`superhero()->search({'name'})` where name is a URL safe string.

This will return a JSON object as follows:

```json
{
    "success": true,
    "count": 2,
    "result": [
        {
            "id": "195",
            "name": "Cyborg Superman"
        },
        {
            "id": "644",
            "name": "Superman"
        }
    ]
}
```

On error, the `"success"` will be `false` and there will be an `"error"` element containing the error as a string. You can handle this as you see fit.

Retrieve full details of a found superhero using `superheros()->getById({id})`.

Retieve Power Stats using `superheros()->stats({id})`

## Contributing

Contributions are welcome. Feel free to submit a Pull Request.
