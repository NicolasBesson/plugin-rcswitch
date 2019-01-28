
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


 $("#table_cmd").sortable({axis: "y", cursor: "move", items: ".cmd", placeholder: "ui-state-highlight", tolerance: "intersect", forcePlaceholderSize: true});

/*
 * Fonction pour l'ajout de commande, appellé automatiquement par plugin.template
 */


function addCmdToTable(_cmd) {
    if (!isset(_cmd)) {
        var _cmd = {configuration: {}};
    }

    var protocole = '<select class="cmdAttr form-control input-sm" data-l1key="configuration" data-l2key="protocole" style="width : 140px;"  >';
    protocole  += '<option value="arc">Arc</option>';
    protocole  += '<option value="blyss">Blyss</option>';
    protocole  += '<option value="brennen">Brennenstuhl</option>';
    protocole  += '<option value="homeeasy">HomeEasy</option>';
    protocole  += '<option value="Mcz">MCZ</option>';
    protocole  += '<option value="Otio">Otio</option>';
    protocole  += '<option value="phenix">Phenix</option>';
    protocole  += '<option value="Send">Send</option>';
    protocole  += '<option value="Binary">Binaire</option>';
    protocole  += '<option value="typeA">TypeA</option>';
    protocole  += '<option value="typeB">TypeB</option>';
    protocole  += '<option value="typeD">TypeD</option>';



    protocole  += '</select>';

    var code = '<input class="cmdAttr form-control input-sm" data-l1key="configuration" data-l2key="code"  style="width : 140px;" >';


    var tr = '<tr class="cmd" data-cmd_id="' + init(_cmd.id) + '">';
    tr += '<td>';
    tr += '<input class="cmdAttr form-control input-sm" data-l1key="id" style="display : none;">';
    tr += '<input class="cmdAttr form-control input-sm" data-l1key="name" style="width : 140px;" ></td>';
    tr += '<td>' + protocole + '</td>' ;
    tr += '<td>' + code + '</td>' ;
    tr += '<td>';
    tr += '<input class="cmdAttr form-control input-sm" data-l1key="type" value="action" style="display : none;">';
    tr += '<input class="cmdAttr form-control input-sm" data-l1key="subType" value="other" style="display : none;">';
    if (is_numeric(_cmd.id)) {
	 tr += '<a class="btn btn-default btn-xs cmdAction expertModeVisible" data-action="configure"><i class="fa fa-cogs"></i></a> ';
	     tr += '<span><label class="checkbox-inline"><input type="checkbox" class="cmdAttr checkbox-inline" data-l1key="isVisible" checked/>{{Afficher}}</label></span> ';
        tr += '<a class="btn btn-default btn-xs cmdAction" data-action="test"><i class="fa fa-rss"></i> {{Tester}}</a>';
    }
    tr += '<i class="fa fa-minus-circle pull-right cmdAction cursor" data-action="remove"></i></td>';
    tr += '</tr>';
    $('#table_cmd tbody').append(tr);
    $('#table_cmd tbody tr:last').setValues(_cmd, '.cmdAttr');

$('#bt_rfsniffer').on('click',function(){
$.ajax({
		type: 'POST',
		url: 'plugins/rcswitch2/core/ajax/rcswitch.ajax.php',
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
		url: 'plugins/rcswitch2/core/ajax/rcswitch.ajax.php',
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

}

