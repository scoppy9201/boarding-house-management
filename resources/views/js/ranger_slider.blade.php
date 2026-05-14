<script>

    /*=====================
     range slider js
     ==========================*/

     $( function() {
      $( "#slider-range" ).slider({
        range: true,
        min: 100,
        max: 5000,
        values: [ {{ isset($oldData->price[0]) ? $oldData->price[0] / 1000 : 500 }}, {{ isset($oldData->price[1]) ? $oldData->price[1] / 1000 : 1500 }} ],
        slide: function( event, ui ) {
          let html = (ui.values[ 0 ]*1000).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}) + " - " + (ui.values[ 1 ]*1000).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
          $( "#amount" ).html(html);
          $( "#price_from" ).val(ui.values[ 0 ]*1000);
          $( "#price_to" ).val(ui.values[ 1 ]*1000);

        }
      });
      let html_start =  ($( "#slider-range" ).slider( "values", 0 )*1000).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}) +
      " - " + ($( "#slider-range" ).slider( "values", 1 )*1000).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})  ;
      $( "#price_from" ).val($( "#slider-range" ).slider( "values", 0 )*1000);
      $( "#price_to" ).val($( "#slider-range" ).slider( "values", 1 )*1000);
      $( "#amount" ).html(html_start);
    } );

      $( function() {
        $( "#slider-range1" ).slider({
          range: true,
          min: 0,
          max: 100,
          values: [ {{ isset($oldData->area[0]) ? $oldData->area[0] : 10 }}, {{ isset($oldData->area[1]) ? $oldData->area[1] : 30 }} ],
          slide: function( event, ui ) {
            $( "#amount1" ).val( ui.values[ 0 ] + "m2 - " + ui.values[ 1 ] + "m2"  );
            $( "#area_from" ).val(ui.values[ 0 ]);
            $( "#area_to" ).val(ui.values[ 1 ]);
          }
        });
        $( "#amount1" ).val( $( "#slider-range1" ).slider( "values", 0 ) +
          "m2 -" + $( "#slider-range1" ).slider( "values", 1 ) + "m2" );
          $( "#area_from" ).val($( "#slider-range1" ).slider( "values", 0 ));
      $( "#area_to" ).val($( "#slider-range1" ).slider( "values", 1 ));
      } );
</script>