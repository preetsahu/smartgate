<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddressModel extends CI_Model
{
    public function getCountryModel()
    {
      $sql="SELECT * FROM `countries`;";
      $rs = $this->db->query($sql);
      return $rs;
    }

    public function getStateModel($id)
    {
        $sql="SELECT s.`id`, s.`name`, s.`country_id` FROM `states` s INNER JOIN `countries` c ON s.`country_id`=c.`id` where c.id='$id';";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function getCityModel($id)
    {
        $sql="SELECT c.`id`, c.`name`, c.`state_id` FROM `states` s INNER JOIN `cities` c ON s.`id`=c.`state_id` where s.id='$id';";
        $rs = $this->db->query($sql);
        return $rs;
    }
}

?>