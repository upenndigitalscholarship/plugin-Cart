<?php 
/**
 * @copyright 
 * @license 
 * @package Posters
 */

class Posters_GenusController extends Omeka_Controller_AbstractActionController
{
    public function init()
    {
       $this->_helper->db->setDefaultModelName('Item');
       $this->_currentUser = current_user();
    }


    public function showAction()
    {
       
       $items = get_records('Item',array('title'=>'Vitaceae Vitis vinifera'));
       
        $this->view->items = $items;

    }
}
