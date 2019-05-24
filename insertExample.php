<html>
   <head>
      <meta content = "text/html; charset = ISO-8859-1" http-equiv = "content-type">
      <script type = "application/javascript">
         function loadJSON() {
            var data_file = "http://localhost/api/v1/elements";
			var sym = document.getElementById("symbol").value;
			var name = document.getElementById("name").value;
			var mass = document.getElementById("mass").value;
			var melt = document.getElementById("melting_point").value;
			var boil = document.getElementById("boiling_point").value;
			var src = document.getElementById("source").value;
			var colour = document.getElementById("colour").value;
			var use = document.getElementById("uses").value;
			
			var data = JSON.stringify({"atomic_symbol":sym,"element_name":name,"atomic_mass":mass,
			"melting_point_in_C":melt,"boiling_point_in_C":boil,"source":src,"colour":colour,"uses":use});

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
					var jsonObj = JSON.parse(http_request.responseText);
					document.getElementById("result").innerHTML = jsonObj.status_message;
					document.getElementById("symbol").value = "";
					document.getElementById("name").value = "";
					document.getElementById("mass").value = "";
					document.getElementById("melting_point").value = "";
					document.getElementById("boiling_point").value = "";
					document.getElementById("source").value = "";
					document.getElementById("colour").value = "";
					document.getElementById("uses").value = "";
               }
            }
			
            http_request.open("POST", data_file, true);
			http_request.setRequestHeader("Content-type", "application/json");
            http_request.send(data);
         }
		
      </script>
	
      <title>Periodic Table</title>
   </head>
   <body>
      <h1>Insert Ajax Example</h1>
      <p id="result"></p>	  
		<p><b>Start by typing the values into the input fields below:</b></p>
		<form> 
			Atomic Symbol: <input type="text" id="symbol"><br/>
			Element Name: <input type="text" id="name"><br/>
			Atomic Mass: <input type="text" id="mass"><br/>
			Melting Point: <input type="text" id="melting_point"><br/>
			Boiling Point: <input type="text" id="boiling_point"><br/>
			Source: <input type="text" id="source"><br/>
			Colour: <input type="text" id="colour"><br/>
			Uses: <input type="text" id="uses">
		</form>
      <div class = "central">
         <button type = "button" onclick = "loadJSON()">Insert Details </button>
      </div>
   </body>
</html>