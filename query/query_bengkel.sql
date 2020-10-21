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

SELECT CONCAT('Rp. ',FORMAT(jumlah_barang * harga_beli,0)) AS m_awal, 
CONCAT('Rp. ',FORMAT(jumlah_barang * harga_jual,0)) AS m_akhir, 
CONCAT('Rp. ',FORMAT(SUM((jumlah_barang * harga_jual) - (jumlah_barang * harga_beli)),0)) AS lab_untung 
FROM tb_barang

SELECT * FROM tb_kategori
SELECT * FROM tb_supplier
SELECT id_barang, nama_barang, nama_supplier, nama_kategori, jumlah_barang AS stok, IF(jumlah_barang <= 3,'WARNING','GOOD') AS statuss FROM table_barang 
X
INNER JOIN tb_penjualan Y ON y.id_barang = x.id_barang

SELECT y.id_barang, x.jumlah_barang, harga_beli, harga_jual FROM table_barang X
INNER JOIN tb_penjualan Y ON y.id_barang = x.id_barang

SELECT * FROM tb_barang X
INNER JOIN tb_roles_kategori Y ON y.id_barang = x.id_barang
INNER JOIN tb_kategori a ON a.id_kategori = y.id_kategori
INNER JOIN tb_roles_supplier b ON b.id_barang = y.id_barang
INNER JOIN tb_supplier c ON c.id_supplier = b.id_supplier

SELECT x.id_barang, nama_barang, warna, jumlah_barang, harga_beli, harga_jual, keterangan, tgl_barang, y.id_kategori, nama_kategori,
b.id_supplier, nama_supplier, alamat_supplier, no_telp_supplier
FROM tb_barang X
INNER JOIN tb_roles_kategori Y ON y.id_barang = x.id_barang
INNER JOIN tb_kategori a ON a.id_kategori = y.id_kategori
INNER JOIN tb_roles_supplier b ON b.id_barang = y.id_barang
INNER JOIN tb_supplier c ON c.id_supplier = b.id_supplier

SELECT * FROM table_barang

SELECT SUM(jumlah_barang) FROM tb_penjualan WHERE id_transaksi = 'TRX0000009' GROUP BY id_transaksi DESC
SELECT * FROM tb_penjualan
SELECT * FROM tb_transaksi_penjualan



SELECT * FROM table_barang X
INNER JOIN tb_penjualan Y ON y.id_barang = x.id_barang

SELECT y.id_barang, x.nama_barang, y.jumlah_barang AS pnj_brg, harga_jual,y.jumlah_barang * harga_jual AS sub, tgl_barang, tgl_penjualan 
FROM table_barang X
INNER JOIN tb_penjualan Y ON y.id_barang = x.id_barang

SELECT y.id_barang AS id, x.nama_barangas AS nm, y.jumlah_barang AS pnj_brg, harga_jual,y.jumlah_barang * harga_jual AS sub, tgl_barang, tgl_penjualan FROM table_barang X INNER JOIN tb_penjualan Y ON y.id_barang = x.id_barang

UPDATE tb_penjualan SET tgl_penjualan = '2020-09-14 12:21:50' WHERE id_transaksi = 'TRX0000007'

SELECT id_penjualan, tgl_penjualan FROM tb_penjualan WHERE MONTH(tgl_penjualan) = '09'
SELECT tgl_penjualan FROM tb_penjualan WHERE YEAR(tgl_penjualan) = '2019'

SELECT MONTH(NOW()) AS dat

SELECT * FROM tb_pengiriman

SELECT * FROM tb_pembelian
SELECT * FROM table_all_pembelian
SELECT * FROM tb_konfirmasi
SELECT * FROM tb_konfirmasi_ulang GROUP BY id_pembelian ASC

SELECT id_pembelian, id_validasi,IF(id_validasi = 'VAL001',IF(id_validasi = 'VAL002', '1','0'),'0') AS valid FROM tb_pengiriman

SELECT COUNT(*) FROM tb_pengiriman WHERE id_validasi = 'VAL001' AND id_user = 'USR0003'

SELECT IF(x.id_pembelian = y.id_pembelian,x.id_pembelian,y.id_pembelian) AS id 
FROM tb_pembelian X
INNER JOIN tb_konfirmasi Y ON y.id_pembelian = x.id_pembelian GROUP BY y.id_pembelian ASC

SELECT * FROM tb_pengiriman X
INNER JOIN tb_konfirmasi Y ON y.id_pembelian = x.id_pembelian
INNER JOIN table_all_pembelian a ON a.id_pembelian = x.id_pembelian 
WHERE id_validasi = 'VAL001'

SELECT id_pengiriman, x.id_pembelian, x.id_user, nama, id_product, harga_brg, jumlah, harga * jumlah AS total,a.tgl_pembelian, y.tgl_konfirmasi, tgl_pengiriman, no_resi
FROM tb_pengiriman X
INNER JOIN tb_konfirmasi Y ON y.id_pembelian = x.id_pembelian
INNER JOIN table_all_pembelian a ON a.id_pembelian = x.id_pembelian 
WHERE id_validasi = 'VAL001'


SELECT id_pengiriman,x.id_pembelian, x.id_user, nama, id_product, harga_brg, jumlah, harga * jumlah AS total,
a.tgl_pembelian, y.tgl_konfirmasi, tgl_pengiriman, no_resi
FROM tb_pengiriman X
INNER JOIN tb_konfirmasi Y ON y.id_pembelian = x.id_pembelian
INNER JOIN table_all_pembelian a ON a.id_pembelian = x.id_pembelian 
WHERE x.id_user = 'USR0003' AND id_validasi = 'VAL001'



SELECT * FROM tb_pengiriman
SELECT * FROM tb_konfirmasi
SELECT * FROM tb_konfirmasi_ulang

SELECT * FROM table_all_pembelian

SELECT * FROM tb_rols_ongkir X
INNER JOIN tb_ongkir Y ON y.id_ongkir = x.id_ongkir 
INNER JOIN table_all_pembelian a ON a.id_pembelian = x.id_pembelian
GROUP BY id_rols_ongkir DESC

SELECT * FROM tb_rols_ongkir X
INNER JOIN tb_ongkir Y ON y.id_ongkir = x.id_ongkir 
INNER JOIN table_all_pembelian a ON a.id_pembelian = x.id_pembelian
INNER JOIN tb_konfirmasi b ON b.id_pembelian = x.id_pembelian
INNER JOIN tb_pengiriman c ON c.id_pembelian = x.id_pembelian
WHERE id_validasi = 'VAL001'
GROUP BY id_rols_ongkir DESC

SELECT id_pengiriman, x.id_pembelian, a.id_user, nama, id_product,harga_brg, a.jumlah, ongkos, (harga_brg *jumlah) + ongkos AS total
FROM tb_rols_ongkir X
INNER JOIN tb_ongkir Y ON y.id_ongkir = x.id_ongkir 
INNER JOIN table_all_pembelian a ON a.id_pembelian = x.id_pembelian
INNER JOIN tb_konfirmasi b ON b.id_pembelian = x.id_pembelian
INNER JOIN tb_pengiriman c ON c.id_pembelian = x.id_pembelian
WHERE id_validasi = 'VAL001'
GROUP BY id_rols_ongkir DESC

SELECT * FROM tb_konfirmasi
SELECT * FROM table_all_pembelian

SELECT * FROM tb_rols_product

SELECT * FROM tb_rols_product Y 
INNER JOIN tb_product z ON z.id_product = y.id_product 
INNER JOIN tb_kategori a ON a.id_kategori = y.id_kategori
GROUP BY y.id_product DESC

SELECT * FROM tb_keranjang

SELECT y.id_warna FROM tb_rols_product Y 
INNER JOIN tb_product z ON z.id_product = y.id_product 
INNER JOIN tb_warna a ON a.id_warna = y.id_warna INNER JOIN tb_ukuran b ON b.id_ukuran = y.id_ukuran 
WHERE y.id_product = 'PROD0000008' GROUP BY y.id_warna AND y.id_kategori = 'KT03'

SELECT * FROM tb_product

SELECT * FROM tb_rols_product

SELECT id_pengiriman, a.id_pembelian, a.id_user, nama, SUM(harga_brg * jumlah) AS penjualan, ongkos, SUM(harga_brg * jumlah) + ongkos AS total,
c.tgl_pembelian, c.tgl_konfirmasi, c.tgl_pengiriman
FROM table_ongkir X
INNER JOIN table_all_pembelian a ON a.id_pembelian = x.id_pembelian
INNER JOIN tb_konfirmasi b ON b.id_pembelian = a.id_pembelian
INNER JOIN tb_pengiriman c ON c.id_pembelian = a.id_pembelian
WHERE id_validasi = 'VAL001'
GROUP BY a.id_pembelian DESC

SELECT * FROM tb_rols_ongkir

SELECT DISTINCT id_pengiriman , x.id_pembelian, SUM(jumlah)
FROM table_all_pembelian X
INNER JOIN tb_konfirmasi Y ON y.id_pembelian = x.id_pembelian
INNER JOIN tb_pengiriman a ON a.id_pembelian = x.id_pembelian
INNER JOIN table_ongkir b ON b.id_pembelian = x.id_pembelian
GROUP BY id_pengiriman

SELECT x.id_ongkir, id_pembelian, kota, ongkos FROM tb_rols_ongkir X
INNER JOIN tb_ongkir Y ON y.id_ongkir = x.id_ongkir
GROUP BY id_pembelian ASC

SELECT * FROM tb_rols_ongkir
SELECT * FROM tb_pembelian
SELECT * FROM tb_konfirmasi
SELECT * FROM tb_pengiriman X
INNER JOIN tb_rols_ongkir Y ON y.id_pembelian = x.id_pembelian
INNER JOIN table_all_pembelian a ON a.id_pembelian = x.id_pembelian
GROUP BY a.id_pembelian ASC

SELECT * FROM table_ongkir

SELECT * FROM tb_barang

SELECT * FROM tb_transaksi_penjualan
SELECT * FROM tb_penjualan
SELECT * FROM tb_return
SELECT * FROM tb_user
SELECT * FROM tb_jabatan
SELECT * FROM tb_roles
SELECT * FROM tb_jenis_kelamin

SELECT id_transaksi, id_barang, jumlah_barang, harga, jumlah_barang * harga AS sub FROM tb_penjualan

SELECT COUNT(*) AS us FROM tb_user

SELECT COUNT(*) AS penjualan FROM tb_penjualan

SELECT COUNT(*) AS trx FROM tb_transaksi_penjualan

SELECT COUNT(*) AS retur FROM tb_return

SELECT id_penjualan, id_barang, id_user, nama_barang, jumlah_barang, harga, jumlah_barang * harga AS sub FROM tb_transaksi_penjualan

SELECT id_return, id_transaksi, x.id_barang, x.id_user, nama_barang, jumlah_brg_return, harga_jual, jumlah_brg_return * harga_jual AS sub
FROM tb_return X
INNER JOIN tb_barang Y ON y.id_barang = x.id_barang