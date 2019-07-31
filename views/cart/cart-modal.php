<?php

use yii\helpers\Html;

?>
<?php if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-cart table-hover table-script">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td> <?= Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name']]) ?></td>

                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td>
                        <button data-id="<?= $id; ?>" class="glyphicon glyphicon-remove text-danger js-del-item"
                                aria-hidden="true"></button>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="4">Итого:</td>
                <td><?= $session['cart.qty'] ?></td>
            </tr>
            <tr>
                <td colspan="4">На сумму:</td>
                <td><?= $session['cart.sum'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>

