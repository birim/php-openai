<?php
namespace Birim\OpenAI;

use Birim\OpenAI\Data\EmbeddingData;

/**
 * Class OpenAIEmbedding
 * More information can be found here https://beta.openai.com/docs/api-reference/embeddings
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
final class OpenAIEmbedding
{
    /**
     * Get a vector representation of a given input that can be easily consumed
     * by machine learning models and algorithms.
     *
     * @param OpenAIClient $client
     * @param EmbeddingData $data
     * @return array
     */
    public static function embeddings(OpenAIClient $client, EmbeddingData $data)
    {
        return $client->post('embeddings', $data->data());
    }
}
