<?php

class Order_bill_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get bill by id
     */
    function get_bill($id)
    {
        // return $this->db->get_where('bill',array('id'=>$id))->row_array();

        return $this->db->select('b.*,u.firstName as firstName,u.lastName as lastName')
        ->from('order_bill b')
        ->join('users u','u.id=b.userId','left')   
        ->where('b.id',$id)  
        // ->where('del !=',1) 
        // ->or_where('del is null')     
        ->where("(b.del != 1 OR b.del is null)")
         ->get()
        ->row_array();
    }
  

   
        
    /*
     * Get all bill
     */
    function get_all_bill()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->select('b.*,u.firstName as firstName,u.lastName as lastName')
        ->from('order_bill b')
        
        ->join('users u','u.id=b.userId','left')  
        // ->where('b.del !=',1) 
        // ->or_where('b.del is null') 
        ->where("(b.del != 1 OR b.del is null)")
         ->get()
        ->result_array();
        // $this->db->order_by('id', 'desc');
        // return $this->db->get('bill')->result_array();
    }

    function get_bill_latest_by_user_id($user_id)
    {
        // $this->db->order_by('id', 'desc');
        return $this->db->select('b.*,u.firstName as firstName,u.lastName as lastName')
        ->from('order_bill b')
        
        ->join('users u','u.id=b.userId','left')  
        // ->where('b.del !=',1) 
        // ->or_where('b.del is null') 
        ->where("(b.del != 1 OR b.del is null)")
        ->where('b.userId',$user_id)
        ->order_by('timestamp', 'desc')
         ->get()
        ->row_array();
        // $this->db->order_by('id', 'desc');
        // return $this->db->get('bill')->result_array();
    }
   
        
    /*
     * function to add new bill
     */
    function add_bill($params)
    {
        $this->db->insert('order_bill',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update bill
     */
    function update_bill($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('order_bill',$params);
    }
    
    /*
     * function to delete bill
     */
    function delete_bill($id)
    {
        return $this->db->delete('order_bill',array('id'=>$id));
    }
}
