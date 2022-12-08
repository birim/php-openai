<?php
namespace Birim\OpenAI\Data;

/**
 * Class EditData
 * More information can be found here https://beta.openai.com/docs/api-reference/edits
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class EditData extends Data
{
    /**
     * ID of the model to use.
     *
     * @var string $model
     */
    public $model;

    /**
     * The instruction that tells the model how to edit the prompt.
     *
     * @var string $instruction
     */
    public $instruction;

    /**
     * The input text to use as a starting point for the edit.
     *
     * @var string $input
     */
    public $input = '';

    /**
     * How many edits to generate for the input and instruction.
     *
     * @var integer $n
     */
    public $n = 1;

    /**
     * What sampling temperature to use. Higher values means the model will take more risks.
     *
     * @var integer $temperature
     */
    public $temperature = 1;

    /**
     * An alternative to sampling with temperature, called nucleus sampling, where the model considers the results
     * of the tokens with top_p probability mass. So 0.1 means only the tokens comprising
     * the top 10% probability mass are considered.
     *
     * @var integer $topP
     */
    public $topP = 1;

    /**
     * All attributes as array for request
     *
     * @return array
     */
    public function data()
    {
        $array = [
            'model' => $this->model,
            'instruction' => $this->instruction,
            'input' => $this->input,
            'n' => $this->n,
            'temperature' => $this->temperature,
            'top_p' => $this->topP
        ];

        return $array;
    }
}
