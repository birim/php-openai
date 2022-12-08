<?php
namespace Birim\OpenAI\Data;

/**
 * Class OpenAIEmbedding
 * More information can be found here https://beta.openai.com/docs/api-reference/embeddings
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class EmbeddingData extends Data
{
    /**
     * ID of the model to use.
     *
     * @var string $model
     */
    public $model;

    /**
     * Input text to get embeddings for, encoded as a string or array of tokens. To get embeddings for multiple inputs
     * in a single request, pass an array of strings or array of token arrays. Each input must not exceed
     * 2048 tokens in length.
     *
     * @var string|array $input
     */
    public $input = '';

    /**
     * A unique identifier representing your end-user, which can help OpenAI to monitor and detect abuse.
     *
     * @var string|null $user
     */
    public $user;

    /**
     * All attributes as array for request
     *
     * @return array
     */
    public function data()
    {
        $array = [
            'model' => $this->model,
            'input' => $this->input
        ];

        if ($this->user) {
            $array['user'] = $this->user;
        }

        return $array;
    }
}
