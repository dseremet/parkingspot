<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Free Parking Slot - Admin</title>

    <link href="/css/main.css" type="text/css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>
<body>
<div>

    <table class="parkingSpots">
        <?php $count = 0; ?>
        <?php for ($row = 1; $row <= $numberOfRows; $row++): ?>
            <tr>
                <?php for ($column = 1; $column <= $numberOfColumns; $column++): ?>
                    <td class="home-slot<?= $parkingSpots[$count]['id']?> <?= $parkingSpots[$count]['free'] ? "free" : "taken" ?>"><?= $column ?></td>
                    <?php $count++; ?>
                <?php endfor; ?>
            </tr>
            <?php if ($row % 2 == 1): ?>

                <tr>
                    <td colspan="<?= $numberOfColumns ?>" class="emptyRow"></td>
                </tr>
            <?php endif; ?>
        <?php endfor; ?>

    </table>
</div>
<script type="text/javascript" src="/js/handlebars-1.1.2.js"></script>
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/brain-socket.min.js" />
<script type="text/javascript" src="/js/main.js"></script>

<script>
    window.app = {};

    app.BrainSocket = new BrainSocket(
            new WebSocket('ws://<?= Request::server("HTTP_HOST")?>:8080'),
            new BrainSocketPubSub()
    );

    app.BrainSocket.Event.listen('generic.event',function(msg)
    {
        console.log(msg.client.data[1]);
        var slot = $(".home-slot" + msg.client.data[1]);
        if(msg.client.data[0])
                slot.addClass("free").removeClass("taken");
            else
                slot.addClass("taken").removeClass("free");
    });

</script>
</body>
</html>
