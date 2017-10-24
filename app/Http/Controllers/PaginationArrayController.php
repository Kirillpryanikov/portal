<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class PaginationArrayController extends Controller
{
    private $array = [];
    private $count_array = [];
    private $perPage = 20;

    public function __construct($array, $perPage=20)
    {
        $this->array = $array;
        $this->perPage = $perPage;
        $this->count_array = count($array);
    }

    public function getPageData(Request $request)
    {
        $page = $request->has('page')?$request['page']:1;
        $to = $page * $this->perPage;
        $from = $to - $this->perPage;
        $out_array = array_slice($this->array, $from, $this->perPage);
        $allPage = $this->allPage();

        $out_data = [
            'datas' => $out_array,
            'from' =>(integer) $from,
            'to' => (integer) ($to<$this->count_array?$to:$this->count_array),
            'perPage' => (integer) $this->perPage,
            'thisPage' => count($out_array),
            'allPage' => (integer) $allPage,
            'page' => (integer) $page,
        ];

        if ($page > 1){
            $out_data['toBeforePage'] = '/?page='.($page-1);
        }

        if ($page < $allPage){
            $out_data['toNextPage'] = '/?page='.($page+1);
        }

        return $out_data;
    }

    private function allPage(){
        $countArray = count($this->array);
        return ($countArray - $countArray % $this->perPage)/$this->perPage + ($countArray % $this->perPage?1:0);
    }
}
