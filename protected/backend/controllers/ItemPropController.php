<?php

class ItemPropController extends MallBaseController
{
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new ItemProp;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ItemProp'])) {
            $model->attributes = $_POST['ItemProp'];
            if ($model->save()) {
                if (isset($_POST['PropValue']))
                    $model->setPropValues($_POST['PropValue']);
                $this->redirect(array('view', 'id' => $model->prop_id));
            }
        }

        $item_props = ItemProp::model()->findAll();
        $props = array('请选择');
        foreach ($item_props as $item_prop) {
            $props[$item_prop->prop_id] = $item_prop->prop_name;
        }

        $this->render('create', array(
            'model' => $model,
            'props' => $props
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ItemProp'])) {
            $model->attributes = $_POST['ItemProp'];

            if (isset($_POST['PropValue'])) {
                $model->setPropValues($_POST['PropValue']);
            }

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->prop_id));
            }
        }

        $item_props = ItemProp::model()->findAll();
        $props = array('请选择');
        foreach ($item_props as $item_prop) {
            $props[$item_prop->prop_id] = $item_prop->prop_name;
        }

        $this->render('update', array(
            'model' => $model,
            'props' => $props
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
}
