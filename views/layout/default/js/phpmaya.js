$(document).ready(function(){

qrempresas = function(){

	var self = this;
	this.isLoading = false;
	this.GET = "";
	this.BASE_URL = "";
	this.notificationAlerts = new Array();
	this.printData;
	this.currentUserPermissions = new Array();
	this.currentUserLogged = "";
	this.currentUserType = "";
    this.imAprocom = 0;
    this.imAssociations = 0;
    this.imAssociated = 0;
    this.imFriend = 0;
    this.imFree = 0;

	// User types
	this._UT_APROCOM = 1;
	this._UT_ASSOCIATION = 2;
	this._UT_ASSOCIATED = 3;
	this._UT_FRIEND = 4;
	this._UT_FREE = 5;

	this._PT_WRITE = 1;
	this._PT_READ = 2;
	this._PT_DELETE = 3;
	this._PT_CREATEFEE = 4;
	this._PT_CREATEREMITTENCE = 5;
	this._PT_VALIDATENOTIFICATIONS = 6;
	this._PT_VALIDATEUSERS = 7;

	// Permission Types

	/* ---| Loading up and down |---------------------------------------------------------
	*/
	this.loadingUp = function(){
		if (!this.isLoading) {
			$("#divLoading").show();
			this.isLoading = true;
		}
	}
	this.loadingDown = function(){
		$("#divLoading").hide();
		this.isLoading = false;
	}
	this.waitingOn = function(){
		if (!this.isLoading) {
			$("body").addClass('waiting');
			this.isLoading = true;
		}
	}
	this.waitingOff = function(){
		$("body").removeClass('waiting');
		this.isLoading = false;
	}
	
	/*---| Permission |---------------------------------------------------------
	*/

	this.loadPermission = function(idUser,type){
		self.api({
            url: ap.BASE_URL+"/permission/checkPermission",
            post: {
            	"user_id"		: idUser
			},
            noLoading: true,
            success: function(json){
            	self.currentUserPermissions = json;
            }
        });
	}

	this.watchPermissions = function(){

		$('#btNewNotification').bind("click",function(e){
			if(ap.imAssociated == 1){
				if(self.currentUserPermissions[self._PT_WRITE]['associated_status'] == 0){
					e.preventDefault();
					self.permissionDialog();
				}
			}
			if(ap.imAssociations == 1){
				if(self.currentUserPermissions[self._PT_WRITE]['status'] == 0){
					e.preventDefault();
					self.permissionDialog();
				}
			}
		});
	}


	this.permissionDialog = function(){
        $( ".divAlertPermission" ).dialog({
            title: "Permiso denegado",
            modal: true,
            width:"auto",
            buttons: {
                Cancelar: function() {
                  $( this ).dialog( "close" );
                }
            }
        });
    }

    this.permissionDialogUpgrade = function(){
        $( ".divAlertPermissionUpgrade" ).dialog({
            title: "Permiso denegado",
            modal: true,
            width:"auto",
            buttons: {
            	"Quiero asociarme": function(){
                	window.location.href = ap.BASE_URL+"/query/queryPage";
                },
                Cancelar: function() {
                  $( this ).dialog( "close" );
                }
            }
        });
    }

	/*---| Load Notification Alert Number |---------------------------------------------------------
	*/
	this.loadNotificationAlerts = function(refreshLastVisit){

        self.api({
            url: ap.BASE_URL+"/notification/alerts",
            post: {
            	"refreshLastVisit"	: refreshLastVisit,
            	"status"			: -1
            },
            noLoading: true,
            success: function(json){

            	// Notifications
                self.notificationAlerts = json['notificationAlerts'];
                var j = 0;
			    for(var i in self.notificationAlerts['rows']){
			    	var count = self.notificationAlerts['rows'][i]['count'];
			    	if(count > 99)
			    		count = "+99";

		            $('[role="NA_'+i+'"]').html(count);
		            $('[role="NA_'+i+'"]').css('display','inline-block');
		        	j++;
		        }

		        if(j > 0){
		        	$('[role="NA_0"]').html(self.notificationAlerts['count']);
		        	$('[role="NA_0"]').css('display','inline-block');
					$('#divAllNotifications').addClass('divAlertAllNotificationsOn');
					$('#divAllNotifications').addClass('active');
					if(j > 99)
						$('#divAllNotifications .number').addClass('smallFont');

            	}else{
					$('#divAllNotifications').addClass('divAlertAllNotificationsOff');
            	}

            	// Homework
                self.homework = json['homework'];
		       	$('[role="NA_HOMEWORK"]').html(self.homework['count']);

		       	if(self.homework['count'] > 0){
					$('#divMyNotifications').addClass('divAlertMyNotificationsOn');
					$('#divMyNotifications').addClass('active');
					if(self.homework['count'] > 99)
						$('#divMyNotifications .number').addClass('smallFont');
				}
				else{
					$('#divMyNotifications').addClass('divAlertMyNotificationsOff');
				}

		       	// Users to validate
                self.toValidate = json['toValidate'];
		       	$('[role="US_TOVALIDATE"]').html(self.toValidate['count']);
				if(self.toValidate['count'] > 0){
					$('#divToValidate').addClass('divAlertUserOn');
					$('#divToValidate').addClass('active');
					if(self.toValidate['count'] > 99)
						$('#divToValidate .number').addClass('smallFont');
				}
				else{
					$('#divToValidate').addClass('divAlertUserOff');
				}

		       	// Users to Activate
                self.toActivate = json['toActivate'];
		       	$('[role="US_TOACTIVATE"]').html(self.toActivate['count']);
	       	  	if(self.toActivate['count'] > 0){
			  	  	$('#divToActivate').addClass('divAlertUserOnOrange');
			  	  	$('#divToActivate').addClass('active');
					if(self.toActivate['count'] > 99)
						$('#divToActivate .number').addClass('smallFont');
			  	}
			  	else{
			  	  $('#divToActivate').addClass('divAlertUserOff');
			  	}

			  	$('.fastAlert').css('display','inline-block');
			  	$('.fastAlert').addClass('visibleFade');

            }
        });     
	}

	this.refreshNotificationAlerts = function(typeToDelete) {    

		if(typeToDelete == 0){
        	$('.notificationAlertNumber').html("");
        	$('.notificationAlertNumber').fadeOut();
		}else{
        	$('div[role="NA_'+typeToDelete+'"]').html("");
        	$('div[role="NA_'+typeToDelete+'"]').fadeOut();
		}
	}

	/* ---| Utils |---------------------------------------------------------
	*/

	this.getQueryParams = function(qs) {

		qs = qs.split("+").join(" ");
		var params = {},
		    tokens,
		    re = /[?&]?([^=]+)=([^&]*)/g;

		while (tokens = re.exec(qs)) {
		    params[decodeURIComponent(tokens[1])]
		        = decodeURIComponent(tokens[2]);
		}

		self.GET = params;
	}

	this.cutText = function(text,aux) {
		return text.substring(0,aux)+"...";
	}

	/* ---| Show InfoBox |---------------------------------------------------------
	*/
	this.showInfoBox = function(msj,time){
		if(time == undefined) time = 5000;
		$('.divInfoBox').html(msj);
		$('.divInfoBox').fadeToggle();

		$('.divInfoBox').delay(time).fadeToggle();
		$('.divInfoBox p').html("");
	}

	this.showInfoBoxError = function(msj,time){
		if(time == undefined) time = 5000;
		$('.divInfoBoxError').html(msj);
		$('.divInfoBoxError').fadeToggle();

		$('.divInfoBoxError').delay(time).fadeToggle();
		$('.divInfoBoxError p').html("");
	}
	
	/* ---| Show Success |---------------------------------------------------------
	*/
	this.showSuccess = function(msj){
		$.jGrowl(msj, { 
			theme: 'success',
			speed: 'slow'
		});
	}

	this.showError = function(msj){
		$.jGrowl(msj, { 
			theme: 'error',
			speed: 'slow'
		});
	}

	/* -----| API |-----

		url
		post | dom
		confirm_msj
		noLoading

		success	
		error
	*/
	this.api = function(params) {

		// Get post data from DOM id
		if (params.dom != undefined) {
			var str = this.serialize({form:params.dom});
			var arr = new Array();
			arr = str.split("&");
			var aux;
			params['post'] = {};
			for(var a in arr) {
				aux = arr[a].split('=');
				params['post'][aux[0]] = aux[1];
			}
		}

		// Fix undefined
		var data = ''; 
		if (params['post']!=undefined) {
			for(var i in params['post']) {
				if (params['post'][i]==undefined) params['post'][i] = '';
				data += i+'='+params['post'][i]+'&'; 
			}
		}

		// Call
		self.call({
			url: params['url'],
			data: data,
			no_xml: true,
			confirm: params['confirm_msj']==undefined ? false : true,
			confirm_msj: params['confirm_msj'],
			noLoading: params.noLoading,
			success: function(json) {
				var data = JSON.parse(json);
				if (data!=undefined && data['error']!=undefined) {
					if (params['error']!=undefined) params['error'](data);
					else self.showInfoBoxError(data['error']);
				} else { 
					if (params['success']!=undefined){
						self.printData = data;
						params['success'](data);
							
						//alert(data['sql']);

						if(params['sqlSave'] != undefined && params['sqlSave'] == true){
							if(data['sql'] != undefined){
								$('form[role="printPDF"] .sql').val(data['sql']);
								$('form[role="printCSV"] .sql').val(data['sql']);
							}
						}
					}
					//else self.showSuccess(json['ok']['msj']);
				}
			}
		});
	}



	/* ---| Aprocom call |-----------------------------------------------------------------

		url		: Ajax url
		url2		: Ajax url with @
		form		: Post data form 
		data		: post data
		success		: Success function
		error		: Error function
		confirm		: Ask for confirmation before procede
		confirm_msj	: 
		no_xml		: 
		noLoading
	*/
	this.call = function( params ) {

		// Default values
		if (params['no_xml']==undefined) params['no_xml']=false;

		// Form
		if (params['form']!=undefined) {
			params['data'] = this.serialize({form:params['form']});
		}

		// Request URL 2 (with @)
		if (params['url2'] != undefined) {
			var res = params['url2'].split('@');
			if (res.length > 1) {
				params['url'] = '/?controlador='+res[0]+'&accion='+res[1];
			}
		}

		// Confirm
		if (params['confirm']==true) {

			// Confirmation message 
			if (params['confirm_msj']==undefined) confirmMsj = '¿Seguro que quiere seguir con la operación?';
			else confirmMsj = params['confirm_msj'];

			this.debug(this.dump(params));
			this.confirm({
				msj: confirmMsj,
				call: true,
				func_params: params
			});
		} else {
			this.__call(params);
		}
	}
	// --------
	this.__call = function( params ) {

		if (params.noLoading==undefined) params.noLoading = false;
		if (!params.noLoading) this.loadingUp();
		else this.waitingOn();
		$.ajax({
			type: 'POST',
			url: params['url'], 
			datatype: ( msieversion() >= 0 ) ? "xml" : "text/xml",
			datatype: "text/xml",
			data: params['data'],
			success: function(data) {
				if (params['no_xml']) {
					if (params['success']!=undefined) params['success'](data);	
				} else {
					var xml = self.parseXML(data);
					$(xml).find('ok').each(function() {
						self.debug('Call response OK');
						if (params['success']==undefined) self.showInfoBox('Operación realizada con éxito.');
						else params['success']($(this));	
					});

					$(xml).find('error').each(function() {
						self.debug('Call response ERROR');
						if (params['error']==undefined) self.showInfoBoxError($(this).text());
						else params['error']($(this).text());
					});
				}

				if (!params.noLoading) self.loadingDown();
				else self.waitingOff();
			}
		});
	}



}

ap = new qrempresas(); 
 

 function msieversion()
   {
      var ua = window.navigator.userAgent
      var msie = ua.indexOf ( "MSIE " )

      if ( msie > 0 )      // If Internet Explorer, return version number
         return parseInt (ua.substring (msie+5, ua.indexOf (".", msie )))
      else                 // If another browser, return 0
         return 0

   }

});