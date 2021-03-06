<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

/* * ***************************Includes********************************* */
require_once __DIR__  . '/../../../../core/php/core.inc.php';

class twinkly extends eqLogic {
    /*     * *************************Attributs****************************** */



    /*     * ***********************Methode static*************************** */

    /*
     * Fonction exécutée automatiquement toutes les minutes par Jeedom
      public static function cron() {

      }
     */


    /*
     * Fonction exécutée automatiquement toutes les heures par Jeedom
      public static function cronHourly() {

      }
     */

    /*
     * Fonction exécutée automatiquement tous les jours par Jeedom
      public static function cronDaily() {

      }
     */
     
    public static function dependancy_info() {
		$return = array();
		$return['log'] = 'twinkly_update';
		$return['progress_file'] = jeedom::getTmpFolder('twinkly') . '/dependance';
        //log::add('twinkly', 'debug', 'test');
        //log::add('twinkly', 'debug', jeedom::getTmpFolder('twinkly'));
        //log::add('twinkly', 'debug', $return['progress_file']);
		$return['state'] = 'ok';
		return $return;
	}

    public static function dependancy_install() {
		log::remove(__CLASS__ . '_update');
		return array('script' => dirname(__FILE__) . '/../../resources/install_#stype#.sh ' . jeedom::getTmpFolder('twinkly') . '/dependance', 'log' => log::getPathToLog(__CLASS__ . '_update'));
	}



    /*     * *********************Méthodes d'instance************************* */

    public function preInsert() {
        
    }

    public function postInsert() {
        $twinklyCmd = new twinklyCmd();
        $twinklyCmd->setName(__('OFF', __FILE__));
        $twinklyCmd->setEqLogic_id($this->id);
		//$twinklyCmd->setConfiguration('key_data', 'Standby');
		//$twinklyCmd->setConfiguration('ApiType', 'key');
        //$twinklyCmd->setConfiguration('order', 1);
        $twinklyCmd->setType('action');
        $twinklyCmd->setSubType('other');
		$twinklyCmd->save();
        
        $twinklyCmd = new twinklyCmd();
        $twinklyCmd->setName(__('ON', __FILE__));
        $twinklyCmd->setEqLogic_id($this->id);
		//$twinklyCmd->setConfiguration('key_data', 'Standby');
		//$twinklyCmd->setConfiguration('ApiType', 'key');
        //$twinklyCmd->setConfiguration('order', 1);
        $twinklyCmd->setType('action');
        $twinklyCmd->setSubType('other');
		$twinklyCmd->save();
    }

    public function preSave() {
        
    }

    public function postSave() {
        
    }

    public function preUpdate() {
        
    }

    public function postUpdate() {
        
    }

    public function preRemove() {
        
    }

    public function postRemove() {
        
    }
    
    
    /*
     * Non obligatoire mais permet de modifier l'affichage du widget si vous en avez besoin
      public function toHtml($_version = 'dashboard') {

      }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action après modification de variable de configuration
    public static function postConfig_<Variable>() {
    }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action avant modification de variable de configuration
    public static function preConfig_<Variable>() {
    }
     */

    /*     * **********************Getteur Setteur*************************** */
}

class twinklyCmd extends cmd {
    /*     * *************************Attributs****************************** */


    /*     * ***********************Methode static*************************** */


    /*     * *********************Methode d'instance************************* */

    /*
     * Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
      public function dontRemoveCmd() {
      return true;
      }
     */

    public function execute($_options = array()) {
        $eqLogic   = $this->getEqLogic();
		$IPaddress = $eqLogic->getConfiguration('IPaddress');
        
        $cmdName  = $this->getName();
        
        switch($cmdName) {
            case 'OFF':
                $cmd = 'sudo /usr/bin/python3 ' .dirname(__FILE__) . '/__main__.py --twinkly_ip '.$IPaddress.' switch_off';
                log::add('twinkly','debug','OFF Command');
            break;
            case 'ON':
                $cmd = 'sudo /usr/bin/python3 ' .dirname(__FILE__) . '/__main__.py --twinkly_ip '.$IPaddress.' switch_on';
                log::add('twinkly','debug','ON Command');
            break;
            default:
            break;
        }
        //$result = exec($cmd, $output, $return_var);
        $result=trim(shell_exec($cmd));
        //$result_json=json_decode($config,true);
        //$request_shell = new com_shell($cmd . ' 2>&1');
        //$result = trim($request_shell->exec());
        

        log::add('twinkly','debug',$output);
        log::add('twinkly','debug',$cmd);
        log::add('twinkly','debug',$result);
        return $result;
    }

    /*     * **********************Getteur Setteur*************************** */
}


