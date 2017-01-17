<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CronResults;

/**
 * CronResultsSearch represents the model behind the search form about `app\models\CronResults`.
 */
class CronResultsSearch extends CronResults
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body', 'date_request', 'date_response', 'headers'], 'safe'],
            [['delay', 'id'], 'integer'],
            [['result'], 'boolean'],
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
    public function search($params)
    {
        $query = CronResults::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'date_request' => $this->date_request,
            'date_response' => $this->date_response,
            'delay' => $this->delay,
            'result' => $this->result,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'headers', $this->headers]);

        return $dataProvider;
    }
}
