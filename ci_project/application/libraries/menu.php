<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu
{
    protected $open = '<ul class="menu">';
    protected $close = '</ul>';
    protected $openItem = '<li>';
    protected $closeItem = '</li>';
    protected $data;
    protected $result = '';
    protected $baseUrl = '';

    public function __construct($config = array())
    {
        if (!empty($config)) {
            $this->setOption($config);
        }
    }

    public function setOption($config)
    {
        foreach ($config as $key => $value) {
            $method = 'set' . ucfirst($key);
            $this->$method($value);
        }
    }

    public function setOpen($open)
    {
        $this->open = $open;
    }


    public function setOpenItem($openItem)
    {
        $this->openItem = $openItem;
    }

    public function setClose($close)
    {
        $this->close = $close;
    }

    public function setCloseItem($closeItem)
    {
        $this->closeItem = $closeItem;
    }

    public function setData($data)
    {
        foreach ($data as $value) {
            $parent = $value['parent'];
             $this->data[$parent][] = $value;
        }
    }

    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
    }

    public function callMenu($parent = 0)
    {
        if (isset($this->data[$parent])) {
            $this->result .= $this->open;
            foreach ($this->data[$parent] as $key => $value) {
                $id = $value['id'];
                $this->result .= $this->openItem;
                if (!isset($this->data[$id])) {
                    $this->result .= '<a href="'.$this->baseUrl.'/'.$value['id'].'">' . $value['name'] . '</a>';
                } else {
                    $this->result .= '<a href="javascript:void(0)" class="link">' . $value['name']
                    . '<i class="fa fa-chevron-down" style="float:right;"></i></a>';
                }
                $this->callMenu($id);
                $this->result .= $this->closeItem;
            }
            $this->result .= $this->close;
        }

        return $this->result;
    }
}