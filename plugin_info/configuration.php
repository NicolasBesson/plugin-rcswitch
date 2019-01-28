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

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';
include_file('core', 'authentification', 'php');
if (!isConnect()) {
	include_file('desktop', '404', 'php');
	die();
}
?>


<form class="form-horizontal">

        <div class="form-group">
	</div>

		<div class="form-group">
					<label class="col-lg-2 control-label">{{Pin Récepteur}}</label>
					<div class="col-lg-2">
						<input id="pinrecept" class="configKey form-control" type="text" data-l1key="pinrecept" placeholder="Click on GPIO">
						</input>
					</div>

					<label class="col-lg-2 control-label">{{Pin Emetteur}}</label>
					<div class="col-lg-2">
						<input id="pinemit" class="configKey form-control" type="text" data-l1key="pinemit" placeholder="Click on GPIO">	
						</input>
					</div>
					
					<label class="col-lg-2 control-label">Pin Power</label>
					<div class="col-lg-2">
						<input id="pinpower" class="configKey form-control" type="text" data-l1key="pinpower" placeholder="Click on GPIO">	
						</input>
					</div>
                </div>
        <div class="form-group">
	</div>



					
   
        <div class="form-group">
	        <label class="col-lg-2 control-label">{{Installer Wiringpi/WiringBpi }}</label>
	        
		<div class="col-lg-2">
	            <a class="btn btn-success" id="bt_installDepsrasp" data-slaveid="-1" data-log="RASPIinstall"><i class="fa fa-cog"></i> {{Raspberry}}</a>
	        </div>
		<div class="col-lg-2">
	            <a class="btn btn-success" id="bt_installDepsopi" data-slaveid="-1" data-log="OPIinstall"><i class="fa fa-cog"></i> {{Orangepi}}</a>
	        </div>
		<div class="col-lg-2">
	            <a class="btn btn-success" id="bt_installDepsodroid" data-slaveid="-1" data-log="ODROIDinstall"><i class="fa fa-cog"></i> {{Odroid}}</a>
	        </div>
		 <div class="col-lg-2">
	            <a class="btn btn-success" id="bt_installDepsbpi" data-slaveid="-1" data-log="BPIinstall"><i class="fa fa-cog"></i> {{Bananapi}}</a>
	        </div>
		 <div class="col-lg-2">
	            <a class="btn btn-success" id="bt_installDepsbpro" data-slaveid="-1" data-log="BPROinstall"><i class="fa fa-cog"></i> {{Bananapro}}</a>
	        </div>
	</div>
        <div class="form-group">
	</div>
        <div class="form-group">
		 <div class="col-lg-3">
	        </div>
		 <div class="col-lg-3">
	            <a class="btn btn-danger" id="bt_fixscript" data-slaveid="-1" data-log="Fixperm"><i class="fa fa-cog"></i> {{Attribution des droits aux scripts}}</a>
	        </div>
	</div>
        <div class="form-group">
		</div>
        <div class="form-group">
		 <div class="col-lg-3">
	        </div>
		 <div class="col-lg-2">
	            <a class="btn btn-default" id="bt_rfsniffer" data-slaveid="-1" data-log="RFsniffer"><i class="fa fa-cog"></i> {{Récupération de code standard}}</a>

	        </div> 
		<div class="form-group">
		</div>
 		<div class="col-lg-3">
	        </div>
		<div class="col-lg-2">
	            <a class="btn btn-default" id="bt_hereceive" data-slaveid="-1" data-log="HEreceive"><i class="fa fa-cog"></i> {{Récupération de code Homeeasy}}</a>
	        </div>
<div class="form-group">
		</div>
 		<div class="col-lg-3">
	        </div>
		<div class="col-lg-2">
	            <a class="btn btn-default" id="bt_gpio" data-slaveid="-1" data-log="Gpio"><i class="fa fa-cog"></i> {{GPIO}}</a>
	        </div>
	</div>
        <div class="form-group">
	</div>



				


</form>

<script>


$('#bt_installDepsrasp').on('click',function(){
    bootbox.confirm('{{Etes-vous sûr de posseder un Raspberry ? }}', function (result) {
      if (result) {
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'RASPIinstall',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});    
		  $('#md_modal').dialog({title: "{{Installation de WiringPi pour Raspberry}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log=RASPIinstall&slaveId=-1').dialog('open');
    }
});
});
$('#bt_installDepsbpi').on('click',function(){
    bootbox.confirm('{{Etes-vous sûr de posseder un Bananapi ? }}', function (result) {
      if (result) {
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'BPIinstall',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});    

		  $('#md_modal').dialog({title: "{{Installation de WiringBP pour Bananapi}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log=BPIinstall&slaveId=-1').dialog('open');
    }
});
}); 
$('#bt_installDepsbpro').on('click',function(){
    bootbox.confirm('{{Etes-vous sûr de posseder un Bananapro ? }}', function (result) {
      if (result) {
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'BPROinstall',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});    
		  $('#md_modal').dialog({title: "{{Installation de WiringBP pour Bananapro}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log=BPROinstall&slaveId=-1').dialog('open');
    }
});
});
$('#bt_installDepsopi').on('click',function(){
    bootbox.confirm('{{Etes-vous sûr de posseder un Orangepi ? }}', function (result) {
      if (result) {
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'OPIinstall',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});    

		  $('#md_modal').dialog({title: "{{Installation de WiringOP pour Orangepi}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log=OPIinstall&slaveId=-1').dialog('open');
    }
});
}); 
$('#bt_installDepsodroid').on('click',function(){
    bootbox.confirm('{{Etes-vous sûr de posseder un Odroid ? }}', function (result) {
      if (result) {
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'ODROIDinstall',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});    

		  $('#md_modal').dialog({title: "{{Installation de WiringODROID pour ODROID}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log=ODROIDinstall&slaveId=-1').dialog('open');
    }
});
}); 
$('#bt_fixscript').on('click',function() {
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'Fixperm',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});    
		  $('#md_modal').dialog({title: "{{Attribution des droits aux scripts}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log='+$(this).attr('data-log')+'&slaveId='+$(this).attr('data-slaveId')).dialog('open');
  
});
$('#bt_rfsniffer').on('click',function(){
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'RFsniffer',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});    
		  $('#md_modal').dialog({title: "{{Récupération de code standard}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log='+$(this).attr('data-log')+'&slaveId='+$(this).attr('data-slaveId')).dialog('open');
    
});

$('#bt_hereceive').on('click',function(){
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'HEreceive',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});        
		  $('#md_modal').dialog({title: "{{Récupération de code Homeeasy}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log='+$(this).attr('data-log')+'&slaveId='+$(this).attr('data-slaveId')).dialog('open');
  
});
$('#bt_gpio').on('click',function(){
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch2.ajax.php',
		data: {
			action: 'Gpio',
		},
		dataType: 'json',
		global: false,
		error: function (request, status, error) {
		
		},
		success: function () {
			
		}
	});    
		  $('#md_modal').dialog({title: "{{Liste des GPIO}}"});
          $('#md_modal').load('index.php?v=d&modal=log.display&log='+$(this).attr('data-log')+'&slaveId='+$(this).attr('data-slaveId')).dialog('open');    
});


</script>
