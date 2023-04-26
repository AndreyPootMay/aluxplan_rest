<?php

/**
 * author     : andreypootmay <andreypootmay@gmail.com>
 * createTime : 2023/04/25 4:58 PM
 * description:
 */

namespace app\core\traits;

use app\core\services\UserService;
use Yii;
use yii\base\InvalidConfigException;

/**
 * Trait ServiceTrait
 * @property-read UserService $userService
 */
trait ServiceTrait
{
    /**
     * @return UserService|object
     */
    public function getUserService()
    {
        try {
            return Yii::createObject(UserService::class);
        } catch (InvalidConfigException $e) {
            return new UserService();
        }
    }
}
