$(document).ready(() => {

    // #6b6d6f #4c5158
    var change_theme_vars = {
        "Dark":{
            1: {background:"#141619"},
            2: {background:"#17191d"},            
            3: {color:"#e3e3e3"},
            4: {background:"#3e3e3e"}
        },
        "Light":{
            1:{background:"#f7f7f7"},
            2:{background:"rgba(253, 253, 253, 1)"},
            3:{color:"#000000"},
            4:{background:"#c1c1c1"}
        },
        "vars": {
            1:{background:[$("body"), $(".form-select"), $("#change-theme"), $("#message")]},
            2:{background:[$(".input")]},
            3:{color:[$(".input"), $("body"), $(".button-send"), $(".links"), $(".links-min"), $(".form-select")]},
            4:{background:[$(".button-send")]}
        },
    }

    var theme_start = "Light";

    $("#password").mousedown(function() {
        $('#password').prop('type', 'text');
    });

    $("#password-repeat").mousedown(function() {
        $('#password-repeat').prop('type', 'text');            
    });

    $(document).mouseup(function() {
        if ($('#password').attr('type') == "text"){
            $('#password').prop('type', 'password');
            $('#password').focus();
            $('#password').selectionStart = $('#password').val().length;
        }
        if ($('#password-repeat').attr('type') == "text"){
            $('#password-repeat').prop('type', 'password');
            $('#password-repeat').focus();
            $('#password-repeat').selectionStart = $('#password-repeat').val().length;
        }                    
    });

    $("#password-input").mousedown(function() {
        $('#password-input').prop('type', 'text');
    });

    $(document).mouseup(function() {
        if ($('#password-input').attr('type') == "text"){
            $('#password-input').prop('type', 'password');
            $('#password-input').focus();
            $('#password-input').selectionStart = $('#password-input').val().length;
        }                               
    });

    $("#change-theme").click(click_change_theme);

    function click_change_theme(){
        let change = $.cookie('projectx-theme') == theme_start ? "Dark" : theme_start;

        $.cookie('projectx-theme', change);
        
        change_theme();
    } 

    function change_theme(){

        let change = $.cookie('projectx-theme') 

        for (let i in change_theme_vars["vars"]){
            for (let j = 0; j < Object.values(change_theme_vars["vars"][i])[0].length; j++){    
                let key = Object.keys(change_theme_vars[change][i])[0];
                let value = Object.values(change_theme_vars[change][i])[0];
                let to = Object.values(change_theme_vars["vars"][i])[0][j];
                if (key == "background")
                    to.css({"background": value}); 
                if (key == "color")
                    to.css({"color": value});

            }
                // change_theme_vars["vars"][change_theme_vars[change][i]] = change_theme_vars[change][i]
        }

        $("#change-theme").text(change == theme_start ? "Dark theme" : "Light theme");
    }

    if ($.cookie('projectx-theme') === null || $.cookie('projectx-theme') === undefined || typeof $.cookie('projectx-theme') == 'undefined')
        $.cookie('projectx-theme', theme_start);
        
    // if (theme_start != $.cookie('projectx-theme'))
    change_theme();    
    $("#message").css({left:window.window.innerWidth - 410, width:400});
})   