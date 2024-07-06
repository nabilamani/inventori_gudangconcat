<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct(){
        parent::__construct();

        if(!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><small> Anda Belum Login! (Silahkan Login untuk mengakses halaman yang akan dituju!)</small> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }

        $this->load->library('pdf');
        $this->load->model('MLaporan');
    } 
    
    function barang_masuk()
    {
        $data['graph'] = $this->MLaporan->graph();
        $data['caribarang'] = $this->MLaporan->show_barang();
        
        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangmasuk', $data);
        $this->load->view('templates/footer/tabel');
    }

    function barang_keluar()
    {
        $data['graph'] = $this->MLaporan->graph_keluar();
        $data['caribarang'] = $this->MLaporan->show_barang_keluar();
        
        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangkeluar', $data);
        $this->load->view('templates/footer/tabel');
    }

    function stok_barang()
    {
        $data['barang'] = $this->user_m->data_barang();

        $this->load->view('templates/head/dashboard');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/stokbarang', $data);
        $this->load->view('templates/footer/tabel');
    }

    function laporan_masuk()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['caribarang'] = $this->MLaporan->data_barang($dari, $sampai);

        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangmasuk', $data);
        $this->load->view('templates/footer/tabel');
    }

    function laporan_keluar()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['caribarang'] = $this->MLaporan->data_barang_keluar($dari, $sampai);

        $this->load->view('templates/head/tabel');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('master/laporan/barangkeluar', $data);
        $this->load->view('templates/footer/tabel');
    }

    function export_pdf_masuk($dari, $sampai)
    {    
        $pdf = new FPDF('L', 'mm', 'A5');
        $pdf->AddPage();
        $pdf->Image('./assets/img/logo.png', 20, 6, 15);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 7, 'DATA BARANG MASUK', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 5, 'Gudang Desa Condongcatur', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->Line(10, 27, 200, 27);
        $pdf->Cell(10, 3, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 7, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(85, 7, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Jumlah Masuk', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Satuan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);

        $dtbarang = $this->MLaporan->data_barang($dari, $sampai);

        foreach ($dtbarang as $row){
            $pdf->Cell(40, 7, $row->tanggal, 1, 0, 'C');
            $pdf->Cell(85, 7, $row->nama_barang, 1, 0, 'L');
            $pdf->Cell(35, 7, $row->jumlah_masuk, 1, 0, 'C');
            $pdf->Cell(30, 7, $row->satuan_barang, 1, 1, 'C'); 
        }
        $pdf->Output();
    }

    function export_pdf_keluar($dari, $sampai)
    {    
        $pdf = new FPDF('L', 'mm', 'A5');
        $pdf->AddPage();
        $pdf->Image('./assets/img/logo.png', 20, 6, 15);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 7, 'DATA BARANG KELUAR', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 5, 'Gudang Desa Condongcatur', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->Line(10, 27, 200, 27);
        $pdf->Cell(10, 3, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 7, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(85, 7, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Jumlah Keluar', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Satuan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);

        $dtbarang = $this->MLaporan->data_barang_keluar($dari, $sampai);

        foreach ($dtbarang as $row){
            $pdf->Cell(40, 7, $row->tanggal, 1, 0, 'C');
            $pdf->Cell(85, 7, $row->nama_barang, 1, 0, 'L');
            $pdf->Cell(35, 7, $row->jumlah_keluar, 1, 0, 'C');
            $pdf->Cell(30, 7, $row->satuan_barang, 1, 1, 'C'); 
        }
        $pdf->Output();
    }
}
