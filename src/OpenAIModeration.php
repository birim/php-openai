<?php
namespace Birim\OpenAI;

use Birim\OpenAI\Data\ModerationData;

/**
 * Class OpenAIModeration
 * More information can be found here https://beta.openai.com/docs/api-reference/moderations
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
final class OpenAIModeration
{
    /**
     * Given a input text, outputs if the model classifies it as violating OpenAI's content policy.
     *
     * @param OpenAIClient $client
     * @param ModerationData $data
     * @return array
     */
    public static function moderations(OpenAIClient $client, ModerationData $data)
    {
        return $client->post('moderations', $data->data());
    }
}
