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


    public function browseAction()
    {
        $genus_family = htmlspecialchars($_GET['family']);
        $db = get_db();
        $select =  "SELECT DISTINCT j.text 
                    FROM $db->ElementText i 
                    INNER JOIN $db->ElementText j ON i.record_id = j.record_id 
                    WHERE i.element_id = 92 AND j.element_id = 93 AND i.text = ?;";
        $results = $db -> getTable('ElementText') -> fetchObjects($select,$genus_family);
        for ($i = 0 ; $i < count($results) ; $i++) {
            $genera[$i] = $results[$i][text];
        }
        
        $this->view->genera = $genera;

    }

    public function showAction()
    {
        //$items = get_records('Item',array());
        //$this->view->items = $items;
        
        $genus_species = htmlspecialchars($_GET['genus']);
        $db = get_db();
        $select =  "SELECT k.text
                    FROM $db->Item i
                    INNER JOIN $db->ElementText j ON i.id = j.record_id 
                    INNER JOIN $db->ElementText k ON i.id = k.record_id 
                    WHERE j.element_id = 93 AND k.element_id = 96 AND j.text = ?;";
        $items = $db -> getTable('Item') -> fetchObjects($select,$genus_species);
        
        for ($i = 0 ; $i < count($items) ; $i++) {
            $species[$i] = $items[$i][text];
        }
        
        $this->view->species = $species;
        $this->view->items = $items;

    }
}
