<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Document;

/**
 * DocumentSearch represents the model behind the search form about `common\models\Document`.
 */
class DocumentSearch extends Document
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'document_type', 'document_form', 'reg_number'], 'integer'],
            [['reg_date', 'execution_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $flag = false)
    {
        $query = Document::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($flag == true) {
            $query->andFilterWhere(['or',
                ['=', 'executor', Yii::$app->user->id],
                ['=', 'registrator', Yii::$app->user->id]
            ]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'document_type' => $this->document_type,
            'document_form' => $this->document_form,
            'reg_date' => $this->reg_date,
            'execution_date' => $this->execution_date,
            'reg_number' => $this->reg_number,
        ]);

        return $dataProvider;
    }
}
