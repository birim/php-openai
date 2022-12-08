<?php
namespace Birim\OpenAI;

use Birim\OpenAI\Data\FileUploadData;

/**
 * Class OpenAIFile
 * More information can be found here https://beta.openai.com/docs/api-reference/files
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
final class OpenAIFile
{
    /**
     * Files are used to upload documents that can be used with features like Fine-tuning.
     *
     * @param OpenAIClient $client
     * @param null $fileId
     * @return array
     */
    public static function files(OpenAIClient $client, $fileId = null)
    {
        return $client->get('files' . ($fileId ? '/' . $fileId : ''));
    }

    /**
     * Returns the contents of the specified file
     *
     * @param OpenAIClient $client
     * @param $fileId
     * @return array
     */
    public static function content(OpenAIClient $client, $fileId)
    {
        return $client->get('files/' . $fileId . '/content');
    }

    /**
     * Upload a file that contains document(s) to be used across various endpoints/features.
     * Currently, the size of all the files uploaded by one organization can be up to 1 GB.
     *
     * @param OpenAIClient $client
     * @param FileUploadData $data
     * @return array
     */
    public static function upload(OpenAIClient $client, FileUploadData $data)
    {
        return $client->post('files', $data->data(), $data->multiParts());
    }

    /**
     * Delete a file.
     *
     * @param OpenAIClient $client
     * @param $fileId
     * @return array
     */
    public static function delete(OpenAIClient $client, $fileId)
    {
        return $client->delete('files/' . $fileId);
    }
}
