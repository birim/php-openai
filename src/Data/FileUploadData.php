<?php
namespace Birim\OpenAI\Data;

/**
 * Class FileUploadData
 * More information can be found here https://beta.openai.com/docs/api-reference/files
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class FileUploadData extends Data
{
    /**
     * Name of the JSON Lines file to be uploaded.
     * If the purpose is set to "fine-tune", each line is a JSON record with "prompt" and "completion" fields
     * representing your training examples.
     *
     * @var string $file
     */
    public $file;

    /**
     * The intended purpose of the uploaded documents.
     *
     * @var string $purpose
     */
    public $purpose;

    /**
     * Attributes treated as a file
     *
     * @return string[]
     */
    public function files()
    {
        return ['file'];
    }

    /**
     * All attributes as array for request
     *
     * @return array
     */
    public function data()
    {
        $array = [
            'purpose' => $this->purpose
        ];

        return $array;
    }
}
