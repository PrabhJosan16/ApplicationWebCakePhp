<?php

// src/Model/Entity/Meal.php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Meal extends Entity {

    protected $_accessible = [
        '*' => true,
        'id' => true,
        'slug' => true,
    ];

}
