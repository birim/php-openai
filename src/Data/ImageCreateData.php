<?php
namespace Birim\OpenAI\Data;

/**
 * Class ImageCreateData
 * More information can be found here https://beta.openai.com/docs/api-reference/images
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class ImageCreateData extends Data
{
    /**
     * A text description of the desired image(s). The maximum length is 1000 characters.
     *
     * @var string $prompt
     */
    public $prompt;

    /**
     * The number of images to generate. Must be between 1 and 10.
     *
     * @var integer $n
     */
    public $n = 1;

    /**
     * The size of the generated images. Must be one of 256x256, 512x512, or 1024x1024.
     *
     * @var string $size
     */
    public $size = '1024x1024';

    /**
     * The format in which the generated images are returned. Must be one of url or b64_json.
     *
     * @var string $responseFormat
     */
    public $responseFormat = 'url';

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
            'prompt' => $this->prompt,
            'n' => $this->n,
            'size' => $this->size,
            'response_format' => $this->responseFormat,
        ];

        if ($this->user) {
            $array['user'] = $this->user;
        }

        return $array;
    }
}
