$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><hr><input type="text" name="sku[]" id="sku[]" style="height: 30px" placeholder="sku"/>\n' +
        '                                            <input type="text" name="size[]" style="height: 30px" id="size[]" placeholder="size"/>\n' +
        '                                           <br><br> <input type="text" name="price[]" id="price[]" style="height: 30px" placeholder="price"/>\n' +
        '                                            <input type="text" name="stock[]" id="stock[]" style="height: 30px" placeholder="stock"/>\n<a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});