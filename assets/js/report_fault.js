/*
   Date created: 02/12/2023 
   Date modified: 06/12/2023
*/
$( document ).ready( () => {
   
   $( '.review_status' ).change( ( e ) => {
      const dt_set = e.target.dataset;

      const reported_fault_id = dt_set.id;
      const review_status = $('#review_status').val();
      
      makeAjaxCall( '', 'POST', { 'set_review_status' : true, 'review_status' : review_status, 'reported_fault_id' : reported_fault_id }, true ).
      then( ( data ) => 
      	//redirect
         window.location.replace( app_url )
      );
   });

});