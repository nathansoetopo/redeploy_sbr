<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function switchwarna(Request $request){
        $output = '';
        if($request->ajax()){
            $id_motor = $request->get('id_motor');
            $id_warna = $request->get('id_warna');
            $motor = Motor::find($id_motor);
            $warna = $motor->warna()->where('id_warna', $id_warna)->first();
            $output .= '<img src="'.url('data_motor/'.$id_motor.'/warna/'.$warna->pivot->image).'" alt="" class="img-fluid wc-image">';
        }
        echo $output;
    }

    public function searchMotorName(Request $request){
        $output = '';
        if($request->ajax()){
            if($request->get('query') != 'all'){
                $motor = Motor::find($request->get('query'));
                if($motor->gambar == NULL){
                    $gambar = 'assets/images/team_01.jpg';
                }else{
                    $gambar = $motor->gambar;
                }
                $output .= '
                    <div class="product-item">
                        <a href="/produk/list-motor/detail/'.$motor->id.'">
                        <img src="'.url($gambar).'" alt=""></a>
                        <div class="down-content">
                            <a href="/produk/list-motor/detail/'.$motor->id.'">
                                <h4>'.$motor->nama_produk.'</h4>
                            </a>';
                        foreach($motor->harga as $h){
                            $output .= '<h6>'.$h->harga.'</h6>';
                        }
                    $output.='</div>
                </div>
                ';
            }else{
                $loop = Motor::where('plat', $request->get('nopol'))->get();
                foreach($loop as $m){
                    if($m->gambar == NULL){
                        $gambar = 'assets/images/team_01.jpg';
                    }else{
                        $gambar = $m->gambar;
                    }
                    $output .= '
                    <div class="col-md-4" style="margin-bottom: 100px;">
                        <div class="product-item">
                            <a href="/produk/list-motor/detail/'.$m->id.'">
                            <img src="'.url($gambar).'" alt=""></a>
                            <div class="down-content">
                                <a href="/produk/list-motor/detail/'.$m->id.'">
                                    <h4>'.$m->nama_produk.'</h4>
                                </a>';
                            foreach($m->harga as $h){
                                $output.= '<h6>'.$h->harga.'</h6>';
                            }
                        $output.=  '
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
        }
        echo $output;
    }

    public function searchTransName(Request $request){
        $output = '';
        if($request->ajax()){
            if($request->get('query')!='all'){
                $query = $request->get('query');
                $nopol = $request->get('nopol');
                $motor = Motor::where('transmisi', 'like', '%'.$query.'%')->where('plat', $nopol)->get();
                if($motor->count()>0){
                    foreach($motor as $m){
                        if($m->gambar == NULL){
                            $gambar = 'assets/images/team_01.jpg';
                        }else{
                            $gambar = $m->gambar;
                        }
                        $output .= '
                        <div class="col-md-4" style="margin-bottom: 100px;">
                            <div class="product-item">
                                <a href="/produk/list-motor/detail/'.$m->id.'">
                                <img src="'.url($gambar).'" alt=""></a>
                                <div class="down-content">
                                    <a href="/produk/list-motor/detail/'.$m->id.'">
                                        <h4>'.$m->nama_produk.'</h4>
                                    </a>';
                                    foreach($m->harga as $h){
                                        $output .= '<h6>'.$h->harga.'</h6>';
                                    }
                                $output .= '</div>
                            </div>
                        </div>
                        ';
                    }
                }else{
                    $output .= 'Produk Tidak Ditemukan';
                }
            }else{
                $loop = Motor::where('plat', $request->get('nopol'))->get();
                foreach($loop as $m){
                    if($m->gambar == NULL){
                        $gambar = 'assets/images/team_01.jpg';
                    }else{
                        $gambar = $m->gambar;
                    }
                    $output .= '
                    <div class="col-md-4" style="margin-bottom: 100px;">
                        <div class="product-item">
                            <a href="/produk/list-motor/detail/'.$m->id.'">
                            <img src="'.url($gambar).'" alt=""></a>
                            <div class="down-content">
                                <a href="/produk/list-motor/detail/'.$m->id.'">
                                    <h4>'.$m->nama_produk.'</h4>
                                </a>';
                                foreach($m->harga as $h){
                                    $output .= '<h6>'.$h->harga.'</h6>';
                                }
                            $output .= '</div>
                        </div>
                    </div>
                    ';
                }
            }
        }
        echo $output;
    }

    public function searchNopolAdmin(Request $request){
        $output = '';
        $no = 0;
        if($request->ajax()){
            if($request->get('nopol')!='all'){
                $motor = Motor::where('plat', $request->get('nopol'))->get();
                foreach($motor as $m){
                    if($m->gambar == NULL){
                        $gambar = 'assets/images/team_01.jpg';
                    }else{
                        $gambar = $m->gambar;
                    }
                    $output .= '
                    <tr>
                        <th scope="row">'.$no++.'</th>
                        <td>'.$m->nama_produk.'</td>
                        <td>'.$m->tipe.'</td>
                        <td>
                            <img src="'.url($gambar).'" alt="" style="height: 40px; width:70px;"></a>
                        <td>
                        <td>
                            <a href="'.url('admin/motor/edit/'.$m->id).'"
                            class="btn btn-transparent text-center text-dark">
                            <i class="fas fa-edit fa-2x"></i>
                            </a>
                            <a href="'.url('admin/motor/colour/'.$m->id).'"
                                class="btn btn-primary text-center text-white">
                                Warna
                            </a>
                            <a  href="'.url('admin/motor/delete/'.$m->id).'"
                                class="btn btn-transparent text-center text-dark" >
                                <i class="fas fa-trash-alt fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                    ';
                }
            }
        }
        echo $output;
    }

    public function showListMotor(Request $request){
        $output = '';
        if($request->ajax()){
            $nopol = $request->get('nopol');
            if($nopol != NULL){
                $motor = Motor::where('plat', $nopol)->get();
                // $output .= '<option value="all">-- Semua Produk --</option>';
                foreach($motor as $m){
                    $output .= '<option value="'.$m->id.'">"'.$m->nama_produk.'"</option>';
                }
            }
        }
        echo $output;
    }

    public function getListMotor(Request $request){
        $output = '';
        if($request->ajax()){
            $id_motor = $request->get('motor');
            $m = Motor::find($id_motor);
            if($m->gambar == NULL){
                $gambar = 'assets/images/team_01.jpg';
            }else{
                $gambar = $m->gambar;
            }
            $output .= '
                <tr>
                    <th scope="row">1</th>
                    <td>'.$m->nama_produk.'</td>
                    <td>'.$m->tipe.'</td>
                    <td>
                        <img src="'.url($gambar).'" alt="" style="height: 40px; width:70px;"></a>
                    <td>
                    <td>
                        <a href="'.url('admin/motor/edit/'.$m->id).'"
                        class="btn btn-transparent text-center text-dark">
                        <i class="fas fa-edit fa-2x"></i>
                        </a>
                        <a href="'.url('admin/motor/colour/'.$m->id).'"
                            class="btn btn-primary text-center text-white">
                            Warna
                        </a>
                        <a  href="'.url('admin/motor/delete/'.$m->id).'"
                            class="btn btn-transparent text-center text-dark" >
                            <i class="fas fa-trash-alt fa-2x"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        echo $output;
    }

        public function getKategoriMotor(Request $request){
        $output = '';
        if($request->ajax()){
            $tipe = $request->get('tipe');
            $plat = $request->get('plat');
            $motors = Motor::whereHas('harga')->where('type_motor', $tipe)->where('plat', $plat)->get();
            if($motors->count()!=0){
                foreach($motors as $motor){
                    $output .= '
                        <div class="col-md-4" style="margin-bottom: 100px;">
                            <div class="product-item">
                                <a href="/produk/list-motor/detail/'.$motor->id.'"><img style="width: 100%"
                                        src="'.url($motor->gambar).'" alt=""></a>
                                <div class="down-content">
                                    <a href="/produk/list-motor/detail/'.$motor->id.'">
                                        <h4>'.$motor->nama_produk.'</h4>
                                    </a>';
                                    $output .= '<h6>'.$motor->harga->harga.'</h6>';
                                $output .= '</div>
                            </div>
                        </div>
                    ';
                }
            }else{
                $output .= '
                    <div class="alert alert-warning" role="alert">
                        Ooops! Motor yang anda cari tidak ditemukan
                    </div>
                ';
            }
        }
        echo $output;
    }
}
