


function callBackLogin(response)
{

	loginInit(response);
	
}

function getUserInfoCallBack(userInfoJSON)
{
	//var strtst = '{"ID":"65","user":"test_user","e-mail":"office@it-partner.com.ua","prim_first_name":"Firstname","prim_last_name":"Lastname	","prim_phone":"Phone","prim_mobile":"Mobile","prim_skype":"SKYPE","country":"Country","city":"City","second_first_name":"Firstname2","second_last_name":"Lastname2","second_phone":"Phone2","second_mobile":"Phone2","second_skype":"SKYPE2","expierence":"E_NOVICE","planned_investments":"I_1","max_risk":"12","objective":"O_1","strategy":"S_CONS"}'
	
	var desired = userInfoJSON.replace(/[\n\r\t]/g, '');
	
	
	userInfoGlobal = JSON.parse(desired);
	//alert(userInfoGlobal.ID);
	
}


function callBackSinglePortfolio(singlePortfolio, template)
{
	console.log(singlePortfolio);
	singlePortfolio = singlePortfolio.replace(/[\n\r\t]/g, '');
	
	singlePortfolio = JSON.parse(singlePortfolio);
	portfolioArGlodal.push(singlePortfolio);
	//type = ({}).toString.call(singlePortfolio).match(/\s([a-zA-Z]+)/)[1].toLowerCase()
	//		alert(dump(singlePortfolio));
	portfolioList = JSON.parse(portfolioResponseGlobal);
	if(portfolioArGlodal && portfolioArGlodal.length == portfolioList.portfolio.length)
	{
		callBackPortfolio(portfolioResponseGlobal, template, portfolioArGlodal);
		
	}
	
}

function callBackPortfolio(portfolio, template, portfolioAr)
{
	//$('#portfolioContainer').html('');
	portfolioResponseGlobal = portfolio;
	portfolioList = JSON.parse(portfolio);
	
	
	if(!template)
	{
		$('#templateContainer').load('template/portfolioSingleTemplate.html', function(resp){
			processSinglePortfolio(resp);	
		});
		return;
	}
	
	//$('#portfolioContainer').html('');
	$('#afterSumm').html('');
	if(!portfolioAr || portfolioAr.length != portfolioList.portfolio.length)
	{
		for (var i  in portfolioList.portfolio)
		{


				
				var curPortfolio = portfolioList.portfolio[i];
				
				curPortId = curPortfolio.portfolioID;
				getSinglePortfolioRequest(curPortId, template);

		}
	}
	
	if(portfolioAr && portfolioAr.length == portfolioList.portfolio.length)
	{	
	
		var toInsert = '';
		var stageVar = '';
		var virtualStage = '';
		var dataQuanSum =[];
		var profit = 0;
		var marketPrice = 0;
		for (var i = 0  in portfolioAr)
		{	
		
				
				var templatedPortfolioInfo = portfolioList.portfolio[i];
				var curPortQuantSumm = 0;
				var lastPortId = -1;
				
				for(var curQuantCnt=0 in portfolioAr[i])
				{
					curPortQuantSumm += parseInt(portfolioAr[i][curQuantCnt].quantity);
				}
				
				//alert(curPortQuantSumm);
				
				
				for(var curInfo=0 in portfolioAr[i])
				{
					curTempId = templatedPortfolioInfo.portfolioID;
					curTempId = curTempId.toString();
					
					
					if(lastPortId != curTempId)
					{
						var lastPortId = curTempId;
					
					
						if(templatedPortfolioInfo.real)
						{
							var virtualStatus = "real";
						}
						else
						{
							virtualStatus = "virtual";
						}
						
					
					
						toInsert = str_replace('{portfolioName}', templatedPortfolioInfo.portfolioName, template);
						stageVar = str_replace('{portfolioID}', curTempId, toInsert);
						virtualStage = str_replace('{virtualStatus}', virtualStatus, stageVar);
						
						
						var dataTable = '<table class"tickerInfo" style="display: none;"><tr><td> Name </td><td > Sector </td><td> Ticker </td><td> Quantity </td><td> Average </td><td> Price </td><td> Commission </td><td> Dividends </td><td> Basic price </td><td> Market price </td><td> Change $ </td><td> Change % </td><td> Profit/Loss $ </td><td> Gain $ </td><td> Total % </td></tr>';
						
							//dump(virtualStage);
						$('#afterSumm').append(virtualStage);
						//$('#portfolioContainer').append(virtualStage);
						
						var curPortfolioChartsData =  [];
						
						
					}
					
					
					
				
					
					
					var quant = parseInt(portfolioAr[i][curInfo].quantity);
					
					var curPie =  {
						name: portfolioAr[i][curInfo].ticker,
						y: quant,
					};
					
					curPortfolioChartsData.push(curPie); 
					
					//$('.tickerList').last().append('<div class="tickerChart">Here you are</div>');
					

					
				   var colums = '<tr><td>' + portfolioAr[i][curInfo].name + '</td><td >' + portfolioAr[i][curInfo].sector + '</td><td>' + portfolioAr[i][curInfo].ticker + '</td><td>' + portfolioAr[i][curInfo].quantity + '</td><td> aversge </td><td>' + portfolioAr[i][curInfo].price + '</td>' + '<td> Commission </td><td> Dividends </td><td>' + portfolioAr[i][curInfo].basic_price + '</td><td> ' + portfolioAr[i][curInfo].market_price + '</td><td>' + portfolioAr[i][curInfo].change_usd + '</td><td> ' + portfolioAr[i][curInfo].change_percents + '</td><td>' + portfolioAr[i][curInfo].profit + '</td><td>' + portfolioAr[i][curInfo].gain + '</td><td>' + portfolioAr[i][curInfo].total_percents + '</td></tr>';
				   
				   
					dataTable = dataTable + colums;
			//alert($('.portfolioSingleTemplate').length);
		//	$('.portfolioSingleTemplate:last').append('<div style="display: none;" class="tickerChart">Here you are</div>');
					curMarketPrice = portfolioAr[i][curInfo].market_price.replace(/\,/g, '');
					marketPrice += parseFloat(curMarketPrice);
					curProfit = portfolioAr[i][curInfo].profit.replace(/\,/g, '');
					profit += parseFloat(curProfit);
					//dump(parseFloat(curProfit));
			
					if(curInfo == portfolioAr[i].length-1)
					{
							profit = Number((profit).toFixed(2));
							marketPrice = Number((marketPrice).toFixed(2));
							dataTable = dataTable + "</table>";
						
						portfolioContainer = $("#afterSumm").find("[data-portfolioid='" + templatedPortfolioInfo.portfolioID + "']");
						$("#afterSumm").find('.portfolioSingleTemplate').append(dataTable);
							portfolioContainer.find('.pl').text(profit);
							portfolioContainer.find('.mkt').text(marketPrice);
							profit = 0;
							//
							radialChart(curPortfolioChartsData, null, templatedPortfolioInfo.portfolioID);
					}
					else
					{
					
					//	$('.portfolioSingleTemplate').last().append('<div class="tickerChart">Here you are</div>');
					//drawSingleTicker(portfolioAr[i][curInfo], curPortQuantSumm);
					//$(this).delay(10000);
					//alert($('.tickerChart').length);
					
					}
					
				
				}
			
		}
		
		portfolioArGlodal = [];
		
	}


	
}

function callBackFeed(feedJSON, template)
{

	
	if(!template)
	{
		
			var validJSON = feedJSON.replace(/[\n\r\t]/g, '');
			
			feed = JSON.parse(validJSON);
			feedGlobal = feed;
	
		$('#templateContainer').load('template/feed.html', function(resp){
			callBackFeed(feedGlobal, resp);	
		});
		return;
	}
	$('#feedBackWrapper').html('');
	
		
	for (var i = 0  in feedJSON)
	{	
					
		var dateObj =  new Date(feedJSON[i].date*1000);
		dateObj = dateObj.toString().replace(/UTC\s/,"");
		dateObj = dateObj.replace(/GMT.+/,"");
		toInsert = str_replace('{author}', feedJSON[i].author, template);
		stageVar = str_replace('{date}', dateObj, toInsert);
		virtualStage = str_replace('{message}', feedJSON[i].message, stageVar);
		$('#feedBackWrapper').prepend(virtualStage);			
			
						
	}					
		
	
}