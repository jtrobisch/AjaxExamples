<html>
   <head>
      <meta content = "text/html; charset = ISO-8859-1" http-equiv = "content-type">
      <script type = "application/javascript">
         function loadJSON() {
            var data_file = "http://localhost/api/v1/elements";
            var http_request = new XMLHttpRequest();
            try{
               // Opera 8.0+, Firefox, Chrome, Safari
               http_request = new XMLHttpRequest();
            }catch (e) {
               // Internet Explorer Browsers
               try{
                  http_request = new ActiveXObject("Msxml2.XMLHTTP");
               }catch (e) {
                  try{
                     http_request = new ActiveXObject("Microsoft.XMLHTTP");
                  }catch (e) {
                     // Something went wrong
                     alert("Your browser is trash!");
                     return false;
                  }
               }
            }	
            http_request.onreadystatechange = function() {
               if (http_request.readyState == 4  && http_request.status == 200) {
					var jsonObj = JSON.parse(http_request.responseText);
					for (var i = 0; i < jsonObj.length; i++){
						var obj = jsonObj[i];
						var node = document.createElement("LI");
						var textnode = document.createTextNode(obj.element_name + " (" + obj.atomic_symbol + ")");
						node.appendChild(textnode);
						document.getElementById("myList").appendChild(node);
					}
               }
            }
            http_request.open("GET", data_file, true);
            http_request.send();
         }
    </script>
	<title>the Periodic Table</title>
	</head>
	<body>
		<ul id="myList"></ul>
	<div class = "central">
         <button type = "button" onclick = "loadJSON()">Click Me</button>
    </div>
   </body>
</html>