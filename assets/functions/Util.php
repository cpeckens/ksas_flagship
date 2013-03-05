<?php
/** 
 * General utility functions
 */

class KSAS_Util {
	/** 
	 * given a number of bytes, return it as a human-readable string
	 * From http://codewalkers.com/seecode/61.html
	 * @param integer $size the number of bytes
	 * @returns string
	 */
	public static function bytesToHuman($size) {
		if ($size < pow(2,10)) return $size." bytes";
		if ($size >= pow(2,10) && $size < pow(2,20)) return round($size / pow(2,10), 0)." KB";
		if ($size >= pow(2,20) && $size < pow(2,30)) return round($size / pow(2,20), 1)." MB";
		if ($size > pow(2,30)) return round($size / pow(2,30), 2)." GB";
	}
	
	/** 
	 * Search for plain urls in text.
	 * But don't link any that have already been linked.
	 * @param string $text the text to search and link URLs in
	 * @returns string
	 */
	public static function findAndLinkURLs($text) {
		// regexp from Perl's Regexp::Common with $RE{URI}{HTTP}{-keep}{-scheme => 'https?'}
		// escape ' and % which we'll use as regexp delimiter'
		// a thing of beauty!
		$regexp = '((https?)://((?:(?:(?:(?:(?:[a-zA-Z0-9][-a-zA-Z0-9]*)?[a-zA-Z0-9])[.])*(?:[a-zA-Z][-a-zA-Z0-9]*[a-zA-Z0-9]|[a-zA-Z])[.]?)|(?:[0-9]+[.][0-9]+[.][0-9]+[.][0-9]+)))(?::((?:[0-9]*)))?(/(((?:(?:(?:(?:[a-zA-Z0-9\-_.!~*\'():@&=+$,]+|(?:\%[a-fA-F0-9][a-fA-F0-9]))*)(?:;(?:(?:[a-zA-Z0-9\-_.!~*\'():@&=+$,]+|(?:\%[a-fA-F0-9][a-fA-F0-9]))*))*)(?:/(?:(?:(?:[a-zA-Z0-9\-_.!~*\'():@&=+$,]+|(?:\%[a-fA-F0-9][a-fA-F0-9]))*)(?:;(?:(?:[a-zA-Z0-9\-_.!~*\'():@&=+$,]+|(?:\%[a-fA-F0-9][a-fA-F0-9]))*))*))*))(?:[?]((?:(?:[;/?:@&=+$,a-zA-Z0-9\-_.!~*\'()]+|(?:\%[a-fA-F0-9][a-fA-F0-9]))*)))?))?)';
		return preg_replace_callback('%(?<!a\shref=")' . $regexp . '%', array('KSAS_Util', 'linkURL'), $text);
	}
	
	/**
	* Create a link from the given url match.
	* Don't include any trailing periods or other nasties.
	* @param array $matches matches returned from a preg_match for urls
	* @returns string
	*/
	public static function linkURL($matches) {
		$url = $matches[1];
		$punc = '';
		if (preg_match('|([\,\.\)]+)$|', $url, $matches)) {
			$punc = $matches[1];
			$url = preg_replace('|[\,\.\)]+$|', '', $url);
		}
		return "<a href=\"$url\">$url</a>$punc";
	}
	
	/**
	* mathematically correct modulo where result is always positive
	*	from comment at: http://www.php.net/manual/en/language.operators.arithmetic.php
	* @param integer $num
	* @param integer $base
	* @returns integer
	*/
	public static function mod($num, $base) {
		return ($num - $base*floor($num/$base));
	}
    
    /**
    * from comment at http://www.php.net/manual/en/function.imagecopyresampled.php
    * more info at http://www.mediumexposure.com/node/19
    * @param string $file path to image file to resize
    * @param integer $width width of resized image or 0 to not constrain width
    * @param integer $height height of resized image or 0 to not constrain width
    * @param boolean $proportional whether or not to retain image aspect
    * @param string $ouput 'file' to write to $file, 'browser' to output to browser, 'return' to return a GD object, or any filename you choose
    * @param boolean $delete_original whether or not to delete the original file
    * @param boolean $use_linux_commands whether or not to use 'rm' instead of php's unlink()
    */
    public static function resizeImage($file, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false) {
        if ( $height <= 0 && $width <= 0 ) {
            return false;
        }
        
        $info = getimagesize($file);
        $image = '';
        
        $final_width = 0;
        $final_height = 0;
        list($width_old, $height_old) = $info;
        
        if ($proportional) {
            if ($width == 0) {
                $factor = $height/$height_old;
            } elseif ($height == 0) {
                $factor = $width/$width_old;
            } else {
                $factor = min ( $width / $width_old, $height / $height_old); 
            }
            
            $final_width = round ($width_old * $factor);
            $final_height = round ($height_old * $factor);
        } else {
            $final_width = ( $width <= 0 ) ? $width_old : $width;
            $final_height = ( $height <= 0 ) ? $height_old : $height;
        }
        
        switch ($info[2]) {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($file);
            break;
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($file);
            break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($file);
            break;
            default:
                return false;
        }
        
        $image_resized = imagecreatetruecolor( $final_width, $final_height );
        
        if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
            $trnprt_indx = imagecolortransparent($image);
            
            // If we have a specific transparent color
            if ($trnprt_indx >= 0) {
                // Get the original image's transparent color's RGB values
                $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
                
                // Allocate the same color in the new image resource
                $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $trnprt_indx);
                
                // Set the background color for new image to transparent
                imagecolortransparent($image_resized, $trnprt_indx);
            } elseif ($info[2] == IMAGETYPE_PNG) {
                // Always make a transparent background color for PNGs that don't have one allocated already
                // Turn off transparency blending (temporarily)
                imagealphablending($image_resized, false);
                
                // Create a new transparent color for image
                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
                
                // Completely fill the background of the new image with allocated color.
                imagefill($image_resized, 0, 0, $color);
                
                // Restore transparency blending
                imagesavealpha($image_resized, true);
            }
        }
        
        imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
        
        if ( $delete_original ) {
            if ( $use_linux_commands ) {
                exec('rm '.$file);
            } else {
                @unlink($file);
            }
        }
        
        switch ( strtolower($output) ) {
            case 'browser':
                $mime = image_type_to_mime_type($info[2]);
                header("Content-type: $mime");
                $output = NULL;
            break;
            case 'file':
                $output = $file;
            break;
            case 'return':
                return $image_resized;
            break;
            default:
            break;
        }
        
        switch ($info[2]) {
            case IMAGETYPE_GIF:
                imagegif($image_resized, $output);
            break;
            case IMAGETYPE_JPEG:
                imagejpeg($image_resized, $output);
            break;
            case IMAGETYPE_PNG:
                imagepng($image_resized, $output);
            break;
            default:
                return false;
        }
        
        return true;
    }
}

?>