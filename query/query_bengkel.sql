SELECT * FROM tb_product

/*jika salah satu data user di tb_user terhapus 
maka data relasi yg ada di tb_roles juga ikut terhapus*/
SELECT * FROM tb_user
SELECT * FROM tb_roles
SELECT * FROM tb_jabatan

SELECT * FROM tb_barang

SELECT * FROM tb_penjualan GROUP BY id_transaksi DESC

SELECT id_penjualan, id_transaksi, id_barang, x.id_user, nama_barang, jumlah_barang,
CONCAT('Rp. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(subharga,0)) AS subharga, CONCAT('Rp. ',FORMAT(subtotal,0)) AS subtotal,
CONCAT('Rp. ',FORMAT(bayar,0)) AS bayar, CONCAT('Rp. ',FORMAT(kembali,0)) AS kembali, tgl_penjualan
FROM tb_penjualan X
INNER JOIN tb_user Y ON y.id_user = x.id_user
ORDER BY id_penjualan DESC

SELECT id_penjualan,id_barang,id_user,nama_barang, jumlah_barang, harga, SUM(jumlah_barang) * SUM(harga) AS subharga FROM tb_transaksi_penjualan
GROUP BY id_penjualan ASC

SELECT
SUM(jumlah_barang) AS jml,SUM(jumlah_barang * harga) AS subtotal
FROM tb_transaksi_penjualan WHERE id_user = 'USE0004'

SELECT * FROM tb_transaksi_penjualan

SELECT COUNT(id)/10 AS id FROM barang

SELECT CONCAT(SUM(jumlah_barang),' Pcs') AS jml, CONCAT('Rp. ',FORMAT(SUM(subtotal),0)) AS subtotal FROM tb_transaksi_penjualan

SELECT CONCAT('Rp. ',FORMAT(SUM(jumlah_barang * harga_beli),0)) AS m_awal, 
CONCAT('Rp. ',FORMAT(SUM(jumlah_barang * harga_jual),0)) AS m_akhir,
CONCAT('Rp. ',FORMAT(SUM((jumlah_barang * harga_jual) - (jumlah_barang * harga_beli)),0)) AS lab_untung
FROM tb_barang

SELECT * FROM tb_penjualan LIMIT 0,10

SELECT CONCAT('Rp. ',FORMAT(SUM(harga_jual),0)) AS harga FROM tb_barang

SELECT * FROM tb_penjualan GROUP BY id_transaksi DESC

SELECT * FROM tb_user
SELECT * FROM tb_roles
SELECT * FROM tb_jabatan
SELECT * FROM tb_barang
SELECT * FROM tb_supplier

SELECT * FROM tb_rols_product
SELECT * FROM table_all_product

SELECT * FROM tb_return

SELECT * FROM tb_kategori
SELECT * FROM tb_supplier

SELECT * FROM tb_barang
SELECT * FROM tb_transaksi_penjualan

SELECT * FROM tb_penjualan WHERE id_transaksi = 'TRX0000001'

SELECT * FROM tb_roles_kategori
SELECT * FROM tb_roles_supplier

SELECT COUNT(*) FROM tb_barang
SELECT COUNT(*) FROM tb_penjualan

SELECT y.id_barang, x.jumlah_barang AS brg, harga_beli, harga_jual, x.jumlah_barang * harga_beli AS Hbeli
FROM tb_penjualan X
INNER JOIN tb_barang Y ON y.id_barang = x.id_barang

y.jumlah_barang AS pnj,