/**
 * Created by damirseremet on 17/07/14.
 */


$(function(){
    
    window.app = {};

    app.BrainSocket = new BrainSocket(
            new WebSocket('ws://' + window.location.hostname + ':8080'),
            new BrainSocketPubSub()
    );
    

    $(".parking-slot").click(function(){
        parkingSlot = $(this);
        slotId = $(this).attr("slot-id");
        if($(this).hasClass("taken"))
            parkingSlot.addClass("free").removeClass("taken");
        else
            parkingSlot.addClass("taken").removeClass("free");

        $.ajax({url: '/admin', type: "POST", dataType: "json", data: { 'slotId' : slotId}  }).complete(function(data)
        {
            data = $.parseJSON(data.responseText);
            
            evt = app.BrainSocket.message('generic.event',[data.free, slotId]);

            if(data.free)
                parkingSlot.addClass("free").removeClass("taken");
            else
                parkingSlot.addClass("taken").removeClass("free");

        });

    });


});

