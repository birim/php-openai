<?php
namespace Birim\OpenAI;

use Birim\OpenAI\Data\ImageCreateData;
use Birim\OpenAI\Data\ImageEditData;
use Birim\OpenAI\Data\ImageVariationsData;

/**
 * Class OpenAIImage
 * More information can be found here https://beta.openai.com/docs/api-reference/images
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
final class OpenAIImage
{
    /**
     * Creates an image given a prompt.
     *
     * @param OpenAIClient $client
     * @param ImageCreateData $data
     * @return array
     */
    public static function generations(OpenAIClient $client, ImageCreateData $data)
    {
        return $client->post('images/generations', $data->data());
    }

    /**
     * Creates an edited or extended image given an original image and a prompt.
     *
     * @param OpenAIClient $client
     * @param ImageEditData $data
     * @return array
     */
    public static function edits(OpenAIClient $client, ImageEditData $data)
    {
        return $client->post('images/edits', $data->data(), $data->multiParts());
    }

    /**
     * Creates a variation of a given image.
     *
     * @param OpenAIClient $client
     * @param ImageVariationsData $data
     * @return array
     */
    public static function variations(OpenAIClient $client, ImageVariationsData $data)
    {
        return $client->post('images/variations', $data->data(), $data->multiParts());
    }
}
