<?php

namespace App\Exports;

use App\Models\Gudep;
use App\Models\Anggota_gudep;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class LaporanExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        return Gudep::with(['kwaran','kategori_pendidikan'])->orderby('id','asc')->get();
    }

    public function map($data): array
    {
        
        return [
            $data->nama_gudep,
            str_pad($data->kode_kwaran,2,'0',STR_PAD_LEFT),
            $data->kwaran->nama_kwaran,
            $data->kategori_pendidikan->nama_kategori_pendidikan,
            " ".$data->kode_putra,
            " ".$data->kode_putri,
            $data->alamat,
            Anggota_gudep::where('gudep_id',$data->id)->count()
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA GUDEP',
            'KODE KWARAN',
            'KWARAN',
            'KATEGORI PENDIDIKAN',
            'KODE PUTRA',
            'KODE PUTRI',
            'ALAMAT',
            'JUMLAH ANGGOTA'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    
}
