<?php
namespace Birim\OpenAI\Data;

/**
 * Class Data
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
abstract class Data
{
    /**
     * All attributes as array for request
     *
     * @return array
     */
    public function data()
    {
        return [];
    }

    /**
     * @return array
     */
    public function multiParts()
    {
        $multiParts = [];
        foreach ($this->files as $name)
        {
            $multiParts[] = [
                'name' => $this->name,
                'filename' => basename($this->{$name}),
                'contents' => file_get_contents($this->{$name})
            ];
        }
        return $multiParts;
    }

    /**
     * Attributes treated as a file
     *
     * @return array
     */
    public function files()
    {
        return [];
    }
}
