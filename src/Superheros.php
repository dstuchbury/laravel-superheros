<?php

namespace Danstuchbury\Superheros;

use Illuminate\Support\Facades\Http;

class Superheros
{
    private $key;
    private $base_url;

    public function __construct($key)
    {
        $this->key = $key;
        $this->base_url = 'https://superheroapi.com/api/' . $this->key . '/';
    }

    public function search($name)
    {
        $search_results = Http::get($this->base_url . 'search/' . $name)->json();

        if ($search_results['response'] == 'error') {
            return [
                'success' => false,
                'error' => $search_results['error']
            ];
        }

        $results = [];
        foreach ($search_results['results'] as $superhero) {
            $this_result = [];
            $this_result['id'] = $superhero['id'];
            $this_result['name'] = $superhero['name'];
            array_push($results, $this_result);
        }

        return [
            'success' => true,
            'count' => sizeof($search_results['results']),
            'result' => $results
        ];
    }

    public function getById($id)
    {
        $superhero = Http::get($this->base_url . $id)->json();

        if ($superhero['response'] == 'error') {
            return [
                'success' => false,
                'error' => $superhero['error']
            ];
        }

        return [
            'success' => true,
            'result' => array_slice($superhero, 2)
        ];
    }

    public function powerstats($id)
    {
        $superhero = Http::get($this->base_url . $id . '/powerstats')->json();

        if ($superhero['response'] == 'error') {
            return [
                'success' => false,
                'error' => $superhero['error']
            ];
        }

        $original = $superhero;

        unset($superhero['id']);
        unset($superhero['response']);
        unset($superhero['name']);

        return [
            'success' => true,
            'name' => $original['name'],
            'result' => $superhero
        ];
    }
}
