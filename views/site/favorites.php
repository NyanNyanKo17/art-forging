<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $favorites \app\models\Favorite[] */

$this->title = 'Избранные изделия';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (empty($favorites)): ?>
    <p>Вы ещё не добавили ни одного изделия в избранное.</p>
<?php else: ?>
    <div class="row">
        <?php foreach ($favorites as $fav): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if ($fav->product && $fav->product->main_image): ?>
                        <img src="<?= Yii::getAlias('@web') . '/' . $fav->product->main_image ?>" class="card-img-top" alt="<?= Html::encode($fav->product->name) ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= Html::encode($fav->product->name) ?></h5>

                        <div class="card-text mb-3">
                            <div class="description-text collapsed"><?= Html::encode($fav->product->description) ?></div>
                            <button class="btn btn-link toggle-description p-0 mt-2" type="button">Все описание</button>
                        </div>

                        <div class="product-price text-muted mb-3" style="display:none;">
                            Цена: <?= Html::encode(number_format($fav->product->price, 0, ',', ' ')) ?> ₽
                        </div>

                        <a href="<?= Url::to(['/products/view', 'id' => $fav->product->id]) ?>" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php
$script = <<<JS
document.querySelectorAll('.toggle-description').forEach(function(button) {
    button.addEventListener('click', function() {
        const description = this.previousElementSibling;
        const cardBody = this.closest('.card-body');
        const price = cardBody.querySelector('.product-price');
        
        description.classList.toggle('expanded');
        if (description.classList.contains('expanded')) {
            this.textContent = 'Скрыть описание';
            price.style.display = 'block';
        } else {
            this.textContent = 'Все описание';
            price.style.display = 'none';
        }
    });
});
JS;
$this->registerJs($script);
?>
