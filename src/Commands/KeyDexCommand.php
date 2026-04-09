<?php

namespace codearachnid\KeyDex\Commands;

use Illuminate\Console\Command;

class KeyDexCommand extends Command
{
    public $signature = 'keydex';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
