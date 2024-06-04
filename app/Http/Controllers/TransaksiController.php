<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\bahan_baku;
use App\Models\detail_hampers;
use App\Models\hampers;
use App\Models\produk;
use App\Models\resep_produk;
use App\Models\detail_resep;
use App\Models\karyawan;
use App\Models\detail_transaksi;
use App\Models\pemakaian_bahan_baku;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class TransaksiController extends Controller
{
    public function diterima()
    {
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day', strtotime($today)));
        // dd($tomorrow);
        $transaksi = transaksi::where('status_transaksi', 'diterima')->whereDate('tanggal_ambil', $tomorrow)->get();
        // dd($transaksi);

        if ($transaksi->isEmpty()) {
            $karyawan = karyawan::whereIn('id_role', [2, 3])->get();
            return view('MO.manageKaryawan', compact('karyawan'));
        }
        return view('MO.managePesanan', compact('transaksi'));
    }
    public function process(Request $request)
    {
        $id = $request->input('ids');
        if (strpos($id, ',') !== false) {
            $idsArray = explode(",", $id);
        } else {
            $idsArray = [$id]; // Jadikan $id sebagai elemen dalam array
        }
        $transaksi = transaksi::whereIn('id', $idsArray)->get();
        // dd($transaksi);
        if ($transaksi->isEmpty()) {
            $karyawan = karyawan::whereIn('id_role', [2, 3])->get();
            return view('MO.manageKaryawan', compact('karyawan'));
        }
        $transaksiId = $transaksi->pluck('id');
        $detail = detail_transaksi::whereIn('id_transaksi', $transaksiId)->get();
        $produkId = $detail->pluck('id_produk');

        if ($produkId->isEmpty()) {
            $produk = collect();
        } else {
            $produk = produk::whereIn('id', $produkId)->get();
        }


        $hampersId = $detail->pluck('id_hampers');

        if ($hampersId->isEmpty()) {
            $hampers = collect();
        } else {
            $hampers = hampers::whereIn('id', $hampersId)->get();
        }
        $hampersId = $hampers->pluck('id');

        $detail_hampers = detail_hampers::whereIn('id_hampers', $hampersId)->get();

        $pId = $detail_hampers->pluck('id_produk');
        $p = produk::whereIn('id', $pId)->get();

        $rId = $p->pluck('id_resep');
        $r = resep_produk::whereIn('id', $rId)->get();
        $drId = $r->pluck('id');

        $dr = detail_resep::whereIn('id_resep', $drId)->get();
        $bId = $dr->pluck('id_bahan_baku');
        $b = bahan_baku::whereIn('id', $bId)->get();

        //produk
        $resepId = $produk->pluck('id_resep');
        $resep = resep_produk::whereIn('id', $resepId)->get();
        $resepId = $resep->pluck('id');
        $detail_resep = detail_resep::whereIn('id_resep', $resepId)->get();

        $detail_real = detail_resep::whereIn('id_resep', $resepId)->get();
        $many = $detail_resep->map(function ($item) use ($detail) {
            foreach ($detail as $d) {
                if ($d->jumlah_produk > 1) {
                    $item->jumlah_bahan *= $d->jumlah_produk;
                    return $item;
                }
            }

            return $item;
        });


        $detail_resep = $detail_resep->map(function ($item) use ($dr) {
            foreach ($dr as $d) {
                if ($item->id_resep == $d->id_resep && $d->id_bahan_baku == $item->id_bahan_baku) {
                    $item->jumlah_bahan += $d->jumlah_bahan;
                    return $item;
                }
            }


            return $item;
        });

        $detail_resep = $detail_resep->map(function ($item) use ($dr) {
            foreach ($dr as $d) {
                if ($item->id_bahan_baku == $d->id_bahan_baku && $item->id_resep != $d->id_resep) {
                    $item->jumlah_bahan += $d->jumlah_bahan;
                    return $item;
                }
            }
            return $item;
        });

        $dr->each(function ($d) use ($detail_resep) {
            $exists = $detail_resep->contains('id_bahan_baku', $d->id_bahan_baku);
            if (!$exists) {
                $detail_resep->push($d);
            }
        });

        $g = $detail_resep->sortBy('id_bahan_baku')
            ->groupBy('id_bahan_baku')
            ->map(function ($group) {
                return [
                    'total_jumlah_bahan' => $group->sum('jumlah_bahan'),
                    'id_bahan_baku' => $group->first()->id_bahan_baku
                ];
            });

        // dd($g);


        // dd($detail_resep);
        $bahanId = $detail_resep->pluck('id_bahan_baku');
        $bahan = bahan_baku::whereIn('id', $bahanId)->get();
        // dd($bahan);
        $grouping = $detail_resep->groupBy('id_bahan_baku');
        $sum = $grouping->map(function ($group) {
            return $group->sum('jumlah_bahan');
        });
        $ids = $sum->values();
        $id = $sum->keys();
        // dd($id);
        return view('MO.processPesanan', compact('transaksi', 'detail', 'produk', 'hampers', 'resep', 'detail_resep', 'bahan', 'sum', 'ids', 'id', 'detail_real', 'many', 'detail_hampers', 'dr', 'g'));
    }

    public function update(Request $request)
    {
        $transaksiData = json_decode($request->input('transaksi'));
        // dd($transaksiData);
        foreach ($transaksiData as $t) {
            $transaksi[] = transaksi::find($t->id);
        }
        $temp = collect($transaksi);
        foreach ($temp as $t) {
            $t->status_transaksi = 'diproses';
            $t->save();
        }
        $transaksiId = $temp->pluck('id');
        // dd($transaksiId);
        $detail = detail_transaksi::whereIn('id_transaksi', $transaksiId)->get();
        $produkId = $detail->pluck('id_produk');
        if ($produkId->isEmpty()) {
            $produk = collect();
        } else {
            $produk = produk::whereIn('id', $produkId)->get();
        }


        $hampersId = $detail->pluck('id_hampers');

        if ($hampersId->isEmpty()) {
            $hampers = collect();
        } else {
            $hampers = hampers::whereIn('id', $hampersId)->get();
        }
        $hampersId = $hampers->pluck('id');

        $detail_hampers = detail_hampers::whereIn('id_hampers', $hampersId)->get();

        $pId = $detail_hampers->pluck('id_produk');
        $p = produk::whereIn('id', $pId)->get();

        $rId = $p->pluck('id_resep');
        $r = resep_produk::whereIn('id', $rId)->get();
        $drId = $r->pluck('id');

        $dr = detail_resep::whereIn('id_resep', $drId)->get();
        $bId = $dr->pluck('id_bahan_baku');
        $b = bahan_baku::whereIn('id', $bId)->get();

        //produk
        $resepId = $produk->pluck('id_resep');
        $resep = resep_produk::whereIn('id', $resepId)->get();
        $resepId = $resep->pluck('id');
        $detail_resep = detail_resep::whereIn('id_resep', $resepId)->get();

        $detail_real = detail_resep::whereIn('id_resep', $resepId)->get();
        $many = $detail_resep->map(function ($item) use ($detail) {
            foreach ($detail as $d) {
                if ($d->jumlah_produk > 1) {
                    $item->jumlah_bahan *= $d->jumlah_produk;
                    return $item;
                }
            }

            return $item;
        });


        $detail_resep = $detail_resep->map(function ($item) use ($dr) {
            foreach ($dr as $d) {
                if ($item->id_resep == $d->id_resep && $d->id_bahan_baku == $item->id_bahan_baku) {
                    $item->jumlah_bahan += $d->jumlah_bahan;
                    return $item;
                }
            }


            return $item;
        });

        $detail_resep = $detail_resep->map(function ($item) use ($dr) {
            foreach ($dr as $d) {
                if ($item->id_bahan_baku == $d->id_bahan_baku && $item->id_resep != $d->id_resep) {
                    $item->jumlah_bahan += $d->jumlah_bahan;
                    return $item;
                }
            }
            return $item;
        });

        $dr->each(function ($d) use ($detail_resep) {
            $exists = $detail_resep->contains('id_bahan_baku', $d->id_bahan_baku);
            if (!$exists) {
                $detail_resep->push($d);
            }
        });

        $g = $detail_resep->sortBy('id_bahan_baku')
            ->groupBy('id_bahan_baku')
            ->map(function ($group) {
                return [
                    'total_jumlah_bahan' => $group->sum('jumlah_bahan'),
                    'id_bahan_baku' => $group->first()->id_bahan_baku
                ];
            });
        // dd($g);

        foreach ($g as $item) {
            // dd($item);
            $p = pemakaian_bahan_baku::create([
                'tanggal' => date('Y-m-d'),
                'jumlah_pemakaian' => $item['total_jumlah_bahan'],
                'id_bahan_baku' => $item['id_bahan_baku'],
            ]);
            // dd($p);
        }

        return redirect()->route('daftarPesanan')->with('success', 'Pemakaian bahan baku berhasil dibuat');
    }
}
