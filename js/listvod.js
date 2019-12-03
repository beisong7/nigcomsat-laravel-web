$(document).ready(function () {
    setTimeout(()=>{
        vidConnect()
    }, 1500)

});

async function vidConnect(){
    await $.get( '/client/v/acquire')
        .done( function(resp){
            // handle response here
            // console.log(resp)
            if(resp.length > 0){

                $('.load-fin').hide();
                buildVids(resp)

            }

        }).fail(function(resp){
        console.log('Oooops, something has spoil.');
        console.log(resp)
    });
}

function buildVids(videos) {
    let elem = $('.list-vids');
    $.each(videos, function (n,vid) {
        elem.append(vidFrame(vid.playerCode, vid.description, vid.runtime))
    })
}

function vidFrame(iframe, info, runtime) {
    // console.log(iframe, info, runtime)
    // return "<div class='col-md-6 col-sm-12 mb-5 text-center smooth iframe-wrapper'>"+iframe+"<p class='text-gray'>"+info+"</p></div>"

    return "<div class='col-md-6 col-sm-12 mb-5 text-center smooth iframe-wrapper '>" +
        "<div class='shadow min-h-250'>"+injectFrame(iframe)+"<p class='text-muted text-left p-2'><small>"+info+"</small> <small class='text-muted'>duration: "+runtime+"</small></p> " +
        ""+miniLoader()+"</div></div>"
}

function miniLoader() {
    return "<div class='mini-load-wrapper' style=' position: absolute;left: 45%;top: 20%;z-index: -1'>" +
        "<div class='load-wraper load-fin mt-5' style='width: 50px; margin-left: auto; margin-right: auto'>" +
        "<img src='/svg/loader-loop.svg' alt='' style='width: 100%'></div></div>"
}

function injectFrame(frame) {
    let n = 7;
    console.log(frame);
    let newFrame = frame.substr(0,n)+ ' onclick="event.preventDefault(); " ' + frame.substr(n)
    // frame.replace(, "W3Schools")
    // console.log(typeof frame)
    console.log(newFrame);
    return newFrame;
}