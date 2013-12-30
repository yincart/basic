<div class="wide form">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'user-grid',
        'dataProvider' => $users->normalusers(),
        'filter' => $users,
        'columns' => array(
            'id',
            'username',
            'email',
            'create_at',
            array(
                'value'=>'Tbfunction::add_user($data->id)'
            ),
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