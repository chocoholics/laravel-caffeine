<script>
    var lastCheck = new Date();
    var caffeineSendDrip = function () {
        axios.get('extend-session')
             .then( response => response.status ? lastCheck = new Date() : console.log('Session could not be extended.') );
    }

    setInterval(function () {
        caffeineSendDrip();
    }, {{ $interval }});

    if ({{ $ageCheckInterval }} > 0) {
        setInterval(function () {
            if (new Date() - lastCheck >= {{ $ageCheckInterval + $ageThreshold }}) {
                location.reload(true);
            }
        }, {{ $ageCheckInterval }});
    }
</script>
