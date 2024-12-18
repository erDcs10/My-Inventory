<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id_barang
 * @property string|null $nama_barang
 * @property string|null $deskripsi
 * @property string|null $kategori_barang
 * @property int|null $harga_barang
 * @property resource|null $gambar_barang
 * @property int|null $stok_barang
 * @property string|null $produsen
 *
 * @property Keranjang[] $keranjangs
 * @property Pemesanan[] $pemesanans
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deskripsi', 'gambar_barang'], 'string'],
            [['harga_barang', 'stok_barang'], 'integer'],
            [['nama_barang', 'kategori_barang', 'produsen'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'nama_barang' => 'Nama Barang',
            'deskripsi' => 'Deskripsi',
            'kategori_barang' => 'Kategori Barang',
            'harga_barang' => 'Harga Barang',
            'gambar_barang' => 'Gambar Barang',
            'stok_barang' => 'Stok Barang',
            'produsen' => 'Produsen',
        ];
    }

    /**
     * Gets query for [[Keranjangs]].
     *
     * @return \yii\db\ActiveQuery|KeranjangQuery
     */
    public function getKeranjangs()
    {
        return $this->hasMany(Keranjang::class, ['id_barang' => 'id_barang']);
    }

    /**
     * Gets query for [[Pemesanans]].
     *
     * @return \yii\db\ActiveQuery|PemesananQuery
     */
    public function getPemesanans()
    {
        return $this->hasMany(Pemesanan::class, ['id_barang' => 'id_barang']);
    }

    /**
     * {@inheritdoc}
     * @return BarangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BarangQuery(get_called_class());
    }
}
