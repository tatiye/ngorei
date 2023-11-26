<?php
/**
 * TatiyeNet - PHP Helpers for Develover wolf05
 *
 * (The MIT License)
 *
 * Copyright (c) 2020 wolf05 <info@tatiyeNet / https://www.facebook.com/tatiyeNet/>.
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
namespace app\Raw;
use app\tatiye;
class tatiyeNetRawHeader{
    
    /** 
     * @var array The array for processing
     */
    private $rows;

    /** 
     * @var int The column width settings
     */
    private $cs = array();

    /**
     * @var int The Row lines settings
     */
    private $rs = array();

    /**
     * @var int The Column index of keys
     */
    private $keys = array();

    /**
     * @var int Max Column Height (returns)
     */
    private $mH = 2;

    /**
     * @var int Max Row Width (chars)
     */
    private $mW = 60;

    private $head  = false;
    private $pcen  = "";
    private $prow  = "";
    private $pcol  = "";
    
    
    /** Prepare array into textual format
     *
     * @param array $rows The input array
     * @param bool $head Show heading
     * @param int $maxWidth Max Column Height (returns)
     * @param int $maxHeight Max Row Width (chars)
     */
    public function __construct($rows)
    {
        $this->rows =& $rows;
        $this->cs=array();
        $this->rs=array();
 
        if(!$xc = count($this->rows)) return false; 
        $this->keys = array_keys($this->rows[0]);
        $columns = count($this->keys);
        
        for($x=0; $x<$xc; $x++)
            for($y=0; $y<$columns; $y++)    
                $this->setMax($x, $y, $this->rows[$x][$this->keys[$y]]);
    }
    
    /**
     * Show the headers using the key values of the array for the titles
     * 
     * @param bool $bool
     */
    public function showHeaders($bool)
    {
       if($bool) $this->setHeading(); 
    } 
    
    /**
     * Set the maximum width (number of characters) per column before truncating
     * 
     * @param int $maxWidth
     */
    public function setMaxWidth($maxWidth)
    {
        $this->mW = (int) $maxWidth;
    }
    
    /**
     * Set the maximum height (number of lines) per row before truncating
     * 
     * @param int $maxHeight
     */
    public function setMaxHeight($maxHeight)
    {
        $this->mH = (int) $maxHeight;
    }
    
    /**
     * Prints the data to a text table
     *
     * @param bool $return Set to 'true' to return text rather than printing
     * @return mixed
     */
    public function render($return=false,$header='1')
    {
        if($return) ob_start(null, 0, true); 
  
         $this->printLine();
         if (!empty($header)) {
             $this->printHeading();
         } 
        // $this->printHeading();
        
        $rc = count($this->rows);
        for($i=0; $i<$rc; $i++) $this->printRow($i);
        
        $this->printLine(false);

        if($return) {
            $contents = ob_get_contents();
            ob_end_clean();
            return $contents;
        }
    }

    private function setHeading()
    {
        $data = array();  
        foreach($this->keys as $colKey => $value)
        { 
            $this->setMax(false, $colKey, $value);
            $data[$colKey] = strtoupper($value);
        }
        if(!is_array($data)) return false;
        $this->head = $data;
    }

    private function printLine($nl=true)
    {
        print $this->pcen;
        foreach($this->cs as $key => $val)
            print $this->prow .
                @str_pad('', $val, $this->prow, STR_PAD_RIGHT) .
                $this->prow .
                $this->pcen;
        if($nl) print "";
    }

    private function printHeading()
    {
        if(!is_array($this->head)) return false;

        print $this->pcol;
        foreach($this->cs as $key => $val)
            print ''.
                str_pad($this->head[$key], $val, '', STR_PAD_BOTH) .'' .$this->pcol;
        $this->printLine();
    }

    private function printRow($rowKey){
        // loop through each line
        for($line=1; $line <= $this->rs[$rowKey]; $line++)
        {
            print $this->pcol;  
            for($colKey=0; $colKey < count($this->keys); $colKey++){ 
               
                print str_pad(substr($this->rows[$rowKey][$this->keys[$colKey]], ($this->mW * ($line-1)), $this->mW), $this->cs[$colKey], ' ', STR_PAD_RIGHT);
                print "".$this->pcol;          
            }  
        }
         print  "\n";
    }

    private function setMax($rowKey, $colKey, &$colVal)
    { 
        $w = mb_strlen($colVal);
        $h = 1;
        if($w > $this->mW)
        {
            $h = ceil($w % $this->mW);
            if($h > $this->mH) $h=$this->mH;
            $w = $this->mW;
        }
 
        if(!isset($this->cs[$colKey]) || $this->cs[$colKey] < $w)
            $this->cs[$colKey] = $w;

        if($rowKey !== false && (!isset($this->rs[$rowKey]) || $this->rs[$rowKey] < $h))
            $this->rs[$rowKey] = $h;
    }
}