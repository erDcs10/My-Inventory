<?php

/** @var yii\web\View $this */


$this->title = 'E-Katalog Alat Kesehatan';
?>

<link rel="stylesheet" href="@web/css/site.css">

<div class="site-index">

<div class="background-section">
    <div class="title">
        <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1>Selamat Datang di E-Katalog!</h1>
        <p class="lead">Belanja alat kesehatan paling ekonomis se-Indonesia.</p>
    </div>
   
    <div class="body-content">

        <div class="row">
        <?php foreach ($products as $product): ?>
                <div class="col-lg-4" style="margin-bottom: 20px;">
                     <div class= "product-box" style="border: 5px solid #000; padding: 15px; margin: 10px; border-radius: 10px; text-align: center;">
                     <?php if (!empty($product->gambar_barang)): ?>
                            <!-- Display Image -->
                        <img src="<?= $product->gambar_barang ?>" 
                            alt="<?= htmlspecialchars($product->nama_barang) ?>" 
                            style="width:100%; height:auto; margin-bottom:10px;">
                        <?php else: ?>
                            <!-- Display a placeholder if no image is found -->
                        <img src="<?= Yii::getAlias('@web/uploads/default-placeholder.jpg') ?>" 
                            alt="No Image Available" 
                            style="width:100%; height:auto; margin-bottom:10px;">
                        <?php endif; ?>
                        <div class="panel-heading">
                            <h3 class="panel-title"style="text-color:rgb(255, 0, 0); color: #333"><?= htmlspecialchars($product->nama_barang) ?></h3>
                        </div>
                        <div class="panel-body">
                            <p><strong>Kategori:</strong> <?= htmlspecialchars($product->kategori_barang) ?></p>
                            <p><strong>Harga:</strong> Rp. <?= number_format($product->harga_barang, 0, ',', '.') ?></p>
                            <p><strong>Stok:</strong> <?= htmlspecialchars($product->stok_barang) ?> units</p>
                        </div>
                            <!-- Link based on login status -->
                        <?php if (Yii::$app->user->isGuest): ?>
                            <!-- If the user is not logged in, redirect to login page -->
                            <a href="<?= Yii::$app->urlManager->createUrl(['/site/login']) ?>" class="btn btn-primary">Login untuk informasi lebih lanjut</a>
                        <?php else: ?>
                            <!-- If the user is logged in, redirect to the contact page -->
                            <a href="<?= Yii::$app->urlManager->createUrl(['/site/contacts']) ?>" class="btn btn-primary">Lihat Detail</a>
                     <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
