<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Poll Entity.
 */
class Poll extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'title' => true,
        'description' => true,
        'url' => true,
        'pstate' => true,
        'logo' => true,
        'user' => true,
        'questions' => true,
    ];
}
