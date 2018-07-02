var volume = 100;
var ua = navigator.userAgent.toLowerCase();
var is_android = ua.indexOf("android") > -1;
var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
var is_ios = navigator.userAgent.toLowerCase().indexOf('ios') > -1;

var player, vol, playing = false, proc = true;
window.onhashchange = play;

jQuery(window).ready(function () {
    jQuery('#slider').slider({
        value: 100,
        min: 0,
        max: 100,
        change: function (event, ui) {
            volume = ui.value;
            player.volume = volume / 100;
        }
    });

    player = document.getElementById("player");
    player.onplaying = playingCallBack;


    jQuery("#play-btn.play").click(play);
    player.volume = 1;
    vol = player.volume;
    proc = false;
    if (location.hash === '#play') {
        play();
        jQuery('.link-site').attr('target', '_BLANK');
    } else {
        jQuery('.link-site').attr('target', '_SELF');
    }
    if (!is_android && !is_ios) {
        jQuery('#vol-box').css('visibility', 'visible');
    }

});


function play() {
    if (!proc) {
        if (player.paused) {
            proc = true;
            player.play();
            jQuery("#play-btn").removeClass('play').removeClass('stop').addClass('load');
            jQuery("#listen h1").html("CARREGANDO");
            jQuery('.link-site').attr('target', '_BLANK');
        } else {
            player.pause();
            jQuery("#play-btn").removeClass('load').removeClass('stop').addClass('play');
            jQuery("#listen h1").html("OUÇA AGORA");
            jQuery('.link-site').attr('target', '_SELF');
        }
    }
}
function playingCallBack() {



    if (is_android && is_chrome) {
        setTimeout(playingFix, 15000);

    } else {
        playingFix();
    }

}

function playingFix() {
    playing = true;
    proc = false;
    jQuery("#play-btn").removeClass('play').removeClass('load').addClass('stop');
    jQuery("#listen h1").html("RIO FM");
    jQuery('.link-site').attr('target', '_BLANK');
}

var db = OpenDataBase('dbTips','1.0','ouvintes',2*1024*1024);
db.transaction(function(tx){
    tx.executeSql('CREATE TABLE aovivo (id PRIMARY KEY, nome TEXT);');
})