<?php

/**
 * add save relation model
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */
Class YActiveRecord extends CActiveRecord
{
    /**
     * rewrite set attributes, set relation data to relations, auto save at after save
     * @param array $values
     * @param bool $safeOnly
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    public function setAttributes($values, $safeOnly = true)
    {
        if (!is_array($values))
            return;
        foreach ($values as $name => $value) {
            if (is_array($value) && isset($this->getMetaData()->relations[$name])) {
                $this->$name = $value;
            }
        }
        return parent::setAttributes($values, $safeOnly);
    }

    /**
     * rewrite save to add transaction
     * @param bool $runValidation
     * @param null $attributes
     * @return bool
     * @throws CDbException
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    public function save($runValidation = true, $attributes = null)
    {
        $db = $this->getDbConnection();
        if ($db->getCurrentTransaction() === null)
            $transaction = $db->beginTransaction();
        try {
            $return = parent::save($runValidation, $attributes);
            if (isset($transaction))
                $transaction->commit();
            return $return;
        } catch (Exception $e) {
            $this->addError('Exception', $e);
            if (isset($transaction))
                $transaction->rollback();
            else
                throw new CDbException('YActiveRecord Save Model Error', 0, $this);
            return false;
        }
    }

    /**
     * save relation data after save model
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    protected function afterSave()
    {
        foreach ($this->getMetaData()->relations as $name => $relation) {
            if ($this->hasRelated($name) && is_array($values = $this->$name)) {
                unset($this->$name);
                $className = $this->getMetaData()->relations[$name]->className;
                $foreignKey = $this->getMetaData()->relations[$name]->foreignKey;
                $primaryKey = $this::model($className)->getTableSchema()->primaryKey;
                $savedModelList = array();
                foreach ($this->$name as $value) {
                    $savedModelList[$value->$primaryKey] = $value;
                }
                foreach ($values as $value) {
                    if (isset($savedModelList[$value[$primaryKey]])) {
                        $model = clone($savedModelList[$value[$primaryKey]]);
                        unset($savedModelList[$value[$primaryKey]]);
                    } else {
                        $model = new $className();
                    }
                    $model->attributes = $value;
                    $model->$foreignKey = $this->$foreignKey;
                    if (!$model->save())
                        throw new CDbException(Yii::t('base', 'Save relations fail!'), 0, $model);
                }
                if ($savedModelList) {
                    $cri = new CDbCriteria();
                    $cri->addInCondition($primaryKey, array_keys($savedModelList));
                    $this::model($className)->deleteAll($cri);
                }
            }
        }
        parent::afterSave();
    }
}