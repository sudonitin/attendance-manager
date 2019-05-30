<html>
    <body>
        <a href="#" id='perm'>req perm</a>
        <a href='#' id='trig'>trigg</a>

        <script>
            var perm = document.getElementById('perm');
            var trig = document.getElementById('trig');

            perm.addEventListener('click', function(e){
                e.preventDefault();

                if(!window.Notification){
                    alert('not supported');
                } else {
                    Notification.requestPermission(function(p){
                        if (p === 'denied') {
                            alert('u hav denied notifications');
                        } else if (p === 'granted') {
                            alert('granted');
                        }
                    });
                }
            });

            <?php $i = 'hello :) world'; $j = 0;?>

            trig.addEventListener('click', function(e){
                var notify;
                e.preventDefault();

                if (Notification.permission === 'default') {
                    alert('allow me')
                } else {
                    notify = new Notification("<?php echo $i; ?>");

                }
            });
            
            
            setInterval(() => {
                var d = new Date();
                if (d.getHours() == 22 && d.getMinutes() == 20) {
                    var notify;
                    //e.preventDefault();

                    if (Notification.permission === 'default') {
                        alert('allow me')
                    } else {
                        notify = new Notification("<?php echo $i; ?>");

                    }
                }
                    console.log("<?php echo $i . $j;?>");
                    <?php $j += 1; ?>
                }, 5000);

        </script>

    </body>
</html>