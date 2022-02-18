<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Game */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="game-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php Pjax::begin([ 'id' => 'pjaxContent']); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'author.username',
            // 'category_id',
            'category',
            'subtitle:html',
            'notes:html',
            // 'object:ntext',
            [
                'attribute' => 'img',
                'value' => "/{$model->img}",
                'format' => ['image', ['width' => '100']],
            ],
            [
                'attribute' => 'aviable',
                'value' => function($data){
                    return $data->aviable ? '<span class="text-green">Виден</span>' : '<span class="text-red">Черновик</span>';
                },
                'format' => 'raw',
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <?php Pjax::end(); ?>

<?php $cards = $model->gameCard ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Присоединенные карты: <a href="<?= \yii\helpers\Url::to(['/admin/game/delete-all-card', 'id' => $model->id]) ?>"><span> очистить список карт</a></td> </h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach($cards as $card):?>
                        <tr>
                            <td><?= $card->id ?></td>
                            <td><?= $card->card_name ?></td>
                            <td><?= $card->card_category ?></td>
                            <td><a href="<?= \yii\helpers\Url::to(['/admin/game/delete-card', 'id' => $model->id, 'game_card_id' => $card->id]) ?>"><span>Удалить</a></td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container">
	<div class="row">
		<h5>Список карт по категориям</h5>
	</div>
    </div>

    <?php

        $category = app\modules\admin\models\Category::find()->all();                
        // echo '<pre>';
        // print_r($category);
        // echo '</pre>';
    ?>

<?php if(!empty($category)): ?> 
    
    <div class="row">
    <div class="col-md-12">
        <div class="box">

    
<div class="accordion" id="accordion2">

    <?php foreach($category as $cat): ?>  

    <div class="accordion-group">
        <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?= $cat->id ?>">
            <h5> -> <?= $cat->name ?></h5>
        </a>
        </div>
        <div id="<?= $cat->id ?>" class="accordion-body collapse">
        <div class="accordion-inner">

                <?php $goalcards = $model->getCategoryCard($cat->id) ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= $cat->name?></h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>Название</th>
                                    <th>Добавить</th>
                                </tr>
                                <?php foreach($goalcards as $goalcard):?>
                                    <tr>
                                        <td><?= $goalcard->name ?></td>
                                        <td><a href="<?= \yii\helpers\Url::to(['/admin/game/add-card', 'id' => $model->id, 'card_id' => $goalcard->id]) ?>"><span>Добавить</a></td>
                                    </tr>
                                <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

        </div>
        </div>
    </div>

    <?php endforeach; ?>  

</div>

</div>
</div>
</div>

<?php else: ?>
                <div>
                    <h6>No card category...</h6>
                </div>
<?php endif; ?>

</div>
