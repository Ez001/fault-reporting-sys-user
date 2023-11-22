/*
   Date modified: 29/09/2023
*/

const makeAjaxCall = async ( url, method, data, ret = false ) => {
   let res;

   try
   {
      res = await $.ajax({
         url: url, 
         method: method, 
         data: data,
      });

      //alert( res );
      if ( ret )
      {
         return res;
      }
   }
   catch ( err )
   {
      console.error( err );
   }
};
