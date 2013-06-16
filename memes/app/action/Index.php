<?php

/**
 *  Index.php
 *
 *  @author    {$author}
 *  @package   Memes
 *  @version   $Id$
 */

/**
 *  Index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   Memes
 */
class Memes_Form_Index extends Memes_ActionForm {

    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(
        'image_search' => array(
            'type' => VAR_TYPE_STRING,
            'min' => 3,
            'required' => true,
        ),
        'meme_top' => array(
            'type' => VAR_TYPE_STRING,
            'max' => 50,
        ),
        'meme_bottom' => array(
            'type' => VAR_TYPE_STRING,
            'max' => 50,
        ),
    );

}

/**
 *  Index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Memes
 */
class Memes_Action_Index extends Memes_ActionClass {

    /**
     *  preprocess Index action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare() {

        if ($this->af->validate() > 0) {
            return 'index';
        }
        return null;
    }

    function imagettftextoutline($im, $size, $angle, $x, $y, $col, $fontfile, $text, $width, $outlinecol) {

        // For every X pixel to the left and the right
        $xd = 0 - abs($width);
        for ($xc = $x - abs($width); $xc <= $x + abs($width); $xc++) {
            // For every Y pixel to the top and the bottom
            $yd = 0 - abs($width);
            for ($yc = $y - abs($width); $yc <= $y + abs($width); $yc++) {
                //If this y x combo is within the bounds of a circle with a radius of $width
                //($xc*$xc + $yc*$yc) <= ($width * $width)+999
                if (($xd * $xd + $yd * $yd) <= $width * $width) {
                    // Draw the text in the outline color
                    $text1 = imagettftext($im, $size, $angle, $xc, $yc, $outlinecol, $fontfile, $text);
                }
                $yd++;
            }
            $xd++;
        }
        // Draw the main text
        $text2 = imagettftext($im, $size, $angle, $x, $y, $col, $fontfile, $text);
    }

    /**
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform() {

       
        $logger = $this->backend->getLogger();

        
        $font = "content/font/IMPACT.TTF"; //PATH_TO_FONT;
        $file = $this->af->get('image_search');
        
        

        $extension = strtolower(strrchr($file, '.'));
        switch ($extension) {
            case '.jpeg':
            case '.jpg':
                $im = imagecreatefromjpeg($file);
                break;
            case '.gif':
                $im = imagecreatefromgif($file);
                break;
            case '.png':
                $im = imagecreatefrompng($file);
                break;
            default:
                $im = false;
                break;
        }
        
        

        $black = imagecolorallocate($im, 0x00, 0x00, 0x00);
        $white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
        $text1 = strtoupper($this->af->get('meme_top'));
        $text2 = strtoupper($this->af->get('meme_bottom'));


        $top_font = 45;
        $bbox = imageftbbox($top_font, 0, $font, $text1);

        if ($bbox[4] > 450) {
            $top_font = ($top_font * 450) / $bbox[4];
            $bbox = imageftbbox($top_font, 0, $font, $text1);
        }
        $x = (500 - $bbox[4]) / 2;

        $this->imagettftextoutline($im, $top_font, 0, $x, ($top_font + 15), $white, $font, $text1, 2, $black);

        $bottom_font = 45;
        $bbox = imageftbbox($bottom_font, 0, $font, $text2);
        if ($bbox[4] > 450) {
            $bottom_font = ($bottom_font * 450) / $bbox[4];
            $bbox = imageftbbox($bottom_font, 0, $font, $text2);
        }
        $x = (500 - $bbox[4]) / 2;
        $y = imagesy($im) - 25;
        $this->imagettftextoutline($im, $bottom_font, 0, $x, $y, $white, $font, $text2, 2, $black);

        $he = str_replace(".", "", $extension);


        $image_name = rand().".jpg";
        imagejpeg($im, "saved_memes/" . $image_name);
        
        header('Content-type: application/json');
        $response_array['success'] = $image_name;
        echo json_encode($response_array);
//        header("Content-type: image/$he");
//        imagejpeg($im);

        if (!$im){
            return 'index';
        }
    }

}

?>
