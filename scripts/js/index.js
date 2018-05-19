var tester;
var json;


$(document).ready(function() {

    $("#dataToggler").click(function(e) {

        var windowWidth = $(window).width();
        if(windowWidth > 579){
            console.log ('collap');
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            /*$(".menunames").toggleClass("collapse in");*/
            /*$('#sidebar').addclass('');*/
        }else{
            var collap = $('#sidebar').css('height');
            (parseInt(collap) > 70) ? collapseSidebar() : openSidebar();
            console.log (collap);
        }
    });

    $("body").on("click", function(e) {
        //var b = $('.inpmFro').val();
        //transfervalue();
        if($(e.target).attr('class') == "modal fade"){
            $("#updDiv input").val("");
        }
        //console.log($(e.target).attr('class'));
    });

    $("#closeCreateCustomer").on("click", function(e) {
        //var b = $('.inpmFro').val();
        //transfervalue();
        if($(e.target).attr('class') == "modal fade"){
            $("#createDiv input").val("");
        }
        //console.log($(e.target).attr('class'));
    });
    $("#closeUpdCustomer").on("click", function(e) {
        //var b = $('.inpmFro').val();
        //transfervalue();
        if($(e.target).attr('class') == "modal fade"){
            $("#updDiv input").val("");
        }
        //console.log($(e.target).attr('class'));
    });

    $("#navmenu a").click(function (e){
        $(".active").toggleClass("active");
        $(this).addClass("active");
    });

   /* $('.editCand').click(function (e){
        $("#updCand").modal("show");
    });*/

});

$(window).resize(organiseSidebar);

function toggleModal(obj){
    console.log(obj.prop("value"));
    var u = obj.prop("value");
    var g = json[u];
    console.log(u);
    var a = Object.keys(g).map(function(_){return g[_];})
    for(var i = 0; i < Object.keys(json[0]).length - 1; i++){
        $("input[name='candd" + i +"']").val(a[i+1]);
    }
    $("#btnUpd").prop("value", g.id);
}

function collapseSidebar(){
    console.log ('igothere');
    $('#sidebar').animate({
        height: 65
    }, 300);
}
function openSidebar(){
    var ht = $('#sidebar').get(0).scrollHeight;
    $('#sidebar').animate({
        height: ht
    }, 200);
}
function organiseSidebar(){
    var windowWidth = $(window).width();
    (windowWidth > 578) ? resizesideleft() : resizesidetop();
    console.log (windowWidth);
}
function resizesidetop(){
    $('#sidebar').css('height', '65px');
}
function resizesideleft(){
    $('#sidebar').css('height', '100%');

}
/*
function moreless(){
    $(".rest").toggleClass("more less");
    if($("#btnmore").css("opacity") == "0"){
        $("#btnless").css("opacity", "0");
        $("#btnmore").css("opacity", "1");
    }else{
        $("#btnmore").css("opacity", "0");
        $("#btnless").css("opacity", "1");
    }
}*/

function showCandidates(){
    //console.log("hw");
    //$.get("/MagicBrushAdmin/scripts/php/regTable.php", function(response) {
    $.get("/webplay/MagicBrushAdmin/scripts/php/regTable.php", function(response) {
        /*$("#gifCon").addClass("invisible hidden");
        $("#error").removeClass("hidden");
        $("#btnContactUs").attr('disabled',false);
        var output;
        if (response.substring(2, 7) == "error") {
            var json = JSON.parse(response);
            var obj;

        }*/
        //console.log(response);

        json = JSON.parse(response);
        var str = "";
        for(var a = 0; a < json.length; a++){
            str += '<tr id="tablerow' + a + '" class = "trow"><td style="text-align: center;" class="tdel">' + json[a].id + '</td><td class="tdel">' + json[a].name + '</td><td style="text-align: center;" class="tdel">' + json[a].age + '</td><td style="text-align: center;" class="tdel">' + json[a].gender + '</td><td style="text-align: center;" class="tdel">' + json[a].state + '</td><td class="tdel">' + json[a].zone + '</td><td class="tdel">' + json[a].email + '</td><td class="tdel">' + json[a].mobile + '</td><td style="text-align: center;" class="tdel">' + json[a].status + '</td><td class="tdel">' + json[a].regdate + '</td><td style="text-align: center;" class="tdel"><button type="button" onclick = "toggleModal($(this));" class="btn btn-primary btn-sm editCand" value="' + a + '" data-toggle = "modal" data-target = "#updCand"><i class="fa fa-edit"></i>Edit</button></td><td><div style="text-align: center;"><input type="checkbox" name="candCheck" class="candCheck" value="' + a + '"> <span class="glyphicon glyphicon-check"></span></div></td></tr>'
        }
        /*<td><div style="text-align: center;"><input type="checkbox" name="candCheck" class="candCheck" value="1"> <span class="glyphicon glyphicon-check"></span></div></td>*/
        $('#candidates').append(str);
        console.log(json);
    });
}

function CreateCandInf(){
    var formdata = $("#create_form").serialize();
   /* console.log(formdata);*/
    $("#btnCreate").css("visibility", "hidden");
    $("#createloadgif").css("visibility", "visible");
    $('#createerror').css("display", "inline");
    //$.post("/MagicBrushAdmin/scripts/php/updCand.php",formdata, function(response) {
    $.post("/webplay/MagicBrushAdmin/scripts/php/createCand.php",formdata, function(response) {

        $("#createloadgif").css("visibility", "hidden");
        var output;
        console.log(response);
        if (response.substring(2, 7) == "error") {
            var jsonn = JSON.parse(response);
            var obj;
            if(jsonn[3] == "first"){
                obj = $("input[name=" + jsonn[1] + "]").prev("label").text();
                output = obj + " " + jsonn[2];
            }else{
                obj = $("input[name=" + jsonn[2] + "]").prev("label").text();
                output = jsonn[1] + " " + obj;
                /*$("input[name=" + json[1] + "]")*/
            }
            $('#createerror').css("color", "#DD2A2A");
            $('#createerror').text(output).fadeTo('slow', 1).delay(2000)
                .fadeTo('slow', 0, function(){$("#btnCreate").css("visibility", "visible"); $('#createerror').css("display", "none");});
        }else if (response.substring(2, 7) == "uperr") {
            var jsonn = JSON.parse(response);
            output = jsonn[1];
            $('#createerror').css("color", "#DD2A2A");
            $('#createerror').text(output).fadeTo('slow', 1).delay(2000)
                .fadeTo('slow', 0, function(){$("#btnCreate").css("visibility", "visible"); $('#createerror').css("display", "none");});
        }else if (response.substring(2, 7) == "updat") {
            var jsonn = JSON.parse(response);
            output = jsonn[1];
            $('#createerror').css("color", "#25a249");
            $('#createerror').text(output).fadeTo('slow', 1).delay(2000)
                .fadeTo('slow', 0, function(){$("#btnCreate").css("visibility", "visible");$('#createerror').css("display", "none");});
            $("#candidates").empty();
            showCandidates();
        }else{
            output = "something went wrong";
            $('#createerror').css("color", "#DD2A2A");
            $('#createerror').text(output).fadeTo('slow', 1).delay(2000)
                .fadeTo('slow', 0, function(){$("#btnCreate").css("visibility", "visible");$('#createerror').css("display", "none");});
        }

    });
}

function updateCandInf(valu){
    var formdata = $("#reused_form").serialize();
    var val_id = "val_id";
    formdata += "&val_id=" + valu;
   /* console.log(formdata);*/
    $("#btnUpd").css("visibility", "hidden");
    $("#updloadgif").css("visibility", "visible");
    $('#upderror').css("display", "inline");
    //$.post("/MagicBrushAdmin/scripts/php/updCand.php",formdata, function(response) {
    $.post("/webplay/MagicBrushAdmin/scripts/php/updCand.php",formdata, function(response) {

        $("#updloadgif").css("visibility", "hidden");
        var output;
        console.log(response);
        if (response.substring(2, 7) == "error") {
            var jsonn = JSON.parse(response);
            var obj;
            if(jsonn[3] == "first"){
                obj = $("input[name=" + jsonn[1] + "]").prev("label").text();
                output = obj + " " + jsonn[2];
            }else{
                obj = $("input[name=" + jsonn[2] + "]").prev("label").text();
                output = jsonn[1] + " " + obj;
                /*$("input[name=" + json[1] + "]")*/
            }
            $('#upderror').css("color", "#DD2A2A");
            $('#upderror').text(output).fadeTo('slow', 1).delay(2000)
                .fadeTo('slow', 0, function(){$("#btnUpd").css("visibility", "visible"); $('#error').css("display", "none");});
        }else if (response.substring(2, 7) == "uperr") {
            var jsonn = JSON.parse(response);
            output = jsonn[1];
            $('#upderror').css("color", "#DD2A2A");
            $('#upderror').text(output).fadeTo('slow', 1).delay(2000)
                .fadeTo('slow', 0, function(){$("#btnUpd").css("visibility", "visible"); $('#error').css("display", "none");});
        }else if (response.substring(2, 7) == "updat") {
            var jsonn = JSON.parse(response);
            output = jsonn[1];
            $('#upderror').css("color", "#25a249");
            $('#upderror').text(output).fadeTo('slow', 1).delay(2000)
                .fadeTo('slow', 0, function(){$("#btnUpd").css("visibility", "visible");$('#error').css("display", "none");});
            $("#candidates").empty();
            showCandidates();
        }else{
            output = "something went wrong";
            $('#upderror').css("color", "#DD2A2A");
            $('#upderror').text(output).fadeTo('slow', 1).delay(2000)
                .fadeTo('slow', 0, function(){$("#btnUpd").css("visibility", "visible");$('#error').css("display", "none");});
        }

    });
}
