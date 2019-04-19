<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workspace_child".
 *
 * @property string $parent
 * @property string $child
 */
class WorkspaceChild extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workspace_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('app', 'Parent'),
            'child' => Yii::t('app', 'Child'),
        ];
    }

    public function getNames()
    {
        $key = 'workspace';
        $data = false;
        $data = Yii::$app->cache->get($key);
        if ($data === false) {
            $data = Workspace::find()->select(['name', 'id', 'ico'])->indexBy('id')->column();
            Yii::$app->cache->set($key, $data);
        }
        return $data;
    }

    public function getMainNames()
    {
        /* @todo: Заменить SQL-запрос на Active Record */
        $sql = 'SELECT id, name, ico FROM `workspace` ws
        LEFT JOIN `workspace_child` wsc ON ws.id = wsc.child
        WHERE wsc.child IS NULL';

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    public function getChilds($parent)
    {
        /* @todo: Заменить SQL-запрос на Active Record */
        $sql = 'SELECT child as id, name, ws.ico FROM `workspace_child` wsc
        RIGHT JOIN `workspace` ws ON wsc.child = ws.id
        WHERE wsc.parent = ' . (int)$parent;

        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }
}
