<?php
Class Gmap extends CI_Controller
{
    public function map(){
        $this->load->model("Hotel_Model");
        $data['hotel'] = $this->Hotel_Model->get_hotels();
        
        $locationMarkers = [];
        $locInfo = [];
 
        foreach($data['hotel'] as $value) {
          $locationMarkers[] = [
            $value['nombre'], $value['latitud'], $value['longitud']
          ];          
          $locInfo[] = [
           "<div class=info_content><h4>".$value['nombre']."</h4><p>".$value['descripcion']."</p></div>"
          ];
        }
        $location['locationMarkers'] = json_encode($locationMarkers);
        $location['locInfo'] = json_encode($locInfo);
        
        $this->load->view('templates/header');
        $this->load->view('pages/maps', $location);
        $this->load->view('templates/footer');
    }
}