<?php
	$this->breadcrumbs = array(
		'Управление характеристиками товаров',
	);

	$this->menu = array(
		array('label' => 'Добавить характеристики', 'url' => array('create')),
	);
?>

<h1>Управление характеристиками товаров</h1>

<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'attr-grid',
		'dataProvider' => $model->search(),
		'filter' => $model,
		'columns' => array(
			'name',
			array(
				'name' => 'category',
				'type' => 'raw',
				'filter' => CHtml::listData(Category::model()->findAll(), 'id', 'name'),
				'value' => '$data->attrGroup->category->name'
			),
			array(
				'name' => 'attr_group_name',
				'type' => 'raw',
				//'filter' => CHtml::listData(Category::model()->findAll(), 'id', 'name'),
				'value' => '$data->attrGroup->name'
			),
			array(
				'name' => 'is_main',
				'type' => 'boolean',
				'filter' => array('1' => 'Да', '0'=>'Нет'),
				'header' => 'важная'
			),
			array(
				'name' => 'type',
				'type' => 'raw',
				'filter' => array('1' => 'string', '2' => 'boolean', '3' => 'integer'),
				'value' => '$data->GetType()'
			),
			'pos',
			array(
				'name' => 'filter',
				'type' => 'boolean',
				'filter' => array('1' => 'Да', '0'=>'Нет'),
				'header' => 'в фильтр'
			),
			'global_pos',
			'template',
			array(
				'class' => 'CButtonColumn',
			),
		),
	));
?>
