<?php

namespace codearachnid\KeyDex\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \codearachnid\KeyDex\KeyDex
 */
class KeyDex extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \codearachnid\KeyDex\KeyDex::class;
    }
}
