<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="ru"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="ru"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logo</title>

  <!-- Included CSS Files -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/logo-style.css">
    <link rel="stylesheet" type="text/css" href="css/gl.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
	

		<script type="text/javascript" charset="utf-8" src="js/request.js"></script> 
		<script type="text/javascript" charset="utf-8" src="js/callBack.js"></script> 
		<script type="text/javascript" charset="utf-8" src="js/service.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/script.js"></script>
		
		
	<!--	<script type="text/javascript" charset="utf-8" src="js/miscellaneous.js"></script> -->
			<script type="text/javascript" charset="utf-8" src="js/raphael-min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/jquery-1.10.2.min.js"></script>
	
		<script type="text/javascript" charset="utf-8" src="js/pie.js"></script>
		<script type="text/javascript">
		
var url = 'http://group-l.com/api/api.php';
var loginGlobal = '';
var passGlobal = '';
var passStrGlobal = '';
var saltGlobal = '';
var userInfoGlobal;
var portfolioTemlateGlobal;
var portfolioResponseGlobal;

var portfolioResponseGlobal;
var portfolioArGlodal = [];

var ticketTemlateGlobal;

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

function callBackFeed(feedJSON)
{

//	var validJSON = feedJSON.replace(/[\n\r\t]/g, '');
	//feed = JSON.parse(feedJSON);
	dump(feedJSON);
	
}


function generalAdvice()
{
	generalAdviceRequest();
	$('.content').each(function()
		{
		
				$(this).hide();
					
		});
	
	$('#generalAdviceContainer').show();
	
}

function generalAdviceRequest()
{
var responseText = '';		
//	task_api=general_recomendations&log=test_user&pas=001376fc756a1f4a382764c335a0874a:A0nwSpO2x2vlmAIz8ek3NbOLXJpqcZeH&period=1

	var xhr = createCORSRequest('POST', 'http://group-l.com/api/api.php');
	
	if (!xhr) 
	{
		throw new Error('CORS not supported');
	}

	var data = new FormData();
	
	data.append('task', 'general_recomendations');
	data.append('log', loginGlobal);
	data.append('pas', passStrGlobal);
	data.append('period', 1);
	
	
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

function savePersonalData() {
	
	savePersonalDataRequest();

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
	data.append('mob', $('#prim_phone').val());
	
	country
	=Mobile&skype=SKYPE&country=Country&city=City&firstname2=Firstname2&lastname2=Lastname2&tel2=Phone2&mob2=Phone2&skype2=SKYPE2&trading_experience=E_NOVICE&investing_plan=I_1&maximal_risk=12&your_objective=O_1&your_strategy=S_CONS - edit_personal_data

	
	
	
	
	
	
	
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
/*function showMe(){

	//$(this).html('asdffdfdsfagfasilg;gh;oaihg;oig');
	alert("Hi");
}*/
		</script>
	
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="css/gl-ie7.css">
    <![endif]-->

</head>

<body  onload="diplay_hide('#logotipe');return false;">
<div id="loginContainer" class="logobg">
  <form role="form" class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 placeLogo">
  <fieldset>
  	<div id="logotipe" class="logo" style="display: none;">
	  	<div><i class="gl-groupl"></i></div>
	  	<div class="logotxt">
	  		<img src="img/logotxt.png" alt="Logotipe" class="img-responsive">
		</div>
  	</div>
  	<div id="logo-panel" style="display: none;">
	    <div class="form-group" style="margin-top: 40px;">
	      <input type="text" class="form-control placecolor" id="login" placeholder="somemail.@groupl.com">
	    </div>
	    <div class="form-group">
	      <input type="password" class="form-control" id="pass" placeholder="Password">
	    </div>
	    <div onclick="loginInit()" class="btn btn-default">Sign In</div>
    </div>
  </fieldset>
</form>
</div>

<div id="navbar" style="display: none;" class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container cont-height">
        <div class="navbar-header">
              <button type="button" class="btn navbar-toggle pull-left" data-toggle="offcanvas">
                <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <div class="namePage"><p id="namePage">List of portfolios</p></div>
              <button type="submit" class="btn btn-red btn-create head-txt"><div class="btn-text" style="float:left;margin-right: 5px;">Create</div><i class="fa fa-plus" style="float: left;margin-top: 3px;"></i></button>
        </div>
      </div><!-- /.container -->
</div><!-- /.navbar -->

    <div id="layout" style="display: none;" class="container navbar-padd">

      <div class="row row-offcanvas row-offcanvas-left row-hidden">
        

        <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <ul class="list-group">
            <li><a href="#" class="list-group-item">News<i class="fa fa-angle-right fa-2x"></i></a></li>
            <li><a href="#" onclick="generalAdvice()" class="list-group-item">Advice<i class="fa fa-angle-right fa-2x"></i></a></li>
            <li><a href="#" onclick="getPortfolioList()" class="list-group-item">Portfolios<i class="fa fa-angle-right fa-2x"></i></a></li>
            <li><a href="#" class="list-group-item">Recommendations<i class="fa fa-angle-right fa-2x"></i></a></li>
            <li><a href="#" class="list-group-item">Suggestions<i class="fa fa-angle-right fa-2x"></i></a></li>
            <li><a href="#" onclick="feedBack()" class="list-group-item">Feedback<i class="fa fa-angle-right fa-2x"></i></a></li>
            <li><a href="#" onclick="getUserInfoPage()" class="list-group-item">Personal data<i class="fa fa-angle-right fa-2x"></i></a></li>
            <li><a href="#" class="list-group-item">Site<i class="fa fa-angle-right fa-2x"></i></a></li>
            <li><a href="#" class="list-group-item">Exit<i class="fa fa-angle-right fa-2x"></i></a></li>
          </ul>
        </div><!--/span-->
		
		<div id="generalAdviceContainer" class="col-xs-12 col-sm-12 col-md-12 content" style="display: none;">
			          <div class="row row-content">
            <div class="col-xs-12">
              <table class="table table-hover" style="display: block;">
              <thead>
                <tr class="success">
                  <td><b class="text-white">Long</b></td>
                  <td>Ticker</td>
                  <td>Name</td>
                  <td>Price</td>
                  <td>Change $</td>
                  <td>Change %</td>
                </tr>
                </thead>
                <tbody>
                  <tr class="gray-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                  <tr class="black-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="row row-content" style="display: block;">
            <div class="col-xs-12">
              <table class="table table-hover" style="display: block;">
              <thead>
                <tr class="warning">
                  <td><b class="text-white">Range</b></td>
                  <td>Ticker</td>
                  <td>Name</td>
                  <td>Price</td>
                  <td>Change $</td>
                  <td>Change %</td>
                </tr>
                </thead>
                <tbody>
                  <tr class="gray-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                  <tr class="black-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
		  
			  <div class="row row-content">
            <div class="col-xs-12">
              <table class="table table-hover">
              <thead>
                <tr class="danger">
                  <td><b class="text-white">Short</b></td>
                  <td>Ticker</td>
                  <td>Name</td>
                  <td>Price</td>
                  <td>Change $</td>
                  <td>Change %</td>
                </tr>
                </thead>
                <tbody>
                  <tr class="gray-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                  <tr class="black-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                  <tr class="black-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                  <tr class="black-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                  <tr class="black-table">
                    <td><input type="checkbox"></td>
                    <td>DAC</td>
                    <td>Danaos Corporatio</td>
                    <td>7.24</td>
                    <td class="text-green">+0.14</td>
                    <td class="text-red">-1.93</td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
			  <div class="row">
				<div class="col-sm-12">
				  <div class="row">
					<div class="col-xs-12 col-sm-7">
					  <ul class="pagination">
						<li><a href="#">1d</a></li>
						<li><a href="#">5d</a></li>
						<li><a href="#">1m</a></li>
						<li><a href="#">3m</a></li>
						<li><a href="#">6m</a></li>
						<li><a href="#">all</a></li>
					  </ul>

					</div>
					<div class="col-xs-12 col-sm-5 decor-btn">
						  <a href="#" class="btn btn-green btn-link pull-right"><b>Add to portfolio</b></a>
					</div>
				  </div>
				</div>
			  </div>
          
        </div><!--/span-->

        <div id="portfolioContainer" style="display: none;" class="col-xs-12 col-sm-12 col-md-12 content">
        <div class="col-xs-12 bott-line text-white head-txt">Summary</div>
        <div class="row" style="margin-top: 45px; padding-bottom: 30px;">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-sm-2">
                <img src="img/circle.png" class="img-responsive">
              </div>
              <div class="col-sm-3 col-xs-6">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 text-green">+3,04</div>
                  <div class="col-xs-12 col-sm-12">Day`s P/L ($)</div>
                  <div class="col-xs-12 col-sm-12 text-white" style="padding-top: 13px;">123/456</div>
                  <div class="col-xs-12 col-sm-12">Shares</div>
                </div>
              </div>
              <div class="col-sm-3 col-xs-6">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 text-green">+34,00%</div>
                  <div class="col-xs-12 col-sm-12">Day`s P/L (%)</div>
                  <div class="col-xs-12 col-sm-12 text-white" style="padding-top: 13px;">12 345$</div>
                  <div class="col-xs-12 col-sm-12">Mkt price</div>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12">
                <div class="row textR">
                  <div class="col-xs-12">Unrealized P/L:</div>
                  <div class="col-xs-12 text-green">+1 385,00$ (+6.44%)</div>
                  <div class="col-xs-12" style="padding-top: 13px;">Realized P/L:</div>
                  <div class="col-xs-12 text-red">-385,00$ (-6.44%)</div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div id="startPortfolioList"  class="col-xs-12 bott-line text-white head-txt">List of Portfolios</div>
        
		<div id="afterSumm">
		
		</div>
		
		<!--left-block-->
        



         <div class="void25"></div> 
        </div>
        
		<div id="news" style="display: none;" class="col-xs-12 col-sm-12 col-md-12 content">
          <div class="row">
            <div class="col-xs-12">
              <div class="row data-padd news-padd">
                <div class="col-xs-12 news-padd text-white"><b>News</b></div>
              </div>

              <!--news-block-->
              <div class="row">
                <div class="col-xs-12">
                <div class="row news-padd">
                  <div class="col-sm-4 col-xs-12 pull-right news-padd"><span class="textRight">today at 9:37PM</span></div>
                  <div class="col-sm-8 col-xs-12 pull-left blueTitle news-padd"><b>Intel ugres holders to reject mini-tender offer:</b></div>
                </div>
                <div class="row left-news">
                  <div class="col-sm-6 left-news">
                    <div class="row">
                      <div class="col-sm-4 decorationWhite">MarketWatch</div>
                      <div class="col-sm-4">INTC 25.47</div>
                      <div class="col-sm-4 decorationGreen">>0.37  (1.47%)</div>
                    </div>
                  </div>
                </div>
                <div class="row news-padd data-padd">
                  <div class="col-xs-12 news-padd">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labo...</p>
                  </div>
                </div>
                </div>
              </div>

              <!--news-block-->
              <div class="row">
                <div class="col-xs-12">
                <div class="row news-padd">
                  <div class="col-sm-4 col-xs-12 pull-right news-padd"><span class="textRight">today at 9:37PM</span></div>
                  <div class="col-sm-8 col-xs-12 pull-left blueTitle news-padd"><b>Intel ugres holders to reject mini-tender offer:</b></div>
                </div>
                <div class="row left-news">
                  <div class="col-sm-6 left-news">
                    <div class="row">
                      <div class="col-sm-4 decorationWhite">MarketWatch</div>
                      <div class="col-sm-4">INTC 25.47</div>
                      <div class="col-sm-4 decorationGreen">>0.37  (1.47%)</div>
                    </div>
                  </div>
                </div>
                <div class="row news-padd data-padd">
                  <div class="col-xs-12 news-padd">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labo...</p>
                  </div>
                </div>
                </div>
              </div>

              <!--news-block-->
              <div class="row">
                <div class="col-xs-12">
                <div class="row news-padd">
                  <div class="col-sm-2 col-xs-12 pull-right news-padd"><span class="textRight">today at 9:37PM</span></div>
                  <div class="col-sm-10 col-xs-12 pull-left blueTitle news-padd"><b>Intel ugres holders to reject mini-tender offer:</b></div>
                </div>
                <div class="row left-news">
                  <div class="col-sm-6 left-news">
                    <div class="row">
                      <div class="col-sm-4 decorationWhite">MarketWatch</div>
                      <div class="col-sm-4">INTC 25.47</div>
                      <div class="col-sm-4 decorationGreen">>0.37  (1.47%)</div>
                    </div>
                  </div>
                </div>
                <div class="row news-padd data-padd">
                  <div class="col-xs-12 news-padd">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labo...</p>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>         
        </div><!--/span-->   
	<div id="feedBackContainer" style="display: none;" class="col-xs-12 col-sm-12 col-md-12 content" >
	
	</div>
	
	
		<div id="userInfoContainer" style="display: none;"  class="col-xs-12 col-sm-12 col-md-12 content">
        <!--block-1-->
          <div class="row">
            <div class="col-xs-12">
              <div class="row data-padd-head">
                <div class="col-xs-12 text-white head-txt">Account Information</div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">ID:</div>
                <div id="userId" class="col-sm-4 col-xs-6 text-white"><input  type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">User:</div>
                <div class="col-sm-4 col-xs-6 text-white"><input id="user"  type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">E-mail:</div>
                <div class="col-sm-4 col-xs-6 text-white"><input id="email"  type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">Password:</div>
                <div class="col-sm-4 col-xs-6"><input type="text" id=""  class="form-control textbox1" /></div>
              </div>
              <div class="void35"></div>
            </div>
          </div>

          <!--block-2-->
          <div class="row">
            <div class="col-xs-12">
              <div class="row data-padd-head">
                <div class="col-xs-12 text-white head-txt">Contact Information</div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">First name:</div>
                <div class="col-sm-4 col-xs-6 text-white"><input id="name"  type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">Last name:</div>
                <div class="col-sm-4 col-xs-6 text-white"><input id="lastName"  type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">Phone:</div>
                <div class="col-sm-4 col-xs-6 text-white"><input id="prim_phone"  type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">Mobile:</div>
                <div class="col-sm-4 col-xs-6 text-white"><input id="mobile"   type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">Skype:</div>
                <div class="col-sm-4 col-xs-6 text-white"><input id="skype"  type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">Country:</div>
                <div class="col-sm-4 col-xs-6 text-white"><input id="country"  type="text" class="form-control textbox1" /></div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">City:</div>
                <div class="col-sm-4 col-xs-6 text-white">
                  <input id="city" type="text" class="form-control textbox1" />
                </div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">Secure question:</div>
                <div class="col-sm-4 col-xs-6">
                  <div class="col-xs-12 col-sm-5" style="margin-left: -15px;">your questions</div>
                  <div class="col-xs-12 col-sm-7">
                    <input type="text" class="form-control textbox" />
                  </div>
                </div>
              </div>
              <div class="row data-padd">
                <div class="col-sm-8 col-xs-6">Your answer:</div>
                <div class="col-sm-4 col-xs-6">
                  <div class="col-xs-12 col-sm-3" style="margin-left: -15px;">answer</div>
                  <div class="col-xs-12 col-sm-9  ">
                    <input type="text" class="form-control textbox" />
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!--Button-->
          <div class="row">
            <div class="col-sm-12">
            <div class="void25"></div>
              <div class="row">
                <div class="col-xs-12 col-sm-5 col-sm-offset-7 decor-btn">
                  <a onclick="savePersonalData()" href="#" class="btn btn-green btn-link pull-right"><b>Save</b></a>
                </div>              
              </div>
            </div>
          </div>  
          
        </div><!--/span-->
          
        </div><!--/span-->

        
      </div><!--/row-->
		<div style="display: none;" id="templateContainer">
		
		</div>
	
    <script src="js/bootstrap.js"></script>
    <script src="js/logo.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/color.js"></script>
    <script src="js/offcanvas.js"></script>
	<script src="js/charts/highcharts.js"></script>
<script src="js/charts/modules/exporting.js"></script>
  </body>
</html>
