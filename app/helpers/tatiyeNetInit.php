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
namespace app;
use app\tatiye;
/**
 * Generates an HTML block tag that follows the Bootstrap documentation
 * on how to display  component.
 *
 * See {@link https://tatiyeNet/} for more information.
 */
class tatiyeNetInit{

  var  $_tpldata = array(),
     $_section = array(),
     $files = array();
   
  var $Parser_CACHE_DIR,
    $bShow_language_index = '',
    $root;
    
  const PCACHE_SET = 1,
      PCACHE_GET = 2,
      PCACHE_ADD = 3,
      PCACHE_RESET = 4;
  
  /**
   * Constructor. Simply sets the root dir.
   *
   */




  function Parser($root = "./") {
    $this->set_rootdir($root);
    $this->Parser_CACHE_DIR = '';
  }
  
  function __destruct()
  {
    $this->destroy();
  }
  
  function reset_files()
  {
    $this->files = array();
  }
  
  /**
   * Destroys this template object. Should be called when you're done with it, in order
   * to clear out the template data so you can load/parse a new template set.
   */
  function destroy()
  {
    unset( $this->_tpldata );
    unset( $this->files );
    unset( $this->_section );
    
    unset( $this->Parser_CACHE_DIR, $this->root, $this->bShow_language_index);
  }
  
  function get_block( $blockname )
  {
    if( isset($this->_tpldata['.'][$blockname]) )
      return $this->_tpldata['.'][$blockname];

    return false;
  }
  
  function get_section( $section_name )
  {
    if( isset($this->_section[$section_name]) )
    {
      /* // for multiple sections with 1 name
      if( count($this->_section[$section_name])==1 )
        return $this->_section[$section_name][0]; */
      return $this->_section[$section_name];
    }

    return false;
  }
  
  /**
   * Sets the template root directory for this Template object.
   */
  function set_rootdir($dir)
  {
    if (!is_dir($dir))
    {
      return false;
    }

    $this->root = $dir;
    return true;
  }

  /**
   * Root-level variable assignment. Adds to current assignments:
   *  $bAppend = false: overriding any existing variable assignment with the same name
   *  $bAppend = true : appending existing variable
   */
  function WF_var($varname, $varval, $bAppend = false)
  {
    if( $bAppend && isset($this->_tpldata['.'][$varname]) )
    {
      $this->_tpldata['.'][$varname] .= $varval;
      return true;
    }
    
    $this->_tpldata['.'][$varname] = $varval;
    return true;
  }
  function val($varname, $varval, $bAppend = false)
  {
    if( $bAppend && isset($this->_tpldata['.'][$varname]) )
    {
      $this->_tpldata['.'][$varname] .= $varval;
      return true;
    }
    
    $this->_tpldata['.'][$varname] = $varval;
    return true;
  }

  /**
   * Root-level variable assignment. Adds to current assignments:
   *  $bAppend = false: overriding any existing variable assignment with the same name
   *  $bAppend = true : appending existing variable
   */
  function WF_vars($vararray, $bAppend = false)
  {
    reset ($vararray);
    while (list($key, $val) = each($vararray))
    {
      if( $bAppend && isset($this->_tpldata['.'][$key]) )
      {
        $this->_tpldata['.'][$key] .= $val;
        continue;
      }
      
      $this->_tpldata['.'][$key] = $val;
    }

    return true;
  }
  


  function foreach($varblock, $vararray)
  {
    if( !is_array($vararray) )
    {
       die("Parser->tatiyeNet_foreach(): $vararray is not an array.");
    }
    
    if( !isset($this->_tpldata['.'][$varblock]) )
    {
      $this->_tpldata['.'][$varblock] = array();
    }
    array_push($this->_tpldata['.'][$varblock], $vararray);
    
    /*while( list($key, $val) = each($vararray) )
    {
      $this->_tpldata['.'][$varblock][$key] = $val;
    }*/
    
    return true;
  }

  function this($varblock, $vararray)
  {
    if( !is_array($vararray) )
    {
       die("Parser->devil_foreach(): $vararray is not an array.");
    }
    
    if( !isset($this->_tpldata['.'][$varblock]) )
    {
      $this->_tpldata['.'][$varblock] = array();
    }
    array_push($this->_tpldata['.'][$varblock], $vararray);
    
    /*while( list($key, $val) = each($vararray) )
    {
      $this->_tpldata['.'][$varblock][$key] = $val;
    }*/
    
    return true;
  }
  function assign_block_vars1($varblock, $vararray) {
     // if( !is_array($vararray) )
     // {
     //    die("tatiyeNetInit->assign_block_vars(): $vararray is not an array.");
     // }
    
     // if( !isset($this->_tpldata['.'][$varblock]) )
     // {
     //   $this->_tpldata['.'][$varblock] = array();
     // }
     // array_push($this->_tpldata['.'][$varblock], $vararray);
    
    while( list($key, $val) = each($vararray) ){
       $setKey=strtoupper($varblock);
      $this->_tpldata['.'][$varblock][$key] = $val;
    }
    
    // return $varblock;
  }


  function assign_block_vars($varblock, $vararray){

    if( !is_array($vararray) )
    {
       die("tatiyeNetInit->assign_block_vars(): $vararray is not an array.");
    }
    
    if( !isset($this->_tpldata['.'][$varblock]) )
    {
      $this->_tpldata['.'][$varblock] = array();
    }
    array_push($this->_tpldata['.'][$varblock], $vararray);
    
    /*while( list($key, $val) = each($vararray) )
    {
      $this->_tpldata['.'][$varblock][$key] = $val;
    }*/
    
    return true;
  }



    function tatiyeNet_section($varblock, $vararray){
    if( !is_array($vararray) )
    {
       die("Parser->tatiyeNet_section(): $vararray is not an array.");
    }
    
    if( !isset($this->_tpldata['.'][$varblock]) )
    {
      $this->_tpldata['.'][$varblock] = array();
    }
    array_push($this->_tpldata['.'][$varblock], $vararray);
    
    /*while( list($key, $val) = each($vararray) )
    {
      $this->_tpldata['.'][$varblock][$key] = $val;
    }*/
    
    return true;
  }
  
  function assign_file_var($varfile, $varname, $varval)
  {
    if( !isset($this->files[$varfile]) )
    {
       die("Parser->assign_file_var(): Do add file $varfile yet.");
    }
    /*if( !isset($this->_tpldata['.'][$varfile]) )
      $this->_tpldata['.'][$varfile] = array();*/
    $this->_tpldata['.'][$varfile][$varname] = $varval;

    return true;
  }
  /**
   * Root-level variable assignment. Adds to current assignments, overriding
   * any existing variable assignment with the same name.
   */
  
  function add_file($varfile)
  {
echo "Couldn't load template file $this->root$varfile"; exit;
    if( !file_exists($this->root . $varfile) )
    {
      die("Parser->add_file(): Couldn't load template file $this->root$varfile");
    }
    $this->files[$varfile] = $varfile;
    
    return true;


    // if( !file_exists($this->root . $varfile) )
    // {
    //   die("tatiyeNetInit->add_file(): Couldn't load template file $this->root$varfile");
    // }
    // $this->files[$varfile] = $varfile;
    
    // return true;







  }
  
  private function add_tempfile($varfile)
  {
    //echo "Couldn't load template file $this->root$varfile"; exit;
    if( !file_exists($varfile) )
    {
      die("Parser->add_file(): Couldn't load template file $this->root$varfile");
    }
    $this->files[$varfile] = $varfile;
    
    return true;
  }
  
  function cache( $cache_name, $action = self::PCACHE_GET, $content = '' )
  {
    switch( $action )
    {
      case self::PCACHE_SET:
        if( !file_exists($this->Parser_CACHE_DIR) )
          mkdir($this->Parser_CACHE_DIR);

        // caching a section
        if( empty($content) && in_array($cache_name, array_keys($this->_section)) )
        {
          $content = $this->_section[$cache_name];
        }
        
        // caching static file
        if( !empty($content) )
        {
          $fpq = fopen( $this->Parser_CACHE_DIR . '/' . $cache_name, 'w+' );
          fwrite( $fpq, $content );
          fclose($fpq);
          return true;
        }
        return false;
        
        /* $cache_names = explode('.', $cache_name);
        if( count($cache_names)>1 )
        {
          next($cache_names);
          foreach($cache_names as $cache_name)

          // caching a section
          if( empty($content) && in_array($cache_name, array_keys($this->_section)) )
          {
            $content = $this->_section[$cache_name];
          }
          
          print_r($this->_section[$cache_name]); exit;
          
          // caching static file
          if( !empty($content) )
          {
            $fpq = fopen( $this->Parser_CACHE_DIR . '/' . $cache_name, 'w+' );
            fwrite( $fpq, $content );
            fclose($fpq);
            //return true;
          }
          return true;
        } */
        break;
      case self::PCACHE_GET:
        if( file_exists($this->Parser_CACHE_DIR . '/' . $cache_name) )
          return file_get_contents($this->Parser_CACHE_DIR . '/' . $cache_name);
        return '';
      default:
        break;
    }
  }
  
  function html_standard( &$content )
  {
    if( !empty($content) )
      $content = str_replace( array( '& ', ' & ' ),
             array( '&amp; ', ' &amp; ' ),
             $content );
  }
  
  function compress(&$codes, $bRemoveComment = true)
  {
    //return ;
    //$codes = preg_replace( '#([\r\n\t]*)|([\s]{2,})#U', '', $codes);
    $codes_array = preg_split( '#<!-- START_SECTION donot_compress -->([\S\W]*)<!-- STOP_SECTION donot_compress -->#U', $codes, - 1, PREG_SPLIT_DELIM_CAPTURE );
    if( ($len = count($codes_array)) )
    {
      
      for( $i=0, $codes=''; $i<$len; $i++ )
      {
        if( !($i%2) )
          $codes .= preg_replace( '#([\r\n\t}*)|([\s]{2,})#U', '', $codes_array[$i] );
        else
          $codes .= $codes_array[$i];
      }
      unset( $codes_array );
    }
    else 
      $codes = preg_replace( '#([\r\n\t]*)|([\s]{2,})#U', '', $codes );
    
    if( $bRemoveComment )
      $this->strip_comment( $codes );
  }
  
  function strip_comment( &$content )
  {
    if( !empty($content) )
      $content = preg_replace('#<!--(.*?)-->#', '', $content);
  }
  
  /**
   * Load the file for the handle, compile the file,
   * and run the compiled code. This will print out
   * the results of executing the template.
   */
  function pparse(&$content, $bRemove_VARS = true, $bReturn = true, $bCompress = false){

    global $lang;

    preg_match_all( "#\{([a-zA-Z0-9_.]*)}#", $content, $match_array, PREG_SET_ORDER);
    foreach( $match_array as $match_val )
    {
      $content = str_replace( $match_val[0], 
                      isset($this->_tpldata['.'][$match_val[1]]) ? 
                      $this->_tpldata['.'][$match_val[1]] : 
                      (!$bRemove_VARS ? $match_val[0] : ''), $content 
                     );
    }
    preg_match_all( "#_lang\{(.*)\}#U", $content, $match_array, PREG_SET_ORDER);

     
    foreach( $match_array as $match_val )
    {
      $content = str_replace( $match_val[0], 
                  $this->bShow_language_index ? (empty($lang[$match_val[1]]) ? $match_val[1] : $lang[$match_val[1]]) : $lang[$match_val[1]], 
                  $content 
                  );
    }
    
    // preg_match_all( "#_config\{(.*)\}#U", $content, $match_array, PREG_SET_ORDER);
    // foreach( $match_array as $match_val )
    // {
    //  $content = str_replace( $match_val[0], 
    //              $board_config[$match_val[1]], 
    //              $content 
    //              );
    // }
    if( $bRemove_VARS )
    {
      $content = preg_replace( "#\{([A-Z0-9_]*)}#", '', $content);
    }
    if( !$bReturn )
    {
       echo $content;
       return true;
    }
    if( $bCompress )
      $this->compress( $content );
      $this->html_standard( $content );

    return trim($content);
  }
  
  private function pparse_block(&$content, $blockname, /*$bRemove_VARS = true, */$bReturn = true)
  {
    preg_match_all( "#\{$blockname\.([A-Z0-9_]*)\}#", $content, $match_array, PREG_SET_ORDER );
    
    //print_r($match_array);
    
    $block_length = count($this->_tpldata['.'][$blockname]);
      
    $res = '';
    for( $i = 0 ; $i < $block_length ; $i++ )
    {
      $temp = $content;
      foreach( $match_array as $val )
      {
        //print_r($val);
        //echo $val[1] . 'ssssssss';
        if( $this->_tpldata['.'][$blockname][$i][$val[1]] === true )
        {
          $this->_tpldata['.'][$blockname][$i][$val[1]] = 'start_loop_section_' . $blockname . '_' . $i;
          eval('global $start_loop_section_' . $blockname . '_' . $i . ';');
          eval('$start_loop_section_' . $blockname . '_' . $i . ' = true;');
          
          //eval('$'."start_loop_section_$blockname_$i = true;");
        }
        $temp = str_replace( $val[0], 
                    isset($this->_tpldata['.'][$blockname][$i][$val[1]]) ? 
                    trim($this->_tpldata['.'][$blockname][$i][$val[1]]) : '' 
                    /*(!$bRemove_VARS ? $val[1] : '')*/, $temp 
                   );
        //eval('$'.$this->_tpldata['.'][$blockname][$i][$val[1]]." = true;");
        //eval('$'."start_loop_section_$blockname_$i = true;");
        //echo $this->_tpldata['.'][$blockname][$i][$val[1]] . 'BBBBBBBBB';
      }
      $res .= $temp;
    }
    $content = $res;
    if( $i>0 )
    {
      global $$blockname;
      $$blockname = true;
    }
      
    /*if( $bRemove_VARS )
    {
      $content = preg_replace( "#\{([A-Z0-9_]*)}#", '', $content);
    }*/
    if( !$bReturn )
    {
       echo $content;
       return true;
    }
    //echo $content . 'ssssssss';
    return $content;
  }

  
    function GraphObject($varfile, $bRemove_VARS = false, $bReturn = true, $bCompress = false/*, $reset_files = true*/){


    ob_start();

        require_once($varfile);
        // include $varfile;
        $content = ob_get_contents();
    ob_end_clean();
    //echo $content;exit;
    // create a new tmp content for this included file
    $tempfile = tempnam(sys_get_temp_dir(), $varfile);
    $temphandle = fopen($tempfile, "w");
    fwrite($temphandle, $content);
    fclose($temphandle);

    // add tmp content to Parser for parsing
   
    $this->add_tempfile($tempfile);
    $content = $this->pparse_file($tempfile, $bRemove_VARS, true, $bCompress);
    
    // delete tmp file
    unlink($tempfile);
    
    return $this->pparse($content, $bRemove_VARS, true, $bCompress);
  }
  
  /**
   * Method: pparse_file
   * $varfile             - File will be parsed
   * $bRemove_VARS          - Do not parse common vars in this file
   * $bReturn             - Do not print ouf content of parsed file
   * $reset_files           - Reset files var of template
   */
  function pparse_file($varfile, $bRemove_VARS = false, $bReturn = true, $bCompress = false/*, $reset_files = true*/){
    error_reporting(0);
    $file_content = file_get_contents($this->files[$varfile]);
    $str_pattern = "#<!-- App ([a-z0-9_]*) -->([\S\W]*)<!-- END_App \\1 -->#U";






    if( preg_match_all( $str_pattern, $file_content, $match_array, PREG_SET_ORDER) ){
      /**
       * Returns block  - <tag>{blockname.KEY{</tag>
       * val[0]     - Orginal string
       * val[1]     - blockname
       * val[2]     - content of Returns block
      */
      while( list($index, $val) = each($match_array) )
      {
        if( isset($this->_tpldata['.'][$val[1]]) && is_array($this->_tpldata['.'][$val[1]]) )
        {
          if( preg_match_all( $str_pattern, $val[2], $match_array_sub, PREG_SET_ORDER) )
          {
            while( list($index_sub, $val_sub) = each($match_array_sub) )
            {
              if( isset($this->_tpldata['.'][$val_sub[1]]) && is_array($this->_tpldata['.'][$val_sub[1]]) )
              {
                $this->pparse_block($val_sub[2], $val_sub[1]);
              }
              $val[2] = str_replace($val_sub[0], $val_sub[2], $val[2]);
            }
            unset($index_sub, $val_sub, $match_array_sub);
          }
          $this->pparse_block($val[2], $val[1]);
        }
        //echo $val[2];
        $file_content = str_replace($val[0], $val[2], $file_content);
      }
      unset($index, $val, $match_array);
   
      // echo '<pre>';
      // print_r($match_array);
      // echo '</pre>';

    }
    
    $str_pattern = "#<!-- START_SECTION ([a-z0-9_]*) -->([\S\W]*)<!-- STOP_SECTION \\1 -->#U";
    if( preg_match_all( $str_pattern, $file_content, $match_array, PREG_SET_ORDER) )
    {
      /**
       * Orginal string - <!-- START_SECTION name --> # <!-- STOP_SECTION name -->
       * val[0]     - Orginal string
       * val[1]     - name
       * val[2]     - content of Returns block #
      */
      //print_r($match_array);
      $str_pattern_sub = "#<!-- START_SUB ([a-z0-9_]*) -->([\S\W]*)<!-- STOP_SUB \\1 -->#U";
      while( list($index, $val) = each($match_array) )
      {
        /*
          val[2]: result of START_SECTION, find & parse each SUB_SECTION in START_SECTION
          then return all to outer WHILTE
        */
        // parse sub content if available
        if( preg_match_all( $str_pattern_sub, $val[2], $match_array_sub, PREG_SET_ORDER) )
        {
          // parse content of sub sections
          while( list($index_sub, $val_sub) = each($match_array_sub) )
          {
            // global $$val_sub[1];
            if( $$val_sub[1] )
            {
              $str_pattern_child = "#<!-- START_CHILD ([a-z0-9_]*) -->([\S\W]*)<!-- STOP_CHILD \\1 -->#U";
              if( preg_match_all( $str_pattern_child, $val_sub[2], $match_array_child, PREG_SET_ORDER) )
              {
                //print_r($match_array_child);
                while( list($index_child, $val_child) = each($match_array_child) )
                {
                  // global $$val_child[1];
                  if( $$val_child[1] )
                  {
                    $this->pparse($val_child[2], $bRemove_VARS, true, $bCompress);
                  }
                  else
                    $val_child[2] = '';
                  $val_sub[2] = str_replace($val_child[0], $val_child[2], $val_sub[2]);
                }
              }
              //$this->pparse($val_sub[2]);
            }
            else
              $val_sub[2] = '';
            $val[2] = str_replace($val_sub[0], $val_sub[2], $val[2]);
          }
        }
        
        // global $$val[1];
     
        //echo $$val[1] == true ? '1' : '0';
        // parse content of main sections
        if( $val[1] == 'donot_compress' ) 
          $val[2] = $val[0];
        elseif( $$val[1] ) {
          $this->pparse( $val[2], $bRemove_VARS, true, $bCompress );
          
          // add parsed result to $_section
          $this->_section[$val[1]] = $val[2];
          
          /* // for multiple sections with 1 name
          if( !isset($this->_section[$val[1]]) )
          {
            $this->_section[$val[1]] = array();
          }
          array_push($this->_section[$val[1]], $val[2]); */
          //echo $val[2]; exit;
        }
        else 
          $val[2] = '';
        
        $file_content = str_replace($val[0], $val[2], $file_content);
      }
    }
    
    if( isset($this->_tpldata['.'][$varfile]) )
    {
      while( list($var_name, $var_val) = each($this->_tpldata['.'][$varfile]) )
      {
        $file_content = str_replace( '{' . $var_name . '}', $var_val, $file_content );
      }
    }
    /*if( $bRemove_VARS )
    {
      $file_content = preg_replace( "#\{([A-Z0-9_]*)}#", '', $file_content);
    }
    if( $reset_files )
    {
      $this->reset_files();
    }*/
    if(!$bReturn){
      echo $this->pparse($file_content, $bRemove_VARS, true, $bCompress);
      return true;
    }
    return $this->pparse($file_content, $bRemove_VARS, true, $bCompress);
  }
}

?>
