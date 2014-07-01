function getSalt()
{			
	var responseText = '';		
	
	var xhr = createCORSRequest('POST', url);
	
	if (!xhr) 
	{
		throw new Error('CORS not supported');
	}
	
	var data = new FormData();
	var login = $('#login').val();
	data.append('task', 'get_salt');
	data.append('log', login);
	xhr.send(data);
	
	xhr.onload = function(userObj) 
	{
		//document.getElementById("saltStorage").innerHTML = xhr.responseText;
		callBackLogin(xhr.responseText);
		
	};
	
	loginGlobal = login;
	
	
}

function loginRequest(login, pass)
{
	xhra = createCORSRequest('POST', url);
	if (!xhra) 
	{
		throw new Error('CORS not supported');
	}
	
	var data = new FormData();
	data.append('task', 'authorization');
	data.append('log', login);
	data.append('pas', pass);
	xhra.send(data);
	xhra.onload = function() 
				{
					var responseText = xhra.responseText;

						if(responseText!='false')
						{
							$("#loginContainer").hide();
							$("#navbar").show();
							$("#layout").show();
						
							$("#namePage").html("News");
							$("#news").show();
							getUserInfo();
							
						}
						else
						{
							alert("Вы не смогли войти!");
						}
						
				};
	

}

function getUserInfoRequest()
{
	//roup-l.com/api/api.php?task=personal_data&log=test_user&pas=001376fc756a1f4a382764c335a0874a:A0nwSpO2x2vlmAIz8ek3NbOLXJpqcZeH
	xhra = createCORSRequest('POST', url);
	if (!xhra) 
	{
		throw new Error('CORS not supported');
	}
	
	var data = new FormData();
	data.append('task', 'personal_data');
	data.append('log', loginGlobal);
	data.append('pas', passStrGlobal);
	xhra.send(data);
	xhra.onload = function() 
				{
					var responseText = xhra.responseText;
					getUserInfoCallBack(responseText);
				};


}

function getUserInfoPage()
{

	getUserInfo();
	
	$('.content').each(function()
		{
		
				$(this).hide();
					
		});
		
	$('#userInfoContainer').show();
	$('#userId').html(userInfoGlobal.ID);
	$('#user').val(userInfoGlobal.user);
	$('#email').val(userInfoGlobal.email);
	$('#name').val(userInfoGlobal.prim_first_name);
	$('#lastName').val(userInfoGlobal.prim_last_name);
	$('#prim_phone').val(userInfoGlobal.prim_phone);
	$('#country').val(userInfoGlobal.country);
	$('#city').val(userInfoGlobal.city);
	$('#second_first_name').val(userInfoGlobal.second_first_name);
	$('#second_last_name').val(userInfoGlobal.second_last_name);
	$('#second_phone').val(userInfoGlobal.second_phone);
	$('#second_mobile').val(userInfoGlobal.second_mobile);
	$('#second_skype').val(userInfoGlobal.second_skype);
	$('#expierence').val(userInfoGlobal.expierence);
	$('#planned_investments').val(userInfoGlobal.planned_investments);
	$('#max_risk').val(userInfoGlobal.max_risk);
	$('#objective').val(userInfoGlobal.objective);
	$('#strategy').val(userInfoGlobal.strategy);
	
}

function getPortfolioRequest()
{			
	var responseText = '';		
	
	var xhr = createCORSRequest('POST', url);
	
	if (!xhr) 
	{
		throw new Error('CORS not supported');
	}
	
	var data = new FormData();
	//.com/api/api.php?task=portfolio&log=test_user&pas=001376fc756a1f4a382764c335a0874a:A0nwSpO2x2vlmAIz8ek3NbOLXJpqcZeH&user_id=65
	data.append('task', 'portfolio');
	data.append('log', loginGlobal);
	data.append('pas', passStrGlobal);
	data.append('user_id', userInfoGlobal.ID);
	xhr.send(data);
	
	xhr.onload = function() 
	{
		//document.getElementById("saltStorage").innerHTML = xhr.responseText;
		callBackPortfolio(xhr.responseText);
		
	};
	
}

function feedBackRequest()
{
var responseText = '';		
	
	var xhr = createCORSRequest('POST', 'http://group-l.com/api/api.php');
	
	if (!xhr) 
	{
		throw new Error('CORS not supported');
	}

	var data = new FormData();
	
	data.append('task', 'feedback');
	data.append('log', loginGlobal);
	data.append('pas', passStrGlobal);
	
	
	xhr.send(data);
	
	xhr.onload = function() 
	{	
		responseText = xhr.responseText;
		//alert(responseText);
		//document.getElementById("saltStorage").innerHTML = xhr.responseText;
		callBackFeed(xhr.responseText);
		
	};
	
	xhr.onerror = function(err) 
	{
		alert("Сервер не дал доступа");
	};
}

function sendFeedBack()
{

	var responseText = '';		
	
	var xhr = createCORSRequest('POST', 'http://group-l.com/api/api.php');
	
	if (!xhr) 
	{
		throw new Error('CORS not supported');
	}

	var data = new FormData();
	
	data.append('task', 'feedback_add');
	data.append('log', loginGlobal);
	data.append('pas', passStrGlobal);
	data.append('message', $('#sendMessage').val());
	
	
	xhr.send(data);
	
	xhr.onload = function() 
	{	
		responseText = xhr.responseText;
		//alert(responseText);
		//document.getElementById("saltStorage").innerHTML = xhr.responseText;
		callBackFeed(xhr.responseText);
		
	};
	
	xhr.onerror = function(err) 
	{
		alert("Сервер не дал доступа");
	};

	feedBack();

}

 function savePersonalDataRequest() {
	
	
	var xhr = createCORSRequest('POST', 'http://group-l.com/api/api.php');
	
	if (!xhr) 
	{
		throw new Error('CORS not supported');
	}

	var data = new FormData();
	
	data.append('task', 'personal_data_edit');
	data.append('log', loginGlobal);
	data.append('pas', passStrGlobal);
	data.append('email', $('#email').val());
	data.append('firstname', $('#name').val());
	data.append('lastname', $('#lastName').val());
	data.append('tel', $('#prim_phone').val());
	data.append('mob', $('#mobile').val());
	data.append('skype', $('#skype').val());
	data.append('country', $('#country').val());
	data.append('city', $('#city').val());
	data.append('firstname2', 'firstname2');
	data.append('lastname2', 'lastname2');
	data.append('tel2', 'tel2');
	data.append('mob2', 'mob2');
	data.append('skype2', 'skype2');
	data.append('trading_experience', 'E_NOVICE');
	data.append('investing_plan', 'I_1');
	data.append('maximal_risk', '12');
	data.append('your_objective', 'O_1');
	data.append('your_strategy', 'S_CONS');
	
	xhr.send(data);
	
	xhr.onload = function() 
	{	
		responseText = xhr.responseText;
		//alert(responseText);
		//document.getElementById("saltStorage").innerHTML = xhr.responseText;
		dump(xhr.responseText);
		
	};
	
	xhr.onerror = function(err) 
	{
		alert("Сервер не дал доступа");
	};
	
	


 }
 
  function personalRecomendationsRequest() {
	
	
	var xhr = createCORSRequest('POST', 'http://group-l.com/index.php');
	
	if (!xhr) 
	{
		throw new Error('CORS not supported');
	}

	var data = new FormData();
	
	data.append('task_api', 'personal_recomendations');
	data.append('log', loginGlobal);
	data.append('pas', passStrGlobal);
	data.append('type', 'long');
	
	
	xhr.send(data);
	
	xhr.onload = function() 
	{	
		responseText = xhr.responseText;
		callBackPersonalRecomendations(xhr.responseText);
	};
	
	xhr.onerror = function(err) 
	{
		alert("Сервер не дал доступа");
	};
	
	


 }