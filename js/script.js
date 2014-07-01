function getCodeStr(salt)
{
	var  password = $('#pass').val();
	passGlobal = password;
	var cash = md5(password + salt);
	var passStr = cash +":"+salt;
	
	return passStr;

}


				
function loginInit(saltParam)
{		
	if(typeof(saltParam)==='undefined')
	{
		getSalt();
						
	}
	else
	{
		var saltGlobal = saltParam;
		
		passStr = getCodeStr(saltGlobal);
	
		passStrGlobal = passStr;
		
		loginRequest(loginGlobal, passStrGlobal);
		
	}				

}





function getUserInfo()
{

	getUserInfoRequest();
	
}

function radialChart(dataPie, containerClass, portfolioID) {
//var el = document.querySelector('#user');

// el.id == 'user'
// el.dataset.id === '1234567890'
// el.dataset.user === 'johndoe'
// el.dataset.dateOfBirth === ''

	if(!containerClass)
	{

	portfolioContainer = $("#afterSumm").find("[data-portfolioid='" + portfolioID + "']");
	
	portfolioContainer.find('.summSingleChart').highcharts({
				chart: {
					backgroundColor: null,
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					height: 200,

				},
				title: {
					text: ''
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				credits: {
						enabled: false
				},
				exporting: { 
								enabled: false 
				},
				
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: '#000000',
							distance: -30,
						//    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							formatter: function()
										{
											if ( this.point.percentage < 10) 
											{
												return "";
											}
											else
											{
												return this.point.name;
											}
										}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Ticker',
					data: dataPie
				}]

								
								});
	

	}
	else
	{
	//$('.tickerList').last().append('<div class="tickerChart">Here you are</div>');
		$('.tickerChart:last').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					height: 200,

				},
				title: {
					text: ''
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				credits: {
						enabled: false
				},
				exporting: { 
								enabled: false 
				},
				
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: '#000000',
							distance: -30,
						//    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							formatter: function()
										{
											if ( this.point.percentage < 10) 
											{
												return "";
											}
											else
											{
												return this.point.name;
											}
										}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Ticker',
					data: dataPie
				}]

								
								});
	
	}

}


function drawSingleTicker(ticker, curPortQuantSumm, template)
{
	if(!template)
	{
		$('#templateContainer').load('template/singleTicketTemplate.html', function(resp){
			processSingleTicker(ticker, curPortQuantSumm, resp);	
		});
		return;
	}
			var q = parseInt(ticker.quantity);
			
			//alert(({}).toString.call(q).match(/\s([a-zA-Z]+)/)[1].toLowerCase());
			//alert(q);
	singlePie = [
                [ticker.ticker,   q],
				['',   curPortQuantSumm - ticker.quantity]
            ]
					
		
		//
	radialChart(singlePie, 'asdf');
	

	

}	 
	 
function processSingleTicker(ticker, curPortQuantSumm, template)
{
	ticketTemlateGlobal = template;
	drawSingleTicker(ticker, curPortQuantSumm, template);
}

function getSinglePortfolioRequest(potfolioId, template)
{

	
		var responseText = '';		
	
	var xhr = createCORSRequest('POST', 'http://group-l.com/index.php');
	
	if (!xhr) 
	{
		throw new Error('CORS not supported');
	}

	var data = new FormData();
	
	data.append('task_api', 'portfolio_info');
	data.append('user_id', userInfoGlobal.ID);
	data.append('portfolio_id', potfolioId);
	data.append('log', loginGlobal);
	data.append('pas', passStrGlobal);
	
	
	xhr.send(data);
	
	xhr.onload = function() 
	{	
		responseText = xhr.responseText;
		//alert(responseText);
		//document.getElementById("saltStorage").innerHTML = xhr.responseText;
		callBackSinglePortfolio(xhr.responseText, template);
		
	};
	
	xhr.onerror = function(err) 
	{
		alert("Сервер не дал доступа");
	};

}

/*
function getSinglePortfolio(potfolioIdParam)
{	
	
	getSinglePortfolioRequest(potfolioIdParam);

}
	*/
	
function getPortfolioList()
{	

	getPortfolioRequest();
		$('.content').each(function()
		{
		
				$(this).hide();
					
		});
		
	$('#portfolioContainer').show();
	$("#namePage").html("List of portfolios");
					
}
 
function processSinglePortfolio(template)
{
	portfolioTemlateGlobal = template;
	callBackPortfolio(portfolioResponseGlobal, template);
}	

function feedBack()
{
	feedBackRequest();
	$('.content').each(function()
		{
		
				$(this).hide();
					
		});
	
	$('#feedBackContainer').show();
	//ask=feedback_add&log=test_user&pas=001376fc756a1f4a382764c335a0874a:A0nwSpO2x2vlmAIz8ek3NbOLXJpqcZeH&message=hellow - feedback_add
	//p?task=feedback&log=test_user&pas=001376fc756a1f4a382764c335a0874a:A0nwSpO2x2vlmAIz8ek3NbOLXJpqcZeH - feedback
}

 function personalRecomendations() {
 
 
	$('.content').each(function()
	{
				$(this).hide();	
	});
	
	$('#personalRecomendationsContainer').show();
	personalRecomendationsRequest();

 }		 

  function showNews() {
 
 
	$('.content').each(function()
	{
				$(this).hide();	
	});
	
	$('#news').show();
	newsRequest();

 }	