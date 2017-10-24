<?php

namespace app\filters;
use Yii;
class AccessRule extends \yii\filters\AccessRule
{

    /** @inheritdoc */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }

        foreach ($this->roles as $role) {
            if ($role === '?') {
                if (Yii::$app->user->isGuest) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!Yii::$app->user->isGuest) {
                    return true;
                }
            } elseif ($role === 'teacher') {
                if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 2) {
                    return true;
                }
            } elseif ($role === 'admin') {
                if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 3) {
                    return true;
                }
            }
        }

        return false;
    }
}