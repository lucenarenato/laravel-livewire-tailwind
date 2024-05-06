<?php

namespace App\Helpers;

use Faker\Factory;
use Faker\Generator;

class FactoryHelper
{
    /**
     * The language to generate the catchphrase in.
     *
     * @var string
     */
    private static string $language = 'en_US';

    /**
     * The number of times to concatenate catchphrases.
     *
     * @var int
     */
    private static int $times = 5;

    /**
     * Generate a Faker object with the configured language.
     *
     * @return Generator The Faker object.
     */
    private static function createFaker(): Generator
    {
        return Factory::create(self::$language);
    }

    /**
     * Set the language to generate the catchphrase in.
     *
     * @param  string  $language The language to use.
     * @return self
     */
    public static function language(string $language): self
    {
        self::$language = $language;

        return new self();
    }

    /**
     * Set the number of times to concatenate catchphrases.
     *
     * @param  int  $times The number of times to concatenate catchphrases.
     * @return self
     */
    public static function times(int $times): self
    {
        self::$times = $times;

        return new self();
    }

    /**
     * Generate a catchphrase by concatenating multiple random catchphrases.
     *
     * @return string The generated catchphrase.
     */
    public static function catchPhrase(): string
    {
        $faker = self::createFaker();

        $phrase = '';
        for ($i = 1; $i <= self::$times; $i++) {
            $phrase .= ' '.$faker->unique()->catchPhrase;
        }

        return trim($phrase);
    }
}
