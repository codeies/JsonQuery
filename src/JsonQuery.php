<?php

namespace Codeies;

class JsonQuery
{
    private $data;
    private $filteredData;

    public function __construct($jsonData)
    {
        $this->data = json_decode($jsonData, true);
        $this->filteredData = $this->data;
    }

    public static function fromFile($jsonFilePath)
    {
        $jsonData = file_get_contents($jsonFilePath);
        return new self($jsonData);
    }

    public function find($value)
    {
        $this->filteredData = array_filter($this->data, function ($item) use ($value) {
            foreach ($item as $key => $val) {
                if (stripos($val, $value) !== false) {
                    return true;
                }
            }
            return false;
        });
        return $this;
    }

    public function sort($key, $order = 'asc')
    {
        usort($this->filteredData, function ($a, $b) use ($key, $order) {
            if ($order === 'desc') {
                return $b[$key] <=> $a[$key];
            } else {
                return $a[$key] <=> $b[$key];
            }
        });
        return $this;
    }

    public function paginate($page, $perPage)
    {
        $offset = ($page - 1) * $perPage;
        $this->filteredData = array_slice($this->filteredData, $offset, $perPage);
        return $this->filteredData;
    }

    public function getData()
    {
        return $this->filteredData;
    }
}
