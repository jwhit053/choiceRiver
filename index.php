	<style>
		body{overflow-x:hidden}.posRel{position:relative}.posAbs{position:absolute}.hide{display:none}.show,.dBlock{display:block}.dInline{display:inline}.dInlineBlock{display:inline-block}.balance{margin-left:auto;margin-right:auto}.mt5{margin-top:5px}.mt10{margin-top:10px}.mt15{margin-top:15px}.mt20{margin-top:20px}.mb5{margin-bottom:5px}.mb10{margin-bottom:10px}.mb20{margin-bottom:20px}.mb30{margin-bottom:30px}.mtb2{margin-top:2px;margin-bottom:2px}.ml10{margin-left:10px !important}.ml20{margin-left:20px !important}.mr5{margin-right:5px}.mr10{margin-right:10px}.mr15{margin-right:15px}.p5{padding:5px;}.p10{padding:10px}.pt5{padding-top:5px}.pb5{padding-bottom:5px}.pb20{padding-bottom:20px}.pl5{padding-left:5px}.pl10{padding-left:10px}.pl20{padding-left:20px}.pr5{padding-right:5px}.pr10{padding-right:10px}.pr20{padding-right:20px}.pButton{padding:10px 20px}.brdrBtm1{border-top:0;border-left:0;border-right:0;border-bottom:1px;border-style:solid}.brdrGrey{border-bottom-color:#7f7c7d}.unit{float:left}.unitRt{float:right}.flexUnit,.lastUnit{display:table-cell;float:none;width:auto}.tcWhite{color:white}.tcWhite:hover,.tcWhite:active{color:white}.tcBlack{color:black}.tcBlack:hover,.tcBlack:active{color:black}.tcBlue{color:#00549e}.tcGrey{color:#7f7c7d}.tcDrkGrey{color:#514f50}.fs16{font-size:16px}.fs14{font-size:14px}.fs12{font-size:12px}.fs8{font-size:8px}.txtC{text-align:center}.txtJ{text-align:justify}.txtR{text-align:right}.fwBold{font-weight:bold}.wFull{width:100%}.w100{width:100px}.w190{width:190px}.w200{width:200px}.w210{width:210px}.w225{width:225px}.size4of5{width:80%}.size5of8{width:72.5%}.size3of4{width:75%}.size3of5PlusGutters{width:61.5%}.size1of2{width:48.5%}.size1of3{width:32%}.size1of4{width:23.5%}.size1of5{width:19.5%}.size1of6{width:16%}.h500{height:500px}.h100{height:100px}.h30{height:30px}.h25{height:25px}.clearfix:after,.flexUnit:after,.hnav:after,.lastUnit:after,.line:after,.section:after,article:after,aside:after,details:after,footer:after,header:after,hgroup:after,nav:after,section:after{content:" x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x";visibility:hidden;clear:both;height:0 !important;display:block;line-height:0;font-size:xx-large;overflow:hidden}.bgWhite{background:white}.bgBlue{background:#00549e}.bgDrkBlu{background:#002a51}.brdrad5{border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px}.circular{height:8.33333333%;border-radius:100%;-webkit-border-radius:100%;-moz-border-radius:100%}#svg circle{stroke-dashoffset:0;transition:stroke-dashoffset 1s linear;stroke:#fff;stroke-width:1em}#svg #bar{stroke:#002a51}#cont{display:block;height:200px;width:200px;margin:2em auto;box-shadow:0 0 1em black;border-radius:100%;position:relative}#cont:after{position:absolute;display:block;height:160px;width:160px;left:50%;top:50%;box-shadow:inset 0 0 1em black;content:attr(data-pct) "%";margin-top:-80px;margin-left:-80px;border-radius:100%;line-height:160px;font-size:2em;text-shadow:0 0 0.5em black;background:#ddd}.reqNotFilled{border:2px solid #cc3937}.formChoice{border:2px solid #00549e}.logoHeight{height:100%}.formContinueLink{margin:auto;left:0;bottom:20px;right:0}.twitterBtn{background:#61AADC}.fbBtn{background:#09579E}.vPosTop{vertical-align: top;}.brdr1{border:1px solid black;}.size1of8{width:11.5%;}.txtRed{color:red;}.sizeAlmostFull{width:95%;}
		.gutter:not(:first-child){margin-left:.5%;}.ptb10{padding-top: 10px; padding-bottom: 10px;}.dTable{display: table;}.dTRow{display: table-row;}.dTCell{display: table-cell;}.m5{margin:5px;}.csrpointer{cursor:pointer;}
	</style>
	<div class="wFull clearfix">
		<div id="targetArea">
			<div id="targetTemplate" class="hide brdrad5 csrpointer sameHeight txtC p5 unit gutter" onclick="placevote(this);">
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
function getContestants() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           	setupContext(JSON.parse(xmlhttp.responseText));
        }
    }
    xmlhttp.open("GET","./wewillrememberitforyouwholesale.php");
    xmlhttp.send();
}

function setupContext(inputObj){
	var targetArea = document.getElementById("targetArea"), count = 0;
	for(contestant in inputObj){
		var templ = document.getElementById("targetTemplate").cloneNode(true),
			link = document.createElement("a"),
			img = document.createElement("img"),
			p1 = document.createElement("p"),
			p2 = document.createElement("p");
		
		templ.id="contestant"+count;

		templ.style.background = inputObj[contestant].background;
		templ.style.color = inputObj[contestant].textColor;
		
		img.classList.add("dBlock");
		img.classList.add("sizeAlmostFull");
		img.classList.add("m5");
		img.src = inputObj[contestant].pic;

		p1.innerHTML = inputObj[contestant].name + " has " + inputObj[contestant].votes + " votes";
		p2.innerHTML = inputObj[contestant].description;

		link.href = inputObj[contestant].website;
		link.appendChild(img);

		templ.appendChild(link);
		templ.appendChild(p1);
		templ.appendChild(p2);

		templ.classList.remove("hide");

		targetArea.appendChild(templ);
		count++;
	}
	document.getElementById("targetTemplate").remove();
	$(".sameHeight").addClass("size1of"+count);
	setHeight();
}

$(window).load(function() {
	getContestants();
});

function sendVote(input){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			console.log("id: "+input+" get another vote");
        }
    }
    xmlhttp.open("POST","./hedgemon.php?"+input);
    xmlhttp.send();

}

function placevote(input){
	if(getCookie() === ""){
		sendVote(input.getAttribute('data-id'));
		setCookie();
	} else {
		alert("You need to wait until after midnight to vote");
	}
}
function setCookie() {
	var expirDate = new Date(),
		expires = "";
	expirDate.setHours(23,59,59,0)
    expires = "expires="+expirDate.toUTCString();
    document.cookie = "site" + "=" + "ABCares" + "; " + expires;
}
function getCookie() {
    var name = "site" + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0){
        	return c.substring(name.length,c.length);
        }
    }
    return "";
}
function setHeight(){
	var heightCheck = document.getElementsByClassName("sameHeight"), tallestHeight = 0;
	for(var i=0; i<heightCheck.length; i++){
		if(heightCheck[i].clientHeight > tallestHeight){
			tallestHeight = heightCheck[i].clientHeight;
		}
	}
	for(var i=0; i<heightCheck.length; i++){
		heightCheck[i].style.height = tallestHeight + "px";
	}
}
</script>