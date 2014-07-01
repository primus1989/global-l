function displayDeviceInfo()
{
	document.getElementById("platform").innerHTML = device.platform;
	document.getElementById("version").innerHTML = device.version;
	document.getElementById("uuid").innerHTML = device.uuid;
	document.getElementById("name").innerHTML = device.name;
	document.getElementById("width").innerHTML = screen.width;
	document.getElementById("height").innerHTML = screen.height;
}

// The "deviceready" event is sent when the system
// has finished loading.
document.addEventListener(
		"deviceready",
		displayDeviceInfo,
true);

// Close the application when the back key is pressed.
document.addEventListener(
		"backbutton",
		function() { mosync.app.exit(); },
true);

function dump(obj) {
    var out = "";
    if(obj && typeof(obj) == "object"){
        for (var i in obj) {
            out += i + ": " + obj[i] + "\n";
        }
    } else {
        out = obj;
    }
    alert(out);
}

function toType(obj) {
	return ({}).toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase()
}