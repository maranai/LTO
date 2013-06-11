<?php
/**
 * Rewrite of the Image Resize Helper in the bakery (http://bakery.cakephp.org/articles/view/image-resize-helper)
 * made to be a bit more flexible so more resize methods can be added at a later date.
 * Currently only supports maxDimension, which, as the name suggests resizes if it's dimensions are greater than $nexX or $newY.
 * NOTE: sort out variable casing. Some local variables use under_scores others use camelCase.
 */
App::uses('Helper', 'View');

class ImageHelper extends Helper {

    var $helpers = array('Html');

    var $cacheDir = 'cache'; // relative to IMAGES_URL path

    function resize($path, $dst_w, $dst_h, $htmlAttributes = array(), $return = false) {

        $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type

        $fullpath = ROOT.DS.APP_DIR.DS.WEBROOT_DIR.DS.IMAGES_URL;

        $url = $path;

        list($w, $h, $type) = getimagesize($url);
        $r = $w / $h;
        $dst_r = $dst_w / $dst_h;

        if ($r > $dst_r) {
            $src_w = $h * $dst_r;
            $src_h = $h;
            $src_x = ($w - $src_w) / 2;
            $src_y = 0;
        } else {
            $src_w = $w;
            $src_h = $w / $dst_r;
            $src_x = 0;
            $src_y = ($h - $src_h) / 2;
        }

        $relfile = $this->cacheDir.'/'.$dst_w.'x'.$dst_h.'_'.basename($path); // relative file
        $cachefile = $fullpath.$relfile;

        if (file_exists($cachefile)) {
            if (@filemtime($cachefile) >= @filemtime($url)) {
                $cached = true;
            } else {
                $cached = false;
            }
        } else {
            $cached = false;
        }

        if (!$cached) {
            $image = call_user_func('imagecreatefrom'.$types[$type], $url);
            if (function_exists("imagecreatetruecolor")) {
                $temp = imagecreatetruecolor($dst_w, $dst_h);
                imagecopyresampled($temp, $image, 0, 0, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
            } else {
                $temp = imagecreate ($dst_w, $dst_h);
                imagecopyresized($temp, $image, 0, 0, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
            }
            call_user_func("image".$types[$type], $temp, $cachefile);
            imagedestroy($image);
            imagedestroy($temp);
        }

        return $cachefile;
    }
}