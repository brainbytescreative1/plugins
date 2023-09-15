<?php

function bbc_populate_gtm_shortcode() {
	
	// start content
	ob_start();

    ?>
    
    <!-- UTM script -->
	<script>
		var getUrlParameter = function getUrlParameter(sParam) {
			var sPageURL = window.location.search.substring(1),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;

			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
				}
			}
			return false;
		};
	
		var utm_source = getUrlParameter('utm_source');
        var utm_medium = getUrlParameter('utm_medium');
		var utm_campaign = getUrlParameter('utm_campaign');

		//var utm_term = getUrlParameter('utm_term');
		//var utm_content = getUrlParameter('utm_content');
		

        // source
        var utm_source_field = document.querySelector('[value="utm_source"]');
        if ( utm_source != false ) {
            if ( utm_source_field != null ) {
                if ( utm_source_field.value != utm_source ) {
                    utm_source_field.value = utm_source;
                }
            }
        }

        // medium
        var utm_medium_field = document.querySelector('[value="utm_medium"]');
        if ( utm_medium != false ) {
            if ( utm_medium_field != null ) {
                if ( utm_medium_field.value != utm_medium ) {
                    utm_medium_field.value = utm_medium;
                }
            }
        }

        // source
        var utm_campaign_field = document.querySelector('[value="utm_campaign"]');
        if ( utm_campaign != false ) {
            if ( utm_campaign_field != null ) {
                if ( utm_campaign_field.value != utm_campaign ) {
                    utm_campaign_field.value = utm_campaign;
                }
            }
    }
        
	</script>

    <?php

	// return content
	$content = ob_get_clean();
    return $content;

}
add_shortcode( 'bbc_populate_gtm', 'bbc_populate_gtm_shortcode' );