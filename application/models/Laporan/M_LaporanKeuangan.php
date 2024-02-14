<?php

class M_LaporanKeuangan extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		// $this->db = $this->load->database('d4',true);
	}

	public function Get_laporan_keuangan_by_filter($tahun)
	{
		$query = $this->db->query("SELECT
									CASE WHEN keterangan IN ('PENJUALAN PPH','PEMBELIAN PPH') THEN 'BAGI HASIL' WHEN keterangan IN ('PENJUALAN PPN','PEMBELIAN PPN') THEN 'MASA PPN TERBAYAR' ELSE keterangan END keterangan,
									SUM(CASE WHEN bulan = '1' THEN jumlah ELSE 0 END) AS laporan_1,
									SUM(CASE WHEN bulan = '2' THEN jumlah ELSE 0 END) AS laporan_2,
									SUM(CASE WHEN bulan = '3' THEN jumlah ELSE 0 END) AS laporan_3,
									SUM(CASE WHEN bulan = '4' THEN jumlah ELSE 0 END) AS laporan_4,
									SUM(CASE WHEN bulan = '5' THEN jumlah ELSE 0 END) AS laporan_5,
									SUM(CASE WHEN bulan = '6' THEN jumlah ELSE 0 END) AS laporan_6,
									SUM(CASE WHEN bulan = '7' THEN jumlah ELSE 0 END) AS laporan_7,
									SUM(CASE WHEN bulan = '8' THEN jumlah ELSE 0 END) AS laporan_8,
									SUM(CASE WHEN bulan = '9' THEN jumlah ELSE 0 END) AS laporan_9,
									SUM(CASE WHEN bulan = '10' THEN jumlah ELSE 0 END) AS laporan_10,
									SUM(CASE WHEN bulan = '11' THEN jumlah ELSE 0 END) AS laporan_11,
									SUM(CASE WHEN bulan = '12' THEN jumlah ELSE 0 END) AS laporan_12,
									SUM(jumlah) AS laporan_total
								FROM (SELECT 1 AS no_urut,
											'NOMINAL PO' AS keterangan,
									MONTH(p.penjualan_tanggal) AS bulan,
									YEAR(p.penjualan_tanggal) AS tahun,
									SUM(pd.penjualan_total) AS jumlah
								FROM penjualan p
								LEFT JOIN penjualan_detail pd
									ON pd.penjualan_id = p.penjualan_id
								WHERE YEAR(p.penjualan_tanggal) = '$tahun'
								AND p.penjualan_status = 'Applied'
								GROUP BY MONTH(p.penjualan_tanggal),
										YEAR(p.penjualan_tanggal)
								UNION ALL
								SELECT 2 AS no_urut,
											'PEMBELIAN' AS keterangan,
									MONTH(p.pembelian_tanggal) AS bulan,
									YEAR(p.pembelian_tanggal) AS tahun,
									SUM(pd.pembelian_total) AS jumlah
								FROM pembelian p
								LEFT JOIN pembelian_detail pd
									ON pd.pembelian_id = p.pembelian_id
								WHERE YEAR(p.pembelian_tanggal) = '$tahun'
								AND p.pembelian_status = 'Applied'
								GROUP BY MONTH(p.pembelian_tanggal),
										YEAR(p.pembelian_tanggal)
								UNION ALL
								SELECT 3 AS no_urut, 
											'KARYAWAN' AS keterangan,
									MONTH(tanggal_pembayaran) AS bulan,
									YEAR(tanggal_pembayaran) AS tahun,
									SUM(jumlah) AS jumlah
								FROM komisi
								WHERE YEAR(tanggal_pembayaran) = '$tahun'
								AND komisi_status = 'Applied'
								GROUP BY MONTH(tanggal_pembayaran),
										YEAR(tanggal_pembayaran)
								UNION ALL
								SELECT 4 AS no_urut,
											'PENJUALAN PPH' AS keterangan,
									MONTH(p.penjualan_tanggal) AS bulan,
									YEAR(p.penjualan_tanggal) AS tahun,
									SUM(CASE WHEN is_pph = '1' THEN ROUND(pd.penjualan_total*2/100, 0) ELSE 0 END) AS jumlah
								FROM penjualan p
								LEFT JOIN penjualan_detail pd
									ON pd.penjualan_id = p.penjualan_id
								WHERE YEAR(p.penjualan_tanggal) = '$tahun'
								AND p.penjualan_status = 'Applied'
								GROUP BY MONTH(p.penjualan_tanggal),
										YEAR(p.penjualan_tanggal)
								UNION ALL
								SELECT 5 AS no_urut, 
											'PEMBELIAN PPH' AS keterangan,
									MONTH(p.pembelian_tanggal) AS bulan,
									YEAR(p.pembelian_tanggal) AS tahun,
									-1 * SUM(CASE WHEN is_pph = '1' THEN ROUND(pd.pembelian_total*2/100, 0) ELSE 0 END) AS jumlah
								FROM pembelian p
								LEFT JOIN pembelian_detail pd
									ON pd.pembelian_id = p.pembelian_id
								WHERE YEAR(p.pembelian_tanggal) = '$tahun'
								AND p.pembelian_status = 'Applied'
								GROUP BY MONTH(p.pembelian_tanggal),
										YEAR(p.pembelian_tanggal)
								UNION ALL
								SELECT 6 AS no_urut, 
											'PENJUALAN PPN' AS keterangan,
									MONTH(p.penjualan_tanggal) AS bulan,
									YEAR(p.penjualan_tanggal) AS tahun,
									SUM(CASE WHEN is_ppn = '1' THEN ROUND(pd.penjualan_total*11/100, 0) ELSE 0 END) AS jumlah
								FROM penjualan p
								LEFT JOIN penjualan_detail pd
									ON pd.penjualan_id = p.penjualan_id
								WHERE YEAR(p.penjualan_tanggal) = '$tahun'
								AND p.penjualan_status = 'Applied'
								GROUP BY MONTH(p.penjualan_tanggal),
										YEAR(p.penjualan_tanggal)
								UNION ALL
								SELECT 7 AS no_urut, 
											'PEMBELIAN PPN' AS keterangan,
									MONTH(p.pembelian_tanggal) AS bulan,
									YEAR(p.pembelian_tanggal) AS tahun,
									-1 * SUM(CASE WHEN is_ppn = '1' THEN ROUND(pd.pembelian_total*11/100, 0) ELSE 0 END) AS jumlah
								FROM pembelian p
								LEFT JOIN pembelian_detail pd
									ON pd.pembelian_id = p.pembelian_id
								WHERE YEAR(p.pembelian_tanggal) = '$tahun'
								AND p.pembelian_status = 'Applied'
								GROUP BY MONTH(p.pembelian_tanggal),
										YEAR(p.pembelian_tanggal)) laporan
								WHERE keterangan IN ('NOMINAL PO','KARYAWAN','PENJUALAN PPH','PEMBELIAN PPH','PENJUALAN PPN','PEMBELIAN PPN')
								GROUP BY CASE WHEN keterangan IN ('PENJUALAN PPH','PEMBELIAN PPH') THEN 'BAGI HASIL' WHEN keterangan IN ('PENJUALAN PPN','PEMBELIAN PPN') THEN 'MASA PPN TERBAYAR' ELSE keterangan END
								ORDER BY no_urut ASC");

		if ($query->num_rows() == 0) {
			$query = array();
		} else {
			$query = $query->result_array();
		}

		return $query;
	}
}
