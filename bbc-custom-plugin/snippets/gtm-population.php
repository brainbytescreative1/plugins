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
	
		var utm_id = getUrlParameter('utm_id');
        var utm_source = getUrlParameter('utm_source');
        var utm_medium = getUrlParameter('utm_medium');
        var utm_name = getUrlParameter('utm_name');
        var utm_term = getUrlParameter('utm_term');
		var utm_campaign = getUrlParameter('utm_campaign');
        var utm_content = getUrlParameter('utm_content');

		//var utm_term = getUrlParameter('utm_term');
		//var utm_content = getUrlParameter('utm_content');
		
        // id
        var utm_id_field = document.querySelector('[value="utm_id"]');
        if ( utm_id != false ) {
            if ( utm_id_field != null ) {
                if ( utm_id_field.value != utm_id ) {
                    utm_id_field.value = utm_id;
                }
            }
        }
        if ( utm_id_field ) {
            if ( utm_id_field.value == 'utm_id' ) {
                utm_id_field.value = null;
            }
        }

        // source
        var utm_source_field = document.querySelector('[value="utm_source"]');
        if ( utm_source != false ) {
            if ( utm_source_field != null ) {
                if ( utm_source_field.value != utm_source ) {
                    utm_source_field.value = utm_source;
                }
            }
        }
        if ( utm_source_field ) {
            if ( utm_source_field.value == 'utm_source' ) {
                utm_source_field.value = null;
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
        if ( utm_medium_field ) {
            if ( utm_medium_field.value == 'utm_medium' ) {
                utm_medium_field.value = null;
            }
        }

        // name
        var utm_name_field = document.querySelector('[value="utm_name"]');
        if ( utm_name != false ) {
            if ( utm_name_field != null ) {
                if ( utm_name_field.value != utm_name ) {
                    utm_name_field.value = utm_name;
                }
            }
        }
        if ( utm_name_field ) {
            if ( utm_name_field.value == 'utm_name' ) {
                utm_name_field.value = null;
            }
        }

        // term
        var utm_term_field = document.querySelector('[value="utm_term"]');
        if ( utm_term != false ) {
            if ( utm_term_field != null ) {
                if ( utm_term_field.value != utm_term ) {
                    utm_term_field.value = utm_term;
                }
            }
        }
        if ( utm_term_field ) {
            if ( utm_term_field.value == 'utm_term' ) {
                utm_term_field.value = null;
            }
        }

        // campaign
        var utm_campaign_field = document.querySelector('[value="utm_campaign"]');
        if ( utm_campaign != false ) {
            if ( utm_campaign_field != null ) {
                if ( utm_campaign_field.value != utm_campaign ) {
                    utm_campaign_field.value = utm_campaign;
                }
            }
        }
        if ( utm_campaign_field ) {
            if ( utm_campaign_field.value == 'utm_campaign' ) {
                utm_campaign_field.value = null;
            }
        }

        // content
        var utm_content_field = document.querySelector('[value="utm_content"]');
        if ( utm_content != false ) {
            if ( utm_content_field != null ) {
                if ( utm_content_field.value != utm_content ) {
                    utm_content_field.value = utm_content;
                    
                }
            }
        }
        if ( utm_content_field ) {
            if ( utm_content_field.value == 'utm_content' ) {
                utm_content_field.value = null;
            }
        }
        
	</script>

    <?php

	// return content
	$content = ob_get_clean();
    return $content;

}
add_shortcode( 'bbc_populate_gtm', 'bbc_populate_gtm_shortcode' );