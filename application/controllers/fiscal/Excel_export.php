<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Excel_export extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('Excel_export_model', 'export');
    }    
 
    // create xlsx
    public function generateXls() {
        // create file name
        $fileName = 'romastur-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        //espaçamento
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(45);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'FISCAL');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'CARRO');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'LINHA');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'CHEGADA');       
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'SAÍDA');       
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'OCORRÊNCIAS');       
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'DATA');       
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_tbl);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->user_nome);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->carro_codigo);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->linha_chegada.' / '.$list->linha_saida);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, date("H:i", strtotime($list->data_create_tbl)));
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->hora_saida_tbl == NULL ? "--:--":date("H:i", strtotime($list->hora_saida_tbl)));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->nome_ocorrencias_oc);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, date("d/m/Y", strtotime($list->data_create_tbl)));
            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
        // download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(site_url() . $fileName);
 
    }
}

/* End of file Excel_export.php */
