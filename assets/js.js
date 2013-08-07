var dn = dn || {};

(function(generator, $) {
    
    generator.init = function() {
        // Capture user click
        $('#dn-submit').click(function(event) {
            event.preventDefault();
            if(dn.validator.checkNum()){
                generator.updateText();
            }
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
            url: 'assets/endpoint.php',
            type: "POST",
            async: false,
            data: { language: lang, paragraphs: numParas},
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
    
    // Check that the number is valid
    validator.checkNum = function(){
        var selectedNumber = $('input[name=numPara]').val();
        // Check the number isnt negative
        if(selectedNumber > 0){
            if (selectedNumber < 4000){
                validator.removeError();
                return true;
            } else {
                validator.updateError("please use a number less than 4000");
                return false;
            }
        } else {
            validator.updateError("please use positive numbers.");
            return false;
        }
    }
    
    // Only allow numbers to be entered into the field
    validator.numOnlyInput = function() {
        $('input[name=numPara]').bind('keydown',function(e){
             // Allow backspace
             if(e.which == 8){
                return true;
             }
             // Allow top numbers and number pad 
             else if (e.which > 48 && e.which < 57 || e.which > 96 && e.which < 105){
                return true;
             }
             // Dont allow character 
             else {
                return false;     
             }
        });
    } 
    
    // Update the error message on screen
    validator.updateError = function(error){
        if($('.dn-error').length == 0){
            $('.custom .large-12').prepend('<p class="dn-error">' + error + '</p>');
        } else {
            $('.dn-error').text(error);
        }
    }
    
    validator.removeError = function(){
        if($('.dn-error').length > 0){
            $('.dn-error').remove();
        }
    }
   
}(window.dn.validator = window.dn.validator || {}, jQuery));

jQuery(document).ready(function(){
    $("html").removeClass("no-js");
    dn.generator.init(); 
    dn.validator.init();
});