<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnswerText Entity.
 */
class AnswerText extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'id' => true,
        'question_id' => true,
        'content' => true,
        'question' => true,
    ];
}
