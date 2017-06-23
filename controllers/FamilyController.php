<?php 
/**
 * @copyright 
 * @license 
 * @package Posters
 */

class Posters_FamilyController extends Omeka_Controller_AbstractActionController
{
    public function init()
    {
       $this->_helper->db->setDefaultModelName('ElementText');
       $this->_currentUser = current_user();
    }

    public function browseAction()
    {
        
        /* $table = get_db()->getTable('ElementText');
        $select = $table->getSelect();
        $select -> where('element_id=92');
        $results = $table->fetchObjects($select);
        
        for ($i = 0 ; $i < count($results) ; $i++) {
            $families[$i] = $results[$i][text];
        }
        $families = array_unique($families);
        
        $this->view->families = $families; */

        $db = get_db();
        $select =  "SELECT DISTINCT text 
                    FROM $db->ElementText 
                    WHERE element_id = 92;";
        $results = $db->getTable('ElementText')->fetchObjects($select);

        for ($i = 0 ; $i < count($results) ; $i++) {
            $families[$i] = $results[$i][text];
        }
        
        $this->view->families = $families;
       
    }
}