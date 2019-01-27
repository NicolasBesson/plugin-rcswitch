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
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';

class rcswitch extends eqLogic {


	public static function dependancy_info() {
   		$return = array();
		$return['log'] = 'rcswitch_update';
		$return['progress_file'] = '/tmp/Rcswitch';
    		if (`which gpio`) {
		    $return['state'] = 'ok';
		} else {
		      $return['state'] = 'nok';
		    }
    		   return $return;
  	}

#	public static function dependancy_install() {
#if (file_exists('/tmp/Rcswitch')) {
#			return;
#		}
#		log::remove('rcswitch_update');
#        
#		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/scripts/install.sh';
#		$cmd .= ' >> ' . log::getPathToLog('rcswitch_update') . ' 2>&1 &';
#		exec($cmd);
#		
#	}
    public static function dependancy_install() {
        log::add('rcswitch','info','Installation des dépéndances rcswitch');
        $resource_path = realpath(dirname(__FILE__) . '/../../ressources/scripts');
        passthru('sudo /bin/bash ' . $resource_path . '/install.sh ' . $resource_path . ' > ' . log::getPathToLog('rcswitch_update') . ' 2>&1 &');
    }

	public static function BPIinstall() {
		log::remove('BPIinstall');
		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/scripts/bpi.sh';
		$cmd .= ' >> ' . log::getPathToLog('BPIinstall') . ' 2>&1 &';
		exec($cmd);
	}
	public static function BPROinstall() {
		log::remove('BPROinstall');
		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/scripts/bpro.sh';
		$cmd .= ' >> ' . log::getPathToLog('BPROinstall') . ' 2>&1 &';
		exec($cmd);
	}
	public static function RASPIinstall() {
		log::remove('RASPIinstall');
		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/scripts/rpi.sh';
		$cmd .= ' >> ' . log::getPathToLog('RASPIinstall') . ' 2>&1 &';
		exec($cmd);
	}
	public static function OPIinstall() {
		log::remove('OPIinstall');
		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/scripts/opi.sh';
		$cmd .= ' >> ' . log::getPathToLog('OPIinstall') . ' 2>&1 &';
		exec($cmd);
	}
	public static function ODROIDinstall() {
		log::remove('ODROIDinstall');
		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/scripts/odroid.sh';
		$cmd .= ' >> ' . log::getPathToLog('ODROIDinstall') . ' 2>&1 &';
		exec($cmd);
	}
	public static function RFsniffer() {
		log::remove('RFsniffer');
		$pinrecept = config::byKey('pinrecept', 'rcswitch');
		$cmd = 'sudo ' . dirname(__FILE__) . '/../../ressources/scripts/RFSniffer'. " " .  $pinrecept;
		$cmd .= ' >> ' . log::getPathToLog('RFsniffer') . ' 2>&1 &';
		exec($cmd);
	}
	public static function HEreceive() {
		log::remove('HEreceive');
		$pinrecept = config::byKey('pinrecept', 'rcswitch');
		$cmd = 'sudo ' . dirname(__FILE__) . '/../../ressources/scripts/HEreceive'. " " .  $pinrecept;
		$cmd .= ' >> ' . log::getPathToLog('HEreceive') . ' 2>&1 &';
		exec($cmd);
	}
	public static function Fixperm() {
		log::remove('Fixperm');
		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/scripts/fix.sh';
		$cmd .= ' >> ' . log::getPathToLog('Fixperm') . ' 2>&1 &';
		exec($cmd);
	}
	public static function Send($_Value = 'Value') {
		$cmd =	shell_exec('sudo ' . dirname(__FILE__) . '/../../ressources/scripts/'. $_Value) ;	
		exec($cmd);		
	}
	
	public static function Gpio() {
		log::remove('Gpio');
		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/scripts/gpioreadall.sh';
		$cmd .= ' >> ' . log::getPathToLog('Gpio') . ' 2>&1 &';
		exec($cmd);
	}


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
	public static function cronDayly() {

	}
	 */

	/*     * *********************Méthodes d'instance************************* */

	public function postSave() {

	}
	/*
	 * Non obligatoire mais permet de modifier l'affichage du widget si vous en avez besoin
	public function toHtml($_version = 'dashboard') {

	}
	 */
	/*     * **********************Getteur Setteur*************************** */
}

class rcswitchCmd extends cmd {
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

	
	$rcswitch_path = dirname(__FILE__) . '/../../ressources/scripts/';
		
	$pinemit = config::byKey('pinemit', 'rcswitch');

	
		$eqLogic = $this->getEqLogic();
		$command = $rcswitch_path . $this->getConfiguration('protocole') . " " .  $pinemit . " " .  $this->getConfiguration('code')  ;
		$request_shell = new com_shell("sudo" . " " . $command . ' 2>&1');
		$request_shell->exec();
				
		

		
		
	}

/*     * **********************Getteur Setteur*************************** */
}

?>