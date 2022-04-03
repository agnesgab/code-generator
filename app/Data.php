<?php

namespace App;

class Data {

    public function getData()
    {
        return json_decode(file_get_contents("src/data.json"), true);
    }

    public function getItems()
    {
        return $this->getData()['items'];
    }

    public function getVarieties()
    {
        return $this->getData()['varieties'];
    }

}