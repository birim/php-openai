<?php
namespace Birim\OpenAI;

use Birim\OpenAI\Data\FineTuneCreateData;

/**
 * Class OpenAIFineTune
 * More information can be found here https://beta.openai.com/docs/api-reference/fine-tunes
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
final class OpenAIFineTune
{
    /**
     * List your organization's fine-tuning jobs
     *
     * @param OpenAIClient $client
     * @param null $fineTuneId
     * @return array
     */
    public static function fineTunes(OpenAIClient $client, $fineTuneId = null)
    {
        return $client->get('fine-tunes' . ($fineTuneId ? '/' . $fineTuneId : ''));
    }

    /**
     * Creates a job that fine-tunes a specified model from a given dataset.
     * Response includes details of the enqueued job including job status and the name of the
     * fine-tuned models once complete.
     *
     * @param OpenAIClient $client
     * @param FineTuneCreateData $data
     * @return array
     */
    public static function create(OpenAIClient $client, FineTuneCreateData $data)
    {
        return $client->post('fine-tunes', $data->data());
    }

    /**
     * Immediately cancel a fine-tune job.
     *
     * @param OpenAIClient $client
     * @param $fineTuneId
     * @return array
     */
    public static function cancel(OpenAIClient $client, $fineTuneId)
    {
        return $client->post('fine-tunes/' . $fineTuneId . '/cancel');
    }

    /**
     * Get fine-grained status updates for a fine-tune job.
     *
     * @param OpenAIClient $client
     * @param $fineTuneId
     * @return array
     */
    public static function events(OpenAIClient $client, $fineTuneId)
    {
        return $client->get('fine-tunes/' . $fineTuneId . '/events');
    }
}
