<!DOCTYPE html>
<html>
<head>
<script>
function foundResults(str) {
    if (str.length == 0) { 
        document.getElementById("result").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				var jsonObj = JSON.parse(this.responseText);
				console.log(jsonObj);
                document.getElementById("result").innerHTML = jsonObj[0].atomic_symbol  + " - " + jsonObj[0].element_name 
				+ ": <b> Uses: </b>" + jsonObj[0].uses + " <b>Colour:</b> " + jsonObj[0].colour;
            }
        }
        xmlhttp.open("GET", "http://localhost/api/v1/elements/"+str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<p><b>Start by typing the symbol/ID of an element into the input field below:</b></p>
<form> 
Input Element Symbol or ID: <input type="text" onkeyup="foundResults(this.value)">
</form>
<p><b>Details Found: </b><span id="result"></span></p>
</body>
</html>