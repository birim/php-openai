<?php
namespace Birim\OpenAI\Data;

/**
 * Class CompletionData
 * More information can be found here https://beta.openai.com/docs/api-reference/completions
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class CompletionData extends Data
{
    /**
     * ID of the model to use.
     *
     * @var string $model
     */
    public $model;

    /**
     * The prompt(s) to generate completions for, encoded as a string, array of strings, array of tokens,
     * or array of token arrays.
     *
     * @var integer|string $prompt
     */
    public $prompt;

    /**
     * The suffix that comes after a completion of inserted text.
     *
     * @var string|null $suffix
     */
    public $suffix;

    /**
     * The maximum number of tokens to generate in the completion. The token count of your prompt plus max_tokens
     * cannot exceed the model's context length. Most models have a context length of 2048 tokens
     * (except for the newest models, which support 4096).
     *
     * @var integer $maxTokens
     */
    public $maxTokens = 16;

    /**
     * What sampling temperature to use. Higher values means the model will take more risks.
     * Try 0.9 for more creative applications, and 0 (argmax sampling) for ones with a well-defined answer.
     *
     * @var integer $temperature
     */
    public $temperature = 1;

    /**
     * An alternative to sampling with temperature, called nucleus sampling, where the model considers the results of
     * the tokens with top_p probability mass. So 0.1 means only the tokens comprising the top 10%
     * probability mass are considered.
     *
     * @var integer $topP
     */
    public $topP = 1;

    /**
     * How many completions to generate for each prompt.
     *
     * @var integer $n
     */
    public $n = 1;

    /**
     * Whether to stream back partial progress. If set, tokens will be sent as data-only server-sent events as
     * they become available, with the stream terminated by a data: [DONE] message.
     *
     * @var boolean $stream
     */
    public $stream = false;

    /**
     * Include the log probabilities on the logprobs most likely tokens, as well the chosen tokens. For example,
     * if logprobs is 5, the API will return a list of the 5 most likely tokens. The API will always return the
     * logprob of the sampled token, so there may be up to logprobs+1 elements in the response.
     *
     * The maximum value for logprobs is 5.
     *
     * @var integer|null $logprobs
     */
    public $logprobs;

    /**
     * Echo back the prompt in addition to the completion
     *
     * @var boolean $echo
     */
    public $echo = false;

    /**
     * Up to 4 sequences where the API will stop generating further tokens.
     * The returned text will not contain the stop sequence.
     *
     * @var string|array|null $stop
     */
    public $stop;

    /**
     * Number between -2.0 and 2.0. Positive values penalize new tokens based on whether they appear in the text
     * so far, increasing the model's likelihood to talk about new topics.
     *
     * @var integer $presencePenalty
     */
    public $presencePenalty = 0;

    /**
     * Number between -2.0 and 2.0. Positive values penalize new tokens based on their existing frequency in the text
     * so far, decreasing the model's likelihood to repeat the same line verbatim.
     *
     * @var integer $frequencyPenalty
     */
    public $frequencyPenalty = 0;

    /**
     * Generates best_of completions server-side and returns the "best"
     * (the one with the highest log probability per token). Results cannot be streamed. When used with n, best_of
     * controls the number of candidate completions and n specifies how many to return – best_of must be greater than n.
     *
     * @var integer $bestOf
     */
    public $bestOf = 1;

    /**
     * Modify the likelihood of specified tokens appearing in the completion.
     *
     * Accepts a json object that maps tokens (specified by their token ID in the GPT tokenizer) to an associated bias
     * value from -100 to 100. You can use this tokenizer tool (which works for both GPT-2 and GPT-3) to convert text
     * to token IDs. Mathematically, the bias is added to the logits generated by the model prior to sampling.
     *
     * The exact effect will vary per model, but values between -1 and 1 should decrease or increase likelihood of
     * selection; values like -100 or 100 should result in a ban or exclusive selection of the relevant token.
     *
     * As an example, you can pass {"50256": -100} to prevent the <|endoftext|> token from being generated.
     *
     * @var array|null $logitBias
     */
    public $logitBias;

    /**
     * A unique identifier representing your end-user, which can help OpenAI to monitor and detect abuse.
     *
     * @var string|null $n
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
            'prompt' => $this->prompt,
            'max_tokens' => $this->maxTokens,
            'temperature' => $this->temperature,
            'top_p' => $this->topP,
            'n' => $this->n,
            'stream' => $this->stream,
            'echo' => $this->echo,
            'presence_penalty' => $this->presencePenalty,
            'frequency_penalty' => $this->frequencyPenalty,
            'best_of' => $this->bestOf,
        ];

        if ($this->user) {
            $array['user'] = $this->user;
        }

        if ($this->stop) {
            $array['stop'] = $this->stop;
        }

        if ($this->logitBias) {
            $array['logit_bias'] = $this->logitBias;
        }

        if ($this->logprobs) {
            $array['logprobs'] = $this->logprobs;
        }

        return $array;
    }
}