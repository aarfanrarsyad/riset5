<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Prov_kab extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id_provinsi' => 11,
				'nama_provinsi' => 'Aceh',
			],
			[
				'id_provinsi' => 12,
				'nama_provinsi' => 'Sumatera Utara',
			],
			[
				'id_provinsi' => 13,
				'nama_provinsi' => 'Sumatera Barat',
			],
			[
				'id_provinsi' => 14,
				'nama_provinsi' => 'Riau',
			],
			[
				'id_provinsi' => 15,
				'nama_provinsi' => 'Jambi',
			],
			[
				'id_provinsi' => 16,
				'nama_provinsi' => 'Sumatera Selatan',
			],
			[
				'id_provinsi' => 17,
				'nama_provinsi' => 'Bengkulu',
			],
			[
				'id_provinsi' => 18,
				'nama_provinsi' => 'Lampung',
			],
			[
				'id_provinsi' => 19,
				'nama_provinsi' => 'Kepulauan Bangka Belitung',
			],
			[
				'id_provinsi' => 21,
				'nama_provinsi' => 'Kepulauan Riau',
			],
			[
				'id_provinsi' => 31,
				'nama_provinsi' => 'Dki Jakarta',
			],
			[
				'id_provinsi' => 32,
				'nama_provinsi' => 'Jawa Barat',
			],
			[
				'id_provinsi' => 33,
				'nama_provinsi' => 'Jawa Tengah',
			],
			[
				'id_provinsi' => 34,
				'nama_provinsi' => 'Di Yogyakarta',
			],
			[
				'id_provinsi' => 35,
				'nama_provinsi' => 'Jawa Timur',
			],
			[
				'id_provinsi' => 36,
				'nama_provinsi' => 'Banten',
			],
			[
				'id_provinsi' => 51,
				'nama_provinsi' => 'Bali',
			],
			[
				'id_provinsi' => 52,
				'nama_provinsi' => 'Nusa Tenggara Barat',
			],
			[
				'id_provinsi' => 53,
				'nama_provinsi' => 'Nusa Tenggara Timur',
			],
			[
				'id_provinsi' => 61,
				'nama_provinsi' => 'Kalimantan Barat',
			],
			[
				'id_provinsi' => 62,
				'nama_provinsi' => 'Kalimantan Tengah',
			],
			[
				'id_provinsi' => 63,
				'nama_provinsi' => 'Kalimantan Selatan',
			],
			[
				'id_provinsi' => 64,
				'nama_provinsi' => 'Kalimantan Timur',
			],
			[
				'id_provinsi' => 65,
				'nama_provinsi' => 'Kalimantan Utara',
			],
			[
				'id_provinsi' => 71,
				'nama_provinsi' => 'Sulawesi Utara',
			],
			[
				'id_provinsi' => 72,
				'nama_provinsi' => 'Sulawesi Tengah',
			],
			[
				'id_provinsi' => 73,
				'nama_provinsi' => 'Sulawesi Selatan',
			],
			[
				'id_provinsi' => 74,
				'nama_provinsi' => 'Sulawesi Tenggara',
			],
			[
				'id_provinsi' => 75,
				'nama_provinsi' => 'Gorontalo',
			],
			[
				'id_provinsi' => 76,
				'nama_provinsi' => 'Sulawesi Barat',
			],
			[
				'id_provinsi' => 81,
				'nama_provinsi' => 'Maluku',
			],
			[
				'id_provinsi' => 82,
				'nama_provinsi' => 'Maluku Utara',
			],
			[
				'id_provinsi' => 91,
				'nama_provinsi' => 'Papua Barat',
			],
			[
				'id_provinsi' => 94,
				'nama_provinsi' => 'Papua',
			],
		];
		$this->db->table('provinsi')->insertBatch($data);

		$data = [
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1101,
				'nama_kabkota' => 'Kabupaten Simeulue',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1102,
				'nama_kabkota' => 'Kabupaten Aceh Singkil',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1103,
				'nama_kabkota' => 'Kabupaten Aceh Selatan',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1104,
				'nama_kabkota' => 'Kabupaten Aceh Tenggara',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1105,
				'nama_kabkota' => 'Kabupaten Aceh Timur',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1106,
				'nama_kabkota' => 'Kabupaten Aceh Tengah',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1107,
				'nama_kabkota' => 'Kabupaten Aceh Barat',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1108,
				'nama_kabkota' => 'Kabupaten Aceh Besar',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1109,
				'nama_kabkota' => 'Kabupaten Pidie',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1110,
				'nama_kabkota' => 'Kabupaten Bireuen',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1111,
				'nama_kabkota' => 'Kabupaten Aceh Utara',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1112,
				'nama_kabkota' => 'Kabupaten Aceh Barat Daya',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1113,
				'nama_kabkota' => 'Kabupaten Gayo Lues',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1114,
				'nama_kabkota' => 'Kabupaten Aceh Tamiang',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1115,
				'nama_kabkota' => 'Kabupaten Nagan Raya',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1116,
				'nama_kabkota' => 'Kabupaten Aceh Jaya',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1117,
				'nama_kabkota' => 'Kabupaten Bener Meriah',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1118,
				'nama_kabkota' => 'Kabupaten Pidie Jaya',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1171,
				'nama_kabkota' => 'Kota Banda Aceh',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1172,
				'nama_kabkota' => 'Kota Sabang',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1173,
				'nama_kabkota' => 'Kota Langsa',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1174,
				'nama_kabkota' => 'Kota Lhokseumawe',
			],
			[
				'id_provinsi' => 11,
				'id_kabkota' => 1175,
				'nama_kabkota' => 'Kota Subulussalam',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1201,
				'nama_kabkota' => 'Kabupaten Nias',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1202,
				'nama_kabkota' => 'Kabupaten Mandailing Natal',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1203,
				'nama_kabkota' => 'Kabupaten Tapanuli Selatan',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1204,
				'nama_kabkota' => 'Kabupaten Tapanuli Tengah',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1205,
				'nama_kabkota' => 'Kabupaten Tapanuli Utara',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1206,
				'nama_kabkota' => 'Kabupaten Toba Samosir',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1207,
				'nama_kabkota' => 'Kabupaten Labuhan Batu',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1208,
				'nama_kabkota' => 'Kabupaten Asahan',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1209,
				'nama_kabkota' => 'Kabupaten Simalungun',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1210,
				'nama_kabkota' => 'Kabupaten Dairi',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1211,
				'nama_kabkota' => 'Kabupaten Karo',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1212,
				'nama_kabkota' => 'Kabupaten Deli Serdang',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1213,
				'nama_kabkota' => 'Kabupaten Langkat',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1214,
				'nama_kabkota' => 'Kabupaten Nias Selatan',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1215,
				'nama_kabkota' => 'Kabupaten Humbang Hasundutan',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1216,
				'nama_kabkota' => 'Kabupaten Pakpak Bharat',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1217,
				'nama_kabkota' => 'Kabupaten Samosir',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1218,
				'nama_kabkota' => 'Kabupaten Serdang Bedagai',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1219,
				'nama_kabkota' => 'Kabupaten Batu Bara',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1220,
				'nama_kabkota' => 'Kabupaten Padang Lawas Utara',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1221,
				'nama_kabkota' => 'Kabupaten Padang Lawas',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1222,
				'nama_kabkota' => 'Kabupaten Labuhan Batu Selatan',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1223,
				'nama_kabkota' => 'Kabupaten Labuhan Batu Utara',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1224,
				'nama_kabkota' => 'Kabupaten Nias Utara',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1225,
				'nama_kabkota' => 'Kabupaten Nias Barat',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1271,
				'nama_kabkota' => 'Kota Sibolga',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1272,
				'nama_kabkota' => 'Kota Tanjung Balai',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1273,
				'nama_kabkota' => 'Kota Pematang Siantar',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1274,
				'nama_kabkota' => 'Kota Tebing Tinggi',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1275,
				'nama_kabkota' => 'Kota Medan',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1276,
				'nama_kabkota' => 'Kota Binjai',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1277,
				'nama_kabkota' => 'Kota Padangsidimpuan',
			],
			[
				'id_provinsi' => 12,
				'id_kabkota' => 1278,
				'nama_kabkota' => 'Kota Gunungsitoli',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1301,
				'nama_kabkota' => 'Kabupaten Kepulauan Mentawai',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1302,
				'nama_kabkota' => 'Kabupaten Pesisir Selatan',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1303,
				'nama_kabkota' => 'Kabupaten Solok',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1304,
				'nama_kabkota' => 'Kabupaten Sijunjung',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1305,
				'nama_kabkota' => 'Kabupaten Tanah Datar',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1306,
				'nama_kabkota' => 'Kabupaten Padang Pariaman',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1307,
				'nama_kabkota' => 'Kabupaten Agam',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1308,
				'nama_kabkota' => 'Kabupaten Lima Puluh Kota',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1309,
				'nama_kabkota' => 'Kabupaten Pasaman',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1310,
				'nama_kabkota' => 'Kabupaten Solok Selatan',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1311,
				'nama_kabkota' => 'Kabupaten Dharmasraya',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1312,
				'nama_kabkota' => 'Kabupaten Pasaman Barat',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1371,
				'nama_kabkota' => 'Kota Padang',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1372,
				'nama_kabkota' => 'Kota Solok',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1373,
				'nama_kabkota' => 'Kota Sawah Lunto',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1374,
				'nama_kabkota' => 'Kota Padang Panjang',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1375,
				'nama_kabkota' => 'Kota Bukittinggi',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1376,
				'nama_kabkota' => 'Kota Payakumbuh',
			],
			[
				'id_provinsi' => 13,
				'id_kabkota' => 1377,
				'nama_kabkota' => 'Kota Pariaman',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1401,
				'nama_kabkota' => 'Kabupaten Kuantan Singingi',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1402,
				'nama_kabkota' => 'Kabupaten Indragiri Hulu',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1403,
				'nama_kabkota' => 'Kabupaten Indragiri Hilir',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1404,
				'nama_kabkota' => 'Kabupaten Pelalawan',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1405,
				'nama_kabkota' => 'Kabupaten S I A K',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1406,
				'nama_kabkota' => 'Kabupaten Kampar',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1407,
				'nama_kabkota' => 'Kabupaten Rokan Hulu',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1408,
				'nama_kabkota' => 'Kabupaten Bengkalis',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1409,
				'nama_kabkota' => 'Kabupaten Rokan Hilir',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1410,
				'nama_kabkota' => 'Kabupaten Kepulauan Meranti',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1471,
				'nama_kabkota' => 'Kota Pekanbaru',
			],
			[
				'id_provinsi' => 14,
				'id_kabkota' => 1473,
				'nama_kabkota' => 'Kota D U M A I',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1501,
				'nama_kabkota' => 'Kabupaten Kerinci',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1502,
				'nama_kabkota' => 'Kabupaten Merangin',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1503,
				'nama_kabkota' => 'Kabupaten Sarolangun',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1504,
				'nama_kabkota' => 'Kabupaten Batang Hari',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1505,
				'nama_kabkota' => 'Kabupaten Muaro Jambi',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1506,
				'nama_kabkota' => 'Kabupaten Tanjung Jabung Timur',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1507,
				'nama_kabkota' => 'Kabupaten Tanjung Jabung Barat',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1508,
				'nama_kabkota' => 'Kabupaten Tebo',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1509,
				'nama_kabkota' => 'Kabupaten Bungo',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1571,
				'nama_kabkota' => 'Kota Jambi',
			],
			[
				'id_provinsi' => 15,
				'id_kabkota' => 1572,
				'nama_kabkota' => 'Kota Sungai Penuh',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1601,
				'nama_kabkota' => 'Kabupaten Ogan Komering Ulu',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1602,
				'nama_kabkota' => 'Kabupaten Ogan Komering Ilir',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1603,
				'nama_kabkota' => 'Kabupaten Muara Enim',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1604,
				'nama_kabkota' => 'Kabupaten Lahat',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1605,
				'nama_kabkota' => 'Kabupaten Musi Rawas',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1606,
				'nama_kabkota' => 'Kabupaten Musi Banyuasin',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1607,
				'nama_kabkota' => 'Kabupaten Banyu Asin',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1608,
				'nama_kabkota' => 'Kabupaten Ogan Komering Ulu Selatan',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1609,
				'nama_kabkota' => 'Kabupaten Ogan Komering Ulu Timur',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1610,
				'nama_kabkota' => 'Kabupaten Ogan Ilir',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1611,
				'nama_kabkota' => 'Kabupaten Empat Lawang',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1612,
				'nama_kabkota' => 'Kabupaten Penukal Abab Lematang Ilir',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1613,
				'nama_kabkota' => 'Kabupaten Musi Rawas Utara',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1671,
				'nama_kabkota' => 'Kota Palembang',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1672,
				'nama_kabkota' => 'Kota Prabumulih',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1673,
				'nama_kabkota' => 'Kota Pagar Alam',
			],
			[
				'id_provinsi' => 16,
				'id_kabkota' => 1674,
				'nama_kabkota' => 'Kota Lubuklinggau',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1701,
				'nama_kabkota' => 'Kabupaten Bengkulu Selatan',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1702,
				'nama_kabkota' => 'Kabupaten Rejang Lebong',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1703,
				'nama_kabkota' => 'Kabupaten Bengkulu Utara',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1704,
				'nama_kabkota' => 'Kabupaten Kaur',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1705,
				'nama_kabkota' => 'Kabupaten Seluma',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1706,
				'nama_kabkota' => 'Kabupaten Mukomuko',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1707,
				'nama_kabkota' => 'Kabupaten Lebong',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1708,
				'nama_kabkota' => 'Kabupaten Kepahiang',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1709,
				'nama_kabkota' => 'Kabupaten Bengkulu Tengah',
			],
			[
				'id_provinsi' => 17,
				'id_kabkota' => 1771,
				'nama_kabkota' => 'Kota Bengkulu',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1801,
				'nama_kabkota' => 'Kabupaten Lampung Barat',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1802,
				'nama_kabkota' => 'Kabupaten Tanggamus',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1803,
				'nama_kabkota' => 'Kabupaten Lampung Selatan',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1804,
				'nama_kabkota' => 'Kabupaten Lampung Timur',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1805,
				'nama_kabkota' => 'Kabupaten Lampung Tengah',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1806,
				'nama_kabkota' => 'Kabupaten Lampung Utara',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1807,
				'nama_kabkota' => 'Kabupaten Way Kanan',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1808,
				'nama_kabkota' => 'Kabupaten Tulangbawang',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1809,
				'nama_kabkota' => 'Kabupaten Pesawaran',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1810,
				'nama_kabkota' => 'Kabupaten Pringsewu',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1811,
				'nama_kabkota' => 'Kabupaten Mesuji',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1812,
				'nama_kabkota' => 'Kabupaten Tulang Bawang Barat',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1813,
				'nama_kabkota' => 'Kabupaten Pesisir Barat',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1871,
				'nama_kabkota' => 'Kota Bandar Lampung',
			],
			[
				'id_provinsi' => 18,
				'id_kabkota' => 1872,
				'nama_kabkota' => 'Kota Metro',
			],
			[
				'id_provinsi' => 19,
				'id_kabkota' => 1901,
				'nama_kabkota' => 'Kabupaten Bangka',
			],
			[
				'id_provinsi' => 19,
				'id_kabkota' => 1902,
				'nama_kabkota' => 'Kabupaten Belitung',
			],
			[
				'id_provinsi' => 19,
				'id_kabkota' => 1903,
				'nama_kabkota' => 'Kabupaten Bangka Barat',
			],
			[
				'id_provinsi' => 19,
				'id_kabkota' => 1904,
				'nama_kabkota' => 'Kabupaten Bangka Tengah',
			],
			[
				'id_provinsi' => 19,
				'id_kabkota' => 1905,
				'nama_kabkota' => 'Kabupaten Bangka Selatan',
			],
			[
				'id_provinsi' => 19,
				'id_kabkota' => 1906,
				'nama_kabkota' => 'Kabupaten Belitung Timur',
			],
			[
				'id_provinsi' => 19,
				'id_kabkota' => 1971,
				'nama_kabkota' => 'Kota Pangkal Pinang',
			],
			[
				'id_provinsi' => 21,
				'id_kabkota' => 2101,
				'nama_kabkota' => 'Kabupaten Karimun',
			],
			[
				'id_provinsi' => 21,
				'id_kabkota' => 2102,
				'nama_kabkota' => 'Kabupaten Bintan',
			],
			[
				'id_provinsi' => 21,
				'id_kabkota' => 2103,
				'nama_kabkota' => 'Kabupaten Natuna',
			],
			[
				'id_provinsi' => 21,
				'id_kabkota' => 2104,
				'nama_kabkota' => 'Kabupaten Lingga',
			],
			[
				'id_provinsi' => 21,
				'id_kabkota' => 2105,
				'nama_kabkota' => 'Kabupaten Kepulauan Anambas',
			],
			[
				'id_provinsi' => 21,
				'id_kabkota' => 2171,
				'nama_kabkota' => 'Kota B A T A M',
			],
			[
				'id_provinsi' => 21,
				'id_kabkota' => 2172,
				'nama_kabkota' => 'Kota Tanjung Pinang',
			],
			[
				'id_provinsi' => 31,
				'id_kabkota' => 3101,
				'nama_kabkota' => 'Kabupaten Kepulauan Seribu',
			],
			[
				'id_provinsi' => 31,
				'id_kabkota' => 3171,
				'nama_kabkota' => 'Kota Jakarta Selatan',
			],
			[
				'id_provinsi' => 31,
				'id_kabkota' => 3172,
				'nama_kabkota' => 'Kota Jakarta Timur',
			],
			[
				'id_provinsi' => 31,
				'id_kabkota' => 3173,
				'nama_kabkota' => 'Kota Jakarta Pusat',
			],
			[
				'id_provinsi' => 31,
				'id_kabkota' => 3174,
				'nama_kabkota' => 'Kota Jakarta Barat',
			],
			[
				'id_provinsi' => 31,
				'id_kabkota' => 3175,
				'nama_kabkota' => 'Kota Jakarta Utara',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3201,
				'nama_kabkota' => 'Kabupaten Bogor',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3202,
				'nama_kabkota' => 'Kabupaten Sukabumi',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3203,
				'nama_kabkota' => 'Kabupaten Cianjur',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3204,
				'nama_kabkota' => 'Kabupaten Bandung',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3205,
				'nama_kabkota' => 'Kabupaten Garut',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3206,
				'nama_kabkota' => 'Kabupaten Tasikmalaya',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3207,
				'nama_kabkota' => 'Kabupaten Ciamis',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3208,
				'nama_kabkota' => 'Kabupaten Kuningan',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3209,
				'nama_kabkota' => 'Kabupaten Cirebon',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3210,
				'nama_kabkota' => 'Kabupaten Majalengka',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3211,
				'nama_kabkota' => 'Kabupaten Sumedang',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3212,
				'nama_kabkota' => 'Kabupaten Indramayu',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3213,
				'nama_kabkota' => 'Kabupaten Subang',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3214,
				'nama_kabkota' => 'Kabupaten Purwakarta',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3215,
				'nama_kabkota' => 'Kabupaten Karawang',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3216,
				'nama_kabkota' => 'Kabupaten Bekasi',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3217,
				'nama_kabkota' => 'Kabupaten Bandung Barat',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3218,
				'nama_kabkota' => 'Kabupaten Pangandaran',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3271,
				'nama_kabkota' => 'Kota Bogor',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3272,
				'nama_kabkota' => 'Kota Sukabumi',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3273,
				'nama_kabkota' => 'Kota Bandung',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3274,
				'nama_kabkota' => 'Kota Cirebon',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3275,
				'nama_kabkota' => 'Kota Bekasi',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3276,
				'nama_kabkota' => 'Kota Depok',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3277,
				'nama_kabkota' => 'Kota Cimahi',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3278,
				'nama_kabkota' => 'Kota Tasikmalaya',
			],
			[
				'id_provinsi' => 32,
				'id_kabkota' => 3279,
				'nama_kabkota' => 'Kota Banjar',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3301,
				'nama_kabkota' => 'Kabupaten Cilacap',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3302,
				'nama_kabkota' => 'Kabupaten Banyumas',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3303,
				'nama_kabkota' => 'Kabupaten Purbalingga',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3304,
				'nama_kabkota' => 'Kabupaten Banjarnegara',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3305,
				'nama_kabkota' => 'Kabupaten Kebumen',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3306,
				'nama_kabkota' => 'Kabupaten Purworejo',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3307,
				'nama_kabkota' => 'Kabupaten Wonosobo',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3308,
				'nama_kabkota' => 'Kabupaten Magelang',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3309,
				'nama_kabkota' => 'Kabupaten Boyolali',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3310,
				'nama_kabkota' => 'Kabupaten Klaten',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3311,
				'nama_kabkota' => 'Kabupaten Sukoharjo',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3312,
				'nama_kabkota' => 'Kabupaten Wonogiri',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3313,
				'nama_kabkota' => 'Kabupaten Karanganyar',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3314,
				'nama_kabkota' => 'Kabupaten Sragen',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3315,
				'nama_kabkota' => 'Kabupaten Grobogan',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3316,
				'nama_kabkota' => 'Kabupaten Blora',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3317,
				'nama_kabkota' => 'Kabupaten Rembang',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3318,
				'nama_kabkota' => 'Kabupaten Pati',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3319,
				'nama_kabkota' => 'Kabupaten Kudus',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3320,
				'nama_kabkota' => 'Kabupaten Jepara',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3321,
				'nama_kabkota' => 'Kabupaten Demak',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3322,
				'nama_kabkota' => 'Kabupaten Semarang',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3323,
				'nama_kabkota' => 'Kabupaten Temanggung',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3324,
				'nama_kabkota' => 'Kabupaten Kendal',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3325,
				'nama_kabkota' => 'Kabupaten Batang',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3326,
				'nama_kabkota' => 'Kabupaten Pekalongan',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3327,
				'nama_kabkota' => 'Kabupaten Pemalang',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3328,
				'nama_kabkota' => 'Kabupaten Tegal',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3329,
				'nama_kabkota' => 'Kabupaten Brebes',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3371,
				'nama_kabkota' => 'Kota Magelang',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3372,
				'nama_kabkota' => 'Kota Surakarta',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3373,
				'nama_kabkota' => 'Kota Salatiga',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3374,
				'nama_kabkota' => 'Kota Semarang',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3375,
				'nama_kabkota' => 'Kota Pekalongan',
			],
			[
				'id_provinsi' => 33,
				'id_kabkota' => 3376,
				'nama_kabkota' => 'Kota Tegal',
			],
			[
				'id_provinsi' => 34,
				'id_kabkota' => 3401,
				'nama_kabkota' => 'Kabupaten Kulon Progo',
			],
			[
				'id_provinsi' => 34,
				'id_kabkota' => 3402,
				'nama_kabkota' => 'Kabupaten Bantul',
			],
			[
				'id_provinsi' => 34,
				'id_kabkota' => 3403,
				'nama_kabkota' => 'Kabupaten Gunung Kidul',
			],
			[
				'id_provinsi' => 34,
				'id_kabkota' => 3404,
				'nama_kabkota' => 'Kabupaten Sleman',
			],
			[
				'id_provinsi' => 34,
				'id_kabkota' => 3471,
				'nama_kabkota' => 'Kota Yogyakarta',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3501,
				'nama_kabkota' => 'Kabupaten Pacitan',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3502,
				'nama_kabkota' => 'Kabupaten Ponorogo',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3503,
				'nama_kabkota' => 'Kabupaten Trenggalek',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3504,
				'nama_kabkota' => 'Kabupaten Tulungagung',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3505,
				'nama_kabkota' => 'Kabupaten Blitar',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3506,
				'nama_kabkota' => 'Kabupaten Kediri',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3507,
				'nama_kabkota' => 'Kabupaten Malang',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3508,
				'nama_kabkota' => 'Kabupaten Lumajang',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3509,
				'nama_kabkota' => 'Kabupaten Jember',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3510,
				'nama_kabkota' => 'Kabupaten Banyuwangi',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3511,
				'nama_kabkota' => 'Kabupaten Bondowoso',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3512,
				'nama_kabkota' => 'Kabupaten Situbondo',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3513,
				'nama_kabkota' => 'Kabupaten Probolinggo',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3514,
				'nama_kabkota' => 'Kabupaten Pasuruan',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3515,
				'nama_kabkota' => 'Kabupaten Sidoarjo',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3516,
				'nama_kabkota' => 'Kabupaten Mojokerto',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3517,
				'nama_kabkota' => 'Kabupaten Jombang',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3518,
				'nama_kabkota' => 'Kabupaten Nganjuk',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3519,
				'nama_kabkota' => 'Kabupaten Madiun',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3520,
				'nama_kabkota' => 'Kabupaten Magetan',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3521,
				'nama_kabkota' => 'Kabupaten Ngawi',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3522,
				'nama_kabkota' => 'Kabupaten Bojonegoro',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3523,
				'nama_kabkota' => 'Kabupaten Tuban',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3524,
				'nama_kabkota' => 'Kabupaten Lamongan',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3525,
				'nama_kabkota' => 'Kabupaten Gresik',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3526,
				'nama_kabkota' => 'Kabupaten Bangkalan',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3527,
				'nama_kabkota' => 'Kabupaten Sampang',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3528,
				'nama_kabkota' => 'Kabupaten Pamekasan',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3529,
				'nama_kabkota' => 'Kabupaten Sumenep',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3571,
				'nama_kabkota' => 'Kota Kediri',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3572,
				'nama_kabkota' => 'Kota Blitar',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3573,
				'nama_kabkota' => 'Kota Malang',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3574,
				'nama_kabkota' => 'Kota Probolinggo',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3575,
				'nama_kabkota' => 'Kota Pasuruan',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3576,
				'nama_kabkota' => 'Kota Mojokerto',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3577,
				'nama_kabkota' => 'Kota Madiun',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3578,
				'nama_kabkota' => 'Kota Surabaya',
			],
			[
				'id_provinsi' => 35,
				'id_kabkota' => 3579,
				'nama_kabkota' => 'Kota Batu',
			],
			[
				'id_provinsi' => 36,
				'id_kabkota' => 3601,
				'nama_kabkota' => 'Kabupaten Pandeglang',
			],
			[
				'id_provinsi' => 36,
				'id_kabkota' => 3602,
				'nama_kabkota' => 'Kabupaten Lebak',
			],
			[
				'id_provinsi' => 36,
				'id_kabkota' => 3603,
				'nama_kabkota' => 'Kabupaten Tangerang',
			],
			[
				'id_provinsi' => 36,
				'id_kabkota' => 3604,
				'nama_kabkota' => 'Kabupaten Serang',
			],
			[
				'id_provinsi' => 36,
				'id_kabkota' => 3671,
				'nama_kabkota' => 'Kota Tangerang',
			],
			[
				'id_provinsi' => 36,
				'id_kabkota' => 3672,
				'nama_kabkota' => 'Kota Cilegon',
			],
			[
				'id_provinsi' => 36,
				'id_kabkota' => 3673,
				'nama_kabkota' => 'Kota Serang',
			],
			[
				'id_provinsi' => 36,
				'id_kabkota' => 3674,
				'nama_kabkota' => 'Kota Tangerang Selatan',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5101,
				'nama_kabkota' => 'Kabupaten Jembrana',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5102,
				'nama_kabkota' => 'Kabupaten Tabanan',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5103,
				'nama_kabkota' => 'Kabupaten Badung',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5104,
				'nama_kabkota' => 'Kabupaten Gianyar',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5105,
				'nama_kabkota' => 'Kabupaten Klungkung',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5106,
				'nama_kabkota' => 'Kabupaten Bangli',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5107,
				'nama_kabkota' => 'Kabupaten Karang Asem',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5108,
				'nama_kabkota' => 'Kabupaten Buleleng',
			],
			[
				'id_provinsi' => 51,
				'id_kabkota' => 5171,
				'nama_kabkota' => 'Kota Denpasar',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5201,
				'nama_kabkota' => 'Kabupaten Lombok Barat',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5202,
				'nama_kabkota' => 'Kabupaten Lombok Tengah',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5203,
				'nama_kabkota' => 'Kabupaten Lombok Timur',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5204,
				'nama_kabkota' => 'Kabupaten Sumbawa',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5205,
				'nama_kabkota' => 'Kabupaten Dompu',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5206,
				'nama_kabkota' => 'Kabupaten Bima',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5207,
				'nama_kabkota' => 'Kabupaten Sumbawa Barat',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5208,
				'nama_kabkota' => 'Kabupaten Lombok Utara',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5271,
				'nama_kabkota' => 'Kota Mataram',
			],
			[
				'id_provinsi' => 52,
				'id_kabkota' => 5272,
				'nama_kabkota' => 'Kota Bima',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5301,
				'nama_kabkota' => 'Kabupaten Sumba Barat',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5302,
				'nama_kabkota' => 'Kabupaten Sumba Timur',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5303,
				'nama_kabkota' => 'Kabupaten Kupang',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5304,
				'nama_kabkota' => 'Kabupaten Timor Tengah Selatan',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5305,
				'nama_kabkota' => 'Kabupaten Timor Tengah Utara',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5306,
				'nama_kabkota' => 'Kabupaten Belu',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5307,
				'nama_kabkota' => 'Kabupaten Alor',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5308,
				'nama_kabkota' => 'Kabupaten Lembata',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5309,
				'nama_kabkota' => 'Kabupaten Flores Timur',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5310,
				'nama_kabkota' => 'Kabupaten Sikka',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5311,
				'nama_kabkota' => 'Kabupaten Ende',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5312,
				'nama_kabkota' => 'Kabupaten Ngada',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5313,
				'nama_kabkota' => 'Kabupaten Manggarai',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5314,
				'nama_kabkota' => 'Kabupaten Rote Ndao',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5315,
				'nama_kabkota' => 'Kabupaten Manggarai Barat',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5316,
				'nama_kabkota' => 'Kabupaten Sumba Tengah',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5317,
				'nama_kabkota' => 'Kabupaten Sumba Barat Daya',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5318,
				'nama_kabkota' => 'Kabupaten Nagekeo',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5319,
				'nama_kabkota' => 'Kabupaten Manggarai Timur',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5320,
				'nama_kabkota' => 'Kabupaten Sabu Raijua',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5321,
				'nama_kabkota' => 'Kabupaten Malaka',
			],
			[
				'id_provinsi' => 53,
				'id_kabkota' => 5371,
				'nama_kabkota' => 'Kota Kupang',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6101,
				'nama_kabkota' => 'Kabupaten Sambas',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6102,
				'nama_kabkota' => 'Kabupaten Bengkayang',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6103,
				'nama_kabkota' => 'Kabupaten Landak',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6104,
				'nama_kabkota' => 'Kabupaten Mempawah',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6105,
				'nama_kabkota' => 'Kabupaten Sanggau',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6106,
				'nama_kabkota' => 'Kabupaten Ketapang',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6107,
				'nama_kabkota' => 'Kabupaten Sintang',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6108,
				'nama_kabkota' => 'Kabupaten Kapuas Hulu',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6109,
				'nama_kabkota' => 'Kabupaten Sekadau',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6110,
				'nama_kabkota' => 'Kabupaten Melawi',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6111,
				'nama_kabkota' => 'Kabupaten Kayong Utara',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6112,
				'nama_kabkota' => 'Kabupaten Kubu Raya',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6171,
				'nama_kabkota' => 'Kota Pontianak',
			],
			[
				'id_provinsi' => 61,
				'id_kabkota' => 6172,
				'nama_kabkota' => 'Kota Singkawang',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6201,
				'nama_kabkota' => 'Kabupaten Kotawaringin Barat',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6202,
				'nama_kabkota' => 'Kabupaten Kotawaringin Timur',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6203,
				'nama_kabkota' => 'Kabupaten Kapuas',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6204,
				'nama_kabkota' => 'Kabupaten Barito Selatan',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6205,
				'nama_kabkota' => 'Kabupaten Barito Utara',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6206,
				'nama_kabkota' => 'Kabupaten Sukamara',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6207,
				'nama_kabkota' => 'Kabupaten Lamandau',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6208,
				'nama_kabkota' => 'Kabupaten Seruyan',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6209,
				'nama_kabkota' => 'Kabupaten Katingan',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6210,
				'nama_kabkota' => 'Kabupaten Pulang Pisau',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6211,
				'nama_kabkota' => 'Kabupaten Gunung Mas',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6212,
				'nama_kabkota' => 'Kabupaten Barito Timur',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6213,
				'nama_kabkota' => 'Kabupaten Murung Raya',
			],
			[
				'id_provinsi' => 62,
				'id_kabkota' => 6271,
				'nama_kabkota' => 'Kota Palangka Raya',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6301,
				'nama_kabkota' => 'Kabupaten Tanah Laut',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6302,
				'nama_kabkota' => 'Kabupaten Kota Baru',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6303,
				'nama_kabkota' => 'Kabupaten Banjar',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6304,
				'nama_kabkota' => 'Kabupaten Barito Kuala',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6305,
				'nama_kabkota' => 'Kabupaten Tapin',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6306,
				'nama_kabkota' => 'Kabupaten Hulu Sungai Selatan',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6307,
				'nama_kabkota' => 'Kabupaten Hulu Sungai Tengah',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6308,
				'nama_kabkota' => 'Kabupaten Hulu Sungai Utara',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6309,
				'nama_kabkota' => 'Kabupaten Tabalong',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6310,
				'nama_kabkota' => 'Kabupaten Tanah Bumbu',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6311,
				'nama_kabkota' => 'Kabupaten Balangan',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6371,
				'nama_kabkota' => 'Kota Banjarmasin',
			],
			[
				'id_provinsi' => 63,
				'id_kabkota' => 6372,
				'nama_kabkota' => 'Kota Banjar Baru',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6401,
				'nama_kabkota' => 'Kabupaten Paser',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6402,
				'nama_kabkota' => 'Kabupaten Kutai Barat',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6403,
				'nama_kabkota' => 'Kabupaten Kutai Kartanegara',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6404,
				'nama_kabkota' => 'Kabupaten Kutai Timur',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6405,
				'nama_kabkota' => 'Kabupaten Berau',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6409,
				'nama_kabkota' => 'Kabupaten Penajam Paser Utara',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6411,
				'nama_kabkota' => 'Kabupaten Mahakam Hulu',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6471,
				'nama_kabkota' => 'Kota Balikpapan',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6472,
				'nama_kabkota' => 'Kota Samarinda',
			],
			[
				'id_provinsi' => 64,
				'id_kabkota' => 6474,
				'nama_kabkota' => 'Kota Bontang',
			],
			[
				'id_provinsi' => 65,
				'id_kabkota' => 6501,
				'nama_kabkota' => 'Kabupaten Malinau',
			],
			[
				'id_provinsi' => 65,
				'id_kabkota' => 6502,
				'nama_kabkota' => 'Kabupaten Bulungan',
			],
			[
				'id_provinsi' => 65,
				'id_kabkota' => 6503,
				'nama_kabkota' => 'Kabupaten Tana Tidung',
			],
			[
				'id_provinsi' => 65,
				'id_kabkota' => 6504,
				'nama_kabkota' => 'Kabupaten Nunukan',
			],
			[
				'id_provinsi' => 65,
				'id_kabkota' => 6571,
				'nama_kabkota' => 'Kota Tarakan',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7101,
				'nama_kabkota' => 'Kabupaten Bolaang Mongondow',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7102,
				'nama_kabkota' => 'Kabupaten Minahasa',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7103,
				'nama_kabkota' => 'Kabupaten Kepulauan Sangihe',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7104,
				'nama_kabkota' => 'Kabupaten Kepulauan Talaud',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7105,
				'nama_kabkota' => 'Kabupaten Minahasa Selatan',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7106,
				'nama_kabkota' => 'Kabupaten Minahasa Utara',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7107,
				'nama_kabkota' => 'Kabupaten Bolaang Mongondow Utara',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7108,
				'nama_kabkota' => 'Kabupaten Siau Tagulandang Biaro',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7109,
				'nama_kabkota' => 'Kabupaten Minahasa Tenggara',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7110,
				'nama_kabkota' => 'Kabupaten Bolaang Mongondow Selatan',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7111,
				'nama_kabkota' => 'Kabupaten Bolaang Mongondow Timur',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7171,
				'nama_kabkota' => 'Kota Manado',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7172,
				'nama_kabkota' => 'Kota Bitung',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7173,
				'nama_kabkota' => 'Kota Tomohon',
			],
			[
				'id_provinsi' => 71,
				'id_kabkota' => 7174,
				'nama_kabkota' => 'Kota Kotamobagu',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7201,
				'nama_kabkota' => 'Kabupaten Banggai Kepulauan',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7202,
				'nama_kabkota' => 'Kabupaten Banggai',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7203,
				'nama_kabkota' => 'Kabupaten Morowali',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7204,
				'nama_kabkota' => 'Kabupaten Poso',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7205,
				'nama_kabkota' => 'Kabupaten Donggala',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7206,
				'nama_kabkota' => 'Kabupaten Toli-toli',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7207,
				'nama_kabkota' => 'Kabupaten Buol',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7208,
				'nama_kabkota' => 'Kabupaten Parigi Moutong',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7209,
				'nama_kabkota' => 'Kabupaten Tojo Una-una',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7210,
				'nama_kabkota' => 'Kabupaten Sigi',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7211,
				'nama_kabkota' => 'Kabupaten Banggai Laut',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7212,
				'nama_kabkota' => 'Kabupaten Morowali Utara',
			],
			[
				'id_provinsi' => 72,
				'id_kabkota' => 7271,
				'nama_kabkota' => 'Kota Palu',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7301,
				'nama_kabkota' => 'Kabupaten Kepulauan Selayar',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7302,
				'nama_kabkota' => 'Kabupaten Bulukumba',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7303,
				'nama_kabkota' => 'Kabupaten Bantaeng',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7304,
				'nama_kabkota' => 'Kabupaten Jeneponto',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7305,
				'nama_kabkota' => 'Kabupaten Takalar',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7306,
				'nama_kabkota' => 'Kabupaten Gowa',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7307,
				'nama_kabkota' => 'Kabupaten Sinjai',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7308,
				'nama_kabkota' => 'Kabupaten Maros',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7309,
				'nama_kabkota' => 'Kabupaten Pangkajene Dan Kepulauan',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7310,
				'nama_kabkota' => 'Kabupaten Barru',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7311,
				'nama_kabkota' => 'Kabupaten Bone',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7312,
				'nama_kabkota' => 'Kabupaten Soppeng',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7313,
				'nama_kabkota' => 'Kabupaten Wajo',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7314,
				'nama_kabkota' => 'Kabupaten Sidenreng Rappang',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7315,
				'nama_kabkota' => 'Kabupaten Pinrang',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7316,
				'nama_kabkota' => 'Kabupaten Enrekang',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7317,
				'nama_kabkota' => 'Kabupaten Luwu',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7318,
				'nama_kabkota' => 'Kabupaten Tana Toraja',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7322,
				'nama_kabkota' => 'Kabupaten Luwu Utara',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7325,
				'nama_kabkota' => 'Kabupaten Luwu Timur',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7326,
				'nama_kabkota' => 'Kabupaten Toraja Utara',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7371,
				'nama_kabkota' => 'Kota Makassar',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7372,
				'nama_kabkota' => 'Kota Parepare',
			],
			[
				'id_provinsi' => 73,
				'id_kabkota' => 7373,
				'nama_kabkota' => 'Kota Palopo',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7401,
				'nama_kabkota' => 'Kabupaten Buton',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7402,
				'nama_kabkota' => 'Kabupaten Muna',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7403,
				'nama_kabkota' => 'Kabupaten Konawe',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7404,
				'nama_kabkota' => 'Kabupaten Kolaka',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7405,
				'nama_kabkota' => 'Kabupaten Konawe Selatan',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7406,
				'nama_kabkota' => 'Kabupaten Bombana',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7407,
				'nama_kabkota' => 'Kabupaten Wakatobi',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7408,
				'nama_kabkota' => 'Kabupaten Kolaka Utara',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7409,
				'nama_kabkota' => 'Kabupaten Buton Utara',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7410,
				'nama_kabkota' => 'Kabupaten Konawe Utara',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7411,
				'nama_kabkota' => 'Kabupaten Kolaka Timur',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7412,
				'nama_kabkota' => 'Kabupaten Konawe Kepulauan',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7413,
				'nama_kabkota' => 'Kabupaten Muna Barat',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7414,
				'nama_kabkota' => 'Kabupaten Buton Tengah',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7415,
				'nama_kabkota' => 'Kabupaten Buton Selatan',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7471,
				'nama_kabkota' => 'Kota Kendari',
			],
			[
				'id_provinsi' => 74,
				'id_kabkota' => 7472,
				'nama_kabkota' => 'Kota Baubau',
			],
			[
				'id_provinsi' => 75,
				'id_kabkota' => 7501,
				'nama_kabkota' => 'Kabupaten Boalemo',
			],
			[
				'id_provinsi' => 75,
				'id_kabkota' => 7502,
				'nama_kabkota' => 'Kabupaten Gorontalo',
			],
			[
				'id_provinsi' => 75,
				'id_kabkota' => 7503,
				'nama_kabkota' => 'Kabupaten Pohuwato',
			],
			[
				'id_provinsi' => 75,
				'id_kabkota' => 7504,
				'nama_kabkota' => 'Kabupaten Bone Bolango',
			],
			[
				'id_provinsi' => 75,
				'id_kabkota' => 7505,
				'nama_kabkota' => 'Kabupaten Gorontalo Utara',
			],
			[
				'id_provinsi' => 75,
				'id_kabkota' => 7571,
				'nama_kabkota' => 'Kota Gorontalo',
			],
			[
				'id_provinsi' => 76,
				'id_kabkota' => 7601,
				'nama_kabkota' => 'Kabupaten Majene',
			],
			[
				'id_provinsi' => 76,
				'id_kabkota' => 7602,
				'nama_kabkota' => 'Kabupaten Polewali Mandar',
			],
			[
				'id_provinsi' => 76,
				'id_kabkota' => 7603,
				'nama_kabkota' => 'Kabupaten Mamasa',
			],
			[
				'id_provinsi' => 76,
				'id_kabkota' => 7604,
				'nama_kabkota' => 'Kabupaten Mamuju',
			],
			[
				'id_provinsi' => 76,
				'id_kabkota' => 7605,
				'nama_kabkota' => 'Kabupaten Mamuju Utara',
			],
			[
				'id_provinsi' => 76,
				'id_kabkota' => 7606,
				'nama_kabkota' => 'Kabupaten Mamuju Tengah',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8101,
				'nama_kabkota' => 'Kabupaten Maluku Tenggara Barat',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8102,
				'nama_kabkota' => 'Kabupaten Maluku Tenggara',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8103,
				'nama_kabkota' => 'Kabupaten Maluku Tengah',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8104,
				'nama_kabkota' => 'Kabupaten Buru',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8105,
				'nama_kabkota' => 'Kabupaten Kepulauan Aru',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8106,
				'nama_kabkota' => 'Kabupaten Seram Bagian Barat',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8107,
				'nama_kabkota' => 'Kabupaten Seram Bagian Timur',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8108,
				'nama_kabkota' => 'Kabupaten Maluku Barat Daya',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8109,
				'nama_kabkota' => 'Kabupaten Buru Selatan',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8171,
				'nama_kabkota' => 'Kota Ambon',
			],
			[
				'id_provinsi' => 81,
				'id_kabkota' => 8172,
				'nama_kabkota' => 'Kota Tual',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8201,
				'nama_kabkota' => 'Kabupaten Halmahera Barat',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8202,
				'nama_kabkota' => 'Kabupaten Halmahera Tengah',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8203,
				'nama_kabkota' => 'Kabupaten Kepulauan Sula',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8204,
				'nama_kabkota' => 'Kabupaten Halmahera Selatan',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8205,
				'nama_kabkota' => 'Kabupaten Halmahera Utara',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8206,
				'nama_kabkota' => 'Kabupaten Halmahera Timur',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8207,
				'nama_kabkota' => 'Kabupaten Pulau Morotai',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8208,
				'nama_kabkota' => 'Kabupaten Pulau Taliabu',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8271,
				'nama_kabkota' => 'Kota Ternate',
			],
			[
				'id_provinsi' => 82,
				'id_kabkota' => 8272,
				'nama_kabkota' => 'Kota Tidore Kepulauan',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9101,
				'nama_kabkota' => 'Kabupaten Fakfak',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9102,
				'nama_kabkota' => 'Kabupaten Kaimana',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9103,
				'nama_kabkota' => 'Kabupaten Teluk Wondama',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9104,
				'nama_kabkota' => 'Kabupaten Teluk Bintuni',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9105,
				'nama_kabkota' => 'Kabupaten Manokwari',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9106,
				'nama_kabkota' => 'Kabupaten Sorong Selatan',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9107,
				'nama_kabkota' => 'Kabupaten Sorong',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9108,
				'nama_kabkota' => 'Kabupaten Raja Ampat',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9109,
				'nama_kabkota' => 'Kabupaten Tambrauw',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9110,
				'nama_kabkota' => 'Kabupaten Maybrat',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9111,
				'nama_kabkota' => 'Kabupaten Manokwari Selatan',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9112,
				'nama_kabkota' => 'Kabupaten Pegunungan Arfak',
			],
			[
				'id_provinsi' => 91,
				'id_kabkota' => 9171,
				'nama_kabkota' => 'Kota Sorong',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9401,
				'nama_kabkota' => 'Kabupaten Merauke',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9402,
				'nama_kabkota' => 'Kabupaten Jayawijaya',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9403,
				'nama_kabkota' => 'Kabupaten Jayapura',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9404,
				'nama_kabkota' => 'Kabupaten Nabire',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9408,
				'nama_kabkota' => 'Kabupaten Kepulauan Yapen',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9409,
				'nama_kabkota' => 'Kabupaten Biak Numfor',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9410,
				'nama_kabkota' => 'Kabupaten Paniai',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9411,
				'nama_kabkota' => 'Kabupaten Puncak Jaya',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9412,
				'nama_kabkota' => 'Kabupaten Mimika',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9413,
				'nama_kabkota' => 'Kabupaten Boven Digoel',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9414,
				'nama_kabkota' => 'Kabupaten Mappi',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9415,
				'nama_kabkota' => 'Kabupaten Asmat',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9416,
				'nama_kabkota' => 'Kabupaten Yahukimo',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9417,
				'nama_kabkota' => 'Kabupaten Pegunungan Bintang',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9418,
				'nama_kabkota' => 'Kabupaten Tolikara',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9419,
				'nama_kabkota' => 'Kabupaten Sarmi',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9420,
				'nama_kabkota' => 'Kabupaten Keerom',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9426,
				'nama_kabkota' => 'Kabupaten Waropen',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9427,
				'nama_kabkota' => 'Kabupaten Supiori',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9428,
				'nama_kabkota' => 'Kabupaten Mamberamo Raya',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9429,
				'nama_kabkota' => 'Kabupaten Nduga',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9430,
				'nama_kabkota' => 'Kabupaten Lanny Jaya',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9431,
				'nama_kabkota' => 'Kabupaten Mamberamo Tengah',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9432,
				'nama_kabkota' => 'Kabupaten Yalimo',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9433,
				'nama_kabkota' => 'Kabupaten Puncak',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9434,
				'nama_kabkota' => 'Kabupaten Dogiyai',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9435,
				'nama_kabkota' => 'Kabupaten Intan Jaya',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9436,
				'nama_kabkota' => 'Kabupaten Deiyai',
			],
			[
				'id_provinsi' => 94,
				'id_kabkota' => 9471,
				'nama_kabkota' => 'Kota Jayapura',
			],
		];
		$this->db->table('kabkota')->insertBatch($data);
	}
}
