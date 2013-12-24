<?php

class ItemPropController extends MallBaseController
{
    /**
     * get prop values by category id
     * @param int $category_id
     * @return array
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    protected function getProps($category_id = 3)
    {
        $item_props = ItemProp::model()->findAllByAttributes(array('category_id' => $category_id));
        $props = array('请选择');
        foreach ($item_props as $item_prop) {
            $props[$item_prop->item_prop_id] = $item_prop->prop_name;
        }
        return $props;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new ItemProp;

        if (isset($_POST['ItemProp'])) {
            $this->handlePostData();
            $model->attributes = $_POST['ItemProp'];

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->item_prop_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'props' => $this->getProps(),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['ItemProp'])) {
            $this->handlePostData();
            $model->attributes = $_POST['ItemProp'];

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->item_prop_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'props' => $this->getProps(),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new ItemProp('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['ItemProp']))
            $model->attributes = $_GET['ItemProp'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'props' => $this->getProps(),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = ItemProp::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * format post props value
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    protected function handlePostData()
    {
        if (isset($_POST['PropValue'])) {
            $propValues = $_POST['PropValue'];
            unset($_POST['PropValue']);
            $_POST['ItemProp']['propValues'] = array();
            if (is_array($propValues['value_name']) && $count = count($propValues['value_name'])) {
                for ($i = 0; $i < $count; $i++) {
                    $_POST['ItemProp']['propValues'][] = array(
                        'prop_value_id' => $propValues['prop_value_id'][$i],
                        'value_name' => $propValues['value_name'][$i],
                        'sort_order' => $i,
                        'value_alias' => $propValues['value_name'][$i],
                        'status' => 1,
                    );
                }
            }
        }
    }
}
