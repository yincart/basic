<div class="wide form">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'user-grid',
        'dataProvider' => $users->normalusers(),
        'filter' => $users,
        'columns' => array(
            'id',
            array(
                'name' => 'username',
                'value'=>'$data->userlink()'
            ),

            'email',
            'create_at',
//            array(
//                'class' => 'bootstrap.widgets.TbButtonColumn',
//                'template' => 'choose',
//                'buttons' => array(
//                    'link' => $data->userlink() ,
//                ),
//            ),
        ),
    ));
    ?>

</div>