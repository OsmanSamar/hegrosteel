import 'babel-polyfill'
import 'bootstrap'

// Styling
import '../scss/style.scss'

// Fontawesome
import { dom, library } from '@fortawesome/fontawesome-svg-core'
import { faFacebookF, faTwitter, faInstagram, faLinkedinIn } from '@fortawesome/free-brands-svg-icons'
library.add(faFacebookF, faTwitter, faInstagram, faLinkedinIn)
dom.watch()

// General
jQuery(document).ready(function($){
    if($('.login.wp-core-ui').length){
        $('#user_login').attr('placeholder', 'Gebruikersnaam of e-mailadres');
        $('#user_pass').attr('placeholder', 'Wachtwoord')
    }
});


