<?php
use yii\helpers\Html;

$this->title = $product->nama_barang;
?>

<div class="container">
    <h1><?= Html::encode($product->nama_barang) ?></h1>
    <div style="border: 1px solid #ddd; padding: 20px; border-radius: 10px;">
        <img src="<?= Html::encode($product->gambar_barang) ?>" 
             alt="<?= Html::encode($product->nama_barang) ?>" 
             style="width: 100%; height: auto; margin-bottom: 15px;">
        <p><strong>Kategori:</strong> <?= Html::encode($product->kategori_barang) ?></p>
        <p><strong>Harga:</strong> Rp. <?= number_format($product->harga_barang, 0, ',', '.') ?></p>
        <p><strong>Stok:</strong> <?= Html::encode($product->stok_barang) ?> units</p>
        <p><?= Html::encode($product->deskripsi) ?></p>
    </div>
</div>
