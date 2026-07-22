<?php

declare(strict_types=1);

namespace NovaCore\Http;


class Request
{

    protected array $query;

    protected array $body;

    protected array $server;



    public function __construct()
    {

        $this->query = $_GET;

        $this->body = $_POST;

        $this->server = $_SERVER;

    }



    public function method(): string
    {

        return $this->server['REQUEST_METHOD'] ?? 'GET';

    }



  public function uri(): string
{

    $uri = parse_url(
        $this->server['REQUEST_URI'] ?? '/',
        PHP_URL_PATH
    );


    $scriptName = dirname(
        $this->server['SCRIPT_NAME']
    );


    if($scriptName !== '/')
    {
        $uri = str_replace(
            $scriptName,
            '',
            $uri
        );
    }


    return $uri ?: '/';

}


    public function input(
        string $key,
        mixed $default=null
    ): mixed
    {

        return $this->body[$key]
            ?? $this->query[$key]
            ?? $default;

    }



    public function all(): array
    {

        return array_merge(
            $this->query,
            $this->body
        );

    }


}