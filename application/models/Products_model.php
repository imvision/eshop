<?php
class Products_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function get_products($slug = FALSE)
	{
        if ($slug === FALSE)
        {
            $query = $this->db->get('products');
            return $query->result_array();
        }

        $query = $this->db->get_where('products', array('slug' => $slug));
        return $query->row_array();
	}
}