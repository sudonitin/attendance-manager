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

            <?php $i = 'hello :) world'?>

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
                if (d.getHours() == 20 && d.getMinutes() == 47) {
                    alert("mf");
                }
                    console.log('<?php echo $i?>');
                }, 3000);

        </script>

    </body>
</html>