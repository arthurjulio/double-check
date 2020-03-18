<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_scan_in');
        $this->load->model('M_data');
    }
    public function scan_in()
    {
        $data['title'] = "Scan In | Double Check";
        $this->load->view('scan/header', $data);
        $this->load->view('scan/scan_in');
        $this->load->view('scan/footer');
    }
    public function scan_out()
    {
        $data['title'] = "Scan Out | Double Check";
        $this->load->view('scan/header', $data);
        $this->load->view('scan/scan_out');
        $this->load->view('scan/footer');
    }
    public function log()
    {
        $data['title'] = "Log History | Double Check";
        $this->load->view('scan/header', $data);
        $this->load->view('scan/log');
        $this->load->view('scan/footer');
    }
    public function log_scan_in()
    {
        $data['title'] = "Log History Scan In | Double Check";
        $data['history_in'] = $this->M_data->get_data_scan_in();
        // var_dump($data['history_in']);
        $this->load->view('scan/header', $data);
        $this->load->view('scan/scan_in_history');
        $this->load->view('scan/footer');
    }
    public function log_scan_out()
    {
        $data['title'] = "Log History Scan Out | Double Check";
        $data['log_scan_in'] = $this->M_data->get_data_scan_out();
        $this->load->view('scan/header', $data);
        $this->load->view('scan/scan_out_history');
        $this->load->view('scan/footer');
    }

    public function insert_scan_out()
    {
        if ($this->input->post('tipe') == "label") {
            $label = $this->input->post('jai_label');
            $explode_a = explode(",", $label);
            $explode_b = explode(".", $explode_a[1]);
            $explode_c = explode("-", $explode_b[1]);
            $jai_label = $explode_a[0];
            $assy_code_label = substr($explode_b[0], 4, 4);
            $ctn_no1 = $explode_c[0];
            $ctn_no2 = $explode_c[1];

            $qr = $this->input->post('jai_qr');
            $explode_qr = explode(",", $qr);
            $jai_qr = $explode_qr[0];
            $assy_code_qr = substr($explode_qr[0], 4, 4);
            $ctn_no_qr = substr($explode_qr[0], 9, 7);

            $pallet = $this->input->post('jai_pallet');
            $explode_pallet = explode(",", $pallet);
            $jai_pallet = $explode_pallet[0];
            $assy_code_pallet = substr($explode_pallet[0], 4, 4);
            $ctn_no_pallet = explode("-", $explode_pallet[1]);
            $ctn_no1_pallet = $ctn_no_pallet[0];
            $ctn_no2_pallet = $ctn_no_pallet[1];

            $count_ctn_pallet = $ctn_no2_pallet - $ctn_no1_pallet + 1;


            $jml_ctn = $ctn_no2 - $ctn_no1 + 1;
            for ($i = 0; $i < $jml_ctn; $i++) {
                $ctn_label = $ctn_no1;
                if ($assy_code_label . $ctn_label == $assy_code_qr . $ctn_no_qr) {
                    for ($i = 0; $i < $count_ctn_pallet; $i++) {
                        $ctn_pallet = $ctn_no1_pallet;
                        if ($assy_code_label . $ctn_label == $assy_code_pallet . $ctn_pallet) {
                            $status = "VALID";
                        } else {
                            $status = "TIDAK VALID";
                            $ctn_no1_pallet++;
                        }
                    }
                } else {
                    $status = "TIDAK VALID";
                    $ctn_label++;
                }
            }

            $this->M_scan_in->insert_out($jai_label, $assy_code_label, $ctn_no1, $ctn_no2, $jai_qr, $assy_code_qr, $ctn_no_qr, $status);
            echo json_encode(array(
                "statusCode" => $status
            ));
        }
    }


    public function insert_scan_in()
    {
        if ($this->input->post('tipe') == "label") {
            $label = $this->input->post('jai_label');
            $explode_a = explode(",", $label);
            $explode_b = explode(".", $explode_a[1]);
            $explode_c = explode("-", $explode_b[1]);
            $jai_label = $explode_a[0];
            $assy_code_label = substr($explode_b[0], 4, 4);
            $ctn_no1 = $explode_c[0];
            $ctn_no2 = $explode_c[1];

            $qr = $this->input->post('jai_qr');
            $explode_qr = explode(",", $qr);
            $jai_qr = $explode_qr[0];
            $assy_code_qr = substr($explode_qr[0], 4, 4);
            $ctn_no_qr = substr($explode_qr[0], 9, 7);

            $jml_ctn = $ctn_no2 - $ctn_no1 + 1;
            for ($i = 0; $i < $jml_ctn; $i++) {
                $ctn_label = $ctn_no1;
                if ($assy_code_label . $ctn_label == $assy_code_qr . $ctn_no_qr) {
                    $status = "VALID";
                } else {
                    $status = "TIDAK VALID";
                    $ctn_label++;
                }
            }

            $this->M_scan_in->insert_label($jai_label, $assy_code_label, $ctn_no1, $ctn_no2, $jai_qr, $assy_code_qr, $ctn_no_qr, $status);
            echo json_encode(array(
                "statusCode" => $status
            ));
        }
    }
}