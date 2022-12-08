<?php
namespace Birim\OpenAI;

use Birim\OpenAI\Data\CompletionData;

/**
 * Class OpenAICompletion
 * More information can be found here https://beta.openai.com/docs/api-reference/completions
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
final class OpenAICompletion
{
    /**
     * Given a prompt, the model will return one or more predicted completions,
     * and can also return the probabilities of alternative tokens at each position.
     *
     * @param OpenAIClient $client
     * @param CompletionData $data
     * @return array
     */
    public static function completions(OpenAIClient $client, CompletionData $data)
    {
        return $client->post('completions', $data->data());
    }
}
