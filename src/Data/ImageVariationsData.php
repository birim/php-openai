<?php
namespace Birim\OpenAI\Data;

/**
 * Class ImageVariationsData
 * More information can be found here https://beta.openai.com/docs/api-reference/images
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class ImageVariationsData extends Data
{
    /**
     * The image to use as the basis for the variation(s). Must be a valid PNG file, less than 4MB, and square.
     *
     * @var string $image
     */
    public $image;

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
     * Attributes treated as a file
     *
     * @return string[]
     */
    public function files()
    {
        return ['image'];
    }

    /**
     * All attributes as array for request
     *
     * @return array
     */
    public function data()
    {
        $array = [
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
