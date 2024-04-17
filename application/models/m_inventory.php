<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_inventory extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getInventory()
    {
        $sql = "select * from tbl_inventory";
        $db = $this->db->query($sql)->result_array();
        return $db; 
    }

    public function getSalesOrder()
    {
        $sql = "SELECT *
        FROM tbl_sales_order tso
        INNER JOIN tbl_inventory ti ON tso.id_barang = ti.Id
        WHERE NOT EXISTS (
            SELECT 1
            FROM tbl_purchase_order
            WHERE tbl_purchase_order.id_so = tso.id
        )";
        $db =$this->db->query($sql)->result_array();
        return $db; 
    }

    public function simpanSo($data)
    {
        
        date_default_timezone_set('Asia/Jakarta');
        $datenow = date("Y-m-d");
        
        $result     = false;
        $this->db->trans_begin();
        try {
            $so['no_so']            = $data['nomorso'];
            $so['nama_customer']    = $data['customer'];
            $so['alamat_customer']  = $data['alamat'];
            $so['date_so']          = $datenow;
            $so['status_so']        = 'DRAFT';
            $so['id_barang']         = $data['barang'];
            // echo '<pre>';print_r($so);die;
            $this->db->insert('tbl_sales_order', $so);
            // $id_login = $this->db->insert_id();
 
            $this->db->trans_commit();
            $result['is_valid'] = true;
        } catch (\Exception $e) {
            $this->db->trans_rollback();
        }
        return $result;

    }

    public function setStatusSo($data)
    {
        // echo '<pre>';print_r($data);die;
        $result     = false;
        $this->db->trans_begin();
        try {
            
            $so['status_so']        = $data['status'];
            $this->db->update('tbl_sales_order', $so, array('no_so' => $data['nomorso']));
            // $id_login = $this->db->insert_id();
 
            $this->db->trans_commit();
            $result['is_valid'] = true;
        } catch (\Exception $e) {
            $this->db->trans_rollback();
        }
        return $result;
    }

    public function setStatusPo($data)
    {
        // echo '<pre>';print_r($data);die;
        $result     = false;
        $this->db->trans_begin();
        try {
            
            $so['status_po']        = $data['status'];
            $this->db->update('tbl_purchase_order', $so, array('no_po' => $data['nomorpo']));
            // $id_login = $this->db->insert_id();
 
            $this->db->trans_commit();
            $result['is_valid'] = true;
        } catch (\Exception $e) {
            $this->db->trans_rollback();
        }
        return $result;
    }

    public function getPurchaseOrder()
    {
        $sql = "SELECT tpo.*, ti.nama_barang, tso.no_so FROM tbl_purchase_order tpo
        INNER JOIN tbl_sales_order tso ON tpo.id_so = tso.Id
        INNER JOIN tbl_inventory ti ON tpo.id_barang = ti.Id";
        $db =$this->db->query($sql)->result_array();
        return $db; 
    }

    public function simpanPo($data)
    {
        // echo '<pre>';print_r($data);die;
        date_default_timezone_set('Asia/Jakarta');
        $datenow = date("Y-m-d");
        
        $result     = false;
        $this->db->trans_begin();
        try {
            $po['no_po']            = $data['po'];
            $po['id_so']            = $data['so'];
            $po['nama_customer']    = $data['customer'];
            $po['alamat_customer']  = $data['alamat'];
            $po['date_po']          = $datenow;
            $po['status_po']        = 'DRAFT';
            $po['id_barang']        = $data['barang'];
            $po['qty_barang']       = $data['qty'];
            // echo '<pre>';print_r($po);die;
            $this->db->insert('tbl_purchase_order', $po);
            // $id_login = $this->db->insert_id();
 
            $this->db->trans_commit();
            $result['is_valid'] = true;
        } catch (\Exception $e) {
            $this->db->trans_rollback();
        }
        return $result;

    }



    public function addInventory($data)
    {
         // echo '<pre>';print_r($data);die;
         date_default_timezone_set('Asia/Jakarta');
         $datenow = date("Y-m-d");
         
         $result     = false;
         $this->db->trans_begin();
         try {
             $brg['nama_barang']      = $data['nama_barang'];
             $brg['qty_barang']       = 0;
             // echo '<pre>';print_r($po);die;
             $this->db->insert('tbl_inventory', $brg);
             // $id_login = $this->db->insert_id();
  
             $this->db->trans_commit();
             $result['is_valid'] = true;
         } catch (\Exception $e) {
             $this->db->trans_rollback();
         }
         return $result;
    }

    public function getDataPurchaseOrder()
    {
        $sql = "SELECT tpo.*, ti.nama_barang
        FROM tbl_purchase_order tpo
        INNER JOIN tbl_inventory ti ON tpo.id_barang = ti.Id
        WHERE NOT EXISTS (
            SELECT 1
            FROM tbl_penerimaan
            WHERE tbl_penerimaan.id_po = tpo.id
        )";

        $db =$this->db->query($sql)->result_array();
        return $db;
    }

    public function getPenerimaan()
    {
        $sql = "SELECT tp.*, ti.nama_barang
        FROM tbl_penerimaan tp
        INNER JOIN tbl_inventory ti ON tp.id_barang = ti.Id";

        $db =$this->db->query($sql)->result_array();
        return $db;
    }

    public function simpanPenerimaan($data)
    {
        //  echo '<pre>';print_r($data);die;
         date_default_timezone_set('Asia/Jakarta');
         $datenow = date("Y-m-d", strtotime("+3 days"));
         
         $result     = false;
         $this->db->trans_begin();
         try {
             $penerimaan['id_po']            = $data['no_po'];
             $penerimaan['no_penerimaan']    = $data['no_penerimaan'];
             $penerimaan['nama_supp']        = $data['customer'];
             $penerimaan['alamat_sup']      = $data['alamat'];
             $penerimaan['no_sj']            = 'BM-001-DC-11-24';
             $penerimaan['status_penerimaan']= 'DRAFT';
             $penerimaan['tanggal_diterima'] = $datenow;
             $penerimaan['id_barang']        = $data['barang'];
             $penerimaan['qty']              = $data['qty'];
            //  echo '<pre>';print_r($penerimaan);die;
             $this->db->insert('tbl_penerimaan', $penerimaan);
             // $id_login = $this->db->insert_id();
  
             $this->db->trans_commit();
             $result['is_valid'] = true;
         } catch (\Exception $e) {
             $this->db->trans_rollback();
         }
         return $result;
    }

    public function setStatusPenerimaan($data)
    {
        $sql = "select qty_barang from tbl_inventory where Id = '".$data['id_barang']."' ";
        $get_qty = $this->db->query($sql)->result_array();
        
        $sum_qty = $get_qty[0]['qty_barang'] + $data['qty'];
        // echo '<pre>';print_r($data);die;

        $result     = false;
        $this->db->trans_begin();
        try {
            
            $so['status_penerimaan']        = $data['status'];
            $this->db->update('tbl_penerimaan', $so, array('no_penerimaan' => $data['nomorpo']));
            // $id_login = $this->db->insert_id();
            

            if($data['status'] == 'APPROVE'){
                $brg['qty_barang'] = $sum_qty;
                $this->db->update('tbl_inventory', $brg, array('Id' => $data['id_barang']));
            }
 
            $this->db->trans_commit();
            $result['is_valid'] = true;
        } catch (\Exception $e) {
            $this->db->trans_rollback();
        }
        return $result;
    }




}
