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

class Memes_Form_Index extends Memes_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(
        'image_search'  => array(
            'type'   => VAR_TYPE_STRING,
            'min'    => 3,
        ),
        'meme_top'      => array(
            'type'   => VAR_TYPE_STRING,
            'max'    => 12,
        ),
        'meme_bottom'  => array(
            'type'   => VAR_TYPE_STRING,
            'max'    => 12,
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
class Memes_Action_Index extends Memes_ActionClass
{
    /**
     *  preprocess Index action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {

        if ($this->af->validate() > 0) {
            return 'error';
        }


        return null;
    }

    /**
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {
        var_dump($this->af->get('image_search'));
        return 'index';
    }
}

?>
