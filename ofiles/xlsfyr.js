	var balance=0;
	var topay = 0;
	var str = "";
function showHint() {
	event.preventDefault();
	str = document.getElementById("rn").value;
	document.getElementById('rc').value = str;
    if (str.length === 0) {
        //document.getElementById("txtHint").innerHTML = "";
		document.getElementById("alerts").innerHTML = "Supply receipt no";
        return;
    } else {
		// document.getElementById("alerts").innerHTML = str;
		// return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("alerts").innerHTML = this.responseText;

				var names = document.getElementById("names").innerHTML.split(" ");
				document.getElementById("fn").value = names[0];
				document.getElementById("ln").value = names[1];

				 balance = parseFloat(document.getElementById("bal").innerHTML);

				var type = document.getElementById("type").innerHTML.value;

				// if(balance >= 30000  && type != "SCHORLASHIP"){
				// 	topay = balance - 10000;
				// 	document.getElementById("pay").innerHTML = "You are to pay minimum of N" + (topay) + " to be eligible for this exam enrollment, kindly make your payment and proceed with the enrollment ";

				// 	document.getElementById("alerts").innerHTML = "";


				// }else if(parseFloat(balance) >= 30000  && type == "SCHORLASHIP"){
				// 	topay = balance -10000;

				// 	document.getElementById("pay").innerHTML = "You are to pay minimum of N" + (topay) + " to be eligible for this exam enrollment, kindly make your payment and proceed with the enrollment" ;
				// 	document.getElementById("alerts").innerHTML = "";
				// }else{
					document.getElementById("alerts").innerHTML = "Fill in the details below and click the enroll button, kindly save the exam number and password, you will need it to take your exam";

					document.getElementById("sc").disabled = false;
					document.getElementById("ver").disabled = true;
				// }

				
            }
        };
        xmlhttp.open("GET", "rec.php?rc=" + str, true);
        xmlhttp.send();
    }
}

  function payWithPaystack(){
	  //alert(topay);
    var handler = PaystackPop.setup({
      key: 'pk_live_ab2f7174a5724a932c2c15e601408f9b8900c852',
      email: 'payment@esaeuniversity.edu.bj',
      amount: topay*100,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
		// alert(6);

			//Sucess Payment
			
    
			alert('success. transaction ref is ' + response.reference);
			//end here
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				
					document.getElementById("alerts").innerHTML = "Fill in the details below and click the enroll button, kindly save the exam number and password, you will need it to take your exam";

					document.getElementById("sc").disabled = false;
					document.getElementById("ver").disabled = true;
					document.getElementById("pay").innerHTML = "";
				}  
			};
			xmlhttp.open("GET", "updatepay.php?rc=" + str + "&&ap="+topay, true);
			xmlhttp.send();

      },
      onClose: function(){
          alert('window closed');
		  document.getElementById("pay").innerHTML = "";
		  document.getElementById("ver").disabled = false;
      }
    });
    handler.openIframe();
  }
  
  function chooseState() {

	state = document.getElementById("states").value;
	
    if (state.length === 0) {
        //document.getElementById("txtHint").innerHTML = "";
		//document.getElementById("alerts").innerHTML = "Supply receipt no";
        return;
    } else {
		// document.getElementById("alerts").innerHTML = str;
		// return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
					document.getElementById("lga").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET", "lga.php?state=" + state, true);
        xmlhttp.send();
    }
}