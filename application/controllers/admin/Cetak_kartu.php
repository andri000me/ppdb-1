<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Cetak_kartu extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIM',1,0);
        $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        $pdf->Cell(27,6,'NO HP',1,0);
        $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('tbl_user')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->nama,1,0);
            $pdf->Cell(85,6,$row->kampus,1,0);
            $pdf->Cell(27,6,$row->prodi,1,0);
            $pdf->Cell(25,6,$row->tahun_lulus,1,1); 
        }
        $pdf->Output();
    }
}

?>