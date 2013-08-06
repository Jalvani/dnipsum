var dn = dn || {};

(function(generator, $) {
    
    generator.init = function() {
        // Capture user click
        $('#dn-submit').click(function(event) {
  			event.preventDefault();
			generator.updateText();
		});
    }
    
    // Call the JSON method
    generator.updateText = function(){
    	generator.getText();
    }
    
    generator.getText = function(){
    	var lang = 'eng',
    		numParas = 1,
    		selectedLang = $('select[name=lang]').val(),
    		selectedNum = $('input[name=numPara]').val();

    	if(selectedLang){
    		lang = selectedLang;
     	}

		if(selectedNum){
    		numParas = selectedNum;
     	}
    	
    	$.ajax({
		    url: 'dnipsum.php',
		    type: "POST",
		    async: false,
		    data: { lan: lang, length: numParas},
		    error: function (data) {
		    	console.log("error");
    		},
		    success: function (data) {
		    	generator.setText(data);
    		}
		});
    }
    
    generator.setText = function(text){		
		// Clear the old text
    	// Set the new screen text
    	$("#dn-target").html(text);    	
    }
   
}(window.dn.generator = window.dn.generator || {}, jQuery));

(function(validator, $) {
    
    validator.init = function() {
       validator.numOnlyInput();
    }  
    
    validator.numOnlyInput = function() {
        $('input[name=numPara]').bind('keydown',function(e){
             // Allow backspace
             if(e.which == 8){
             	return true;
             }
             // Allow top numbers and number pad 
             else if (e.which > 40 && e.which < 64 || e.which > 96 && e.which < 105){
                return true;
             }
             // Dont allow character 
             else {
                return false;     
             }
		});
	} 
   
}(window.dn.validator = window.dn.validator || {}, jQuery));

jQuery(document).ready(function(){
	$("html").removeClass("no-js");
	dn.generator.init(); 
	dn.validator.init();
});