var form = document.getElementById('formID'); // form has to have ID: <form id="formID">
form.noValidate = true;
form.addEventListener('submit', function(event) { // listen for form submitting
        if (!event.target.checkValidity()) {
            event.preventDefault(); // dismiss the default functionality
            document.getElementById('errorMessage').style.display = 'block';
        }
    }, false);

function add() {
		 
		    //Create an input type dynamically.
		    var div = document.createElement("div");
		    var element = document.createElement("input");
		 
		    //Assign different attributes to the element.
		    element.setAttribute("type", "text");
		    element.setAttribute("value", "");
		    element.setAttribute("name", "Service");
		    element.setAttribute("placeholder", "Service");
		 
		 
		    var foo = document.getElementById("fooBar");
		 
		    //Append the element in page (in span).
		    div.appendChild(element);
		    foo.appendChild(div);
		 
}

$(function() {
	    $( "#from" ).datepicker({
	    	defaultDate: "+1w",
	      	changeMonth: true,
	      	numberOfMonths: 1,
	      	onClose: function( selectedDate ) {
	        	$( "#to" ).datepicker( "option", "minDate", selectedDate );
	      	}
	    });
	    $( "#to" ).datepicker({
	      	defaultDate: "+1w",
	      	changeMonth: true,
	      	numberOfMonths: 1,
	      	onClose: function( selectedDate ) {
	        	$( "#from" ).datepicker( "option", "maxDate", selectedDate );
	      	}
	    });
});