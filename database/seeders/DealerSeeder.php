<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dealer;

class DealerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'nama_dealer' => 'SBR SRATEN I',
                'lokasi' => 'Jl. Gatot Subroto No.214 Sraten - Solo
                (0271) 655114',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9779108766506!2d110.81704591456307!3d-7.577382944535676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1670117312f9%3A0xad4fe3e0ad30ce4d!2sYamaha%20Sumber%20Baru%20Rejeki%20Sraten%201!5e0!3m2!1sen!2sid!4v1653069607046!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR SRATEN 1.png',

            ],
            [
                'nama_dealer' => 'SBR SRATEN II',
                'lokasi' => 'Jl. Gatot Subroto 150-152 Sraten - Solo
                (0271) 653287',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.996334490822!2d110.8179111145631!3d-7.575376294537084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1664d08a167f%3A0x6756929a7d5ff99e!2sSumber%20Baru%20Rejeki%20Sraten%20II!5e0!3m2!1sen!2sid!4v1653068595924!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR SRATEN 2.png',

            ],
            [
                'nama_dealer' => 'SBR SRAGEN',
                'lokasi' => 'Jl. Raya Sukowati No.396 A - Sragen (sebelah Luwes Mall)
                (0271) 893948',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.359158148121!2d111.0296193!3d-7.4254465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a03309895e177%3A0x14fb6b5ef0094470!2sSBR%20YAMAHA%20Dealer!5e0!3m2!1sen!2sid!4v1653069691154!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR SRAGEN.png',

            ],
            [
                'nama_dealer' => 'SBR KARTASURA',
                'lokasi' => 'Jl. Ahmad Yani 129 (timur perempatan Kartasura)
                (0271) 782254',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.201384765829!2d110.74414700000001!3d-7.553007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a14ece8efe9b3%3A0x2dfe81aa7378aca7!2sYamaha%20New%20Source%20Lucky!5e0!3m2!1sen!2sid!4v1653069937768!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR KARTASURA.png',

            ],
            [
                'nama_dealer' => 'SBR Gemolong',
                'lokasi' => 'Jl. Raya Solo-Purwodadi KM 21 (sebelah Kantor KUD GML)
                (0271) 6811753',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.6497121807897!2d110.8284644!3d-7.3930905000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a0e9264861e0d%3A0xf97f99e4f63c9279!2sYamaha%20Sumber%20Baru%20Rejeki!5e0!3m2!1sen!2sid!4v1653069972146!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR GEMOLONG.png',

            ],
            [
                'nama_dealer' => 'SBR TAMBAKSEGARAN',
                'lokasi' => 'Jl. Sutan Syahrir Np.198 Tambaksegaran
                (0271) 633184',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.103947533469!2d110.8250906!3d-7.5636448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a168b05b0b4df%3A0x96ed11f0cec79ab8!2sSumber%20Baru%20Rejeki%20Tambak%20Segaran!5e0!3m2!1sen!2sid!4v1653070025243!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR TAMBAKSEGARAN.png',

            ],
            [
                'nama_dealer' => 'SBR KARANGANYAR',
                'lokasi' => 'Jl. Raya Lawu No. 461 - Karanganyar (depan Samsat Karanganyar) 
                (0271) 494733, 6497008',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.841388140552!2d110.9375355!3d-7.592236200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5055309dd66d845%3A0xd118f6757f66cd25!2sSBR%20Karanganyar!5e0!3m2!1sen!2sid!4v1653070057591!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR KARANGANYAR.png',

            ],
            [
                'nama_dealer' => 'SBR KLATEN',
                'lokasi' => 'Jl. Raya Klaten - Prambanan (depan Pom Bensin Kraguman)
                (0272) 328398',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.6090724022392!2d110.55510699999999!3d-7.7250236999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a44ed2d70bce7%3A0xe084e051b6f7dd81!2sYamaha%20Sumber%20Baru%20Rejeki%20Klaten!5e0!3m2!1sen!2sid!4v1653070084506!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR KLATEN.png',

            ],
            [
                'nama_dealer' => 'SBR MASARAN',
                'lokasi' => 'Jl. Raya Masaran - Sragen (depam BRI Masaran)
                (0271) 8200062',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.9455410231503!2d110.9291841!3d-7.4712664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1af284ed01a3%3A0x27f54360df0fe811!2sYamaha%20SBR%20Masaran!5e0!3m2!1sen!2sid!4v1653070118832!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/MASARAN.png',

            ],
            [
                'nama_dealer' => 'SBR AMPEL',
                'lokasi' => 'Jl. Raya Solo - Semarang Kaligentong Boyolali (utara Pasar Ampel)
                (0276) 330544',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.1421634481844!2d110.541371!3d-7.4495198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a7019dc3125c1%3A0xd64a168e377940fc!2sYamaha%20SBR%20Ampel!5e0!3m2!1sen!2sid!4v1653070141777!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR AMPEL BYL.png',

            ],
            [
                'nama_dealer' => 'SBR TELUKAN',
                'lokasi' => 'Jl. Raya Telukan KM. 7 Sukoharjo
                (0271) 7652827',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.544095533573!2d110.82251640000001!3d-7.624481199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a3de92aa5b449%3A0xf8cc19659295b675!2sYamaha%20SBR%20Telukan!5e0!3m2!1sen!2sid!4v1653070166263!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR TELUKAN.png',

            ],
            [
                'nama_dealer' => 'SBR MOJOSONGO',
                'lokasi' => 'Jl. Raya Solo-Boyolali KM. 25 Mojosongo-Boyolali
                (0276) 325561
                ',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.342418263449!2d110.6360921!3d-7.5375831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6bf5ebaf8681%3A0x20943674f6022a78!2sYamaha%20SBR%20Mojosongo!5e0!3m2!1sen!2sid!4v1653070197201!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR MOJOSONGO.png',

            ],
            [
                'nama_dealer' => 'SBR PAJANG',
                'lokasi' => 'Jl. Slamet Riyadi No. 272 B Gumpang, Pajang-Sukoharjo
                (0271) 7652827',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3955.0978656692496!2d110.7644381!3d-7.5643083!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a14514ad4a5cf%3A0xb2ccfd0cb61a9a8e!2sJl.%20Slamet%20Riyadi%20No.272%2C%20Banaran%2C%20Pabelan%2C%20Kec.%20Kartasura%2C%20Kabupaten%20Sukoharjo%2C%20Jawa%20Tengah%2057169!5e0!3m2!1sen!2sid!4v1653070227802!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR PAJANG.png',

            ],
            [
                'nama_dealer' => 'SBR KALIOSO',
                'lokasi' => 'Jl. Raya Solo-Purwodadi KM. 11 Gondangrejo, Karanganyar
                (0271) 8501104',
                'plat' => 'AD',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.864190035361!2d110.80930420000001!3d-7.4802455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1187138f40e7%3A0xb0aa84dcb2192f2!2sYamaha%20SBR%20Kalioso!5e0!3m2!1sen!2sid!4v1653070254272!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AD/SBR KALIOSO.png',

            ],
            //AD batas
            [
                'nama_dealer' => 'SBR PIYUNGAN',
                'lokasi' => 'Jl. Wonosari KM. 9 Sleman-Yogyakarta (Barat Jogja TV)
                (0274) 4353732',
                'plat' => 'AB',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126485.52048272299!2d110.2884704!3d-7.8244439!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a50d28fcddd4d%3A0x45187249de24fb1e!2sYamaha%20Sumber%20Baru%20Rejeki!5e0!3m2!1sen!2sid!4v1653070278726!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AB/SBR WONOSARI JOGJA.png',

            ],
            [
                'nama_dealer' => 'SBR TRIDADI',
                'lokasi' => 'Jl. Magelang KM. 10 Bangunrejo Tridadi, Sleman (depan Bank Sleman)
                (0274) 868555',
                'plat' => 'AB',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.6813580953844!2d110.36039009999999!3d-7.717297299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58cb8ba88149%3A0xa7d8a3b0291c7a6e!2sYamaha%20Sumber%20Baru%20Rejeki!5e0!3m2!1sen!2sid!4v1653070301919!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AB/SBR TRIDADI JOGJA.png',

            ],
            //BATAS AB
            [
                'nama_dealer' => 'SBR NGAWI',
                'lokasi' => 'Jl. Suryo-Grudo-Ngawi (Sebelah Terminal Baru)
                (0351) 744046',
                'plat' => 'AE',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.544314503435!2d111.4207632!3d-7.4048438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79e7bf2cfac367%3A0xda751a9b77096b23!2sYamaha%20SBR%20Ngawi!5e0!3m2!1sen!2sid!4v1653070326192!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AE/SBR NGAWI.png',

            ],
            [
                'nama_dealer' => 'SBR PONOROGO',
                'lokasi' => 'Jl. Batoro Katong 75 Ponorogo
                (0352) 487988',
                'plat' => 'AE',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9964620435367!2d110.82006469999999!3d-7.575362399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1664d1b7e66f%3A0xa8740bcebd932894!2sJl.%20Gatot%20Subroto%2C%20Jayengan%2C%20Kec.%20Serengan%2C%20Kota%20Surakarta%2C%20Jawa%20Tengah%2057152!5e0!3m2!1sen!2sid!4v1653070346825!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AE/SBR PONOROGO.png',

            ],
            [
                'nama_dealer' => 'SBR MADIUN',
                'lokasi' => 'Jl. Raya Solo-Jiwan, Jiwan-Madiun (barat Pasar Sukolilo)
                (0351) 867915',
                'plat' => 'AE',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.5843809638995!2d111.474537!3d-7.620119700000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7995809bf4dedb%3A0x63c6531a12aba397!2sDealer%20Yamaha%20Sumber%20Baru%20Rejeki!5e0!3m2!1sen!2sid!4v1653070365910!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AE/SBR MADIUN.png',

            ],
            [
                'nama_dealer' => 'SBR SUMOROTO',
                'lokasi' => 'Jl. Ahmad Yani 75 Kauman-Sumoroto (selatan Pasar Somoroto)
                (0352) 752900',
                'plat' => 'AE',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d988.0618927902935!2d111.4082937!3d-7.8691421!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e799e5ea7201b3f%3A0xb8561ca9d8cf7ea3!2sYamaha%20Sumber%20Baru%20Rejeki!5e0!3m2!1sen!2sid!4v1653070389181!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AE/SBR SUMOROTO.png',

            ],
            [
                'nama_dealer' => 'SBR SRATEN 1',
                'lokasi' => 'Jl. Gatot Subroto No.214 Sraten - Solo
                (0271) 655114',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9964620435367!2d110.82006469999999!3d-7.575362399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1664d1b7e66f%3A0xa8740bcebd932894!2sJl.%20Gatot%20Subroto%2C%20Jayengan%2C%20Kec.%20Serengan%2C%20Kota%20Surakarta%2C%20Jawa%20Tengah%2057152!5e0!3m2!1sen!2sid!4v1653070411085!5m2!1sen!2sid',
                'gambar' => NULL,

            ],
            [
                'nama_dealer' => 'SBR GENENG',
                'lokasi' => 'Jl. Raya Geneng-Ngawi KM. 10 Ngawi (utara Terminal Geneng)',
                'plat' => 'AE',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.6283903835188!2d111.4292183!3d-7.506211499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79ea2d684d622b%3A0x75053470dca60b56!2sYamaha%20SBR%20Geneng!5e0!3m2!1sen!2sid!4v1653070439093!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT AE/SBR GENENG.png',

            ],
            [
                'nama_dealer' => 'SBR PEMALANG',
                'lokasi' => 'Jl. Raya Petarukan KM. 7 Kedungbanjar, Pemalangi (depan Hotel Regina)
                (0284) 322975',
                'plat' => 'G',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9886106171234!2d109.44049659999999!3d-6.891965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fda4db87850b3%3A0x64f2d8c00df37b47!2sYAMAHA%20SBR%20MOTOR%20PEMALANG!5e0!3m2!1sen!2sid!4v1653070458472!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT G/SBR PEMALANG.png',

            ],
            //batas ae
            [
                'nama_dealer' => 'SBR BREBES',
                'lokasi' => 'Jl. Jend. Sudirmal No. 16 Ketanggungan Brebes
                (0283) 881123',
                'plat' => 'G',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.181756593119!2d109.03280129999999!3d-6.8688119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb1e487c90f7f%3A0xdd5a2ffb68025aae!2sDealer%20Yamaha%20Sumber%20Baru%20Rejeki!5e0!3m2!1sen!2sid!4v1653070495399!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT G/SBR BREBES.png',

            ],
            [
                'nama_dealer' => 'SBR BUMIAYU',
                'lokasi' => 'Jl. K.H. Ahmad Dahlan Dk. Krajan RT 06/01
                (0289) 5159152',
                'plat' => 'G',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.881009758511!2d109.0122985!3d-7.2543811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f8f6f839f9315%3A0x983e93a997571798!2sDealer%20Yamaha%20Sumber%20Baru%20Rejeki!5e0!3m2!1sen!2sid!4v1653070522967!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT G/SBR BUMIAYU.png',

            ],
            [
                'nama_dealer' => 'SBR RANDUDONGKOL',
                'lokasi' => 'Jl. Raya Semingkir Randudongkal (sebelah Swalayan Semingkir)
                (0284) 3287611',
                'plat' => 'G',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d126724.96990852461!2d109.3285133!3d-6.990981!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fe8b43247719d%3A0xe27309237b3d8e24!2sSUMBER%20BARU%20REJEKI%20SEMINGKIR!5e0!3m2!1sen!2sid!4v1653070542269!5m2!1sen!2sid4',
                'gambar' => 'assets/images/dealer/PLAT G/SBR SEMINGKIR.png',

            ],
            [
                'nama_dealer' => 'SBR ADIWERNA',
                'lokasi' => 'Jl. Raya Slawi II, Adiwerna Kab. Tegal (depan SPBU Singkil)
                (0283) 4542266',
                'plat' => 'G',
                'link_lokasi' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1667631298205!2d109.3304084!3d-6.8706119999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fc59d59947e95%3A0x38d10edb499727dc!2sSumber%20Rejeki!5e0!3m2!1sen!2sid!4v1653070563442!5m2!1sen!2sid',
                'gambar' => 'assets/images/dealer/PLAT G/SBR ADIWERNA.png',

            ],

        ])->each(function ($dealers) {
            Dealer::firstOrcreate($dealers);
        });
    }
}
