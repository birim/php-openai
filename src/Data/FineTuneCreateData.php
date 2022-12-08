<?php
namespace Birim\OpenAI\Data;

/**
 * Class FineTuneCreateData
 * More information can be found here https://beta.openai.com/docs/api-reference/fine-tunes
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class FineTuneCreateData extends Data
{
    /**
     * The ID of an uploaded file that contains training data.
     *
     * @var string $trainingFile
     */
    public $trainingFile;

    /**
     * The ID of an uploaded file that contains validation data.
     *
     * @var string|null $validationFile
     */
    public $validationFile;

    /**
     * The name of the base model to fine-tune. You can select one of "ada", "babbage", "curie", "davinci", or
     * a fine-tuned model created after 2022-04-21.
     *
     * @var string $model
     */
    public $model = 'curie';

    /**
     * The number of epochs to train the model for. An epoch refers to one full cycle through the training dataset.
     *
     * @var integer $nEpoches
     */
    public $nEpoches = 4;

    /**
     * The batch size to use for training. The batch size is the number of training examples used to
     * train a single forward and backward pass.
     *
     * @var integer|null $batchSize
     */
    public $batchSize;

    /**
     * The learning rate multiplier to use for training.
     * The fine-tuning learning rate is the original learning rate used for pretraining multiplied by this value.
     *
     * @var integer|null $learningRateMultiplier
     */
    public $learningRateMultiplier;

    /**
     * The weight to use for loss on the prompt tokens. This controls how much the model tries to learn to generate
     * the prompt (as compared to the completion which always has a weight of 1.0), and can add a stabilizing effect
     * to training when completions are short.
     *
     * @var integer|null $promptLossWeight
     */
    public $promptLossWeight = 0.01;

    /**
     * If set, we calculate classification-specific metrics such as accuracy and F-1 score using the
     * validation set at the end of every epoch.
     *
     * @var boolean $computeClassificationMetrics
     */
    public $computeClassificationMetrics = false;

    /**
     * The number of classes in a classification task. This parameter is required for multiclass classification.
     *
     * @var integer|null $classificationNClasses
     */
    public $classificationNClasses;

    /**
     * The positive class in binary classification.
     * This parameter is needed to generate precision, recall, and F1 metrics when doing binary classification.
     *
     * @var string|null $classificationPositiveClass
     */
    public $classificationPositiveClass;

    /**
     * If this is provided, we calculate F-beta scores at the specified beta values.
     * The F-beta score is a generalization of F-1 score. This is only used for binary classification.
     *
     * @var array|null $classificationBetas
     */
    public $classificationBetas;

    /**
     * A string of up to 40 characters that will be added to your fine-tuned model name.
     *
     * @var string|null $suffix
     */
    public $suffix;

    /**
     * All attributes as array for request
     *
     * @return array
     */
    public function data()
    {
        $array = [
            'training_file' => $this->trainingFile,
            'model' => $this->model,
            'n_epoches' => $this->nEpoches,
            'prompt_loss_weight' => $this->promptLossWeight,
            'compute_classification_metrics' => $this->computeClassificationMetrics
        ];

        if ($this->validationFile) {
            $array['validation_file'] = $this->validationFile;
        }

        if ($this->batchSize) {
            $array['batchSize'] = $this->batchSize;
        }

        if ($this->learningRateMultiplier) {
            $array['learning_rate_multiplier'] = $this->learningRateMultiplier;
        }

        if ($this->classificationNClasses) {
            $array['classification_n_classes'] = $this->classificationNClasses;
        }

        if ($this->classificationPositiveClass) {
            $array['classification_positive_class'] = $this->classificationPositiveClass;
        }

        if ($this->classificationBetas) {
            $array['classification_betas'] = $this->classificationBetas;
        }

        return $array;
    }
}
