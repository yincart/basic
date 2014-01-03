<div class="wide form">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'users-grid',
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
        ),
    ));
    ?>

</div>