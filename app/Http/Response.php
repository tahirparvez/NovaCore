<?php

declare(strict_types=1);

namespace NovaCore\Http;


class Response
{


    protected mixed $content;

    protected int $status;



    public function __construct(
        mixed $content='',
        int $status=200
    )
    {

        $this->content=$content;

        $this->status=$status;

    }



    public function send(): void
    {

        http_response_code(
            $this->status
        );


        echo $this->content;

    }



    public static function json(
        array $data,
        int $status=200
    ): self
    {

        return new self(
            json_encode(
                $data,
                JSON_PRETTY_PRINT
            ),
            $status
        );

    }


}