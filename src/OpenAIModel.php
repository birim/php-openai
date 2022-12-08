<?php
namespace Birim\OpenAI;

/**
 * Class OpenAIModel
 * More information can be found here https://beta.openai.com/docs/api-reference/models
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
final class OpenAIModel
{
    /**
     * Lists the currently available models, and provides basic information about each
     * one such as the owner and availability.
     *
     * @param OpenAIClient $client
     * @param null $model
     * @return array
     */
    public static function models(OpenAIClient $client, $model = null)
    {
        return $client->get('models' . ($model ? '/' . $model : ''));
    }

    /**
     * Delete a fine-tuned model. You must have the Owner role in your organization
     *
     * @param OpenAIClient $client
     * @param $model
     * @return array
     */
    public static function delete(OpenAIClient $client, $model)
    {
        return $client->delete('models/' . $model);
    }
}
