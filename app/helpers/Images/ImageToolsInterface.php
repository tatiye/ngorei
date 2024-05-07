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

namespace app\Images;
use app\tatiye;


	/**
	 * By viewing this file you can learn about which operations you can perform on image
	 */

	/**
	 * @interface ImageTools
	 * @author Arlind Nushi <arlindd@gmail.com>
	 */
	
	interface ImageToolsInterface
	{
		/* Memory size to allocate per image */
		
		const ALLOCATE_MEMORY = '50M';
		
		/* Constants */
	 
		const IMAGE_TYPE_JPG  = 1;
		
		const IMAGE_TYPE_JPEG = 1;
		
		const IMAGE_TYPE_PNG  = 2;
		
		const IMAGE_TYPE_GIF  = 3;
		
		
		const IMAGE_POSITION_TOP = 1;
		
		const IMAGE_POSITION_CENTER = 2;
		
		const IMAGE_POSITION_BOTTOM = 3;
		
		const IMAGE_POSITION_LEFT = 4;
		
		const IMAGE_POSITION_RIGHT = 5;
		
		
		/* Methods */
		
		// Effects
		
		public function reflect($percent = 35, $bg_color = "#FFF", $spacing = -1);
		
		public function setBrightness($brightness = 0);
		
		public function setContrast($contrast = 0);
		
		public function grayscaleImage();
		
		public function addBlur($gausian = false);
		
		public function addGaussianBlur();
		
		
		// Resizing
		
		public function resizeOriginal($new_width, $new_height);
		
		public function resizeWidth($new_width);
		
		public function resizeHeight($new_height);
		
		public function resizeNewByWidth($width, $height, $resize_width, $bgcolor = "#FFF");
		
		public function resizeNewByHeight($width, $height, $resize_height, $bgcolor = "#FFF");
		
		
		// Watermarking
		
		public function addWatermark($text, $vertical_position, $horizontal_position, $font_size = 12, $fontcolor = "#FFF", $angle = 0, $margin = 5);
		
		public function addWatermarkImage($image_path, $vertical_position, $horizontal_position, $margin = 5);
		
		
		// Cropping
		
		public function cropImage($x, $y, $width, $height);
		
		
		// Rotate Image
		
		public function rotateLeft();
		
		public function rotateRight();
		
		public function rotateImage($degree, $bg = null);
		
		
		// Other
		
		public function setTransparentBg();
		
		public function hexToRGB($hex);
		
		
		// Output & Output Type
		
		public function setOutputType($image_type);
		
		public function save($path, $name, $quality = 90, $overwrite = true);
		
		public function showImage();
	}
?>