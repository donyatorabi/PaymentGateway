<?php

namespace Tests\Feature;

use Modules\NumberConverter\Services\NumberConverterManager;
use Modules\NumberConverter\Services\NumberConverterService;
use Modules\NumberConverter\Services\NumberFormatterInterface;
use Tests\TestCase;

class HumanReadableNumberTest extends TestCase
{
    /**
     * @test
     */
    public function human_readable_number()
    {
        $numberConverterManager = app(NumberConverterManager::class);

        $humanReadableNumber = (new NumberConverterService($numberConverterManager))
            ->humanReadableNumber('en', '200098.995', 5);

        self::assertEquals(
            [
                "status" => 200,
                "data"   => "2,000.98995"
            ],
            $humanReadableNumber);
    }
}
