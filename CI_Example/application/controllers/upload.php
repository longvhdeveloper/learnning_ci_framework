<?php
class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
    }
    
    public function index()
    {
        $data['error'] = '';
        $this->load->view('upload/index_view', $data);
    }
    
    public function doupload()
    {
        if ($this->input->post('fsubmit')) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '900';
            $config['max_width']  = '1024';
            $config['max_height']  = '1204';
            //$config['file_name'] = 'myimg' . time();
            
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('img')) {
                echo 'Upload thanh cong';
                echo '<pre>';
                print_r($this->upload->data());
                echo '</pre>';
                $this->load->library('image_lib');
                $data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image']	= './uploads/'. $data['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']	= 150;
                $config['height']	= 120;
                
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();
                unset($config);
                
                
                
//                 $config['wm_text'] = 'Copyright 2015 - Jackie wu';
//                 $config['wm_type'] = 'text';
//                 $config['wm_font_path'] = './system/fonts/texb.ttf';
//                 $config['wm_font_size']	= '16';
                
                $config['source_image']	= './uploads/'. $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['wm_type'] = 'overlay';
                $config['wm_overlay_path'] = './uploads/condau.jpeg';
                $config['wm_vrt_alignment'] = 'bottom';
                $config['wm_hor_alignment'] = 'right';
                $config['wm_opacity'] = 50;
                $config['wm_padding'] = '0';
                $this->image_lib->initialize($config);
                $this->image_lib->watermark();
                
                
            } else {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('upload/index_view', $data);
            }
        }
    }
}