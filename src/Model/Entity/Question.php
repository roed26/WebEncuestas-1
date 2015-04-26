<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity.
 */
class Question extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'poll_id' => true,
        'title' => true,
        'qtype' => true,
        'poll' => true,
        'answer' => true,
        'answer_text' => true,
    ];
}
