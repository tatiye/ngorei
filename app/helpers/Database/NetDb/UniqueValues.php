<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2018 wolf05 <info@tatiye.net / https://www.facebook.com/tatiyeNet/>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace wolf05\helper\Database\NetDb;
use wolf05\helper\tatiyeNet;
class UniqueValues{
    #The data Array
    private $dataArray;
    /*
        The index you want to get unique values.
        It can be the named index or the integer index.
        In our case it is "member_name"
    */
    private $indexToFilter;

    public function __construct($dataArray, $indexToFilter){
        $this->dataArray = $dataArray;
        $this->indexToFilter = $indexToFilter;
    }
    private function getUnique(){
        foreach($this->dataArray as $key =>$value){
            $id[$value[$this->indexToFilter]]=$key;
        }
        return array_keys(array_flip(array_unique($id,SORT_REGULAR)));
    }
    public function getFiltered(){
        $array = $this->getUnique();
        $i=0;
        foreach($array as $key =>$value){
            $newAr[$i]=$this->dataArray[$value];
            $i++;
        }
        return $newAr;
    }
}
?>