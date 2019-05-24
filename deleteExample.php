<html>
   <head>
      <meta content = "text/html; charset = ISO-8859-1" http-equiv = "content-type">
      <script type = "application/javascript">
         function loadJSON() {
            var data_file = "http://localhost/api/v1/elements/";
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
                     alert("Your browser broke!");
                     return false;
                  }
               }
            }
			
            http_request.onreadystatechange = function() {
               if (http_request.readyState == 4 && http_request.status == 200) {
				   console.log(http_request.responseText);
                  var jsonObj = JSON.parse(http_request.responseText);
				  console.log(jsonObj);
                  document.getElementById("result").innerHTML = jsonObj.status_message;
               }
            }
			
            http_request.open("DELETE", data_file+document.getElementById("inputBox").value, true);
            http_request.send();
         }
		
      </script>
      <title>Delete Example</title>
   </head>
   <body>
      <h1>Delete Example in AJAX</h1>
      <p id="result"></p>
		<p><b>Start by typing in the ID of the element to delete into the input field below:</b></p>
		<form> 
		ID INPUT: <input type="text" id="inputBox">
		</form>
      <div class = "central">
         <button type = "button" onclick = "loadJSON()">Delete Record </button>
      </div>
		
   </body>
		
</html>