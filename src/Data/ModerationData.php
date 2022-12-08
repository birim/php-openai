<?php
namespace Birim\OpenAI\Data;

/**
 * Class ModerationData
 * More information can be found here https://beta.openai.com/docs/api-reference/moderations
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class ModerationData extends Data
{
    /**
     * The input text to classify.
     *
     * @var string|array $user
     */
    public $input = '';

    /**
     * All attributes as array for request
     *
     * @return array
     */
    public function data()
    {
        $array = [
            'input' => $this->input
        ];

        return $array;
    }
}
