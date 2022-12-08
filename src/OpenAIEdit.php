<?php
namespace Birim\OpenAI;

use Birim\OpenAI\Data\EditData;

/**
 * Class OpenAIEdit
 * More information can be found here https://beta.openai.com/docs/api-reference/edits
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
final class OpenAIEdit
{
    /**
     * Given a prompt and an instruction, the model will return an edited version of the prompt.
     *
     * @param OpenAIClient $client
     * @param EditData $data
     * @return array
     */
    public static function edits(OpenAIClient $client, EditData $data)
    {
        return $client->post('edits', $data->data());
    }
}
