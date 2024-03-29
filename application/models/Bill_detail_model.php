<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Bill_detail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get bill_detail by id
     */
    function get_bill_detail($id)
    {
        // return $this->db->get_where('bill_detail',array('id'=>$id))->row_array();
        return $this->db->select()
        ->from('bill_detail')
        ->where('id',$id) 
        // ->where('del !=',1) 
        // ->or_where('del is null') 
        ->where("(del != 1 OR del is null)")
        // ->order_by('time', 'DESC')
         ->get()
        ->row_array()
                        ;
    }
    function get_bill_detail_by_bill_id($bill_id)
    {
        // return $this->db->get_where('bill_detail',array('bill_id'=>$bill_id))->row_array();
        return $this->db->select()
        ->from('bill_detail')
        ->where('bill_id',$bill_id) 
        // ->where('del !=',1) 
        // ->or_where('del is null') 
        ->where("(del != 1 OR del is null)")
        // ->order_by('time', 'DESC')
         ->get()
        ->row_array()
                        ;
    }
    function get_bill_detail_by_product_id($productId)
    {
        // return $this->db->get_where('bill_detail',array('productId'=>$productId))->row_array();
        return $this->db->select()
        ->from('bill_detail')
        ->where('productId',$productId) 
        // ->where('del !=',1) 
        // ->or_where('del is null') 
        ->where("(del != 1 OR del is null)")
        // ->order_by('time', 'DESC')
         ->get()
        ->row_array()
                        ;
    }
        
    /*
     * Get all bill_detail
     */
    function get_all_bill_detail($bill_id)
    {

        // $this->db->order_by('id', 'desc');
        // return $this->db->get('bill_detail')->result_array();
        $this->db->order_by('id', 'desc');
        return $this->db->select('b.*,p.price as price,p.name as productName')
        ->from('bill_detail b')
        
        ->join('order_bill b1','b1.id=b.bill_id','left')    
        ->join('product p','p.id=b.productId','left')
        ->where('b1.id',$bill_id)
        // ->where('b.del !=',1) 
        // ->or_where('b.del is null') 
        ->where("(b.del != 1 OR b.del is null)")
         ->get()
        ->result_array();
    }

    function get_all_bill_detail_by_user_id($bill_id,$user_id)
    {

        // $this->db->order_by('id', 'desc');
        // return $this->db->get('bill_detail')->result_array();
        $this->db->order_by('id', 'desc');
        return $this->db->select('b.*,p.price as price,p.name as productName')
        ->from('bill_detail b')
        
        ->join('order_bill b1','b1.id=b.bill_id','left')    
        ->join('product p','p.id=b.productId','left')
        ->where('b1.id',$bill_id)
        ->where('b1.userId',$user_id)
        // ->where('b.del !=',1) 
        // ->or_where('b.del is null') 
        ->where("(b.del != 1 OR b.del is null)")
         ->get()
        ->result_array();
    }
        
    /*
     * function to add new bill_detail
     */
    function add_bill_detail($params)
    {
        $this->db->insert('bill_detail',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update bill_detail
     */
    function update_bill_detail($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('bill_detail',$params);
    }
    
    /*
     * function to delete bill_detail
     */
    function delete_bill_detail($id)
    {
        return $this->db->delete('bill_detail',array('id'=>$id));
    }
}
