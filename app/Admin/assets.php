<?php
if (config( 'app.env' ) === 'production') {
    Meta::addJs('jquery', secure_url('/js/jquery-3.2.1.min.js'));
} else {
    Meta::addJs('jquery', asset('/js/jquery-3.2.1.min.js'));
}

Meta::addJs('v_script', asset('/js/v_script.js'));
