<?php

use Hashids\Hashids;

class Hasher
{
    public static function encode(...$args)
    {
        $uri = Request::segment(2);
        if (!isset($uri)) {
            $uri = Request::segment(1, 'kamulahsatusatunya');
        }

        $hasher = new Hashids($uri, 10);
        return $hasher->encode(...$args);
    }
    public static function decode($enc)
    {
        try {
            if (is_int($enc)) {
                return $enc;
            }
            $uri = Request::segment(2);
            if (!isset($uri)) {
                $uri = Request::segment(1, 'kamulahsatusatunya');
            }
            $hasher = new Hashids($uri, 10);
            return $hasher->decode($enc)[0];
            // return app(Hashids::class)->decode($enc)[0];
        }catch (\Exception $e) {
            return $e;
        }

    }

    public static function defEnc(...$args)
    {

        $hasher = new Hashids();
        return $hasher->encode(...$args);
    }

    public static function defDec($enc)
    {
        try {

            $hasher = new Hashids();

            return $hasher->decode($enc)[0];
        } catch (\Exception $e) {
            return $e;
        }
    }
}
